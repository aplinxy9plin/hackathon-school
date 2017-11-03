<?php

namespace YandexDiskApi;

use LightweightCurl\Curl;
use LightweightCurl\Request;

class Common
{
    /**  */
    protected const URL = 'https://cloud-api.yandex.net/v1/disk/resources/';

    /**
     * @var string
     */
    protected $token;

    /**
     * @var Curl
     */
    protected $curl;

    /**
     * Disk constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
        $this->curl = new Curl();
    }

    public function makeRequest(string $url): Request
    {
        $request = new Request();
        $request->setHeaders([
            'Authorization' => 'OAuth ' . $this->token,
        ]);
        $request->setUrl(self::URL . $url);

        return $request;
    }
}
