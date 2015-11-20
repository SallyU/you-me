<?php
/**
 * Created by PhpStorm.
 * User: QKY
 * Date: 15-11-19
 * Time: 下午3:52
 */
class SettingController extends Controller{
    public function actionIndex(){
        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->homeUrl);
        }

        if(Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $id = Yii::app()->user->id;
        if(empty($id)){
            throw new CHttpException(404,'非法操作！');
        }
        $model = User::model()->findByPk($id);
        if(empty($model)){
            throw new CHttpException(404,'您请求的页不在地球上o(╯□╰)o');
        }

        if(!empty($_POST['User']))
        {
            $old = $_POST['User']['oldpass'];
            $new = $_POST['User']['newpass'];
            $new2 = $_POST['User']['newpass2'];
            if(md5($old) != $model->password)
            {
                $model->addError('oldpass', '原密码输入错误');
            }else{
                if(empty($new) || empty($new2)){
                    $model->addError('newpass2', '新密码不能为空');
                }else if($new != $new2)
                {
                    $model->addError('newpass2','两次输入的新密码不一致');
                }else{
                    $model->password = md5($new);
                    if($model->save(false)){
                        Yii::app()->user->logout();
                        $this -> redirect(array('index/login'));
                    }
                }
            }
        }
        $data = array(
            'model' => $model,
        );
        $this->render('index',$data);
    }
}