<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Question;

class CreateController extends Controller
{
    //Controller para chamar a view de dashboard
    public function index(Request $request){
    	$category = null;

    	if ($request->route('id') != 0){
    		$category = Category::where('id', $request->route('id'))->first();
    	}

    	if (!$category){
    		
    		$category['name']="";
    		$category['active'] = false;
    		$category['id'] = 0;
    		$category = json_encode($category);
    	}

    	return view('system.createCategory')->with('category',$category);

    }

    public function question(Request $request){
        $categories = Category::where('deleted', false)->get();

        return view('system.createCategoryQuestion')->with('categories',$categories);

    }



}