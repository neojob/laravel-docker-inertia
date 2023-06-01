<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Library\Translate;

use App\Http\Requests\Back\MenusValidate;
use Validator;
use DB;
use Route;
use Session;
use View;

class Menus extends Controller
{

    protected $data;

    public function __construct(Menu $data)
    {
        $this->data = $data;
    }

    public function menusList(Request $request){

        $data = $this->data->latest('id')->paginate(50);
        View::share('page_title', 'Menu List');
        if ($request->ajax()) {
            return view('back.menus.load', ['data' => $data])->render();
        }

        return view('back.menus.list',compact('data'));

    }

    public function menusAdd()
    {
        View::share('page_title', 'Add Menu');
        return view('back.menus.add');
    }

    public function postMenusAdd(MenusValidate $vRequest)
    {
        $validated_data = $vRequest->all();
        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'group_name' => $validated_data['group_name'],
            'sort' => $validated_data['sort'],
            'row' => $validated_data['row'],
            'status' => $validated_data['status'],
        ];
        $id = DB::table('menus')->insertGetId($data);

        Session::flash('success', 'Successful adding!');


        return redirect()->route('adminMenusEdit',['id'=> $id]);
    }

    public function menusEdit(Request $request)
    {
        $id = $request->route('id');
        $menu = Menu::find($id);
        if(!$menu){
            abort(404);
        }
        View::share('page_title', 'Edit Menu');
        return view('back.menus.edit',['data'=>$menu]);
    }

    public function postMenusEdit(MenusValidate $vRequest)
    {
        $id =  Route::current()->parameter('id');
        $section = Menu::find($id);
        if(!$section){
            abort(404);
        }
        $validated_data = $vRequest->all();
        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'group_name' => $validated_data['group_name'],
            'sort' => $validated_data['sort'],
            'row' => $validated_data['row'],
            'status' => $validated_data['status'],
        ];
        DB::table('menus')->where('id','=',$id) ->update($data);
        Session::flash('success', 'Successful updating!');
        return redirect()->route('adminMenusEdit',['id'=> $id]);
    }

    public function menusDelete(Request $request)
    {
        $id = $request->route('id');
        $menus = Menu::find($id);
        if($menus){
            $menus->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminMenusList');
    }

}
