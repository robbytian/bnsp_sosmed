<?php

namespace App\Models;

use Dotenv\Util\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getProfile(){
        $profile = Profile::where('user_id',Auth::id())->first();
        return $profile;
    }

    public static function initialName(){
        $fullName = Str::substr(Auth::User()->name,0,1);
        return $fullName;
    }

    public function ProfileModel(){
        return $this->hasOne(Profile::class,'user_id');
    }

    public static function getPicture($id){
        $user = User::with('ProfileModel')->where('id',$id)->first();
        $file = $user->ProfileModel->profile_pict != null ? "/img/".$user->ProfileModel->profile_pict : "";
        return $file;
    }

}
