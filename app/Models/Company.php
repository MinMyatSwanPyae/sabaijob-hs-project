<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    use HasFactory;

    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
