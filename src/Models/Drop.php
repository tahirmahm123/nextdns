<?php

namespace NextDNS\Models;

class Drop
{
	/** @var bool */
	public bool $ip;
	/** @var bool */
	public bool $domain;

	/**
	 * @param bool $ip
	 * @param bool $domain
	 */
	public function __construct(bool $ip, bool $domain)
	{
		$this->ip = $ip;
		$this->domain = $domain;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			$data['ip'],
			$data['domain']
		);
	}
}
