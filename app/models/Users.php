<?php
 
class Users  {


    public function getListUsers()
	{
        #$result = _MainModel::table("users_cards")->get()->send();
        $aaa = array("id"=>2,"name"=>"aaa");
		#$json = json_encode($aaa);
        _MainModel::viewJSON($aaa);   
    }
	public function add()
	{
	$nick = _MainModel::$params_url['nick'];
	$avatar = _MainModel::$params_url['avatar'];
		_MainModel::table("users")->add(array("nickname" => $nick, "avatar" => $avatar ))->send(); 
	}

	public function edit()
	{
		$id = _MainModel::$params_url['id'];
		$nick = _MainModel::$params_url['nick'];
		$avatar = _MainModel::$params_url['avatar'];
		
		_MainModel::table("users")->edit(array( "nickname" => $nick, "avatar" => $avatar), array("id" => $id))->send();
	}
	public function getAll()
	{
		
		_MainModel::viewJSON(_MainModel::table("users")->get()->send());
	}
	public function get()
	{
		$id = _MainModel::$params_url['id'];
		_MainModel::viewJSON(_MainModel::table("users")->get()->filter(array("id" => $id))->send());
	}
	public function deletee()
	{
		$id = _MainModel::$params_url['id'];
		_MainModel::table("users")->delete(array("id" => $id))->send();
	}
}
?>