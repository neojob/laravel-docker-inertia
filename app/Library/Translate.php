<?php
namespace App\Library;
use DB;
use App;
use Exception;
use Illuminate\Http\Request;
use App\Models\Lang;

class Translate {

    /**
     * Маска начала и конца
     */
    const LARA_MARK = ':escape[ :endLARA_LANG :lang :escape]';

    public static $_instance;

    public static function instance(){

        if(self::$_instance === null){
            self::$_instance = new self();
        }

        return self::$_instance;
    }


    /**
     * Перевод текста на требуемый язые
     * по умолчанию если не указать на каком языке нужно вывести текст
     * то он будет выведён на основном языке сайта, идентификатор которого находится в
     * переменной I18n::$lang
     * @param $text
     * @param null $lang
     * @return mixed
     */
    public static function text($text, $lang = NULL){

        if($lang == NULL){
            $lang = 'en';
        }


        preg_match_all('~'.Translate::mark($lang).'(?P<lang>.*)'.Translate::mark($lang,true).'~su',$text,$matches);


        return trim(isset($matches['lang'][0]) ? $matches['lang'][0] : NULL);

    }

    /**
     * Устонавливает начальный и конечный маркер
     * находящийся в Translate::LARA_MARK
     * для входящего текста
     * @param $lang
     * @param bool $end
     * @return mixed
     */
    protected static function mark($lang, $end = false){

        return ($end) ? str_replace(':escape','\\',str_replace(':end','\/',str_replace(':lang',$lang,Translate::LARA_MARK))) : str_replace(':escape','',str_replace(':escape','\\',str_replace(':end','',str_replace(':lang',$lang,Translate::LARA_MARK)))) ;
    }

    /**
     * Устонавливает начальный и конечный маркер
     * находящийся в Translate::LARA_MARK
     * для выходящего текста
     * @param $lang
     * @param bool $end
     * @return mixed
     */
    protected static function mark_output($lang, $end = false){

        return ($end) ? str_replace(':escape','',str_replace(':end','/',str_replace(':lang',$lang,Translate::LARA_MARK))) : str_replace(':escape','',str_replace(':end','',str_replace(':lang',$lang,Translate::LARA_MARK))) ;
    }

    /**
     * Обрамляет текст в соответствующие теги
     * для указанного языка
     * @param $lang
     * @param $text
     * @return string
     */
    protected static function set_lang($lang, $text){

        return Translate::mark_output($lang).$text.Translate::mark_output($lang,true);
    }

    public static function mark_array( array $array, $languages){
        //выходной массив
        $output = array();
        //обработанные ключи
        $processed = array();
        $tmp_data = '';
//        $langs = ORM::factory('Lang')->get_lang_expression(); //ru|en|fr
        $m = new Lang();
        $langs = $m->get_lang_expression(); //ru|en|fr

        //текущий ключ массива
        $translateble_key = '';

        //перебор ключей входящего массива
        foreach($array as $key => $value){
            if(array_key_exists($key,$processed)) continue;
            //проверяем если ключ похож на переводимый
            if(preg_match('~[_]('.$langs.')$~',$key)){
                $translateble_key = preg_replace('~[_]('.$langs.')$~','',$key);

                //перебор языков
                foreach($languages as $lang){
                    $processed[$translateble_key.'_'.$lang->iso] = true;

                    if(!empty($array[$translateble_key.'_'.$lang->iso])){
                        $tmp_data .= self::set_lang($lang->iso,$array[$translateble_key.'_'.$lang->iso]);

                    }

                }

                $output[$translateble_key] = $tmp_data;
            }else{
                $output[$key] = $value;
            }



            $tmp_data = $translateble_key = '';
        }
        return $output;
    }

    public static function from_array(array $array = null){

        $output = array();

        foreach($array as $key => $val){

        }
    }

    /**
     * Возвращает переводимый ключ (например для инпутов исходный ключ title выходной title_ru)
     * @param $key
     * @param $lang
     * @return string
     */
    public static function translatable_key($key,$lang){

        return $key.'_'.$lang;
    }
}
