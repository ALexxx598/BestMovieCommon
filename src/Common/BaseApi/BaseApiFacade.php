<?php

namespace BestMovie\Common\BaseApi;


use BestMovie\Common\BaseService\ProcessHandleType;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * @method PromiseInterface get($url, array $data, ProcessHandleType $type)
 * @method PromiseInterface post($url, array $data, ProcessHandleType $type)
 */
class BaseApiFacade extends BaseApi
{
    
}