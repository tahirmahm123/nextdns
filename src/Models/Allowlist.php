<?php

namespace NextDNS\Models;

class Allowlist
{
	/** @var string */
	public string $id;
	/** @var bool */
	public bool $active;

	/**
	 * @param string $id
	 * @param bool $active
	 */
	public function __construct(string $id, bool $active)
	{
		$this->id = $id;
		$this->active = $active;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			$data['id'],
			$data['active']
		);
	}
}
