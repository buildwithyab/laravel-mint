<?php

namespace Yab\Mint\Tests\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yab\Mint\Tests\Models\ArchivableModel;

class ArchivableModelFactory extends Factory
{
    protected $model = ArchivableModel::class;

    public function definition(): array
    {
        return [
            'archived_at' => null,
        ];
    }

    public function archived(): static
    {
        return $this->state([
            'archived_at' => now()->toDateTimeString(),
        ]);
    }
}
