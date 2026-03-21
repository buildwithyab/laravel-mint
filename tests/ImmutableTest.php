<?php

namespace Yab\Mint\Tests;

use PHPUnit\Framework\Attributes\Test;
use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\ImmutableModel;
use Yab\Mint\Exceptions\ImmutableDataException;

class ImmutableTest extends TestCase
{
	#[Test]
    public function an_immutable_model_can_be_created()
    {
    	$model = ImmutableModel::create();

		$this->assertDatabaseHas('immutable_models', [
			'id' => $model->id
		]);
    }

	#[Test]
    public function an_immutable_model_cannot_be_updated()
    {
    	$model = ImmutableModel::create();

		$this->expectException(ImmutableDataException::class);

		$model->update([
			'field' => 'Updated value'
		]);
    }

	#[Test]
    public function an_immutable_model_cannot_be_deleted()
    {
    	$model = ImmutableModel::create();

		$this->expectException(ImmutableDataException::class);

		$model->delete();
    }
}
