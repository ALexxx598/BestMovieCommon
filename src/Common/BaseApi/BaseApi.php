<?php

namespace Common\BaseApi;

use Illuminate\Support\Facades\Config;
use Psr\Http\Message\ResponseInterface;

class BaseApi
{
    /**
     * @param HttpClient $client
     * @param Config $config
     * @param string $baseUrlConfigKey
     */
    public function __construct(
        private HttpClient $client,
        private Config $config,
        private string $baseUrlConfigKey,
    ) {
    }

    /**
     * @return HttpClient
     */
    public function getClient(): HttpClient
    {
        return $this->client;
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @return string
     */
    public function getBaseUrlConfigKey(): string
    {
        return $this->baseUrlConfigKey;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->getConfig()[$this->getBaseUrlConfigKey()];
    }

    /**
     * @return string
     */
    public function getMSAuth(): string
    {
        return $this->getConfig()['MICROSERVICE_AUTH_TOKEN'];
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($url, array $data): ResponseInterface
    {
        $data['headers'] = [
            'MICROSERVICE_AUTH' => $this->getMSAuth(),
        ];

        return $this->getClient()->post($this->getBaseUrl() . $url, $data);
    }
}
