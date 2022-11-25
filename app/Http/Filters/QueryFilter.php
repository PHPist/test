<?php
/**
 * Created by PhpStorm.
 * User: Getter
 * Date: 24.11.2022
 * Time: 17:02
 */

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class QueryFilter
 * @package App\Http\Filters
 */

abstract class QueryFilter
{
    /**
     * @var Request
     */
    protected $filter;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * QueryFilter constructor.
     * @param array $filter
     */
    public function __construct(  $filter )
    {
        $this->filter = $filter;
    }

    /**
     * @param Builder $builder
     */
    public function apply( Builder $builder ){

        $this->builder = $builder;

        foreach($this->fields() as $key=>$value){
            $method = Str::camel($key);
            if ( method_exists($this, $method) ){
                call_user_func_array([$this,$method], (array) $value);
            }
        }
    }

    /**
     * @return array
     */
    protected function fields()
    {
        return array_filter(
            array_map('trim', $this->filter)
        );
    }

}