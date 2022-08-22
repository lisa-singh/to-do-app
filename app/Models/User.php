<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function uploadAvatar($image){
            $filename=$image->getClientOriginalName();
            (new self())->deleteOldImage();
            $image->storeAs('images',$filename,'public');
            auth()->user()->update(['avatar'=> $filename]);
    }

    protected function deleteOldImage(){
        if($this->avatar){
            Storage::delete('/public/images/'.$this->avatar);
        }
    }

    public function todo(){
        return $this->hasMany(Todo::class);
    }
    // automatically triggers when the password is set which is called mutator
    // public function setPasswordAttribute($password){
    //     $this->attributes['password']=bcrypt($password);
    // }

     // automatically triggers when the name is retrieved from the database which is called accessor
    // public function getNameAttribute($name){
    //     return ucfirst($name);
    // }
}
