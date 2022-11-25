<?php
/**
 * Created by PhpStorm.
 * User: Getter
 * Date: 24.11.2022
 * Time: 17:21
 */

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * @param Builder $builder
     * @param QueryFilter $filter
     */
    public function scopeFilter( Builder $builder, QueryFilter $filter ){
        $filter->apply( $builder );
    }
}