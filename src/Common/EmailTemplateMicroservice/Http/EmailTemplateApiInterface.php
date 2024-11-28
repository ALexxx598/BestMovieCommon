<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Http;

use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GenerateEmailCodeResponse;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GetEmailCodeResponse;
use GuzzleHttp\Promise\PromiseInterface;

interface EmailTemplateApiInterface
{
    /**
     * @var array $data
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generateCode(array $data): GenerateEmailCodeResponse|PromiseInterface;

    /**
     * @var array $data
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCode(array $data): GetEmailCodeResponse|PromiseInterface;
}
