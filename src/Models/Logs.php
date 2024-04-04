<?php

namespace NextDNS\Models;

class Logs
{
	/** @var bool */
	public bool $enabled;
	/** @var Drop */
	public Drop $drop;
	/** @var int */
	public int $retention;
	/** @var string */
	public string $location;

	/**
	 * @param bool $enabled
	 * @param Drop $drop
	 * @param int $retention
	 * @param string $location
	 */
	public function __construct(
		bool $enabled,
		Drop $drop,
		int $retention,
		string $location
	) {
		$this->enabled = $enabled;
		$this->drop = $drop;
		$this->retention = $retention;
		$this->location = $location;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			$data['enabled'],
			Drop::fromJson($data['drop']),
			$data['retention'],
			$data['location']
		);
	}
}
