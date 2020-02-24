<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 * branch b1
 */

class UserPresenter extends MainPresenter {

	public static $isSecurity = false;

	

	/* labels */
	public function ruLableTable(){ $this->renderLabel('rus', 'labelLayoutTable'); }


    public function add(){ echo (new User())->adding(); }
    public function edit(){ echo (new User())->editing(); }
    public function deletee(){ echo (new User())->deleting(); }
    public function getListProject()	{echo (new User())->getListUsers();}
    public function searchProject()	{echo (new User())->searchUser();}


    //public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

	//public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>