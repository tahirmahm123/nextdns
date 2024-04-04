<?php

namespace NextDNS\Models;

class Performance
{
	/** @var bool */
	public bool $ecs;
	/** @var bool */
	public bool $cacheBoost;
	/** @var bool */
	public bool $cnameFlattening;

	/**
	 * @param bool $ecs
	 * @param bool $cacheBoost
	 * @param bool $cnameFlattening
	 */
	public function __construct(
		bool $ecs,
		bool $cacheBoost,
		bool $cnameFlattening
	) {
		$this->ecs = $ecs;
		$this->cacheBoost = $cacheBoost;
		$this->cnameFlattening = $cnameFlattening;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			$data['ecs'],
			$data['cacheBoost'],
			$data['cnameFlattening']
		);
	}
}
