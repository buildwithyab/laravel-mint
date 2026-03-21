<?php

namespace Yab\Mint\Tests;

use PHPUnit\Framework\Attributes\Test;
use Yab\Mint\Tests\TestCase;
use Yab\Mint\Tests\Models\EventfulModel;

class FactoryWithoutEventsTest extends TestCase
{
	#[Test]
    public function factory_events_are_enabled_by_default()
    {
		$model = EventfulModel::factory()->create();

		$this->assertTrue($model->is_created_event);
    }

	#[Test]
    public function factory_events_can_be_disabled_on_demand()
    {
		$model = EventfulModel::withoutEvents(fn () => EventfulModel::factory()->create());

		$this->assertEquals(null, $model->is_created_event);
    }
}
