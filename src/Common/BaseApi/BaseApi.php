<?php

namespace BestMovie\Common\BaseApi;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Config\Repository as Config;
use Psr\Http\Message\ResponseInterface;

class BaseApi
{
    protected const MS_ENV_KEY = 'bestMovie';
    protected const MS_AUTH_ENV_KEY = 'MICROSERVICE_AUTH_TOKEN';

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
        return $this->getConfig()->get(self::MS_ENV_KEY)[$this->getBaseUrlConfigKey()];
    }

    /**
     * @return string
     */
    public function getMSAuth(): string
    {
        return $this->getConfig()->get(self::MS_ENV_KEY)[self::MS_AUTH_ENV_KEY];
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $url, array $data): ResponseInterface
    {
        if (array_key_exists('headers', $data)) {
            $data['headers']['MICROSERVICE_AUTH'] = $this->getMSAuth();

            return $this->getClient()->post($this->getBaseUrl() . $url, $data);
        }

        $data['headers'] = [
            'MICROSERVICE_AUTH' => $this->getMSAuth(),
        ];

        return $this->getClient()->post($this->getBaseUrl() . $url, $data);
    }

    /**
     * @param string $url
     * @param array $data
     * @return PromiseInterface
     */
    public function asyncPost(string $url, array $data): PromiseInterface
    {
        if (array_key_exists('headers', $data)) {
            $data['headers']['MICROSERVICE_AUTH'] = $this->getMSAuth();

            return $this->getClient()->postAsync($this->getBaseUrl() . $url, $data);
        }

        $data['headers'] = [
            'MICROSERVICE_AUTH' => $this->getMSAuth(),
        ];

        return $this->getClient()->postAsync($this->getBaseUrl() . $url, $data);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($url, array $data): ResponseInterface
    {
        if (array_key_exists('headers', $data)) {
            $data['headers']['MICROSERVICE_AUTH'] = $this->getMSAuth();

            return $this->getClient()->get($this->getBaseUrl() . $url, $data);
        }

        $data['headers'] = [
            'MICROSERVICE_AUTH' => $this->getMSAuth(),
        ];

        return $this->getClient()->get($this->getBaseUrl() . $url, $data);
    }

    /**
     * @param $url
     * @param array $data
     * @return PromiseInterface
     */
    public function asyncGet($url, array $data): PromiseInterface
    {
        if (array_key_exists('headers', $data)) {
            $data['headers']['MICROSERVICE_AUTH'] = $this->getMSAuth();

            return $this->getClient()->getAsync($this->getBaseUrl() . $url, $data);
        }

        $data['headers'] = [
            'MICROSERVICE_AUTH' => $this->getMSAuth(),
        ];

        return $this->getClient()->getAsync($this->getBaseUrl() . $url, $data);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments): mixed
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        }

        if (empty($arguments['type'])) {
            return call_user_func_array([$this, $name], $arguments);
        }

        $arguments['data']['handle_type'] = $arguments['type'];

        return call_user_func_array([$this, 'async' . $name], $arguments);
    }
}
