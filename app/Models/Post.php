<?php

namespace App\Models;

use App\Models\Comment;
use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasTags;
    use HasFactory;
    protected $guarded = ['id'];

    public function CommentModel(){
        return $this->hasMany(Comment::class,'post_id');
    }

    public function UserModel(){
        return $this->belongsTo(User::class,'user_id');
    }

}
