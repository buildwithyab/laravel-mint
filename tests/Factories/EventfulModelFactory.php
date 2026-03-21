<?php

namespace Yab\Mint\Tests\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yab\Mint\Tests\Models\EventfulModel;

class EventfulModelFactory extends Factory
{
    protected $model = EventfulModel::class;

    public function definition(): array
    {
        return [];
    }
}
