<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 * branch b1
 */

class ProjectPresenter extends MainPresenter {

    public static $isSecurity = false;



    /* labels */
    public function ruLableTable(){ $this->renderLabel('rus', 'labelLayoutTable'); }



    public function add(){ echo (new Project())->add(); }
    public function edit(){ echo (new Project())->edit(); }
    public function deletee(){ echo (new Project())->deletee(); }
    public function getAll()	{echo (new Project())->getAll();}
    public function get()	{echo (new Project())->get();}
    public function search()	{echo (new Project())->search();}


    //public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

    //public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>