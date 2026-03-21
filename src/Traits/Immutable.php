<?php

namespace Yab\Mint\Traits;

use Yab\Mint\Exceptions\ImmutableDataException;

trait Immutable
{
    /**
     * Hook into the boot method to catch updating and deleting events.
     *
     * @return void
     */
    public static function bootImmutable()
    {
        static::whenBooted(function () {
            static::updating(function ($model) {
                if ($model->isImmutable()) {
                    throw new ImmutableDataException($model);
                }
            });

            static::deleting(function ($model) {
                if ($model->isImmutable()) {
                    throw new ImmutableDataException($model);
                }
            });
        });
    }

    /**
     * Determine if this model is in an immutable state (default to always immutable)
     *
     * @return boolean
     */
    public function isImmutable()
    {
        return true;
    }
}
