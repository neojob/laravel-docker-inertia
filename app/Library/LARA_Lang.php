<?php
namespace App\Library;
use DB;
use App;
use Exception;
use Illuminate\Http\Request;

class LARA_Lang {

    protected static $_instance;

    protected $_langs;

    protected $_table_name = 'langs';

    protected $_primary_lang;

    protected $_current_lang;

    public static function instance(){

        if(self::$_instance === null)
            self::$_instance = new self();
        return self::$_instance;
    }


    public function __construct(){

        $this->_langs =  DB::table($this->_table_name)->orderBy('primary','desc')->get();
        $this->_current_lang = App::getLocale();
        foreach($this->_langs as $lang){
            //stanum enq glxavor lezun
            if($lang->primary){
                $this->_primary_lang = $lang;
                break;
            }
        }
    }

    public function get_all_langs(){
        return $this->_langs;
    }

    public function get_primary_lang(){
        return $this->_primary_lang;
    }

    public function get_current_lang(){
        return $this->_current_lang;
    }

    public function set_current_lang($lang){
        if(is_string($lang)){
            $lang = $this->find_lang('ru');
        }
        if(empty($lang)){
            new Exception('Lang can not be a null');
        }
        $this->_current_lang = $lang;

    }

    public function init(Request $request){
        if($request->lang != null){
            $lang = $this->find_lang($request->lang);
            if(!empty($lang) AND $this->_primary_lang->iso != $lang->iso)
                $this->set_current_lang($lang);
            else{
                abort(404);
            }

        }else{
            $this->set_current_lang($this->_primary_lang);
        }
    }

    public function re_init(Request $request){
        $this->init($request);
    }

    public function find_lang($lang){
        $output = null;
        if(!empty($lang))
            foreach($this->_langs as $l){
                if($l->iso === $lang){
                    $output = $l;
                    break;
                }
            }


        return $output;
    }

    public static function route_rule(){

        $langs = array();
        foreach(LARA_Lang::instance()->get_all_langs() as $l){
            $langs[] = $l->iso;
        }

        return implode('|',$langs);
    }

}
