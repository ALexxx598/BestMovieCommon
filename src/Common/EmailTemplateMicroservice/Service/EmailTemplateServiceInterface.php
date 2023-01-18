<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Service;

use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GenerateEmailCodeResponse;
use GuzzleHttp\Exception\GuzzleException;

interface EmailTemplateServiceInterface
{
    /**
     * @param int $userId
     * @param int|null $expireTime
     * @return GenerateEmailCodeResponse
     * @throws GuzzleException
     */
    public function generateCode(int $userId, ?int $expireTime = null): GenerateEmailCodeResponse;
}
