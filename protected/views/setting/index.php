<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none">form wizard</h3>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <form id="wizardform" method="get" action="http://demo1.cssmoban.com/cssthemes3/yzts_15_musik/index.html">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>修改密码</h4>
                                <div class="progress progress-xs m-t-md">
                                    <div style="width: 33.3333%;" class="progress-bar bg-success"></div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="step1">
                                        <p>旧密码:</p>
                                        <input class="form-control" data-trigger="change" data-required="true" data-type="url"  type="text">
                                        <p class="m-t">新密码:</p>
                                        <input class="form-control" data-trigger="change" data-required="true" data-type="email"  type="text">
                                        <p class="m-t">新密码确认:</p>
                                        <input class="form-control" data-trigger="change" data-required="true" data-type="email"  type="text">
                                    </div>
                                    <ul class="pager wizard m-b-sm">
                                        <li class="previous first disabled" style="display:none;"><a href="#">first</a></li>
                                        <li class="next last" style="display:none;"><a href="#">last</a></li>
                                        <li class="next"><a href="#">确定修改</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form id="guessform">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active"><a href="#tab1" data-toggle="tab">guess</a></li>
                                    <li><a href="#tab2" data-toggle="tab">result</a></li>
                                </ul>
                                <span class="font-bold">guess game</span>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane text-center active" id="tab1">
                                        <p class="text-center h4 m-t m-b">guess a number between 1 and 50!</p>
                                        <input class="no-border b-b input-s-sm h1 inline text-center text-success wrapper-lg" id="gn" type="text">
                                        <p class="text-center h4 m-t m-b text-danger" id="gi">.</p>
                                    </div>
                                    <div class="tab-pane text-center wrapper-xl" id="tab2">
                                        <h1 class="text-danger m-b-xl" id="answer"></h1>
                                        <h2 class="text-success m-b-xl">correct!!</h2>
                                        <p class="h4">you guess <span id="count"></span> time(s), [<span id="num"></span> ]</p>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <ul class="pager wizard m-n">
                                    <li class="previous disabled"><a href="#">try again</a></li>
                                    <li class="next"><a href="#">guess</a></li>
                                </ul>
                            </footer>
                        </section>
                    </form>
                </div>
            </div>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>