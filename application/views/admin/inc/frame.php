

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
                <a class="navbar-brand" href="{base_url}admin/dashboard">Liputan Bola | Administrator</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{base_url}admin/index/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{base_url}admin/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>                 
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i> League<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{base_url}admin/league/lists">Lists</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/league/standing">Standing</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/league/results">Results</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/league/match">Match</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/league/statistics">Statistics</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>     
                        <li>
                            <a href="{base_url}admin/team"><i class="fa fa-stack-exchange fa-fw"></i> Team</a>
                        </li>                 
                        <li>
                            <a href="#"><i class="fa fa-pencil fa-fw"></i> Posts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{base_url}admin/post/all_posts">All Posts</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/post/add_post">Add New</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/post/category">Category</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/post/tags">Tags</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                 
                        <li>
                            <a href="#"><i class="fa fa-desktop fa-fw"></i> Media<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{base_url}admin/media/library">Library</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/media/add_media">Add New</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                  
                        <li>
                            <a href="#"><i class="fa fa-file-o fa-fw"></i> Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{base_url}admin/page/all_pages">All Pages</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/page/add_page">Add New</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>               
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{base_url}admin/user/all_users"><i class="fa fa-users fa-fw"></i> All Users</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/user/add_user"><i class="fa fa-plus  fa-fw"></i> Add New</a>
                                </li>
                                <li>
                                    <a href="{base_url}admin/user/profile"><i class="fa fa-user  fa-fw"></i> Your Profile</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        