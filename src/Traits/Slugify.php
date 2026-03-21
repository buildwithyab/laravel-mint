<?php

namespace Yab\Mint\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

trait Slugify
{
    public static function bootSlugify()
    {
        static::whenBooted(function () {
            static::creating(function ($model) {
                if (is_null($model->slug)) {
                    $model->slug = Str::slug($model->{static::getSlugKeyName()});
                }
                $model->slug = static::checkModelSlug($model->slug);
            });

            static::updating(function ($model) {
                if ($model->getOriginal('slug') !== $model->slug) {
                    $model->slug = static::checkModelSlug($model->slug);
                }
            });
        });
    }

    /**
     * Check that the slug doesn't already exist if updating
     *
     * @param string $slug
     *
     * @return string
     */
    public static function checkModelSlug(string $slug): string
    {
        if (static::slugExists($slug)) {
            return $slug . '-' . uniqid();
        }
        return $slug;
    }

    /**
     * Check if the slug exists
     *
     * @param string $slug
     *
     * @return bool
     */
    public static function slugExists(string $slug): bool
    {
        return static::withoutGlobalScopes()->where('slug', $slug)->exists();
    }

    /**
     * Return the model by the slug
     *
     * @param \Illuminate\Database\Eloquent\Builder $scope
     * @param string $slug
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBySlug(Builder $scope, string $slug): Builder
    {
        return $scope->where('slug', $slug);
    }

    /**
     * Set the model property that will be used to create the slug
     *
     * @return string
     */
    public static function getSlugKeyName(): string
    {
        return 'name';
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
