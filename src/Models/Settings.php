<?php

namespace NextDNS\Models;

class Settings
{
	/** @var Logs */
	public Logs $logs;
	/** @var BlockPage */
	public BlockPage $blockPage;
	/** @var Performance */
	public Performance $performance;
	/** @var bool */
	public bool $web3;

	/**
	 * @param Logs $logs
	 * @param BlockPage $blockPage
	 * @param Performance $performance
	 * @param bool $web3
	 */
	public function __construct(
		Logs $logs,
		BlockPage $blockPage,
		Performance $performance,
		bool $web3
	) {
		$this->logs = $logs;
		$this->blockPage = $blockPage;
		$this->performance = $performance;
		$this->web3 = $web3;
	}

	/**
	 * @param array $data
	 * @return self
	 */
	public static function fromJson(array $data): self
	{
		return new self(
			Logs::fromJson($data['logs']),
			BlockPage::fromJson($data['blockPage']),
			Performance::fromJson($data['performance']),
			$data['web3']
		);
	}
}
