<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JsonController extends Controller
{

    private $finisJson = ["scripts" => [], "styles" => [], "tests" => []];
    private $tests = [];

    public function index()
    {
        $quizCount = 3;
        return view('admin.themes.json', compact('quizCount'));
    }

    public function submit(Request $request)
    {

        if ($request->get('quiz-status')) {

            $data = [];
            $quiz = [];
            $result = [];
            $quizCount = $request->get('quizCount');

            for ($j = 1; $j <= $quizCount; $j++) {
                $answers = [];
                for ($i = 1; $i <= 4; $i++) {
                    $answer = [];
                    $answer['id'] = $i;
                    $answer['text'] = $request->get('answer' . $i . '-' . $j);

                    array_push($answers, $answer);
                }

                $question = $request->get('question' . $j);

                $quiz['answers'] = $answers;
                $quiz['question'] = $question;
                $quiz['correctAnswer'] = 1;
                array_push($data, $quiz);
            }

            $result['data'] = $data;
            $result['type'] = 'quiz4x1';

            array_push($this->tests, $result);

            array_push($this->finisJson['styles'], '/css/' . $request->get('quiz-css'));
            array_push($this->finisJson['scripts'], '/js/' . $request->get('quiz-js'));

            $this->finisJson['tests'] = $this->tests;

        }

        if ($request->get('matching-status')) {
            $data = [];
            $terms = [];
            $definitions = [];
            $result = [];

            for ($i = 1; $i <= 6; $i++) {
                $term = [];
                $term['id'] = $i - 1;
                $term['text'] = $request->get('term' . $i);
                array_push($terms, $term);
            }

            for ($i = 1; $i <= 6; $i++) {
                $definition = [];
                $definition['id'] = $i - 1;
                $definition['text'] = $request->get('definitions' . $i);
                array_push($definitions, $definition);
            }

            $pairs = ['0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5,];

            array_push($data, ['terms' => $terms]);
            array_push($data, ['definitions' => $definitions]);
            array_push($data, ['pairs' => (object)$pairs]);

            $result['data'] = $data;
            $result['type'] = 'matching';
            array_push($this->tests, $result);

            array_push($this->finisJson['styles'], '/js/' . $request->get('matching-css'));
            array_push($this->finisJson['scripts'], '/css/' . $request->get('matching-js'));

            $this->finisJson['tests'] = $this->tests;
        }


        return json_encode($this->finisJson);
    }
}
