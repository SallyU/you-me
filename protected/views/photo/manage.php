<?php $this->pageTitle = Yii::app()->name . ' - 照片管理'; ?>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none">照片管理</h3>
            </div>
            <section class="panel panel-default">
                <div class="row wrapper">
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control input-s-sm inline v-middle">
                            <option value="0">bulk action</option>
                            <option value="1">delete selected</option>
                            <option value="2">bulk edit</option>
                            <option value="3">export</option>
                        </select>
                        <button class="btn btn-sm btn-default">apply</button>
                    </div>
                    <div class="col-sm-4 m-b-xs">
                        <div class="btn-group">
                            <label class="btn btn-sm btn-default">
                                <a href="<?php echo $this->createUrl('photo/open'); ?>">一键公开所有照片</a>
                            </label>
                            <label class="btn btn-sm btn-default">
                                <a>一键保密所有照片</a>
                            </label>
                        </div>
                    </div>
                    <div class="pull-right col-sm-3">
                        <div class="input-group">
                            <input class="input-sm form-control" placeholder="search" type="text">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">go!</button>
                      </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;"><label class="checkbox m-n i-checks"><input type="checkbox"><i></i></label></th>
                            <th class="th-sortable" data-toggle="class">project
                          <span class="th-sort">
                            <i class="fa fa-sort-down text"></i>
                            <i class="fa fa-sort-up text-active"></i>
                            <i class="fa fa-sort"></i>
                          </span>
                            </th>
                            <th>task</th>
                            <th>date</th>
                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><label class="checkbox m-n i-checks"><input name="post[]" type="checkbox"><i></i></label></td>
                            <td>
                                <a class="pull-left thumb thumb-wrapper m-t-xs">
                                    <img src="<?php echo Yii::app()->request->baseUrl;?>/src/default/testImg/m1.jpg">
                                </a>
                                (name)
                            </td>
                            <td>4c</td>
                            <td>jul 25, 2013</td>
                            <td>
                                <a href="#" class="active" data-toggle="class">
                                    <i class="fa fa-check text-success text-active"></i>
                                    <i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="checkbox m-n i-checks"><input name="post[]" type="checkbox"><i></i></label></td>
                            <td>formasa</td>
                            <td>8c</td>
                            <td>jul 22, 2013</td>
                            <td>
                                <a href="#" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="checkbox m-n i-checks"><input name="post[]" type="checkbox"><i></i></label></td>
                            <td>avatar system</td>
                            <td>15c</td>
                            <td>jul 15, 2013</td>
                            <td>
                                <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="checkbox m-n i-checks"><input name="post[]" type="checkbox"><i></i></label></td>
                            <td>throwdown</td>
                            <td>4c</td>
                            <td>jul 11, 2013</td>
                            <td>
                                <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="checkbox m-n i-checks"><input name="post[]" type="checkbox"><i></i></label></td>
                            <td>idrawfast</td>
                            <td>4c</td>
                            <td>jul 7, 2013</td>
                            <td>
                                <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="checkbox m-n i-checks"><input name="post[]" type="checkbox"><i></i></label></td>
                            <td>formasa</td>
                            <td>8c</td>
                            <td>jul 3, 2013</td>
                            <td>
                                <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="checkbox m-n i-checks"><input name="post[]" type="checkbox"><i></i></label></td>
                            <td>avatar system</td>
                            <td>15c</td>
                            <td>jul 2, 2013</td>
                            <td>
                                <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="checkbox m-n i-checks"><input name="post[]" type="checkbox"><i></i></label></td>
                            <td>videodown</td>
                            <td>4c</td>
                            <td>jul 1, 2013</td>
                            <td>
                                <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-4 hidden-xs">
                            <select class="input-sm form-control input-s-sm inline v-middle">
                                <option value="0">bulk action</option>
                                <option value="1">delete selected</option>
                                <option value="2">bulk edit</option>
                                <option value="3">export</option>
                            </select>
                            <button class="btn btn-sm btn-default">apply</button>
                        </div>
                        <div class="col-sm-4 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div>
                        <div class="col-sm-4 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </section>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>