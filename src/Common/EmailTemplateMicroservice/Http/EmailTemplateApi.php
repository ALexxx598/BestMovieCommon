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
        return new GenerateEmailCodeResponse(
            $this->post('/api/email/code/' . $data['user_id'], $data)
        );
    }

    /**
     * @inheritDoc
     */
    public function getCode(array $data): GetEmailCodeResponse
    {
        return new GetEmailCodeResponse(
            $this->get('/api/email/code/' . $data['user_id'], $data)
        );
    }
}
