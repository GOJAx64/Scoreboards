<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $guarded = []; //protected $fillable = ['title','description','author','body'];
    protected $dates = ['created_at', 'updated_at'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}
