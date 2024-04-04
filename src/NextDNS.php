<?php

namespace NextDNS;

class NextDNS
{
    private string $endpoint = "https://api.nextdns.io/";
    private string $authKey;

    public function __construct($authKey)
    {
        $this->authKey = $authKey;
    }
    public function request()
    {

    }
}