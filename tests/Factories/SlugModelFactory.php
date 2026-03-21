<?php

namespace Yab\Mint\Tests\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yab\Mint\Tests\Models\SlugModel;

class SlugModelFactory extends Factory
{
    protected $model = SlugModel::class;

    public function definition(): array
    {
        return [
            'name' => 'Sample Name',
        ];
    }
}
