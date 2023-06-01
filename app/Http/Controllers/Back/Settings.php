<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Library\Translate;
use App\Models\Lang;
use App\Http\Requests\Back\SettingsValidate;
use Validator;
use DB;
use Route;
use Session;
use View;

class Settings extends Controller
{

    protected $data;

    public function __construct(Setting $data)
    {
        $this->data = $data;
    }

    public function settingsList(Request $request){

        $data = $this->data->latest('id')->paginate(10);

        if ($request->ajax()) {
            return view('back.settings.load', ['data' => $data])->render();
        }
        View::share('page_title', 'Setting List');
        return view('back.settings.list',compact('data'));

    }

    public function settingsAdd()
    {
        View::share('page_title', 'Add Setting');
        return view('back.settings.add');
    }

    public function postSettingsAdd(SettingsValidate $vRequest)
    {
        $validated_data = $vRequest->all();
        $data = [
            'name' => $validated_data['name'],
            'group' => $validated_data['group'],
            'value' => $validated_data['value'],
        ];
        $id = DB::table('settings')->insertGetId($data);
        Session::flash('success', 'Successful adding!');
        return redirect()->route('adminSettingsEdit',['id'=> $id]);
    }

    public function settingsEdit(Request $request)
    {
        $id = $request->route('id');
        $section = Setting::find($id);
        if(!$section){
            abort(404);
        }
        View::share('page_title', 'Edit Setting');
        return view('back.settings.edit',['data'=>$section]);
    }

    public function postSettingsEdit(SettingsValidate $vRequest)
    {

        $id =  Route::current()->parameter('id');
        $section = Setting::find($id);
        if(!$section){
            abort(404);
        }
        $validated_data = $vRequest->all();
        $data = [
            'name' => $validated_data['name'],
            'group' => $validated_data['group'],
            'value' => $validated_data['value'],

        ];
        DB::table('settings')->where('id','=',$id) ->update($data);
        Session::flash('success', 'Successful updating!');
        return redirect()->route('adminSettingsEdit',['id'=> $id]);
    }

    public function settingsDelete(Request $request)
    {
        $id = $request->route('id');
        $user = Setting::find($id);
        if($user){
            $user->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminSettingsList');
    }

}
