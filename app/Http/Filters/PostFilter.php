<?php
/**
 * Created by PhpStorm.
 * User: Getter
 * Date: 24.11.2022
 * Time: 17:16
 */

namespace App\Http\Filters;


class PostFilter extends QueryFilter
{
    /**
     * @param string $title
     */
    public function title( string $title ){
        $this->builder->where("title","like","%".$title."%");
    }


}