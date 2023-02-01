<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasFactory;
    use HasTranslations;
    public $fillable = [
        "role_id" ,
        "role"
    ];

    public $translatable = ['role'];

    
}
