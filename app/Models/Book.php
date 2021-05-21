<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    //protected $fillable = ['title','author','type'];
    protected $guarded = [];

    public function notes(){
        return $this->hasMany(Note::class);
    }

    /*public function user(){
        return $this->belongsTo('App\Models\User');
    }*/
}
