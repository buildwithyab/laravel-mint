<?php

namespace Yab\Mint\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\Model;

class ImmutableDataException extends Exception
{
    public function __construct(Model $model)
    {
        parent::__construct('Cannot modify immutable model: '.get_class($model));
    }
}