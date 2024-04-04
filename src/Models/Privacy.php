<?php

namespace NextDNS\Models;

class Privacy
{
	/** @var Blocklists[] */
	public array $blocklists;
	/** @var Natives[] */
	public array $natives;
	/** @var bool */
	public bool $disguisedTrackers;
	/** @var bool */
	public bool $allowAffiliate;

	/**
	 * @param Blocklists[] $blocklists
	 * @param Natives[] $natives
	 * @param bool $disguisedTrackers
	 * @param bool $allowAffiliate
	 */
	public function __construct(
		array $blocklists,
		array $natives,
		bool $disguisedTrackers,
		bool $allowAffiliate
	) {
		$this->blocklists = $blocklists;
		$this->natives = $natives;
		$this->disguisedTrackers = $disguisedTrackers;
		$this->allowAffiliate = $allowAffiliate;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			array_map(static function($data) {
				return Blocklists::fromJson($data);
			}, $data['blocklists']),
			array_map(static function($data) {
				return Natives::fromJson($data);
			}, $data['natives']),
			$data['disguisedTrackers'],
			$data['allowAffiliate']
		);
	}
}
