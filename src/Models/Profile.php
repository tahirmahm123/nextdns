<?php

namespace NextDNS\Models;

class Profile
{
	/** @var string */
	public string $name;
	/** @var Security */
	public Security $security;
	/** @var Privacy */
	public Privacy $privacy;
	/** @var ParentalControl */
	public ParentalControl $parentalControl;
	/** @var Denylist[] */
	public array $denyList;
	/** @var Allowlist[] */
	public array $allowList;
	/** @var Settings */
	public Settings $settings;

	/**
	 * @param string $name
	 * @param Security $security
	 * @param Privacy $privacy
	 * @param ParentalControl $parentalControl
	 * @param Denylist[] $denyList
	 * @param Allowlist[] $allowList
	 * @param Settings $settings
	 */
	public function __construct(
		string          $name,
		Security        $security,
		Privacy         $privacy,
		ParentalControl $parentalControl,
		array           $denyList,
		array           $allowList,
		Settings        $settings
	) {
		$this->name = $name;
		$this->security = $security;
		$this->privacy = $privacy;
		$this->parentalControl = $parentalControl;
		$this->denyList = $denyList;
		$this->allowList = $allowList;
		$this->settings = $settings;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			$data['name'],
			Security::fromJson($data['security']),
			Privacy::fromJson($data['privacy']),
			ParentalControl::fromJson($data['parentalControl']),
			array_map(static function($data) {
				return Denylist::fromJson($data);
			}, $data['denylist']),
			array_map(static function($data) {
				return Allowlist::fromJson($data);
			}, $data['allowlist']),
			Settings::fromJson($data['settings'])
		);
	}
}
