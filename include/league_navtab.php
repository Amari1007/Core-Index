<nav class="navbar navbar-default navbar-static-top" style="z-index:1">
    <div class="container-fluid">
        <div class="navbar-header navbar-left">
            <button class="navbar-toggle" data-toggle="collapse" data-target="#league_nav" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="league_selected.php?code=<?php echo $code ?>&league_name=<?php echo $league_name ?>&fixtures=<?php echo $code?>-fixtures" style="font-weight:bold"> <?php echo $league_name ?> </a>
        </div>

        <div class="collapse navbar-collapse" id="league_nav">
            <ul class="nav navbar-nav">
                <li><a href="league_selected_fixtures.php?league_name=<?php echo $league_name ?>&fixtures=<?php echo $code ?>-fixtures&code=<?php echo $code ?>">Scores &amp; Fixtures</a></li>
                <li><a href="league_selected_table.php?league_name=<?php echo $league_name ?>&table=<?php echo $code ?>-table&code=<?php echo $code ?>">League Table</a></li>                    
                <li><a href="league_selected_transfers.php?league_name=<?php echo $league_name ?>&table=<?php echo $code ?>-table&code=<?php echo $code ?>">Transfer News</a></li>                    
                <li><a href="league_selected_player_rankings.php?code=<?php echo $code ?>&league_name=<?php echo $league_name ?>">Player Stats</a></li>                   
                <li><a href="league_power_rankings.php?code=<?php echo $code ?>&league_name=<?php echo $league_name ?>">League Power Rankings</a></li>                    
            </ul>
        </div>

    </div>
</nav>