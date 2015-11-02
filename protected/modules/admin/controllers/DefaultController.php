<?php

class DefaultController extends Controller
{
	public $layout='/layouts/adminLayout';
	public function actionIndex()
	{
		$this->render('index');
	}
}