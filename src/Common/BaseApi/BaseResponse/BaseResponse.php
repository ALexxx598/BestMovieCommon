<?php

namespace Common\BaseApi\BaseResponse;

use Psr\Http\Message\ResponseInterface;

class BaseResponse
{
    private ?array $responseData = null;

    public function __construct(
        private ResponseInterface $response
    ) {
    }

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

    public function get(string $key = null, $default = null): mixed
    {
        return $this->responseData[$key] ?? $default;
    }
}
