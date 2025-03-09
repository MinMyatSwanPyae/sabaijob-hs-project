<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Vacancy extends Model
{
    use HasFactory;
    //

    // Model Relations// 
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applications() 
    {
        return $this->hasMany(Application::class); 
    }
}

