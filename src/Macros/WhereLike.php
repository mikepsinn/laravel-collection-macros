<?php

namespace Spatie\CollectionMacros\Macros;

use Illuminate\Support\Collection;

/**
 * Execute a callable if the collection isn't empty, then return the collection.
 *
 * @param callable callback
 *
 * @return \Illuminate\Support\Collection
 */
class WhereLike
{
    public function __invoke()
    {
        return function (string $field, string $pattern): Collection {
            $pattern = str_replace("%", "", $pattern);
            return Collection::filter(function ($item) use ($field, $pattern) {
                return stripos($item->$field, $pattern) !== false;
            });
        };
    }
}
