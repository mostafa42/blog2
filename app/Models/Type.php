<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Type extends Model
{
    use HasFactory , SoftDeletes , HasTranslations;
    

    protected $fillable = ['type_code', 'type_description', 'document_code', 'document_description'];

    public $translatable = ['type_description' , 'document_description'];

    /////////////////////////////////////////// Relations ///////////////////////////////////////////
    public function questions()
    {
        return $this->hasMany(QuestionsTitle::class , "document_id");
    }
}