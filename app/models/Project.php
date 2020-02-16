<?php

class Project {



    public function add()
    {    $params = array('name', 'image','user_id','description','status');
        foreach ($params as $param)
        {
            if(!array_key_exists($param,_MainModel::$params_url))
            {
                _MainModel::viewJSON(array('Error' =>  "key '$param' do not found"));
                return;
            }
        }
        _MainModel::table("projects")->add(array("name" => _MainModel::$params_url['name'], "image" => _MainModel::$params_url['image'] ))->send();
    }
    public function edit()
    {
        $params = array('name', 'image','user_id','description','status', 'id');
        foreach ($params as $param)
        {
            if(!array_key_exists($param,_MainModel::$params_url))
            {
                _MainModel::viewJSON(array('Error' =>  "key '$param' do not found"));
                return;
            }
        }
        if(is_numeric( _MainModel::$params_url['id']) == false)
        {
            _MainModel::viewJSON(array('error' => array("text" => "invalid type of arg (id must be int)")));
            return;
        }
        _MainModel::table("projects")->edit(array( "name" => _MainModel::$params_url['name'], "image" => _MainModel::$params_url['image']), array("id" => _MainModel::$params_url['id']))->send();
    }
    public function getAll()
    {
        $params = array('filter_value', 'field');
        foreach ($params as $param)
        {
            if(!array_key_exists($param,_MainModel::$params_url))
            {
                _MainModel::viewJSON(array('Error' =>  "key '$param' do not found"));
                return;
            }
        }
        $mas = _MainModel::$params_url;
        $number_page=intval($mas['number_page'] ?? 0);
        $count_element=intval($mas['count_element'] ?? 10);
        _MainModel::viewJSON(_MainModel::table("projects")->get(array( 'name' ))-> filter(array(   $mas['field']=> $mas['filter_value'] ))  ->pagination(  $number_page,$count_element)->send());
    }
    public function get()
    {
        if(!array_key_exists('id',_MainModel::$params_url))
        {
            _MainModel::viewJSON(array('Error' =>  "key 'ID' do not found"));
            return;
        }
        if(is_numeric( _MainModel::$params_url['id']) == false)
        {
            _MainModel::viewJSON(array('error' => array("text" => "invalid type of arg (id must be int)")));
            return;
        }
        _MainModel::viewJSON(_MainModel::table("projects")->get()->filter(array("id" => _MainModel::$params_url['id']))->send());
    }
    public function search()
    {
        if(!array_key_exists('name',_MainModel::$params_url))
        {
            _MainModel::viewJSON(array('Error' =>  "key 'name' do not found"));
            return;
        }

        _MainModel::viewJSON(_MainModel::table("projects")->get()->search(array("name" => _MainModel::$params_url['name']))->send());
    }

    public function deletee()
    {
        if(!array_key_exists('id',_MainModel::$params_url))
        {
            _MainModel::viewJSON(array('Error' =>  "key 'ID' do not found"));
            return;
        }
        if(is_numeric( _MainModel::$params_url['id']) == false)
        {
            _MainModel::viewJSON(array('error' => array("text" => "invalid type of arg (id must be int)")));
            return;
        }
        _MainModel::table("projects")->delete(array("id" => _MainModel::$params_url['id']))->send();
    }
}
?>