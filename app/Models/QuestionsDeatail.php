<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class QuestionsDeatail extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;

    public $fillable = [
        "question_id",
        "details"
    ];

    public $translatable = ["details"];
}
