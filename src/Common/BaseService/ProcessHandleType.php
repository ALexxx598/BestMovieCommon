<?php

namespace BestMovie\Common\BaseService;

enum ProcessHandleType: string
{
    case SPATIE_ASYNC = 'SPATIE_ASYNC';
    case AMPHP = 'AMPHP';
    case NATIVE_SYNC = 'NATIVE_SYNC';
    case PCNTL = 'PCNTL';
    case QUEUE = 'QUEUE';
}