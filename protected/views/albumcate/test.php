<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
    <style type="text/css">
        .lists{width:740px;  margin:30px auto 0; position:relative}
        #ul_lists li{float:left;width:220px;height:240px;margin:0 6px 6px;border:1px solid #ddd;padding:5px;overflow:hidden}
        #ul_lists li img{width:220px; height:220px;margin:0 0 6px}
        .page{ margin:12px 0 20px;  text-align:center}
        .page span{margin:5px; font-size:14px}
    </style>
</head>
<body>
<div class="container">
    <div class="lists"><ul id="ul_lists" class="clearfix"></ul></div>
    <div class="page" id="page"></div>
</div>
<script type="text/javascript" src="http://www.sucaihuo.com/Public/js/other/jquery.js"></script>
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
                $("#ul_lists").empty();
                total_num = json.total_num;//总记录数
                page_size = json.page_size;//每页数量
                page_cur = page;//当前页
                page_total_num = json.page_total_num;//总页数
                var li = "";
                var list = json.list;
                $.each(list, function(index, array) { //遍历返回json
                    li += "<li><a href='#'>"+ array['title'] + "</a></li>";
                });
                $("#ul_lists").append(li);
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
        page_str = "<span>共" + total_num + "条</span><span>" + page_cur + "/" + page_total_num + "</span>";
        if (page_cur == 1) {//若是第一页
            page_str += "<span>首页</span><span>上一页</span>";
        } else {
            page_str += "<span><a href='javascript:void(0)' data-page='1'>首页</a></span><span><a href='javascript:void(0)' data-page='" + (page_cur - 1) + "'>上一页</a></span>";
        }
        if (page_cur >= page_total_num) {//若是最后页
            page_str += "<span>下一页</span><span>尾页</span>";
        } else {
            page_str += "<span><a href='javascript:void(0)' data-page='" + (parseInt(page_cur) + 1) + "'>下一页</a></span><span><a href='javascript:void(0)' data-page='" + page_total_num + "'>尾页</a></span>";
        }
        $("#page").html(page_str);
    }

    $(function() {
        getData(1);//默认第一页
        $("#page a").live('click', function() { //live 向未来的元素添加事件处理器,不可用bind
            var page = $(this).attr("data-page");//获取当前页
            getData(page)
        });
    });
</script>
</body>
</html>

