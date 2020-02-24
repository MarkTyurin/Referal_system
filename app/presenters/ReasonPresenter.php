<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 * branch b1
 */

class ReasonPresenter extends MainPresenter {

    public static $isSecurity = false;



    /* labels */
    public function ruLableTable(){ $this->renderLabel('rus', 'labelLayoutTable'); }


    public function add(){ echo (new Reason())->adding(); }
    public function edit(){ echo (new Reason())->editing(); }
    public function deletee(){ echo (new Reason())->deleting(); }
    public function getListReasons()	{echo (new Reason())->getListReasons();}
    public function searchReason()	{echo (new Reason())->searchReason();}


    //public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

    //public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>