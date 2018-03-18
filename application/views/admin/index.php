
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administrator Login</h3>
                    </div>
                    <div class="panel-body">
		   				<?php echo form_open('admin/index/login'); ?>
		   				<?php echo validation_errors(); ?> 
                            <fieldset>
	                            <?php if (@$_GET['login'] == 'false') { ?>
	                            <div class="alert alert-danger">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  	<strong>Error!</strong> Invalid user login. Please try again!
								</div>
	                            <?php } ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" value="admin" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="admin">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{base_url}/assets/backend/themes/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
    	$(function(){
    		setTimeout(function(){
    			$(".alert").fadeOut();
    		},2500);
    		/*$("#liputan_login").on("submit",function(ev){
    			ev.preventDefault();
    			var __type 	= "POST";
    			var __url 	= "{base_url}backend/login";
    			var __data 	= $(this).serialize();
    			$.ajax({
    				type: __type, url:__url, data :__data,
    				success: function(data){
    					alert(__url);
    				}

    			});
    		});*/
    	});
    </script>
