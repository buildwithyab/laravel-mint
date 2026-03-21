<?php

namespace Yab\Mint\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yab\Mint\Traits\Archivable;
use Yab\Mint\Tests\Factories\ArchivableModelFactory;

class ArchivableModel extends Model
{
	use Archivable, HasFactory;

	protected static function newFactory()
	{
		return ArchivableModelFactory::new();
	}
}
