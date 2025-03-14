<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'address', 'website'
    ];

    public function admins()
    {
        return $this->hasMany(User::class)->where('role', 'admin');
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
