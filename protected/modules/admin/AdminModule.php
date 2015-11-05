<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
        parent::init();//这步是调用main.php里的配置文件

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));


        //这里重写父类里的组件
        //如有需要还可以参考API添加相应组件
        Yii::app()->setComponents(array(
            'errorHandler'=>array(
                'class'=>'CErrorHandler',
                'errorAction'=>'admin/default/error',//错误处理
            ),
        ), false);
        //下面这两行我一直没搞定啥意思，貌似CWebModule里也没generatorPaths属性和findGenerators()方法
        //$this->generatorPaths[]='admin.generators';
        //$this->controllerMap=$this->findGenerators();
    }



	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
