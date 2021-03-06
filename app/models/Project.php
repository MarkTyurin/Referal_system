<?php

class Project extends  _MainModel {


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
    {   $params = array('name', 'image','user_id','description','is_blocked');
        foreach ( $params as  $value) {
            if(!self::is_var($value) )
            {
                self::viewJSON(array('Error' =>  "key  $value do not found"));
                return;
            }
        }
        self::table("projects")->add(array("name" => self::$params_url['name'], "image" => self::$params_url['image'] ))->send();
    }

    public function editing()
    {
        $params = array('name', 'image','user_id','description','is_blocked', 'id');
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
        self::table("projects")->edit(array( "name" => self::$params_url['name'], "image" => self::$params_url['image'], "is_blocked" => self::$params_url['is_blocked'],
            "user_id" => self::$params_url['user_id'], "description" => self::$params_url['description']),array("id" => self::$params_url['id']))->send();
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
           self::table("projects")->delete(array("id" => self::$params_url['id']))->send();
    }

    public function searchProject() {
        $result = self::table('projects')->get();

        if (self::is_var('name'))
            $result->search(array('name' => self::$params_url['name']));

        if (self::is_var('filter_value') && self::is_var('filter_field'))
            $result->filter(array(self::$params_url['filter_field'] => self::$params_url['filter_value']));

        $page = $this->checkedInt('page', 1);
        $records = $this->checkedInt('records', 10);
        $result->pagination($page, $records);

        self::viewJSON($result->send());
    }
    public function getListProject(){
        $result = self::table('projects')->get(array('name'));

        $page = $this->checkedInt('page', 1);
        $count = $this->checkedInt('count', 10);

        $result ->pagination($page,$count);
        self::viewJSON($result->send());
    }

}
?>