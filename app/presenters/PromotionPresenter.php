<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 * branch b1
 */

class PromotionPresenter extends MainPresenter {

    public static $isSecurity = false;



    /* labels */
    public function ruLableTable(){ $this->renderLabel('rus', 'labelLayoutTable'); }


    public function add(){ echo (new Promotion())->adding(); }
    public function edit(){ echo (new Promotion())->editing(); }
    public function deletee(){ echo (new Promotion())->deleting(); }
    public function getListProject()	{echo (new Promotion())->getListPromotions();}
    public function searchProject()	{echo (new Promotion())->searchPromotion();}


    //public function table(){ $this->render(["title" => "table", "type" => "widgets"]); }

    //public function hello(){ $this->render(["title" => "hello", "type" => "widgets"]); }

}

?>