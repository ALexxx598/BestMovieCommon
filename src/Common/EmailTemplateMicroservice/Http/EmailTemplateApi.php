<?php

namespace Common\EmailTemplateMicroservice\Http;

use Common\BaseApi\BaseApi;
use Common\BaseApi\BaseResponse\BaseResponse;
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
