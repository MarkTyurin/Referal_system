<?php
 
class User {


    public function getListUsers()
	{
        #$result = _MainModel::table("users_cards")->get()->send();
        $aaa = array("id"=>2,"name"=>"aaa");
		#$json = json_encode($aaa);
        _MainModel::viewJSON($aaa);   
    }
	public function add()
	{    $params = array('nickname', 'avatar');
        foreach ($params as $param)
        {
            if(!array_key_exists($param,_MainModel::$params_url))
            {
                _MainModel::viewJSON(array('Error' =>  "key '$param' do not found"));
                return;
            }
         }
	    _MainModel::table("users")->add(array("nickname" => _MainModel::$params_url['nickname'], "avatar" => _MainModel::$params_url['avatar'] ))->send();
	}
	public function edit()
	{
        $params = array('nickname', 'avatar','id');
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
		_MainModel::table("users")->edit(array( "nickname" => _MainModel::$params_url['nickname'], "avatar" => _MainModel::$params_url['avatar']), array("id" => _MainModel::$params_url['id']))->send();
	}
	public function getAll()
	{
		_MainModel::viewJSON(_MainModel::table("users")->get( )->send());
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
		_MainModel::viewJSON(_MainModel::table("users")->get()->filter(array("id" => _MainModel::$params_url['id']))->send());
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
		_MainModel::table("users")->delete(array("id" => _MainModel::$params_url['id']))->send();
	}
}
?>