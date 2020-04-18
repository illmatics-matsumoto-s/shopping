<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * 前方一致検索を提供する
 *
 * @package App\Models\Traits
 */
trait ForwardMatchable
{
    /**
     * 前方一致検索
     *
     * @param Builder $query
     * @param string|null $column
     * @param string|null $word
     * @return Builder
     */
    public function scopeForwardMatch(Builder $query, ?string $column, ?string $word): Builder
    {
        if (is_null($column) || is_null($word)) {
            return $query;
        }

        return $query->where($column, 'like', "$word%");
    }
}
