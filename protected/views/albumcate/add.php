<?php
$this->pageTitle=Yii::app()->name . ' - 添加相册类别 ';
?>
<section class="vbox">
    <section class="scrollable padder">
        <div class="m-b-md">
            <h3 class="m-b-none"></h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                </ul>
               新建相册类别
            </header>
            <div class="panel-body">
                <?php $form = $this->beginWidget('CActiveForm',array(
                    'htmlOptions'=>array(
                        'class'=>'form-horizontal',
                        ))); ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">相册类别名称</label>
                        <div class="col-sm-10">
                            <?php echo $form->textField($model,'catename',array('class' => 'form-control')); ?>
                            <span class="help-block m-b-none">可以一次添加多个类别，以空格隔开<?php echo $form->error($model,'catename'); ?></span>
                        </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">确定添加</button>
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </section>
        <div class="row">
            <!--<div class="col-sm-6">
                <section class="panel panel-default pos-rlt clearfix">
                    <header class="panel-heading">
                        <ul class="nav nav-pills pull-right">
                            <li>
                                <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                            </li>
                        </ul>
                        已有相册类别
                    </header>
                    <div class="panel-body clearfix">
                        <?php /*if(isset($albumcate) && !empty($albumcate) && $count >0 ){*/?>
                            <div class="doc-buttons">
                            <?php /*foreach($albumcate as $_a => $a){*/?>
                                    <a href="#" class="btn btn-s-md btn-default btn-rounded">
                                        <?php /*echo $a->catename;    */?>
                                        <button title="删除该类别" type="button" class="close" data-href="<?php /*echo $this->createUrl('albumcate/delalbumcate',array('cateid'=>$a->cateid));*/?>" data-toggle="modal" data-target="#confirm-delete" style="float: none;font-size: 16px;">&times;</button>
                                    </a>
                            <?php /*}} else{
                                echo "咦，一个相册类别都没有，赶紧添加一个吧！";
                            } */?>
                            </div>
                            <?php
/*                            if($pages->pageCount >= 2){
                                echo '<div class="text-center">';
                                $this->widget('CLinkPager',array(
                                    'header' => '',
                                    'firstPageLabel' => '首页',
                                    'lastPageLabel' => '最后一页',
                                    'prevPageLabel' => '上一页',
                                    'nextPageLabel' => '下一页',
                                    'pages' => $pages,
                                    'maxButtonCount'=>7,
                                ));
                                echo ' </div>';
                            }*/?>
                    </div>
                </section>
            </div>-->
            <div class="col-sm-6">
                <section class="panel panel-default pos-rlt clearfix">
                    <header class="panel-heading">
                        <ul class="nav nav-pills pull-right">
                            <li>
                                <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                            </li>
                        </ul>
                        已有相册类别
                    </header>
                    <div class="panel-body clearfix">
                        <div class="doc-buttons" id="a_lists">

                        </div>
                        <div class="text-center">
                            <div class="page" id="page"></div>
                        </div>
                    </div>
                </section>
                <script type="text/javascript">
                    var page_cur = 1; //当前页
                    var total_num, page_size, page_total_num;//总记录数,每页条数,总页数
                    function getData(page) { //获取当前页数据
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $this->createUrl('ajax/page'); ?>',
                            data: {'page': page - 1},
                            dataType: 'json',
                            success: function(json) {
                                $("#a_lists").empty();
                                total_num = json.total_num;//总记录数
                                page_size = json.page_size;//每页数量
                                page_cur = page;//当前页
                                page_total_num = json.page_total_num;//总页数
                                var a_list = "";
                                var list = json.list;
                                $.each(list, function(index, array) { //遍历返回json
                                    var aa = array['id'];
                                    a_list += "<a href='#' class='btn btn-s-md btn-default btn-rounded'>"+ array['title'] + "<button title='删除该类别' type='button' class='close' data-href='/index.php?r=albumcate/delalbumcate&cateid="+array['id']+"' data-toggle='modal' data-target='#confirm-delete' style='float: none;font-size: 16px;'>×</button>" + "</a>";
                                });
                                $("#a_lists").append(a_list);
                            },
                            complete: function() {
                                getPageBar();//js生成分页，可用程序代替
                            },
                            error: function() {
                                alert("数据异常,请检查是否json格式");
                            }
                        });
                    }

                    function getPageBar() { //js生成分页
                        if (page_cur > page_total_num)
                            page_cur = page_total_num;//当前页大于最大页数
                        if (page_cur < 1)
                            page_cur = 1;//当前页小于1
                        page_str = "<span>共" + total_num + "条</span>&nbsp;&nbsp;<span>" + page_cur + "/" + page_total_num + "</span>&nbsp;&nbsp;";
                        if (page_cur == 1) {//若是第一页
                            page_str += "<span>首页</span>&nbsp;&nbsp;<span>上一页</span>&nbsp;&nbsp;";
                        } else {
                            page_str += "<span><a href='javascript:void(0)' data-page='1'>首页</a></span>&nbsp;&nbsp;<span><a href='javascript:void(0)' data-page='" + (page_cur - 1) + "'>上一页</a></span>&nbsp;&nbsp;";
                        }
                        if (page_cur >= page_total_num) {//若是最后页
                            page_str += "<span>下一页</span>&nbsp;&nbsp;<span>尾页</span>";
                        } else {
                            page_str += "<span><a href='javascript:void(0)' data-page='" + (parseInt(page_cur) + 1) + "'>下一页</a></span>&nbsp;&nbsp;<span><a href='javascript:void(0)' data-page='" + page_total_num + "'>尾页</a></span>&nbsp;&nbsp;";
                        }
                        $("#page").html(page_str);
                    }

                    $(function() {
                        getData(1);//默认第一页
                        $(document).on('click','#page a',function() { //live 向未来的元素添加事件处理器,不可用bind
                            var page = $(this).attr("data-page");//获取当前页
                            getData(page)
                        });
                    });
                </script>
            </div>
        </div>
    </section>
</section>

