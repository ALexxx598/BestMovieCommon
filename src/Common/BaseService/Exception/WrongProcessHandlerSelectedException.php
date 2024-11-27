<?php

namespace BestMovie\Common\BaseService\Exception;

class WrongProcessHandlerSelectedException extends \Exception
{
    protected $message = "Wrong processor handler";
}