<?php

class Reason extends  _MainModel {


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
    {   $params = array('project_id', 'name', 'description','image','sum_of_money');
        foreach ( $params as  $value) {
            if(!self::is_var($value) )
            {
                self::viewJSON(array('Error' =>  "key  $value do not found"));
                return;
            }
        }
        self::table("reason_of_promotion")->add(array("project_id" => self::$params_url['project_id'], "name" => self::$params_url['name'],
            "sum_of_money" => self::$params_url['sum_of_money'] , "description" => self::$params_url['description'], "image" => self::$params_url['image']))->send();
    }

    public function editing()
    {
        $params = array('project_id', 'name', 'description','image','sum_of_money');
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
        self::table("reason_of_promotion")->edit(array("project_id" => self::$params_url['project_id'], "name" => self::$params_url['name'],"sum_of_money" => self::$params_url['sum_of_money'] ,
            "description" => self::$params_url['description'], "image" => self::$params_url['image']), array("id" => self::$params_url['id']))->send();
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
        self::table("reason_of_promotion")->delete(array("id" => self::$params_url['id']))->send();
    }

    public function searchReason() {
        $result = self::table('reason_of_promotion')->get();

        if (self::is_var('name'))
            $result->search(array('name' => self::$params_url['name']));

        if (self::is_var('filter_value') && self::is_var('filter_field'))
            $result->filter(array(self::$params_url['filter_field'] => self::$params_url['filter_value']));

        $page = $this->checkedInt('page', 1);
        $records = $this->checkedInt('records', 10);
        $result->pagination($page, $records);

        self::viewJSON($result->send());
    }
    public function getListReasons(){
        $result = self::table('reason_of_promotion')->get(array('name'));

        $page = $this->checkedInt('page', 1);
        $count = $this->checkedInt('count', 10);

        $result ->pagination($page,$count);
        self::viewJSON($result->send());
    }

}
?>
