<?php

namespace BestMovie\Common\EmailTemplateMicroservice\Http;

use BestMovie\Common\BaseService\ProcessHandleType;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * @method PromiseInterface generateCode(array $data, ProcessHandleType $type)
 * @method PromiseInterface getCode(array $data, ProcessHandleType $type)
 */
class EmailTemplateApiFacade extends EmailTemplateApi
{

}