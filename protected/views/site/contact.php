<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';

?>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none">联系我</h3>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <form data-validate="parsley">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <span class="h4">register</span>
                            </header>
                            <div class="panel-body">
                                <p class="text-muted">please fill the information to continue</p>
                                <div class="form-group">
                                    <label>username</label>
                                    <input class="form-control parsley-validated" data-required="true" type="text">
                                </div>
                                <div class="form-group">
                                    <label>email</label>
                                    <input class="form-control parsley-validated" data-type="email" data-required="true" type="text">
                                </div>
                                <div class="form-group pull-in clearfix">
                                    <div class="col-sm-6">
                                        <label>enter password</label>
                                        <input class="form-control parsley-validated" data-required="true" id="pwd" type="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>confirm password</label>
                                        <input class="form-control parsley-validated" data-equalto="#pwd" data-required="true" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>phone</label>
                                    <input class="form-control parsley-validated" data-type="phone" placeholder="(xxx) xxxx xxx" data-required="true" type="text">
                                </div>
                                <div class="checkbox i-checks">
                                    <label>
                                        <input class="parsley-validated" name="check" checked="" data-required="true" type="checkbox"><i></i> i agree to the <a href="#" class="text-info">terms of service</a>
                                    </label>
                                </div>
                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs">submit</button>
                            </footer>
                        </section>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form data-validate="parsley">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <span class="h4">contact</span>
                            </header>
                            <div class="panel-body">
                                <p class="text-muted">need support? please fill the fields below.</p>
                                <div class="form-group pull-in clearfix">
                                    <div class="col-sm-6">
                                        <label>your name</label>
                                        <input class="form-control parsley-validated" placeholder="name" data-required="true" type="text">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>email</label>
                                        <input class="form-control parsley-validated" placeholder="enter email" data-required="true" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>your website</label>
                                    <input data-type="url" data-required="true" class="form-control parsley-validated" placeholder="your website url" type="text">
                                </div>
                                <div class="form-group">
                                    <label>message</label>
                                    <textarea class="form-control parsley-validated" rows="6" data-minwords="6" data-required="true" placeholder="type your message"></textarea>
                                </div>
                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs">submit</button>
                            </footer>
                        </section>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <form class="form-horizontal" data-validate="parsley">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <strong>basic constraints</strong>
                            </header>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">required</label>
                                    <div class="col-sm-9">
                                        <input class="form-control parsley-validated" data-required="true" placeholder="required field" type="text">
                                        <select data-required="true" class="form-control m-t parsley-validated">
                                            <option value="">please choose</option>
                                            <option value="foo">foo</option>
                                            <option value="bar">bar</option>
                                        </select>
                                        <label class="checkbox i-checks">
                                            <input class="parsley-validated" name="inlinecheckbox1" value="option1" data-required="true" data-error-message="you must agree to the site policy." type="checkbox"><i></i> agree to the policy
                                        </label>
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">not blank</label>
                                    <div class="col-sm-9">
                                        <input data-notblank="true" class="form-control parsley-validated" placeholder="not blank field" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">min length</label>
                                    <div class="col-sm-9">
                                        <input data-minlength="6" class="form-control parsley-validated" placeholder="minlength = 6" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">max length</label>
                                    <div class="col-sm-9">
                                        <input data-maxlength="6" class="form-control parsley-validated" placeholder="maxlength = 6" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">range length</label>
                                    <div class="col-sm-9">
                                        <input data-rangelength="[5,10]" class="form-control parsley-validated" placeholder="data-rangelength = [5,10]" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">min</label>
                                    <div class="col-sm-9">
                                        <input data-min="6" class="form-control parsley-validated" placeholder="min = 6" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">max</label>
                                    <div class="col-sm-9">
                                        <input data-max="100" class="form-control parsley-validated" placeholder="max = 100" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">range</label>
                                    <div class="col-sm-9">
                                        <input data-range="[6, 100]" class="form-control parsley-validated" placeholder="data-range = [6, 100]" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">regexp</label>
                                    <div class="col-sm-9">
                                        <input data-regexp="#[a-fa-f0-9]{6}" class="form-control parsley-validated" placeholder="hexa color code" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">equal to</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-6"><input value="foo" id="foo" class="form-control" type="text"></div>
                                            <div class="col-sm-6"><input data-equalto="#foo" placeholder="equal to foo" class="form-control parsley-validated" type="text"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs">submit</button>
                            </footer>
                        </section>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form class="form-horizontal" data-validate="parsley">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <strong>type constraints</strong>
                            </header>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control parsley-validated" data-type="email" data-required="true" placeholder="email" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">url</label>
                                    <div class="col-sm-9">
                                        <input data-type="url" class="form-control parsley-validated" placeholder="url" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">url strict</label>
                                    <div class="col-sm-9">
                                        <input data-type="urlstrict" class="form-control parsley-validated" placeholder="urlstrict" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">digits</label>
                                    <div class="col-sm-9">
                                        <input data-type="digits" class="form-control parsley-validated" placeholder="digits" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">number</label>
                                    <div class="col-sm-9">
                                        <input data-type="number" class="form-control parsley-validated" placeholder="number" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">alphanum</label>
                                    <div class="col-sm-9">
                                        <input data-type="alphanum" class="form-control parsley-validated" placeholder="alphanumeric string" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">date iso</label>
                                    <div class="col-sm-9">
                                        <input data-type="dateiso" class="form-control parsley-validated" placeholder="yyyy-mm-dd" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">phone</label>
                                    <div class="col-sm-9">
                                        <input data-type="phone" class="form-control parsley-validated" placeholder="(xxx) xxxx xxx" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">min words</label>
                                    <div class="col-sm-9">
                                        <input data-minwords="6" class="form-control parsley-validated" placeholder="min 6 words" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">max words</label>
                                    <div class="col-sm-9">
                                        <input data-maxwords="6" class="form-control parsley-validated" placeholder="max 6 words" type="text">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">range words</label>
                                    <div class="col-sm-9">
                                        <input data-rangewords="[6,10]" class="form-control parsley-validated" placeholder="min 6 words &amp; max 10 words" type="text">
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs">submit</button>
                            </footer>
                        </section>
                    </form>
                </div>
            </div>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>