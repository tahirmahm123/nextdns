<?php

namespace NextDNS\Models;

class Tlds
{
	/** @var string */
	public string $id;

	/**
	 * @param string $id
	 */
	public function __construct(string $id)
	{
		$this->id = $id;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			$data['id']
		);
	}
}
