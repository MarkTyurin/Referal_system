<?php

class Referal extends  _MainModel {


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
    {   $params = array('nickname', 'referal_link','level_id','parent_id','project_id');
        foreach ( $params as  $value) {
            if(!self::is_var($value) )
            {
                self::viewJSON(array('Error' =>  "key  $value do not found"));
                return;
            }
        }
        self::table("referals")->add(array("name" => self::$params_url['name'], "image" => self::$params_url['image'] ))->send();
    }

    public function editing()
    {
        $params = array('nickname', 'referal_link','level_id','parent_id','project_id','id');
        foreach ( $params as  $value) {
            if(!self::is_var($value) )
            {
                self::viewJSON(array('Error' =>  "key  $value do not found"));
                return;
            }
        }
        if(!$this->checkedInt('id'))
        {
            self::viewJSON(array('error' => array("text" => "invalid type of arg (id must be int)")));
            return;
        }
        self::table("referals")->edit(array( "nickname" => self::$params_url['nickname'], "referal_link" => self::$params_url['referal_link'], "level_id" => self::$params_url['level_id'],
            "parent_id" => self::$params_url['parent_id'], "project_id" => self::$params_url['project_id']),array("id" => self::$params_url['id']))->send();
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
        self::table("referals")->delete(array("id" => self::$params_url['id']))->send();
    }

    public function searchReferal() {
        $result = self::table('referals')->get();

        if (self::is_var('nickname'))
            $result->search(array('nickname' => self::$params_url['nickname']));

        if (self::is_var('filter_value') && self::is_var('filter_field'))
            $result->filter(array(self::$params_url['filter_field'] => self::$params_url['filter_value']));

        $page = $this->checkedInt('page', 1);
        $records = $this->checkedInt('records', 10);
        $result->pagination($page, $records);

        self::viewJSON($result->send());
    }
    public function getListReferals(){
        $result = self::table('referals')->get(array('nickname'));

        $page = $this->checkedInt('page', 1);
        $count = $this->checkedInt('count', 10);

        $result ->pagination($page,$count);
        self::viewJSON($result->send());
    }

}
?>