<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lang extends Model
{
    use Notifiable, HasFactory;

    protected $table = 'langs';
    public  $incrementing = 'id';
    public $timestamps = false;
    /**
     * Возвращает языки для регулярки скоокатенированные разделителем |
     * Например: ru|en|fr
     * @return string
     */
    public function get_lang_expression(){
        $langs = DB::table($this->table)->get(['iso'])->all();
        $prepared = array();
        if(!empty($langs)){
            foreach($langs as $lang){
                $prepared[] = $lang->iso;
            }
        }
        return implode('|',$prepared);
    }


}
