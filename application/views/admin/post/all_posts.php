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
                            <i class="fa fa-list-alt fa-fw"></i> All Posts
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="alert alert-success fade in" style="display:none">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                <strong>Success!</strong> Post has been successfully deleted !
                            </div>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Categories</th>
                                            <th>Tags</th>
                                            <th>Comments</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php  foreach ($user_list as $row) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->author ?></td>
                                            <td><?= $row->categories ?></td>
                                            <td><?= $row->tags ?></td>
                                            <td><?= $row->comments ?></td>
                                            <td><?= $row->date ?></td>
                                            <td class="center">
                                            	<button type="button" class="btn btn-primary btn-outline btn-xs" onclick="viewPost(<?= $row->id ?>)"><i class="fa fa-eye"></i></button> 
                                            	<button type="button" class="btn btn-warning btn-outline btn-xs" onclick="editPost(<?= $row->id ?>)"><i class="fa fa-pencil-square-o"></i></button> 
                                            	<button type="button" class="btn btn-danger btn-outline btn-xs" onclick="deletePost(<?= $row->id ?>)"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    	<?php	} ?>
                                    </tbody>
                                </table>
                            </div>                            
                            <!-- Modal -->
                            <div class="modal fade" id="view_content_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><span class="post_title"></span></h4>
                                        </div>
                                        <form>
                                            <div class="modal-body">
                                                <div class="post_content"></div>
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
                            <div class="modal fade" id="edit_content_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Post</h4>
                                        </div>
                                        <form id="update_content_form" method="POST">
                                            <div class="modal-body">
                                            <div class="alert alert-success" style="display:none;">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Success!</strong> Post have been successfully updated.
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">Title:</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="summernote" name="edit_content"></textarea>
                                                <input type="hidden" name="id">
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary save">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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

    <script src="{base_url}assets/backend/themes/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        $(function(){
            $("#update_content_form").on("submit",function(){  
                var url = '{base_url}/admin/post/update_post';
                var data = $(this).serialize(); 
                $.ajax({
                   method:"POST", url : url, data : data,
                    success : function(data){      
                        if (data == 1) {
                            $(".alert").show();
                            setTimeout(function(){
                                $(".alert").fadeOut();
                            },3000);
                        }
                        setTimeout(function(){
                            window.location.reload(true);
                        },1000);
                    }
                });
            });
        });
        var viewPost = function(id){
            $("#view_content_modal").modal('show');    
            var url = '{base_url}/admin/post/view_post';
            $.ajax({
                dataType:"json", type : 'GET', url : url, data : {id:id},
                success : function(data){
                    $("div.post_content").html(data[0].content);
                    $(".post_title").html(data[0].title);
                }
            });
        }
        var editPost = function(id){
            $("#edit_content_modal").modal('show');
            $('[name="id"]').val(id);
            var url = '{base_url}/admin/post/view_post';
            $.ajax({
                dataType:"json", type : 'GET', url : url, data : {id:id},
                success : function(data){
                    $('[name="edit_content"]').html(data[0].content);
                    $(".note-editable ").html(data[0].content);
                    $('[name="title"]').val(data[0].title);
                }
            });
        }

        var deletePost = function(id){
            var con = confirm("You are going to delete this post ?");            
            var url = '{base_url}/admin/post/delete_post';
            if(con){
                $.ajax({ type : 'POST', url : url, data : {id:id},
                    success : function(data){
                        $(".alert").show();
                        setTimeout(function(){
                            window.location.reload(true);
                        },1000);
                    }
                });
            }
        }
    </script>
