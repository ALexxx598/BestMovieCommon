<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Http;

use BestMovie\Common\BaseApi\BaseApi;
use GenerateEmailCodeResponse;

class EmailTemplateApi extends BaseApi implements EmailTemplateApiInterface
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generateCode(array $data): GenerateEmailCodeResponse
    {
        return new GenerateEmailCodeResponse(
            $this->post('email/generateCode/', $data)
        );
    }
}
