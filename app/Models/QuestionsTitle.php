<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class QuestionsTitle extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;

    public $fillable = [
        "document_id",
        "title",
        "type"
    ];

    public $translatable = ["title"];

    /////////////////////////////////////////// Relations ///////////////////////////////////////////
    public function details()
    {
        return $this->hasMany(QuestionsDeatail::class , "question_id");
    }

    public function document()
    {
        return $this->belongsTo(Type::class);
    }
}
