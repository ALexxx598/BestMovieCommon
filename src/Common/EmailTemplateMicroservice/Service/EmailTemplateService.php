<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Service;

use BestMovie\Common\EmailTemplateMicroservice\Http\EmailTemplateApiInterface;
use GenerateEmailCodeResponse;
use GuzzleHttp\Exception\GuzzleException;

class EmailTemplateService implements EmailTemplateServiceInterface
{
    /**
     * @param EmailTemplateApiInterface $emailTemplateApi
     */
    public function __construct(
        private EmailTemplateApiInterface $emailTemplateApi,
    ) {
    }

    /**
     * @throws GuzzleException
     */
    public function generateCode(int $userId, ?int $expireTime = null): GenerateEmailCodeResponse
    {
        return $this->emailTemplateApi->generateCode([
            'user_id' => $userId,
            'expire_time' => $expireTime,
        ]);
    }
}
