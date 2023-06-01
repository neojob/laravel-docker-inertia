<?php
namespace App\Library;
use DB;
use App;
use Exception;
use Illuminate\Http\Request;
use Session;

class Cart {

    const SESSION_KEY = "cart";
    public static $_instance;
    protected $_session;
    protected $_items = array();


    private function __construct(){
        $this->_session = Session::get(static::SESSION_KEY);
        $this->init_items();
    }
    public static function instance(){
        if(static::$_instance == null){
            static::$_instance = new self;
        }
        return static::$_instance;
    }

    /**
     * То что находится в сессии закидиват в _items
     */
    private function init_items(){
        $this->_items = Session::get(static::SESSION_KEY,array());

    }

    /**
     * В SESSION_KEY закидиват соответственные значения
     */
    private function save_items(){
        Session::put(static::SESSION_KEY,$this->_items);
        Session::save();
     }

    /**
     * Очищает _items и сохраняет
     */
    public function clear(){
        $this->_items = array();
        $this->save_items();
    }


    /**
     * @param $id 'id продукта'
     * @param $price 'цена продукта'
     * Добавляет продукт
     */
    public function add_item($id,$price,$alias,$title,$image){
        if( ! isset($this->_items[$id])){
            $this->_items[$id] = array(
            "id"    => $id,
            "image" => $image,
            "title" => $title,
            "alias" => $alias,
            "count" => 1,
            "price" => $price,
            "total" => $price,
            );
         }else{
            $this->_items[$id]["count"]++;
            $this->calculate_price($id);
        }

        $this->save_items();


    }
    /**
     * @param $id 'Удаляет продукт из корзины'
     */
    public function remove_item($id){
        if($this->_items[$id]["count"] > 1){
            $this->_items[$id]["count"]--;
            $this->calculate_price($id);
        }else{
            unset($this->_items[$id]);
        }
        $this->save_items();
    }

    /**
     * @param $id
     */
    public function delete_item($id){
        unset($this->_items[$id]);
        $this->save_items();
    }

    /**
     * @param $id
     */
    private function calculate_price($id){
        $this->_items[$id]["total"] = $this->_items[$id]["count"] * $this->_items[$id]["price"];
    }

    /**
     * @return int
     */
    public function get_items_count(){
        $total = 0;
        if(!empty($this->_items)){
            foreach($this->_items as $item){
                $total += $item["count"];
            }
        }

        return  $total;
    }

    /**
     * @return int
     */
    public  function get_total_price()
    {
        $total = 0;
            if (!empty($this->_items)) {
            foreach ($this->_items as $item) {
                $total += $item["total"];
            }
        }

        return $total;
    }



    /**
     * @return array
     */
    public function get_all_items(){
        return $this->_items;
    }

    /**
     *
     */
    private function __clone(){}
    /**
     *
     */
    public function __wakeup(){}

    public function get_items_ids(){
        $output = array();
        if( ! empty($this->_items)){
            foreach ($this->_items as $id => $data)
                $output[] = $id;
        }
        return $output;
    }

    public function get_item($id){
        return isset($this->_items[$id]) ? $this->_items[$id] : null;
    }



}












