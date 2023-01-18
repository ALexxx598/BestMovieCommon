<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Service;

use BestMovie\Common\EmailTemplateMicroservice\Http\EmailTemplateApiInterface;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GenerateEmailCodeResponse;

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
    public function generateCode(int $userId, ?int $expireTime = null): GenerateEmailCodeResponse
    {
        return $this->emailTemplateApi->generateCode([
            'user_id' => $userId,
            'expire_time' => $expireTime,
        ]);
    }
}
