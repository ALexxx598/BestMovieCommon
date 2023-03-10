<?php

namespace  BestMovie\Common\BestMovieStorage\Http\Response;

use BestMovie\Common\BaseApi\BaseResponse\BaseResponse;

class BestMovieStorageValidatePathResponse extends BaseResponse
{
    /**
     * @return bool
     */
    public function getResult(): bool
    {
        return $this->get('result', false);
    }
}
