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



    public function add(){ echo (new Project())->adding(); }
    public function edit(){ echo (new Project())->editing(); }
    public function deletee(){ echo (new Project())->deleting(); }
    public function getListProject()	{echo (new Project())->getListProject();}
    public function searchProject()	{echo (new Project())->searchProject();}


    //public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

    //public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>