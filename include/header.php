<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header navbar-left">
            <button class="navbar-toggle" data-toggle="collapse" data-target="#example" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="color:white;font-weight:bold">Core Index</a>
        </div>
        
        <div class="collapse navbar-collapse" id="example">
            <ul class="nav navbar-nav">
                <li class="<?php echo $_SERVER['PHP_SELF']=="/Core/index.php"?"active":" " ?> "> <a href="index.php">Players</a></li>
                <li class="<?php echo $_SERVER['PHP_SELF']=="/Core/leagues.php"?"active":" " ?> "> <a href="leagues.php">Competitions</a></li>
                <li class="<?php echo $_SERVER['PHP_SELF']=="/Core/clubs.php"?"active":" " ?> "> <a href="clubs.php">Clubs</a></li>
                
                <?php if( isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'admin' && isset($_SESSION['user_name']) ): ?>
                
                <li class="<?php echo $_SERVER['PHP_SELF']=="/Core/community.php"?"active":" " ?> "> <a href="community.php">Developers</a></li>
                
                <?php endif ?>
                
            </ul>
            <form class="navbar-form navbar-left" role="search"> 
                <div class="dropdown form-group" id="dropdown_menu">
                    <input type="search" class="form-control" style="padding:15px;width:300px;border-radius:5px" id="search_box" data-toggle="dropdown" autocomplete="off" placeholder="Search For a Player...">
                        <ul class="dropdown-menu" style='width:300px;z-index:3'>
                            <li style='padding:10px'> No Results*****</li>
                        </ul>
                </div>
            </form>
            
            <!-- SHOW SIGN IN BUTTON ONLY IF USER ISNT SIGNED IN -->
            <!-- OTHERWISE SHOW LOGOUT BUTTON -->
            <?php if( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) ): ?>
            
            <div class="navbar-right dropdown">  
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top:7px">
                    <span style="font-size:17px;font-weight:bold">
                        <?php echo $_SESSION['user_name'] ?>
                    </span>
                    <span class="caret"></span>
                </button>

                <ul class="dropdown-menu">
                    <?php if( isset($_SESSION['user_id']) && $_SESSION['user_type']==="admin" && isset($_SESSION['user_name']) ): ?>
                        <li><a style="color:red;font-weight:bold">(Admin Account)</a></li>
                        <li class="divider"></li>
                    <?php endif ?>                    
                    
                    <li><a href="include/log_out.php" title="Logout?">Logout</a></li>
                    <li class="divider"></li>
                    
                    <!-- Settings page later
                     <li><a href="#">Settings</a></li> -->
                </ul>
            </div>
            
			<?php elseif( !isset($_SESSION['user_id']) && !isset($_SESSION['user_name']) ): ?>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="sign_in.php" title="Click here to logout">Sign-In <span class="glyphicon glyphicon-user"></span> </a>
                    </li>
                </ul>
            </div>
            
			<?php endif ?>
            
        </div>  
    </div> 
</nav>