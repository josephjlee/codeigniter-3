<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{title}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-list-alt fa-fw"></i> All Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Post</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php  foreach ($user_list as $row) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $row->name ?></td>
                                            <td><?= $row->username ?></td>
                                            <td><?= $row->email ?></td>
                                            <td><?= $row->type ?></td>
                                            <td></td>
                                            <td class="center">
                                            	<button type="button" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-eye"></i></button> 
                                            	<button type="button" class="btn btn-warning btn-outline btn-xs"><i class="fa fa-pencil-square-o"></i></button> 
                                            	<button type="button" class="btn btn-danger btn-outline btn-xs"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    	<?php	} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
