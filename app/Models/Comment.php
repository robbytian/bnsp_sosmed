<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasTags;
    use HasFactory;
    protected $guarded = ['id'];

    public function UserModel(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function PostModel(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
