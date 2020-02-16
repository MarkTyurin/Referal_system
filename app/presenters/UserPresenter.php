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
	
	
	public function getListUser(){ echo (new User())->getListUser(); }
	public function add(){ echo (new User())->add(); }
	public function edit(){ echo (new User())->edit(); }
	public function deletee(){ echo (new User())->deletee(); }
	public function getAll()	{echo (new User())->getAll();} 
	public function get()	{echo (new User())->get();} 

	//public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

	//public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>