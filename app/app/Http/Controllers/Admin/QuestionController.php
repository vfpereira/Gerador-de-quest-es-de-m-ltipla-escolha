<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    //Controller para chamar a view de question
    public function index(){
        
    	return view('system.question')->with('list',$this->list());

    }

    public function post(Request $request){

    	$titulo = $request->input('titulo');
        $idcategory = $request->input('categorySelect');
        $respA = $request->input('respA');
        $respB = $request->input('respB');
        $respC = $request->input('respC');
        $respD = $request->input('respD');
        $respE = $request->input('respE');
        $correct = $request->input('correct');

    	
    	$question = new Question;
        $question->title = $titulo;
        $question->id_categories = $idcategory;
        $question->answera = $respA;
        $question->answerb = $respB;
        $question->answerc = $respC;
        $question->answerd = $respD;
        $question->answere = $respE;
        $question->correctanswer = $correct;
    


        $question->save();
    	

		

    	return  redirect()->intended('admin/question');

    }

    public function questionFinal(Request $request){

        if ($request->route('id') != 0){
            $question = Question::where('id', $request->route('id'))->first();
        }

        return view('system.questionFinal')->with('question',$question);
    }   

    private function List(){

        
        $list = Question::where('deleted', false)->get();

        return $list;
    }

}