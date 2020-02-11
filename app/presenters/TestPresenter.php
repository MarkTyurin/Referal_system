<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 * branch b1
 */

class TestPresenter extends MainPresenter {

	public static $isSecurity = false;

	

	/* labels */
	public function ruLableTable(){ $this->renderLabel('rus', 'labelLayoutTable'); }
	
	
	public function getListUsers(){ echo (new Users())->getListUsers(); }
	public function add(){ echo (new Users())->add(); }
	public function edit(){ echo (new Users())->edit(); }
	public function deletee(){ echo (new Users())->deletee(); }
	public function getAll()	{echo (new Users())->getAll();} 
	public function get()	{echo (new Users())->get();} 

	//public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

	//public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>