<?php

use BestMovie\Common\BaseApi\BaseResponse\BaseResponse;
use Illuminate\Http\Response;

class GenerateEmailCodeResponse extends BaseResponse
{
    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->get('status', Response::HTTP_OK);
    }
}
