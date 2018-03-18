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
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        View League By 
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Active</a>
                                        </li>
                                        <li><a href="#">Inactive</a>
                                        </li>
                                    </ul>
                                </div>
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
                                                <button onclick="removeLeague()" type="button" class="btn btn-danger btn-outline btn-xs"><i class="fa fa-times"> Remove</i></button>
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
                            <div class="dataTable_wrapper api_table"></div>
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
            $(".add_league").on("click",function(){
                alert("add league!");
            })
        });

        var copyLeague = function(){
            alert("Copt to liputan..");
        }

        var removeLeague = function(){
            alert("Remove this league..");
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

                        var html = '';
                            html+= '$("#leagueTables").DataTable({  responsive: true,"order": [[ 0, "" ]],"lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]] });';
                            html+= '<table id="bolaworldTables"  class="table table-striped table-bordered table-hover">';
                                html+= '<thead>';
                                    html+= '<tr>';
                                        html+= '<th>ID</th>';
                                        html+= '<th>Name</th>';
                                        html+= '<th>Action</th>';
                                    html+= '</tr>';
                                html+= '</thead>';
                                html+= '<tbody>';
                                $(data).each(function(){//loops
                                    html += "<tr>";
                                    html += "<td>"+this.lId+"</td>";
                                    html += "<td>"+this.lName+"</td>";
                                    html += '<td align="center"><a href="#" onclick="copyLeague()" type="button" class="btn btn-primary btn-outline btn-xs">COPY</><a></td>';
                                    html += "<tr>";
                                });
                                html+= '</tbody>';
                            html+= '</table>';
                        $(".api_table").html(html);
                    }
                });
            }
        }
    </script>
