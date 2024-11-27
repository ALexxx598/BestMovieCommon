<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Service;

use BestMovie\Common\BaseService\Exception\WrongProcessHandlerSelectedException;
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
     * @throws WrongProcessHandlerSelectedException
     */
    public function generateCode(string $email, ?int $expireTime = null): GenerateEmailCodeResponse;

    /**
     * @param string $email
     * @param int|null $expireTime
     * @return GetEmailCodeResponse
     * @throws GuzzleException
     * @throws WrongProcessHandlerSelectedException
     */
    public function getCode(string $email, ?int $expireTime = null): GetEmailCodeResponse;
}
