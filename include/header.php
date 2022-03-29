<nav class="navbar navbar-inverse">
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
                <li class="<?php echo $_SERVER['PHP_SELF']=="/Core/leagues.php"?"active":" " ?> "> <a href="leagues.php">Leagues</a></li>
                <li class="<?php echo $_SERVER['PHP_SELF']=="/Core/clubs.php"?"active":" " ?> "> <a href="clubs.php">Clubs</a></li>
                <li class="<?php echo $_SERVER['PHP_SELF']=="/Core/community.php"?"active":" " ?> "> <a href="community.php">Community</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search"> 
                <div class="dropdown form-group" id="dropdown_menu">
                    <input type="search" class="form-control" style="padding:15px;width:300px;border-radius:5px" id="search_box" data-toggle="dropdown" autocomplete="off" placeholder="Search For a Player...">
                        <ul class="dropdown-menu" style='width:300px;z-index:3'>
                            <li style='padding:10px'> No Results*****</li>
                        </ul>
                </div>
            </form>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="sign_in.php">Sign-In <span class="glyphicon glyphicon-user"></span> </a>
                    </li>
                </ul>
            </div>
        </div>  
    </div> 
</nav>