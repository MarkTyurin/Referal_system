<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 * branch b1
 */

class TokenPresenter extends MainPresenter {

    public static $isSecurity = false;



    /* labels */
    public function ruLableTable(){ $this->renderLabel('rus', 'labelLayoutTable'); }


    public function add(){ echo (new Token())->adding(); }
    public function edit(){ echo (new Token())->editing(); }
    public function deletee(){ echo (new Token())->deleting(); }
    public function getListTokens()	{echo (new Token())->getListTokens();}
    public function searchToken()	{echo (new Token())->searchToken();}


    //public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

    //public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>