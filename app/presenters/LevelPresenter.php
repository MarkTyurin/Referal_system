<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 * branch b1
 */

class LevelPresenter extends MainPresenter {

    public static $isSecurity = false;



    /* labels */
    public function ruLableTable(){ $this->renderLabel('rus', 'labelLayoutTable'); }


    public function add(){ echo (new Level())->adding(); }
    public function edit(){ echo (new Level())->editing(); }
    public function deletee(){ echo (new Level())->deleting(); }
    public function getListLevels()	{echo (new Level())->getListLevels();}
    public function searchLevel()	{echo (new Level())->searchLevel();}


    //public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

    //public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>