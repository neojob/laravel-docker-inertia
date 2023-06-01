<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Http\Requests\Back\LanguagesValidate;
use DB;
use Route;
use Session;
use View;

class Languages extends Controller
{

    protected $data;

    public function __construct(Lang $data)
    {
        $this->data = $data;
    }

    public function languagesList(Request $request){

        $data = $this->data->latest('id')->paginate(10);

        if ($request->ajax()) {
            return view('back.languages.load', ['data' => $data])->render();
        }
        View::share('page_title', 'Language List');
        return view('back.languages.list',compact('data'));
    }

    public function languagesAdd()
    {
        View::share('page_title', 'Add Language');
        return view('back.languages.add');
    }

    public function postLanguagesAdd(LanguagesValidate $vRequest)
    {
        $validated_data = $vRequest->all();

        $data = [
            'name' => $validated_data['name'],
            'iso' => $validated_data['iso'],
            'primary' => $validated_data['primary'],
        ];
        if($data['primary'] == 1){
            $primary_lang = Lang::where('primary','=',1)->first();
            $primary_lang->primary = 0;
            $primary_lang->save();
            $id = DB::table('langs')->insertGetId($data);
        }else{
            $id = DB::table('langs')->insertGetId($data);
        }
        Session::flash('success', 'Successful adding!');
        return redirect()->route('adminLanguagesEdit',['id'=> $id]);
    }

    public function languagesEdit(Request $request)
    {
        $id = $request->route('id');
        $ModelLang = Lang::find($id);
        if(!$ModelLang){
            abort(404);
        }
        View::share('page_title', 'Edit Language');
        return view('back.languages.edit',['data'=>$ModelLang]);
    }

    public function postLanguagesEdit(LanguagesValidate $vRequest)
    {
        $id =  Route::current()->parameter('id');
        $ModelLang = Lang::find($id);
        if(!$ModelLang){
            abort(404);
        }
        $validated_data = $vRequest->all();
        $data = [
            'name' => $validated_data['name'],
            'iso' => $validated_data['iso'],
            'primary' => $validated_data['primary'],
        ];

        if($data['primary'] == 1){
            $primary_lang = Lang::where('primary',1)->first();
            $primary_lang->primary = 0;
            $primary_lang->save();
            DB::table('langs')->where('id','=',$id)->update($data);
            Session::flash('success', 'Successful updating!');
        }else{
//            $primary_lang = DB::table('langs')
//                ->select('id')
//                ->where('primary',1)
//                ->where('id','=',$id)
//                ->get();
//            if($primary_lang->primary > 0){
                Session::flash('warning', 'At first you must set an other Primary language!');
//            }
        }
        return redirect()->route('adminLanguagesEdit',['id'=> $id]);
    }

    public function languagesDelete(Request $request)
    {

        $id = $request->route('id');
        $language = Lang::find($id);

        if($language->primary == true){
            Session::flash('warning', 'At first you must set an other Primary language!');
            return redirect()->route('adminLanguagesList');
        }
        if($language){
            $language->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminLanguagesList');
    }

}
