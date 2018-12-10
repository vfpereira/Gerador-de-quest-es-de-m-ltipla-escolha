<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class SubjectController extends Controller
{
    //Controller para chamar a view de dashboard
    public function index(){
        
    	return view('system.subject')->with('list',$this->list());

    }

    public function post(Request $request){
    	$name = $request->input('category');
    	$active = $request->input('active');
        $id = $request->input('id');

    	$category = Category::where([
								['id', '=', $id]
							])->first();
    	if ($category){

    		$category->name = $request->category;
            $category->active = $request->active;
            $category->update();

    	}else{
            $category = new Category;
            $category->name = $request->category;
            $category->active = $request->active;

            $category->save();
    	
        }
    		$data['success'] = true;
    		$data['url'] = redirect()->intended('admin/subject')->getTargetUrl(); ;

    	return $data;

    }

    public function delete(Request $request){
        $id = $request->id;
        $category = Category::where([
                                ['id', '=', $id]
                            ])->first();

        $category->deleted = true;
        $category->update();

        $data['success'] = true;
        $data['url'] = redirect()->intended('admin/subject')->getTargetUrl(); ;
        
        return redirect()->intended('admin/subject');
    }

    private function List(){

        
        $list = Category::where('deleted', false)->get();

        return $list;
    }

}