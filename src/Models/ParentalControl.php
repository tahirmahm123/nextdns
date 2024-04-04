<?php

namespace NextDNS\Models;

class ParentalControl
{
	/** @var Services[] */
	public array $services;
	/** @var Categories[] */
	public array $categories;
	/** @var bool */
	public bool $safeSearch;
	/** @var bool */
	public bool $youtubeRestrictedMode;
	/** @var bool */
	public bool $blockBypass;

	/**
	 * @param Services[] $services
	 * @param Categories[] $categories
	 * @param bool $safeSearch
	 * @param bool $youtubeRestrictedMode
	 * @param bool $blockBypass
	 */
	public function __construct(
		array $services,
		array $categories,
		bool $safeSearch,
		bool $youtubeRestrictedMode,
		bool $blockBypass
	) {
		$this->services = $services;
		$this->categories = $categories;
		$this->safeSearch = $safeSearch;
		$this->youtubeRestrictedMode = $youtubeRestrictedMode;
		$this->blockBypass = $blockBypass;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			array_map(static function($data) {
				return Services::fromJson($data);
			}, $data['services']),
			array_map(static function($data) {
				return Categories::fromJson($data);
			}, $data['categories']),
			$data['safeSearch'],
			$data['youtubeRestrictedMode'],
			$data['blockBypass']
		);
	}
}
