<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Service;

use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GenerateEmailCodeResponse;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GetEmailCodeResponse;
use GuzzleHttp\Exception\GuzzleException;

interface EmailTemplateServiceInterface
{
    /**
     * @param string $email
     * @param int|null $expireTime
     * @return GenerateEmailCodeResponse
     * @throws GuzzleException
     */
    public function generateCode(string $email, ?int $expireTime = null): GenerateEmailCodeResponse;

    /**
     * @param string $email
     * @param int|null $expireTime
     * @return GetEmailCodeResponse
     * @throws GuzzleException
     */
    public function getCode(string $email, ?int $expireTime = null): GetEmailCodeResponse;
}
