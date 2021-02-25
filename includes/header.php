<div id="header" class="header navbar-default">
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Talavera's </b>| HOPE</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <ul class="navbar-nav navbar-right">
                <li class="navbar-form">
                    <form action="#" method="POST" name="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>

                <li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/img/user/user-13.jpg" alt="" />
                        <span class="d-none d-md-inline"><?php echo $sess; ?></span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>

        </div>