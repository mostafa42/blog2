<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuestionsDeatail;
use App\Models\QuestionsTitle;
use App\Models\Type;
use Illuminate\Http\Request;

class QuestionsTitleController extends Controller
{

    public function add_question($document_id)
    {
        $document = Type::with(["questions" => function ($questions) {
            $questions->with("details");
        }])->find($document_id);

        return view('admin.questions.index', compact('document'));
    }

    public function store_question(Request $request)
    {

        $request["type"] = $request->type;
        $request["title"] = [
            "ar" => $request->title_ar,
            "en" => $request->title_en
        ];

        $question = create(QuestionsTitle::class, $request->all('document_id', 'type', 'title'));

        $choices = [];
        if ($request->type == "select_box") {
            foreach ($request->choice_ar as $key => $choice_ar) {
                if ($request->choice_en[$key] != null && $request->choice_ar[$key] != null) {
                    $choices["en"] = $request->choice_en[$key];
                    $choices["ar"] = $request->choice_ar[$key];

                    $request["details"] = $choices;
                    $request["question_id"] = $question->id;

                    create(QuestionsDeatail::class, $request->all('question_id', 'details'));
                }
            }
        }



        return redirect()->back();
    }

    public function destroy($question_id)
    {
        delete_tree([QuestionsDeatail::class, QuestionsTitle::class], "question_id", $question_id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $question = QuestionsTitle::find($id);

        return view('admin.questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request["type"] = $request->type;
        $request["title"] = [
            "ar" => $request->title_ar,
            "en" => $request->title_en
        ];

        $request["question_id"] = $id;


        if ($request->type == "select_box") {
            if (count($request->choice_ar) != count($request->choice_en)) {
                return "error";
            } else {
                foreach ($request->choice_ar as $key => $choice_ar) {
                    $choices["en"] = $request->choice_en[$key];
                    $choices["ar"] = $request->choice_ar[$key];

                    $request["details"] = $choices;
                    $request["question_id"] = $id;
                    update_tree(QuestionsDeatail::class, "question_id", $id, $request->all('question_id', 'details'));
                }
            }
        }

        update(QuestionsTitle::class,  $id, $request->all('type', 'title'));

        return redirect('add-question/' . QuestionsTitle::find($id)->document->id);
    }
}
