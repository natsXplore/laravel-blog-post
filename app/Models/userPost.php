<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class userPost extends Model
{
    use HasFactory;
    use Commentable;
    protected $fillable = [
        'title',
        'description',
        'author',
        'image',
    ];
}
