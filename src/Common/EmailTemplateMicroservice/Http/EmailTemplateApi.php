<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Http;

use BestMovie\Common\BaseApi\BaseApi;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GenerateEmailCodeResponse;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GetEmailCodeResponse;

class EmailTemplateApi extends BaseApi implements EmailTemplateApiInterface
{
    /**
     * @inheritDoc
     */
    public function generateCode(array $data): GenerateEmailCodeResponse
    {
        return GenerateEmailCodeResponse::make(
            $this->post('/api/email-codes/', $data)
        );
    }

    /**
     * @inheritDoc
     */
    public function getCode(array $data): GetEmailCodeResponse
    {
        return GetEmailCodeResponse::make(
            $this->get('/api/email-codes/', $data)
        );
    }
}
