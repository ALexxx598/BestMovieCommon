<?php

namespace BestMovie\Common\BestMovieStorage\Http;

use BestMovie\Common\BaseService\ProcessHandleType;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * @method PromiseInterface validatePath(array $data, ProcessHandleType $type)
 * @method PromiseInterface getPath(array $data, ProcessHandleType $type)
 */
class BestMovieStorageApiFacade extends BestMovieStorageApi
{
  
}
