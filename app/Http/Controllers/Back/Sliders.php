<?php

namespace App\Http\Controllers\Back;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Library\Translate;
use App\Models\Lang;
use App\Http\Requests\Back\SlidersValidate;
use Validator;
use DB;
use Route;
use Session;
use View;
use App\Models\Image;
use Storage;

class Sliders extends Controller
{

    protected $data;

    public function __construct(Slider $data)
    {
        $this->data = $data;
    }

    public function slidersList(Request $request){

        $data = $this->data->latest('sort')->paginate(15);

        if ($request->ajax()) {
            return view('back.sliders.load', ['data' => $data])->render();
        }
        View::share('page_title', 'Slider List');
        return view('back.sliders.list',compact('data'));

    }

    public function slidersAdd()
    {
        View::share('page_title', 'Add Slider ');
        return view('back.sliders.add');
    }


    public function postSlidersAdd(SlidersValidate $vRequest)
    {
        $validated_data = $vRequest->all();
        $data = [
            'link_title' => $validated_data['link_title'],
            'link_href' => $validated_data['link_href'],
            'desc' => $validated_data['desc'],
            'sort' => $validated_data['sort'],
            'status' => 1,
        ];

        $slider = new Slider();
        $slider->fill($data);
        $slider->save();

        $files = $vRequest->file('images');

        if (!empty($files[0]))
        {
            try{
                foreach ($files as $image => $value)
                {
                    $file = $files[$image]->store('upload');

                    $slider->path = $file;
                    $slider->save();
                    break;
                }
            }catch(\Exception $e){
                dd($e);
            }

        }
        Session::flash('success', 'Successful adding!');
        return redirect()->route('adminSlidersEdit',['id'=> $slider->id]);
    }
    public function slidersEdit(Request $request)
    {
        $id = $request->route('id');
        $slider = Slider::find($id);
        if(!$slider){
            abort(404);
        }

        View::share('page_title', 'Edit Slider ');
        return view('back.sliders.edit',['data'=>$slider]);
    }
    public function postSlidersEdit(SlidersValidate $vRequest)
    {
        $id =  Route::current()->parameter('id');
        $slider = Slider::find($id);
        if(!$slider){
            abort(404);
        }
//        $old_path = $slider->path;
        $validated_data = $vRequest->all();

        $data = [
            'link_title' => $validated_data['link_title'],
            'link_href' => $validated_data['link_href'],
            'desc' => $validated_data['desc'],
            'sort' => $validated_data['sort'],
            'status' => $validated_data['status'],
        ];
        $files = $vRequest->file('images');
        if (!empty($files[0]))
        {
            foreach ($files as $image => $value)
            {
                $file = $files[$image]->store('upload');
                $slider->path = $file;
                $slider->save();
                break;
            }
        }

        Slider::find($id)->update($data);
        Session::flash('success', 'Successful updating!');
        return redirect()->route('adminSlidersEdit',['id'=> $id]);
    }

    public function slidersDelete(Request $request)
    {
        $id = $request->route('id');
        $slider = Slider::find($id);
        if($slider){
            $slider->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminSlidersList');
    }


}
