<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Currency extends Model
{
    use HasTranslations;
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['name','from','to'];
    public $translatable = ['name'];
}
