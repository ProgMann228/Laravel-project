<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    #Eloquent работает с полями таблицы через
    # массив $fillable и массив $attributes модели
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    #автоматически превращает числовое значение
    # из базы в true/false в PHP и обратно
    protected $casts = [
        'is_completed' => 'boolean',
    ];
}
