<?php

namespace NextDNS\Models;

class Security
{
	/** @var bool */
	public bool $threatIntelligenceFeeds;
	/** @var bool */
	public bool $aiThreatDetection;
	/** @var bool */
	public bool $googleSafeBrowsing;
	/** @var bool */
	public bool $cryptojacking;
	/** @var bool */
	public bool $dnsRebinding;
	/** @var bool */
	public bool $idnHomographs;
	/** @var bool */
	public bool $typosquatting;
	/** @var bool */
	public bool $dga;
	/** @var bool */
	public bool $nrd;
	/** @var bool */
	public bool $ddns;
	/** @var bool */
	public bool $parking;
	/** @var bool */
	public bool $csam;
	/** @var Tlds[] */
	public array $tlds;

	/**
	 * @param bool $threatIntelligenceFeeds
	 * @param bool $aiThreatDetection
	 * @param bool $googleSafeBrowsing
	 * @param bool $cryptojacking
	 * @param bool $dnsRebinding
	 * @param bool $idnHomographs
	 * @param bool $typosquatting
	 * @param bool $dga
	 * @param bool $nrd
	 * @param bool $ddns
	 * @param bool $parking
	 * @param bool $csam
	 * @param Tlds[] $tlds
	 */
	public function __construct(
		bool $threatIntelligenceFeeds,
		bool $aiThreatDetection,
		bool $googleSafeBrowsing,
		bool $cryptojacking,
		bool $dnsRebinding,
		bool $idnHomographs,
		bool $typosquatting,
		bool $dga,
		bool $nrd,
		bool $ddns,
		bool $parking,
		bool $csam,
		array $tlds
	) {
		$this->threatIntelligenceFeeds = $threatIntelligenceFeeds;
		$this->aiThreatDetection = $aiThreatDetection;
		$this->googleSafeBrowsing = $googleSafeBrowsing;
		$this->cryptojacking = $cryptojacking;
		$this->dnsRebinding = $dnsRebinding;
		$this->idnHomographs = $idnHomographs;
		$this->typosquatting = $typosquatting;
		$this->dga = $dga;
		$this->nrd = $nrd;
		$this->ddns = $ddns;
		$this->parking = $parking;
		$this->csam = $csam;
		$this->tlds = $tlds;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			$data['threatIntelligenceFeeds'],
			$data['aiThreatDetection'],
			$data['googleSafeBrowsing'],
			$data['cryptojacking'],
			$data['dnsRebinding'],
			$data['idnHomographs'],
			$data['typosquatting'],
			$data['dga'],
			$data['nrd'],
			$data['ddns'],
			$data['parking'],
			$data['csam'],
			array_map(static function($data) {
				return Tlds::fromJson($data);
			}, $data['tlds'])
		);
	}
}
