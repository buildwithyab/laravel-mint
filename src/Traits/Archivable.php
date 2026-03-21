<?php

namespace Yab\Mint\Traits;

use Yab\Mint\Scopes\ArchivableScope;

trait Archivable
{
    /**
     * Boot the archivable trait for a model.
     *
     * @return void
     */
    public static function bootArchivable()
    {
        static::whenBooted(fn () => static::addGlobalScope(new ArchivableScope));
    }

    /**
     * Archive this model in the database.
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function archive()
    {
        $this->archived_at = now();
        $this->save();

        return $this;
    }

    /**
     * Un-archive this model in the database.
     * 
     * @return mixed
     */
    public function unarchive()
    {
        $this->archived_at = null;
        $this->save();

        return $this;
    }
}