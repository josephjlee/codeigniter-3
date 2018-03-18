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
                            <i class="fa fa-list-alt fa-fw"></i> League Standing List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">                            
                            <div class="dataTable_wrapper">
                                <table id="defaultTables"  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($standing_league_list as $row) { ?>
                                        <tr>
                                            <td><?= $row->lId ?></td>
                                            <td><?= $row->date ?></td>
                                            <td align="center">
                                                <button onclick="removeLeague(<?= $row->lId ?>)" type="button" class="btn btn-danger btn-outline btn-xs">
                                                    <i class="fa fa-times"> Remove</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php    } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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
