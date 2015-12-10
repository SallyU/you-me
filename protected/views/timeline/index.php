<section id="content">
    <section class="hbox stretch">
<?php if(!Yii::app()->user->isGuest){?>
        <aside class="aside-lg bg-light b-r" id="aside">
            <div class="wrapper">
                <h4 class="m-t-none">Timeline</h4>
                <form>
                    <div class="form-group">
                        <label>Name</label>
                        <input placeholder="Event name" class="input-sm form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input placeholder="Event name" class="datepicker input-sm form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input placeholder="eg. 3:00 pm" class="input-sm form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <div>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle">
                                    <span class="dropdown-label">Choose a type</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-select">
                                    <li><input name="d-s-r" type="radio"><a href="#">Travel</a></li>
                                    <li class=""><input name="d-s-r" type="radio"><a href="#">Phone</a></li>
                                    <li class=""><input name="d-s-r" type="radio"><a href="#">Meeting</a></li>
                                    <li class=""><input name="d-s-r" type="radio"><a href="#">Appointment</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-lg"><button class="btn btn-sm btn-default">Add an event</button></div>
                </form>
            </div>
        </aside>
<?php } ?>


        <aside>
            <section class="vbox">
                <section class="scrollable wrapper">
                    <div class="timeline">
                        <article class="timeline-item active">
                            <div class="timeline-caption">
                                <div class="panel bg-primary lt no-borders">
                                    <div class="panel-body">
                                        <span class="timeline-icon"><i class="fa fa-bell-o time-icon bg-primary"></i></span>
                                        <span class="timeline-date">7:30 am</span>
                                        <div class="text-sm">Wake up</div>
                                        <h5>Me</h5>
                                        <div class="m-t-sm timeline-action">
                                            <span class="h3 pull-left m-r-sm">4:51</span>
                                            <button class="btn btn-sm btn-default btn-bg"><i class="fa fa-pause"></i> Pause</button>
                                            <button class="btn btn-sm btn-default btn-bg"><i class="fa fa-check"></i> Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item">
                            <div class="timeline-caption">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <span class="arrow left"></span>
                                        <span class="timeline-icon"><i class="fa fa-phone time-icon bg-primary"></i></span>
                                        <span class="timeline-date">12:25 am</span>
                                        <div class="text-sm">Call to</div>
                                        <h5>
                                            Jason Cokde (021-254-3523)
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-caption">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <span class="arrow right"></span>
                                        <span class="timeline-icon"><i class="fa fa-male time-icon bg-success"></i></span>
                                        <span class="timeline-date">10:00 am</span>
                                        <div class="text-sm">Appointment</div>
                                        <h5>
                                            Carmark Sook (.inc company)
                                        </h5>
                                        <p>Morbi nec nunc condimentum, egestas dui nec, </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item">
                            <div class="timeline-caption">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <span class="arrow left"></span>
                                        <span class="timeline-icon"><i class="fa fa-plane time-icon bg-dark"></i></span>
                                        <span class="timeline-date">8:00 am</span>
                                        <div class="text-sm">Fly to</div>
                                        <h5>
                                            Newyork City
                                        </h5>
                                        <p>82°, Very hot with some sun</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-caption">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <span class="arrow right"></span>
                                        <span class="timeline-icon"><i class="fa fa-file-text time-icon bg-info"></i></span>
                                        <span class="timeline-date">9:30 am</span>
                                        <div class="text-sm">Meeting</div>
                                        <h5>
                                            Office A - 2 floor
                                        </h5>
                                        <p>Iaculis lorem justo porttitor orci. Vivamus vestibulum tortor augue. Donec elementum mollis velit.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item">
                            <div class="timeline-caption">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <span class="arrow left"></span>
                                        <span class="timeline-icon"><i class="fa fa-code time-icon bg-dark"></i></span>
                                        <span class="timeline-date">9:00 am</span>
                                        <div class="text-sm">Work on</div>
                                        <h5>
                                            Web application project
                                        </h5>
                                        <p>Iaculis lorem justo porttitor orci. Donec elementum mollis velit.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="timeline-footer"><a href="#"><i class="fa fa-plus time-icon inline-block bg-dark"></i></a></div>
                    </div>
                </section>
            </section>
        </aside>

    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>