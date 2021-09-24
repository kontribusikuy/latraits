<?php

namespace KontribusiKuy\Latraits;

use Ramsey\Uuid\Uuid;

/**
 * 
 */
trait ExternalLinkTrait
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->external_link = Uuid::uuid4();
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'external_link';
    }

    public static function findOrFail($externalLink)
    {
        $data = static::where('external_link', $externalLink)->first();

        if (!$data) {
            ApiResponse::notFoundError();
        }

        return $data;
    }
}
