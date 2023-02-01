<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Province extends Model
{
    use HasFactory , SoftDeletes , HasTranslations;

    protected $fillable = [
        'province_code',
        'province_name'
    ];

 
    public $translatable = ['province_name'];


}