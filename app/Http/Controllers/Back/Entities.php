<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Library\Translate;
use App\ModelLang;
use App\Http\Requests\Back\EntitiesValidate;
use Validator;
use DB;
use Route;
use Session;
use View;

class Entities extends Controller
{

    protected $data;

    public function __construct(Entity $data)
    {
        $this->data = $data;
    }

    public function entitiesList(Request $request){

        $data = $this->data->latest('id')->paginate(200);

        if ($request->ajax()) {
            return view('back.entities.load', ['data' => $data])->render();
        }
        View::share('page_title', 'Entity List');
        return view('back.entities.list',compact('data'));

    }

    public function entitiesAdd()
    {
        View::share('page_title', 'Add Entity');
        return view('back.entities.add');
    }

    public function postEntitiesAdd(EntitiesValidate $vRequest)
    {
        $validated_data = $vRequest->all();
        $data = [
            'word' => $validated_data['word'],
            'translation' => $validated_data['translation']
        ];
        $id = DB::table('entities')->insertGetId($data);
        Session::flash('success', 'Successful adding!');
        return redirect()->route('adminEntitiesEdit',['id'=> $id]);
    }

    public function entitiesEdit(Request $request)
    {
        $id = $request->route('id');
        $section = Entity::find($id);
        if(!$section){
            abort(404);
        }
        View::share('page_title', 'Edit Entity');
        return view('back.entities.edit',['data'=>$section]);
    }

    public function postEntitiesEdit(EntitiesValidate $vRequest)
    {
        $id =  Route::current()->parameter('id');
        $section = Entity::find($id);
        if(!$section){
            abort(404);
        }
        $validated_data = $vRequest->all();
        $data = [
            'word' => $validated_data['word'],
            'translation' => $validated_data['translation']
        ];
        DB::table('entities')->where('id','=',$id) ->update($data);
        Session::flash('success', 'Successful updating!');
        return redirect()->route('adminEntitiesEdit',['id'=> $id]);
    }

    public function entitiesDelete(Request $request)
    {
        $id = $request->route('id');
        $user = Entity::find($id);
        if($user){
            $user->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminEntitiesList');
    }

}
