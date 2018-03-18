<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{title}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 liputan">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-list-alt fa-fw"></i> Liputan Team List
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        View By League 
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Active</a>
                                        </li>
                                        <li><a href="#">Inactive</a>
                                        </li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-primary btn-xs add_team">
                                    <i class="fa fa-plus fa-fw"></i>Add Team
                                </button>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table id="leagueTables"  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($db_team_list as $row) { ?>
                                        <tr>
                                            <td><?= $row->mHomeId ?></td>
                                            <td><?= $row->mHome ?></td>
                                            <td align="center">
                                                <button onclick="removeTeam(<?= $row->mHomeId ?>)" type="button" class="btn btn-danger btn-outline btn-xs">
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
                <!-- /.col-lg-6 .liputan-->
                <div class="col-lg-6 bolaworld">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-list-alt fa-fw"></i> Bolaworld Team List - <span class="sub_name"> English Premier</span>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        View By League 
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">English Premier</a>
                                        </li>
                                        <li><a href="#">Inactive</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table id="bolaworldTables"  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($api_team_list as $row) { ?>
                                        <tr>
                                            <td><?= $row['mHomeId'] ?></td>
                                            <td><?= $row['mHome'] ?></td>
                                            <td align="center">
                                                <button onclick="copyTeam(<?= $row['mHomeId'] ?>)" type="button" class="btn btn-primary btn-outline btn-xs">
                                                    <i class="fa fa-copy"> COPY</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 .bolaworld-->
            </div>
            <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

    <script src="{base_url}assets/backend/themes/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        $(function(){
            $(".add_team").on("click",function(){
                alert("add team!");
            })
        });

        var copyTeam = function(mHomeId){        
            var url =  '{base_url}admin/team/copyTeamListbyId';
            $.ajax({
                type : 'POST', url : url, data:{mHomeId:mHomeId},
                success : function(data){
                    if (!data) {
                        alert("Unable to copy!");
                    }
                    window.location.reload(true);
                }
            });
        }

        var removeTeam = function(mHomeId){   
            var url =  '{base_url}admin/team/removeTeamListbyId';
            $.ajax({
                type : 'POST', url : url, data:{mHomeId:mHomeId},
                success : function(data){
                    window.location.reload(true);
                }
            });
        }
    </script>
