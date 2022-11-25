<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        "title",
        "body"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


}
