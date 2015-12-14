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
                        <div class="panel-body">
                            <form class="form-horizontal" method="get">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">标题</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text">
                                        <span class="help-block m-b-none">这里是提示语言</span>
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">关键字</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text">
                                        <span class="help-block m-b-none">这里是提示语言</span>
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Wysiwyg</label>
                                    <div class="col-sm-10">
                                        <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                                            <div class="btn-group">
                                                <a data-original-title="Font" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title=""><i class="fa fa-font"></i><b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li><a data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li><li><a data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li><li><a data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li><li><a data-edit="fontName Arial Black" style="font-family:'Arial Black'">Arial Black</a></li><li><a data-edit="fontName Courier" style="font-family:'Courier'">Courier</a></li><li><a data-edit="fontName Courier New" style="font-family:'Courier New'">Courier New</a></li><li><a data-edit="fontName Comic Sans MS" style="font-family:'Comic Sans MS'">Comic Sans MS</a></li><li><a data-edit="fontName Helvetica" style="font-family:'Helvetica'">Helvetica</a></li><li><a data-edit="fontName Impact" style="font-family:'Impact'">Impact</a></li><li><a data-edit="fontName Lucida Grande" style="font-family:'Lucida Grande'">Lucida Grande</a></li><li><a data-edit="fontName Lucida Sans" style="font-family:'Lucida Sans'">Lucida Sans</a></li><li><a data-edit="fontName Tahoma" style="font-family:'Tahoma'">Tahoma</a></li><li><a data-edit="fontName Times" style="font-family:'Times'">Times</a></li><li><a data-edit="fontName Times New Roman" style="font-family:'Times New Roman'">Times New Roman</a></li><li><a data-edit="fontName Verdana" style="font-family:'Verdana'">Verdana</a></li></ul>
                                            </div>
                                            <div class="btn-group">
                                                <a data-original-title="Font Size" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title=""><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li><a data-edit="fontSize 5" style="font-size:24px">Huge</a></li>
                                                    <li><a data-edit="fontSize 3" style="font-size:18px">Normal</a></li>
                                                    <li><a data-edit="fontSize 1" style="font-size:14px">Small</a></li>
                                                </ul>
                                            </div>
                                            <div class="btn-group">
                                                <a data-original-title="Bold (Ctrl/Cmd+B)" class="btn btn-default btn-sm" data-edit="bold" title=""><i class="fa fa-bold"></i></a>
                                                <a data-original-title="Italic (Ctrl/Cmd+I)" class="btn btn-default btn-sm" data-edit="italic" title=""><i class="fa fa-italic"></i></a>
                                                <a data-original-title="Strikethrough" class="btn btn-default btn-sm" data-edit="strikethrough" title=""><i class="fa fa-strikethrough"></i></a>
                                                <a data-original-title="Underline (Ctrl/Cmd+U)" class="btn btn-default btn-sm" data-edit="underline" title=""><i class="fa fa-underline"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a data-original-title="Bullet list" class="btn btn-default btn-sm" data-edit="insertunorderedlist" title=""><i class="fa fa-list-ul"></i></a>
                                                <a data-original-title="Number list" class="btn btn-default btn-sm" data-edit="insertorderedlist" title=""><i class="fa fa-list-ol"></i></a>
                                                <a data-original-title="Reduce indent (Shift+Tab)" class="btn btn-default btn-sm" data-edit="outdent" title=""><i class="fa fa-dedent"></i></a>
                                                <a data-original-title="Indent (Tab)" class="btn btn-default btn-sm" data-edit="indent" title=""><i class="fa fa-indent"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a data-original-title="Align Left (Ctrl/Cmd+L)" class="btn btn-default btn-sm" data-edit="justifyleft" title=""><i class="fa fa-align-left"></i></a>
                                                <a data-original-title="Center (Ctrl/Cmd+E)" class="btn btn-default btn-sm" data-edit="justifycenter" title=""><i class="fa fa-align-center"></i></a>
                                                <a data-original-title="Align Right (Ctrl/Cmd+R)" class="btn btn-default btn-sm" data-edit="justifyright" title=""><i class="fa fa-align-right"></i></a>
                                                <a data-original-title="Justify (Ctrl/Cmd+J)" class="btn btn-default btn-sm" data-edit="justifyfull" title=""><i class="fa fa-align-justify"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a data-original-title="Hyperlink" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title=""><i class="fa fa-link"></i></a>
                                                <div class="dropdown-menu">
                                                    <div class="input-group m-l-xs m-r-xs">
                                                        <input class="form-control input-sm" placeholder="URL" data-edit="createLink" type="text">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default btn-sm" type="button">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a data-original-title="Remove Hyperlink" class="btn btn-default btn-sm" data-edit="unlink" title=""><i class="fa fa-cut"></i></a>
                                            </div>

                                            <div class="btn-group hide">
                                                <a data-original-title="Insert picture (or just drag &amp; drop)" class="btn btn-default btn-sm" title="" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                                <input style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 0px; height: 0px;" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" type="file">
                                            </div>
                                            <div class="btn-group">
                                                <a data-original-title="Undo (Ctrl/Cmd+Z)" class="btn btn-default btn-sm" data-edit="undo" title=""><i class="fa fa-undo"></i></a>
                                                <a data-original-title="Redo (Ctrl/Cmd+Y)" class="btn btn-default btn-sm" data-edit="redo" title=""><i class="fa fa-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div id="editor" class="form-control" style="overflow:scroll;height:150px;max-height:150px" contenteditable="true">
                                            Go ahead…
                                        </div>
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">封面图</label>
                                    <div class="col-sm-10">
                                        <input name="password" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                            </form>
                        </div>
                    </section>
                </div>
                <div class="col-sm-4">
                    <form class="form-horizontal">
                        <section class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">分类</label>
                                    <div class="col-sm-8">
                                        <select class="form-control">
                                            <option value="foo">foo</option>
                                            <option value="bar">bar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">属性</label>
                                    <div class="col-sm-4">
                                        <select class="form-control">
                                            <option value="">置顶</option>
                                            <option value="foo">foo</option>
                                            <option value="bar">bar</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control">
                                            <option value="">草稿</option>
                                            <option value="foo">foo</option>
                                            <option value="bar">bar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">设置</label>
                                    <div class="col-sm-4">
                                        <select class="form-control">
                                            <option value="">公开</option>
                                            <option value="foo">foo</option>
                                            <option value="bar">bar</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control">
                                            <option value="">评论</option>
                                            <option value="foo">foo</option>
                                            <option value="bar">bar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs">发  布</button>
                            </footer>
                        </section>
                    </form>
                </div>
            </div>
        </section>
    </section>
</section>