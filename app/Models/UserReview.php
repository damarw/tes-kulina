<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    protected $table ="user_review";
    protected $fillable = ['order_id','product_id','rating','review'];
}
