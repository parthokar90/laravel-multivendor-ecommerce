@extends('admin.layout.master')

@section('title') Dashboard @endsection

@section('content')
 
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-danger">
                <i class="far fa-user float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Users</h6>
                <h1 class="m-b-20 text-white counter">487</h1>
                <span class="text-white">12 Today</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-purple">
                <i class="fas fa-download float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Downloads</h6>
                <h1 class="m-b-20 text-white counter">290</h1>
                <span class="text-white">12 Today</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-warning">
                <i class="fas fa-shopping-cart float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                <h1 class="m-b-20 text-white counter">320</h1>
                <span class="text-white">25 Today</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-info">
                <i class="far fa-envelope float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Messages</h6>
                <h1 class="m-b-20 text-white counter">58</h1>
                <span class="text-white">5 New</span>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-chart-bar"></i> Chart 1</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                </div>

                <div class="card-body">
                    <canvas id="comboBarLineChart"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <!-- end card-->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-chart-bar"></i> Chart 2</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                </div>
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <!-- end card-->
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-history"></i> Tasks progress</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </div>
                <div class="card-body">
                    <p class="font-600 mb-1">Task completed <span class="text-info pull-right"><b>100%</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="mb-3"></div>
                    <p class="font-600 mb-1">Task 1 <span class="text-primary pull-right"><b>95%</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="95">
                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <p class="font-600 mb-1">Task 2 <span class="text-primary pull-right"><b>88%</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="88">
                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <p class="font-600 mb-1">Task 3 <span class="text-info pull-right"><b>75%</b></span>
                    </p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-info" role="progressbar" style="width: 78%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <p class="font-600 mb-1">Task 4 <span class="text-info pull-right"><b>70%</b></span>
                    </p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                        </div>
                    </div>

                    <div class="mb-3"></div>

                    <p class="font-600 mb-1">Task 5 <span class="text-warning pull-right"><b>68%</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="68">
                        </div>
                    </div>

                    <div class="mb-3"></div>

                    <p class="font-600 mb-1">Task 6 <span class="text-warning pull-right"><b>65%</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65">
                        </div>
                    </div>

                    <div class="mb-3"></div>

                    <p class="font-600 mb-1">Task 7 <span class="text-danger pull-right"><b>55%</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                        </div>
                    </div>

                    <div class="mb-3"></div>

                    <p class="font-600 mb-1">Task 8 <span class="text-danger pull-right"><b>40%</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40">
                        </div>
                    </div>

                    <div class="mb-3"></div>

                    <p class="font-600 mb-1">Task 9 <span class="text-danger pull-right"><b>20%</b></span></p>
                    <div class="progress">
                        <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">
                        </div>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
            </div>
            <!-- end card-->
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-envelope"></i> Latest messages</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </div>

                <div class="card-body">

                    <div class="widget-messages nicescroll" style="height: 550px;">
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">John Doe</p>
                                <p class="message-item-msg">Hello. I want to buy your product</p>
                                <p class="message-item-date">11:50 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Ashton Cox</p>
                                <p class="message-item-msg">Great job for this task</p>
                                <p class="message-item-date">14:25 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Colleen Hurst</p>
                                <p class="message-item-msg">I have a new project for you</p>
                                <p class="message-item-date">13:20 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Fiona Green</p>
                                <p class="message-item-msg">Nice to meet you</p>
                                <p class="message-item-date">15:45 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Donna Snider</p>
                                <p class="message-item-msg">I have a new project for you</p>
                                <p class="message-item-date">15:45 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Garrett Winters</p>
                                <p class="message-item-msg">I have a new project for you</p>
                                <p class="message-item-date">15:45 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Herrod Chandler</p>
                                <p class="message-item-msg">Hello! I'm available for this job</p>
                                <p class="message-item-date">15:45 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Jena Gaines</p>
                                <p class="message-item-msg">I have a new project for you</p>
                                <p class="message-item-date">15:45 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Airi Satou</p>
                                <p class="message-item-msg">I have a new project for you</p>
                                <p class="message-item-date">15:45 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Brielle Williamson</p>
                                <p class="message-item-msg">I have a new project for you</p>
                                <p class="message-item-date">15:45 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Jena Gaines</p>
                                <p class="message-item-msg">I have a new project for you</p>
                                <p class="message-item-date">16:30 AM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="message-item">
                                <p class="message-item-user">Airi Satou</p>
                                <p class="message-item-msg">I have a new project for you</p>
                                <p class="message-item-date">18:55 AM</p>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
            </div>
            <!-- end card-->
        </div>

        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-user-friends"></i> Users details</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Extn.</th>
                                    <th>Date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- end table-responsive-->

                </div>
                <!-- end card-body-->
            </div>
            <!-- end card-->
        </div>
    </div>
    <!-- end row-->
</div>
<!-- END container-fluid -->
@endsection 
