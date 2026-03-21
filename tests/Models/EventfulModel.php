<?php

namespace Yab\Mint\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yab\Mint\Tests\Events\EventfulModelSaved;
use Yab\Mint\Tests\Factories\EventfulModelFactory;

class EventfulModel extends Model
{
	use HasFactory;

	protected $dispatchesEvents = [
		'saved' => EventfulModelSaved::class,
	];

	public static function boot()
	{
		parent::boot();

		static::whenBooted(fn () => static::created(function($model) {
			$model->is_created_event = true;
		}));
	}

	protected static function newFactory()
	{
		return EventfulModelFactory::new();
	}
}
