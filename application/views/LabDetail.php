<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FunCompro Check</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets') ?>/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets') ?>/css/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets') ?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url('assets') ?>/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('assets') ?>/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Morris Charts CSS
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets') ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">FunCompro</a>
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Lab<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php
                            foreach ($menuAll as $value){
                                if ($value->type == "Lab"){
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url('index.php\Welcome\Lab\\') . $value->foldername ?>"><?php echo $value->foldername ?></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Homework<span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php
                            foreach ($menuAll as $value){
                                if ($value->type == "Homework"){
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url('index.php\Welcome\Homework\\') . $value->foldername ?>"><?php echo $value->foldername ?></a>
                                    </li>
                                    <?php
                                }}
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                   id="dataTables-example">
                                <thead>
                                <tr>
                                    <th width='30%'>FileName</th>
                                    <th width='30%'>StudentID</th>
                                    <th width='30%'>SubmitTime</th>

									<th>filedetail</th>
                                    <th>ResultCheck</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($submitFile as $value) {
//                                    print_r($value);
                                    ?>
                                    <tr>
                                        <td><?=$value->filename?></td>
                                        <td><?=$value->studentid?></td>
                                        <td><?=$value->submittime?></td>

										<td><?=$value->filedetail?></td>
                                        <td><?php foreach ($value->result as $key=>$vdetail){
                                            echo $vdetail->result;
                                            } ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>

        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets') ?>/js/jquery3.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets') ?>/js/bootstrap.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets') ?>/js/metisMenu.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets') ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets') ?>/js/dataTables.responsive.js"></script>

<!-- Morris Charts JavaScript
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>-->

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets') ?>/js/sb-admin-2.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>

</html>
