<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 15-11-4
 * Time: 上午11:36
 */
class Captcha extends CCaptchaAction{
    /**
     * Runs the action.
     */
    public function run()
    {
        if(isset($_GET[self::REFRESH_GET_VAR]))  // AJAX request for regenerating code
        {
            $code=$this->getVerifyCode(true);
            echo CJSON::encode(array(
                'hash1'=>$this->generateValidationHash($code),
                'hash2'=>$this->generateValidationHash(strtolower($code)),
                // we add a random 'v' parameter so that FireFox can refresh the image
                // when src attribute of image tag is changed
                'url'=>$this->getController()->createUrl($this->getId(),array('v' => uniqid())),
            ));
        }
        else
            $this->renderImage($this->getVerifyCode(true));//重写run,实现刷新页面时刷新验证码
        Yii::app()->end();
    }



}