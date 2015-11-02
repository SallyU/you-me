<div class="dialog">
    <div class="panel panel-default">
<!--        <p class="panel-heading no-collapse">Sign Up</p>-->
        <div class="panel-body">
            <form>
                <!--<div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control span12">
                </div>-->
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>验证码</label>
                    <input type="text" class="form-control span12" placeholder="请正确的输入下图上的字符">
                </div>
                <div class="form-group">
                    <a href="" class="btn btn-primary pull-right">添加用户</a>
                    <label class="remember-me">验证码位置</label>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <p><a href="<?php echo Yii::app()->createUrl('admin/admin/login') ?>" style="font-size: .75em; margin-top: .25em;">返回登录？</a></p>
</div>