<?php

namespace App\Models;
use App\Models\Step;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable=['title','completed','user_id','description'];

    public function steps(){
        return $this->hasMany(Step::class);
    }

}
