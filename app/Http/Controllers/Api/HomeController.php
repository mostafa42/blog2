<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QuestionsTitle;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function get_document($document_id)
    {
        $documents = Type::with([ "questions" => function($questions){
            $questions->with("details");
        } ])->find($document_id);
        return response($documents);
    }
}
