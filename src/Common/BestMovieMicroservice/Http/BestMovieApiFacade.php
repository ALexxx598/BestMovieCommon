<?php

namespace BestMovie\Common\BestMovieMicroservice\Http;

use BestMovie\Common\BaseApi\BaseApi;
use BestMovie\Common\BaseService\ProcessHandleType;
use BestMovie\Common\BestMovieMicroservice\Http\Response\UserRefreshResponse;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * @method PromiseInterface refreshUser(array $data, ProcessHandleType $type)
 */
class BestMovieApiFacade extends BestMovieApi
{

}
