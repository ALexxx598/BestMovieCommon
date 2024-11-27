<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Service;

use BestMovie\Common\BaseService\BaseService;
use BestMovie\Common\BaseService\ProcessHandleType;
use BestMovie\Common\EmailTemplateMicroservice\Http\EmailTemplateApiInterface;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GenerateEmailCodeResponse;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GetEmailCodeResponse;

class EmailTemplateService extends BaseService implements EmailTemplateServiceInterface
{
    public const array ALLOWED_PROCESS_HANDLERS = [
        'generateCode' => [
            ProcessHandleType::AMPHP,
            ProcessHandleType::NATIVE_SYNC,
            ProcessHandleType::SPATIE_ASYNC,
            ProcessHandleType::PCNTL,
            ProcessHandleType::QUEUE,
        ],
        'getCode' => [
            ProcessHandleType::NATIVE_SYNC,
        ],
    ];

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
    public function generateCode(
        string $email,
        ?int $expireTime = null,
        ?ProcessHandleType $type = ProcessHandleType::NATIVE_SYNC
    ): GenerateEmailCodeResponse {
        return $this->emailTemplateApi->generateCode([
            'form_params' => [
                'email' => $email,
                'expire_time' => $expireTime,
            ]
        ], $type);
    }

    /**
     * @inheritDoc
     */
    public function getCode(
        string $email,
        ?int $expireTime = null,
        ?ProcessHandleType $type = ProcessHandleType::NATIVE_SYNC
    ): GetEmailCodeResponse {
        return $this->emailTemplateApi->getCode([
            'query' => [
                'email' => $email,
            ]
        ], $type);
    }
}
