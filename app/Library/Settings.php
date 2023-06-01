<?php
namespace App\Library;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;


/**
 * Класс настроек приложения
 * Паттерн одиночка(Singleton)
 */

class Settings {

    public static $_instance;

    protected $_items;

    /**
     * Точка доступа
     * @return Settings
     */
    public static function instance(){

        if(self::$_instance === null){
            self::$_instance = new self();
        }

        return self::$_instance;
    }


    /**
     * Возврашет название всех груп-настроек
     */

    public function group_name(){
        $groupname = array();
        foreach($this->_items as $name =>$val ){
            $groupname[] = $name ;
        }
        return $groupname;
    }

    /**
     * Возвращает группу настроек
     * @param string $group_name имя группы
     * @return array|null
     */
    public function get_group($group_name){
        return isset($this->_items[$group_name]) ? $this->_items[$group_name] : null;
    }
    /**
     * Возвращает группу настроек в виде ассоциативного массива
     * ключ => значение
     * @param string $group_name имя группы
     * @return array
     */
    public function get_group_as_key_val($group_name){
        $output = array();
        $group = $this->get_group($group_name);
        if(!empty($group)){
            foreach($group as $g){
                $output[$g['name']] = $g['value'];
            }
        }

        return $output;
    }

    /**
     * Возвращает конкретную настройку
     * Разрешается точеная нотация например
     * до настройки setting_name array([group][setting_name] => array())
     * можно достучаться через точку get_setting("group.setting_name")
     * @param $setting_name
     * @return mixed
     * @throws Exception
     */
    public function get_setting($setting_name){
        //если есть точка, то хотим достучаться до элементы конкретной группы
        if(strpos($setting_name,'.') !== FALSE){
            $args = explode('.',$setting_name);
            if(count($args) != 2){
                throw new \Exception('When use dot notation for getting setting, you must have dot arrounded with two aplhanum pices from right and left');
            }
            if(isset($this->_items[$args[0]]) AND isset($this->_items[$args[0]][$args[1]])){
                return $this->_items[$args[0]][$args[1]];
            }
        }else{
            foreach($this->_items as $key => $val){
                if($val['name'] == $setting_name){
                    return $val['name'];
                }
            }
        }
    }

    /**
     * Возвращает определённый параметр из настройки
     * @param $setting_name
     * @param $param
     */
    public function get_setting_param($setting_name,$param){
        $output = null;
        $setting = $this->get_setting($setting_name);
        if(!empty($setting) AND isset($setting[$param])){
            return $setting[$param];
        }
    }

    /**
     * Возвращает значение настройки
     * @param $setting_name
     * @return mixed
     */
    public function get_setting_val($setting_name){
        return $this->get_setting_param($setting_name,'value');
    }

    /**
     * Конструктор
     */
    protected function __construct(){

        $items = DB::table('settings')->get();

        if(!empty($items)){
            foreach($items as $i){
                $this->_items[$i->group][$i->name] = array(
                    'id' => $i->id,
                    'name' => $i->name,
                    'value' => $i->value,
                ) ;
            }
        }
    }
    public function __sleep(){}
    public function __clone(){}
    public function __wakeup(){}
    public function str_replace_once($search, $replace, $text)
    {
        $pos = strpos($text, $search);
        return $pos!==false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
    }
}
