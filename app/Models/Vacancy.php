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
        return $this->belongsTo(company::class);
    }

    public function application()
    {
        return $this->belongsToMany(company::class); 
    }
}

