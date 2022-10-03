<?php

namespace App\Imports;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QuestionsImport implements ToCollection, WithStartRow, WithCustomCsvSettings
{
    private $result;

    public function startRow(): int
    {
        return 2;
    }
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8'
        ];
    }


    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        $data = [];
        foreach ($collection as $row) {
            array_push($data, [
                "type" => $row[1],
                "content" => $row[2],
                'answer_correct' => $row[3],
                "answer_A" => $row[4],
                "answer_B" => $row[5],
                "answer_C" => $row[6],
                "answer_D" => $row[7],
            ]);
        }
        $check = $this->checkValidate(collect($data));

        if ($check) {
            $this->result = $check;
        }

    }
    public function checkValidate($questions)
    {
        $data = [];
        foreach ($questions as $key => $question) {
            $validator = Validator::make($question, [
                'type' => 'required|numeric|min:1|max:5',
                'content' => 'required',
            ]);


            if ($validator->fails()) {
                return [
                    'errors' => $validator->messages()->toArray(),
                    'line' => $key + 2
                ];
            }
            $data[] = $question;
        }
        
        DB::transaction(function () use($data) {
            foreach ($data as $key => $q) {
                $type = $q['type'];
                $data_question['content'] = $q['content'];
                $data_question['type'] = $q['type'];
                $question = Question::create($data_question);
                // yes|no || essay
                if($type == 1) {
                        $question->answer_correct = $q['answer_correct'] == 1 ? 1 : 0;
                        $question->save();
                }

                // 4 answer 1 correct
                if($type == 2) {
                        $tem = [];
                        $answer_a = null;
                        $answer_b = null;
                        $answer_c = null;
                        $answer_d = null;
                        $q['answer_correct'] = array_map('strtolower', array_map('trim', explode(',', $q['answer_correct'])));
                        
                        if(!empty($q['answer_A']))
                        {
                            $answer_a = Answer::create([
                                'question_id' => $question->id,
                                'answer' => $q['answer_A'],
                            ]);
                            if(in_array('a', $q['answer_correct'])) {
                                $tem [] = $answer_a->id;
                            }
                        }
                        if(!empty($q['answer_B']))
                        {
                            $answer_b = Answer::create([
                                'question_id' => $question->id,
                                'answer' => $q['answer_B'],
                            ]);
                            if(in_array('b', $q['answer_correct'])) {
                                $tem [] = $answer_b->id;
                            }
                        }
                        if(!empty($q['answer_C']))
                        {
                            $answer_c = Answer::create([
                                'question_id' => $question->id,
                                'answer' => $q['answer_C'],
                            ]);
                            if(in_array('c', $q['answer_correct'])) {
                                $tem [] = $answer_c->id;
                            }
                        }
                        if(!empty($q['answer_D']))
                        {
                            $answer_d = Answer::create([
                                'question_id' => $question->id,
                                'answer' => $q['answer_D'],
                            ]);
                            if(in_array('d', $q['answer_correct'])) {
                                $tem [] = $answer_d->id;
                            }
                        }
                        $question->answer_correct = implode(",",$tem);
                        $question->save();
                }
                if($type == 3) {
                    $tem = [];
                    $answer_a = null;
                    $answer_b = null;
                    $answer_c = null;
                    $answer_d = null;

                    if(!empty($q['answer_A']))
                    {
                        $answer_a = Answer::create([
                            'question_id' => $question->id,
                            'answer' => $q['answer_A'],
                        ]);
                        if(in_array('A', explode(',', $q['answer_correct'])) || in_array('a', explode(',', $q['answer_correct']))) {
                            $tem [] = $answer_a->id;
                        }
                    }
                    if(!empty($q['answer_B']))
                    {
                        $answer_b = Answer::create([
                            'question_id' => $question->id,
                            'answer' => $q['answer_B'],
                        ]);
                        if(in_array('B', explode(',', $q['answer_correct'])) || in_array('b', explode(',', $q['answer_correct']))) {
                            $tem[] = $answer_b->id;
                        }
                    }
                    if(!empty($q['answer_C']))
                    {
                        $answer_c = Answer::create([
                            'question_id' => $question->id,
                            'answer' => $q['answer_C'],
                        ]);
                        if(in_array('C', explode(',', $q['answer_correct'])) || in_array('c', explode(',', $q['answer_correct']))) {
                            $tem[] = $answer_c->id;
                        }
                    }
                    if(!empty($q['answer_D']))
                    {
                        $answer_d = Answer::create([
                            'question_id' => $question->id,
                            'answer' => $q['answer_D'],
                        ]);
                        if(in_array('D', explode(',', $q['answer_correct'])) || in_array('d', explode(',', $q['answer_correct']))) {
                            $tem[] = $answer_d->id;
                        }
                    }
                    $question->answer_correct = implode(",",$tem);
                    $question->save();
            }
            }
        
        });
        
    }
    public function getResult()
    {
        return $this->result;
    }


}
