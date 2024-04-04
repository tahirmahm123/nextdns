<?php

namespace NextDNS\Models;

class BlockPage
{
	/** @var bool */
	public bool $enabled;

	/**
	 * @param bool $enabled
	 */
	public function __construct(bool $enabled)
	{
		$this->enabled = $enabled;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			$data['enabled']
		);
	}
}
