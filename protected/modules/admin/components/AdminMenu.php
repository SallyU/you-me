<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 2015/11/2 0002
 * Time: 21:47
 */
Yii::import('zii.widgets.CPortlet');

class AdminMenu extends CPortlet
{
    /*public function init()
    {

    }*/

    protected function renderContent()
    {
        $this->render('adminMenu');
    }
}