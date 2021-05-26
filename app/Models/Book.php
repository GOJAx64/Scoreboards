<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = []; //protected $fillable = ['title','author','type'];

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
