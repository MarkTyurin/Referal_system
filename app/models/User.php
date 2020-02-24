<?php

class User extends  _MainModel {


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
    {   $params = array('nickname', 'avatar');
        foreach ( $params as  $value) {
            if(!self::is_var($value) )
            {
                self::viewJSON(array('Error' =>  "key  $value do not found"));
                return;
            }
        }
        self::table("users")->add(array("nickname" => self::$params_url['nickname'], "avatar" => self::$params_url['avatar'] ))->send();
    }

    public function editing()
    {
        $params = array('nickname', 'avatar');
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
        self::table("users")->edit(array( "nickname" => self::$params_url['nickname'], "avatar" => self::$params_url['avatar']), array("id" => self::$params_url['id']))->send();
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
        self::table("users")->delete(array("id" => self::$params_url['id']))->send();
    }

    public function searchUser() {
        $result = self::table('users')->get();

        if (self::is_var('nickname'))
            $result->search(array('nickname' => self::$params_url['nickname']));

        if (self::is_var('filter_value') && self::is_var('filter_field'))
            $result->filter(array(self::$params_url['filter_field'] => self::$params_url['filter_value']));

        $page = $this->checkedInt('page', 1);
        $records = $this->checkedInt('records', 10);
        $result->pagination($page, $records);

        self::viewJSON($result->send());
    }
    public function getListUsers(){
        $result = self::table('users')->get(array('nickname'));

        $page = $this->checkedInt('page', 1);
        $count = $this->checkedInt('count', 10);

        $result ->pagination($page,$count);
        self::viewJSON($result->send());
    }

}
?>