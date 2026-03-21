<?php

namespace Yab\Mint\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yab\Mint\Traits\Slugify;
use Yab\Mint\Tests\Factories\SlugModelFactory;

class SlugModel extends Model
{
    use HasFactory, Slugify;

    protected $fillable = [
        'name',
    ];

    protected static function newFactory()
    {
        return SlugModelFactory::new();
    }
}
