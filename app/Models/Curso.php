<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // To be able to call the model's table with another name
    // protected $table = "users";

    // 
    // protected $fillable = ['name', 'description', 'category'];
    protected $guarded = [];

    // Make the url more friendly for the user
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
