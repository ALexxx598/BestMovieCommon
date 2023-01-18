<?php

namespace BestMovie\Common\BaseApi\BaseResponse;

use Illuminate\Http\Response;
use Psr\Http\Message\ResponseInterface;

class BaseResponse
{
    /**
     * @param ResponseInterface $response
     * @param array|null $responseData
     */
    public function __construct(
        private ResponseInterface $response,
        private ?array $responseData = null,
    ) {
    }

    /**
     * @return string
     */
    protected function getResponseContents(): string
    {
        $stream = $this->response->getBody();

        $stream->rewind();

        return $stream->getContents();
    }

    protected function decodeJsonResponse(): void
    {
        if (!empty($this->responseData)) {
            return;
        }

        $this->responseData = json_decode($this->getResponseContents(), true);
    }

    /**
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key = null, mixed $default = null): mixed
    {
        $this->decodeJsonResponse();

        return $this->responseData[$key] ?? $default;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->get('status', Response::HTTP_OK);
    }

    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->get('status', Response::HTTP_OK) === Response::HTTP_OK;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->get('data', []);
    }
}
