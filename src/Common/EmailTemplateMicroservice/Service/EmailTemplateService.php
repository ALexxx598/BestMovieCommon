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
            'user_email' => $email,
            'expire_time' => $expireTime,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getCode(string $email): GetEmailCodeResponse
    {
        return $this->emailTemplateApi->getCode([
            'user_email' => $email,
        ]);
    }
}
