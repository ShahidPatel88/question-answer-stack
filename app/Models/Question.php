<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    protected $fillable=['title','slug','body','views','answers','votes','best_answer_id','user_id','created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title']=$value;
        $this->attributes['slug']=Str::slug($value);
    }

    public function getUrlAttribute(){
        return route('questions.show',$this->id);
    }

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
}
