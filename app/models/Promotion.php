<?php

class Promotion extends  _MainModel {


    public function checkedInt($key, $default = 0, $arr = null) {
        if (is_null($arr))
            $arr = self::$params_url;
        if (isset($arr[$key])) {
            $val = $arr[$key];
            if (filter_var($val, FILTER_VALIDATE_INT) === false) {
                self::viewJSON(['error' => "invalid $key parameter type; must be int"]);
                die();
            }
            return intval($val);
        }
        return $default;
    }


    public function adding()
    {   $params = array('reason_id', 'referal_id', 'sum_of_money','date_of_awarding');
        foreach ( $params as  $value) {
            if(!self::is_var($value) )
            {
                self::viewJSON(array('Error' =>  "key  $value do not found"));
                return;
            }
        }
        self::table("promotions")->add(array("reason_id" => self::$params_url['reason_id'], "referal_id" => self::$params_url['referal_id'],
            "sum_of_money" => self::$params_url['sum_of_money'] , "date_of_awarding" => self::$params_url['date_of_awarding']))->send();
    }

    public function editing()
    {
        $params = array('reason_id', 'referal_id', 'sum_of_money','date_of_awarding', 'id');
        foreach ( $params as  $value) {
            if(!self::is_var($value) )
            {
                self::viewJSON(array('Error!' =>  "key  $value do not found"));
                return;
            }
        }
        if(!$this->checkedInt('id'))
        {
            self::viewJSON(array('error' => array("Error!" => "invalid type of arg (id must be int)")));
            return;
        }
        self::table("promotions")->edit(array("reason_id" => self::$params_url['reason_id'], "referal_id" => self::$params_url['referal_id'],
            "sum_of_money" => self::$params_url['sum_of_money'] , "date_of_awarding" => self::$params_url['date_of_awarding']), array("id" => self::$params_url['id']))->send();
    }


    public function deleting()
    {
        if(!self::is_var('id') )
        {
            self::viewJSON(array('Error' =>  "key id do not found"));
            return;
        }
        if(!$this->checkedInt('id'))
        {
            self::viewJSON(array('error' => array("Error" => "invalid type of arg (id must be int)")));
            return;
        }
        self::table("promotions")->delete(array("id" => self::$params_url['id']))->send();
    }

    public function searchPromotion() {
        $result = self::table('promotions')->get();

        if (self::is_var('date_of_awarding'))
            $result->search(array('date_of_awarding' => self::$params_url['date_of_awarding']));

        if (self::is_var('filter_value') && self::is_var('filter_field'))
            $result->filter(array(self::$params_url['filter_field'] => self::$params_url['filter_value']));

        $page = $this->checkedInt('page', 1);
        $records = $this->checkedInt('records', 10);
        $result->pagination($page, $records);

        self::viewJSON($result->send());
    }
    public function getListPromotions(){
        $result = self::table('promotions')->get(array('id'));

        $page = $this->checkedInt('page', 1);
        $count = $this->checkedInt('count', 10);

        $result ->pagination($page,$count);
        self::viewJSON($result->send());
    }

}
?>
