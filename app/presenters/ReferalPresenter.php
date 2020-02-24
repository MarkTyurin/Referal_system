<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 * branch b1
 */

class ReferalPresenter extends MainPresenter {

    public static $isSecurity = false;



    /* labels */
    public function ruLableTable(){ $this->renderLabel('rus', 'labelLayoutTable'); }



    public function add(){ echo (new Referal())->adding(); }
    public function edit(){ echo (new Referal())->editing(); }
    public function deletee(){ echo (new Referal())->deleting(); }
    public function getListReferals()	{echo (new Referal())->getListReferals();}
    public function searchReferal()	{echo (new Referal())->searchReferal();}


    //public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

    //public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>