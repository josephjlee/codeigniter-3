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
                            <i class="fa fa-list-alt fa-fw"></i> Liputan League List
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary btn-xs add_league">
                                    <i class="fa fa-plus fa-fw"></i>Add League
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
                                    <?php foreach ($db_league_list as $row) { ?>
                                        <tr>
                                            <td><?= $row->lId ?></td>
                                            <td><?= $row->lName ?></td>
                                            <td align="center">
                                                <button onclick="viewLeague(<?= $row->lId ?>)" type="button" class="btn btn-primary btn-outline btn-xs">
                                                    <i class="fa fa-eye"> View</i>
                                                </button>
                                                <button onclick="activateLeague(<?= $row->lId ?>)" type="button" class="btn btn-success btn-outline btn-xs">
                                                    <i class="fa fa-leaf"> Activate</i>
                                                </button>
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
                <!-- /.col-lg-6 .liputan-->
                <div class="col-lg-6 bolaworld">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-list-alt fa-fw"></i> Bolaworld League List - <span class="sub_name"> ACTIVE</span>
                            <div class="pull-right">
                                <div class="form-group">
                                    <select class="form-control" name="bolaworld_view_list" onchange="viewBolaworldLeagueBy()">
                                        <option value="">View League By</option>
                                        <option value="list_all">ALL</option>
                                        <option value="list_active">ACTIVE</option>
                                        <option value="list_inactive">INACTIVE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <center class="loader_icon"><img src="{base_url}/assets/backend/themes/dist/gif/spin.gif"> Please wait...</center>
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
                                    <?php foreach ($api_league_list as $row) { ?>
                                        <tr>
                                            <td><?= $row['lId'] ?></td>
                                            <td><?= $row['lName'] ?></td>
                                            <td align="center">
                                                <button onclick="copyLeague(<?= $row['lId'] ?>)" type="button" class="btn btn-primary btn-outline btn-xs">
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

            <!-- Modal -->
            <div class="modal fade" id="add_league_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Liputan Add League</h4>
                        </div>
                        <div class="modal-body">                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo form_open_multipart('admin/league/upload_league');?>
                                    <!-- <form role="form" id="add_league_data" enctype="multipart/form-data"> -->
                                        <div class="form-group">
                                            <label>Liputan ID</label>
                                            <input type="number" class="form-control" placeholder="lId" name="lId">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="lName" name="lName">
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control" placeholder="lCountry" name="lCountry">
                                        </div>
                                        <div class="form-group">
                                            <label>CUP</label>
                                            <select class="form-control" name="lCup">
                                                <option>TRUE</option>
                                                <option>FALSE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Logo Upload :</label>
                                            <input type="file" id="logo" name="logo">
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- modal view league -->

            <div class="modal fade" id="view_league_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Liputan League</h4>
                        </div>
                        <div class="modal-body">                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="content_view_leage"></span>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
	</div>
	<!-- /#page-wrapper -->

    <script src="{base_url}assets/backend/themes/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        $(function(){
            $(".add_league").on("click",function(){
                $("#add_league_modal").modal('show');
            });

            /**/
            $(".add_league_btn").on("click",function(){
                var logo = $('[name="logo"]')[0].files[0].name;
                var data = $("#add_league_data").serialize()+"&logo="+logo;
                console.log(logo);
                var url =  '{base_url}admin/league/upload_league';
                $.ajax({
                    type : 'POST', url : url, data:data,
                    success : function(data){
                        console.log(data);
                        window.location.reload(true);
                    },
                    error: function () {
                        console.log("error");
                    }
                });
            });
        });

        var copyLeague = function(lId){             
            var url =  '{base_url}admin/league/copyLeagueListbyId';
            $.ajax({
                type : 'POST', url : url, data:{lId:lId},
                success : function(data){
                   // var data = data.trim();
                    if (data == 'exist') { alert('Data Already exist!'); }
                    window.location.reload(true);
                }
            });
        }

        var removeLeague = function(lId){        
            var url =  '{base_url}admin/league/removeLeagueListbyId';
            $.ajax({
                type : 'POST', url : url, data:{lId:lId},
                success : function(data){
                    window.location.reload(true);
                }
            });
        }

        var viewBolaworldLeagueBy = function(){
            var view_by = $('[name=bolaworld_view_list]').val();    
            if (view_by != '') {                
                var url =  '{base_url}admin/league/api_get_league_list';
                showLoading();
                $.ajax({
                    dataType : 'json', type : 'GET', url : url, data:{view_by:view_by},
                    success : function(data){
                        hideLoading();
                        $(".sub_name").html(setSubname(view_by));    

                        console.log(data[0].lId);
                       /* $(data).each(function(){//loops
                        console.log(this.lId);
                        });*/


                    }
                });
            }
        }

        var viewLeague = function(lId){
            $("#view_league_modal").modal('show');
            $(".content_view_leage").html(lId);
        }

        var activateLeague = function(){
            var con = confirm("You are going to ACTIVATE this league ?");

            if (con) {
                alert();
            }
        }

    </script>
