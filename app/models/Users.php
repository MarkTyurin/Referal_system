<?php
 
class Users {


    public function getListUsers(){
        #$result = _MainModel::table("users_cards")->get()->send();
        $aaa = array("id"=>2,"name"=>"aaa");
		#$json = json_encode($aaa);
        _MainModel::viewJSON($aaa);   
    }

}

?>