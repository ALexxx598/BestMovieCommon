<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Http;

use BestMovie\Common\BaseApi\BaseApi;
use BestMovie\Common\BaseService\ProcessHandleType;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GenerateEmailCodeResponse;
use BestMovie\Common\EmailTemplateMicroservice\Http\Response\GetEmailCodeResponse;
use GuzzleHttp\Promise\PromiseInterface;

class EmailTemplateApi extends BaseApi implements EmailTemplateApiInterface
{
    /**
     * @inheritDoc
     */
    public function generateCode(array $data): GenerateEmailCodeResponse|PromiseInterface
    {
        $result = $this->post('/api/email-codes/', $data);

        if ($result instanceof PromiseInterface) {
            return $result;
        }

        return GenerateEmailCodeResponse::make($result);
    }

    /**
     * @inheritDoc
     */
    public function getCode(array $data): GetEmailCodeResponse|PromiseInterface
    {
        $result = $this->get('/api/email-codes/', $data);

        if ($result instanceof PromiseInterface) {
            return $result;
        }

        return GetEmailCodeResponse::make($result);
    }
}
