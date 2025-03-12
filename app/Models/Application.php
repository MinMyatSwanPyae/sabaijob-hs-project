<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Application extends Model
{
    protected $fillable = [
        'user_id', 'vacancy_id', 'applied_at', 'cover_letter'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}