<?php

namespace Yab\Mint\Tests;

use PHPUnit\Framework\Attributes\Test;
use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\ArchivableModel;

class ArchivableTest extends TestCase
{
	#[Test]
    public function a_model_can_be_archived()
    {
    	$model = ArchivableModel::factory()->create();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $model->id,
            'archived_at' => null
        ]);

        $this->assertEquals(null, $model->archived_at);

        $model->archive();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $model->id,
            'archived_at' => now()->toDateTimeString()
        ]);

        $this->assertEquals(now()->toDateTimeString(), $model->archived_at);
    }

	#[Test]
    public function archived_models_are_excluded_via_global_scope()
    {
    	$archived = ArchivableModel::factory()->archived()->create();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $archived->id,
            'archived_at' => now()->toDateTimeString()
        ]);

        $this->assertEquals(0, ArchivableModel::count());
    }

	#[Test]
    public function archived_models_can_be_retrieved_via_the_with_archived_scope()
    {
    	$archived = ArchivableModel::factory()->archived()->create();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $archived->id,
            'archived_at' => now()->toDateTimeString()
        ]);

        $this->assertEquals(1, ArchivableModel::withArchived()->count());
    }

    #[Test]
    public function a_model_can_be_unarchived()
    {
    	$model = ArchivableModel::factory()->archived()->create();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $model->id,
            'archived_at' => now()->toDateTimeString()
        ]);

        $this->assertEquals(now()->toDateTimeString(), $model->archived_at);

        $model->unarchive();

        $this->assertDatabaseHas('archivable_models', [
            'id' => $model->id,
            'archived_at' => null
        ]);

        $this->assertEquals(null, $model->archived_at);
    }
}
