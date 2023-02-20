<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Service;

use BestMovie\Common\EmailTemplateMicroservice\Http\EmailTemplateApiInterface;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GenerateEmailCodeResponse;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GetEmailCodeResponse;

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
     * @inheritDoc
     */
    public function generateCode(string $email, ?int $expireTime = null): GenerateEmailCodeResponse
    {
        return $this->emailTemplateApi->generateCode([
            'form_params' => [
                'email' => $email,
                'expire_time' => $expireTime,
            ]
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getCode(string $email, ?int $expireTime = null): GetEmailCodeResponse
    {
        return $this->emailTemplateApi->getCode([
            'form_params' => [
                'email' => $email,
            ]
        ]);
    }
}
