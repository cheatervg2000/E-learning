<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TemplateQuestionExport;
use App\Http\Controllers\Controller;
use App\Imports\QuestionsImport;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions = Question::where("status", 1)->paginate(10);
        return view("admin.questions.index", [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.questions.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        //
        // dd($request->all());
        $type = $request['type'];
        DB::transaction(function () use ($type, $request) {
            $data_question['content'] = $request['content'];
            $data_question['type'] = $request['type'];
            $question = Question::create($data_question);
            // yes|no || essay
            if ($type == 1 || $type == 4) {
                $question->answer_correct = $request['answer_correct'] ? $request['answer_correct'] : "";
                $question->save();
            }

            // 4 answer 1 correct
            if ($type == 2) {
                $tem = "";
                $answers = $request['answer'];
                foreach ($answers as $key => $value) {
                    $data_answer["question_id"] = $question->id;
                    $data_answer["answer"] =  $value;
                    $answer = Answer::create($data_answer);
                    if ($key == $request['answer_correct'] ? $request['answer_correct'] : "") {
                        $tem = $answer->id;
                    }
                }
                $question->answer_correct = $tem;
                $question->save();
            }

            // 4 answer n correct
            if ($type == 3) {
                $tem = [];
                $answers = $request['answer'];
                foreach ($answers as $key => $value) {
                    $data_answer["question_id"] = $question->id;
                    $data_answer["answer"] =  $value;
                    $answer = Answer::create($data_answer);
                    $answer_corrects = $request['answer_correct'] ? $request['answer_correct'] : [];
                    if (in_array($key, $answer_corrects)) {
                        $tem[] = $answer->id;
                    }
                }
                $question->answer_correct = implode(",", $tem);
                $question->save();
            }
        });
        return redirect()->route("question.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $question = Question::with("answers")->find($id);
        // dd($question, $question->answers);
        return view("admin.questions.edit", compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $question = Question::with('answers')->find($id);
        $question->content = $request['content'];
        $request['answer_correct'] = $request['answer_correct'] ?? null;
        if ($question->type == 1 || $question->type == 4) {
            $question->answer_correct = $request['answer_correct'] ? $request['answer_correct'] : "";
        }

        $answersFromFormData = $request['answer'];
        // 4 answer 1 correct
        if ($question->type == 2 || $question->type == 3) {
            foreach ($question->answers as $key => $answer) {
                $answer->answer = $answersFromFormData[$key];
                $answer->save();
            }
        }
        
        $question->answer_correct = is_array($request['answer_correct']) ? implode(',', $request['answer_correct']) : $request['answer_correct'];
        $question->save();
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $question = Question::find($id);
        DB::transaction(function () use ($question) {
            $question->status = 0;
            $question->save();
            if ($question->type == 2 || $question->type == 3) {
                $answers = $question->answers;
                for ($i = 0; $i < count($answers); $i++) {
                    $answers[$i]->status = 0;
                    $answers[$i]->save();
                }
            }
        });
        return redirect()->route('question.index');
    }

    public function downloadTemplate(Request $request)
    {
        return (new TemplateQuestionExport())
            ->download(
                'import-questions-template.xlsx',
                \Maatwebsite\Excel\Excel::XLSX
            );
    }
    public function importQuestions(Request $request)
    {
        $data = $request->validate([
            'file' => 'required|file|mimes:csv,xlsx|max:5120'
        ]);
        $import = new QuestionsImport();
        Excel::import($import, $data['file']);
        if ($import->getResult()) {
            return response([
                'success' => false,
                'messages' => $import->getResult()
            ]);
        }
        return redirect()->route('question.index');
    }

    public function search(Request $request)
    {
        $questions = Question::where('status', 1)
            ->where('content', 'Like', '%' . $request->content . '%')->paginate();
        $search = 1;
        return view("admin.questions.index", compact(['questions', 'search']));
    }
}
