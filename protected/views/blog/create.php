<?php
/**
 * Created by PhpStorm.
 * User: QKY
 * Date: 15-11-25
 * Time: 上午8:49
 */
$this->pageTitle = Yii::app()->name . ' -  '.$actionName;
?>
<section id="content">
    <section class="vbox">
        <section class="scrollable wrapper">
            <div class="row">
                <!-- 导航面包屑开始 -->
                <?php $this->renderPartial('/layouts/breadcrumb',array('breadcrumb'=> $breadcrumb));?>
                <!-- 导航面包屑结束 -->
                <div class="col-lg-8">
                    <section class="panel panel-default">
                        <div class="panel-body">col-lg-8</div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <section class="panel panel-default">
                        <div class="panel-body">col-lg-4</div>
                    </section>
                </div>
            </div>
        </section>
    </section>
</section>