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
                            <i class="fa fa-list-alt fa-fw"></i> Add Post Form
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="alert alert-success alert-dismissable" style="display:none;">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Successfully! </b> New post ha been successfully added.
                                    </div>
                                    <form role="form" id="add_post">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" placeholder="Title" required="required">
                                        </div>
                                      <!--   <div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Article</label>
                                            <textarea class="summernote form-control" name="content"  required="required"></textarea>
                                        </div>
                                        <br />
                                        <button type="submit" class="btn btn-primary col-lg-2">Publish</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
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
            $("#add_post").on("submit",function(ev){
                ev.preventDefault();
                var title = $('[name="title"]').val();
                var content = $('[name="content"]').val();
                $.ajax({
                    url: '{base_url}admin/post/add_post',
                    type: 'POST',
                    data: {title:title,content:content},
                    success: function (data) {
                        //alert(data);
                        if (data == 'success') {
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
            })
        });
    </script>
