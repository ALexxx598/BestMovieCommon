<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Http\Response;

use BestMovie\Common\BaseApi\BaseResponse\BaseResponse;

class GetEmailCodeResponse extends BaseResponse
{
    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->getData()['code'] ?? null;
    }
}