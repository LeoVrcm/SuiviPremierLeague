

    <div id="logo">
        <a href="/SuiviPremierLeague/index.php" ><img src="/SuiviPremierLeague/images/General/Header/PLLogo.png"/></a>
    </div>
    <div id="navMenu">
        <a class="navMenuBtn" href="/SuiviPremierLeague/boundaries/TablesIHM.php">Tables</a>
        <a id="fixturesBtn" class="navMenuBtn" href="/SuiviPremierLeague/boundaries/FixturesIHM.php">Fixtures</a>
        <a class="navMenuBtn" href="/SuiviPremierLeague/boundaries/MyClubIHM.php?teamName=<?php echo $_SESSION['userTeam']; ?>">My Club</a>
    </div>
    <div id="userMenu">
        
        <?php 
        if(isset($_SESSION['idUser'])){
        ?>
        
        <a class="userMenuBtn" href="/SuiviPremierLeague/boundaries/AccountIHM.php"><?php echo $_SESSION['username']; ?></a>
        <a class="userMenuBtn" id="logOutBtn" href="/SuiviPremierLeague/controls/LogoutCTRL.php">Log out</a>
        
        <?php
        } else {
        ?>
        
        <a class="userMenuBtn" href="/SuiviPremierLeague/boundaries/LoginIHM.php">Log in</a>
        <a class="userMenuBtn" href="/SuiviPremierLeague/boundaries/RegisterIHM.php">Register</a> 
                
        <?php
        }                
        ?>
        
    </div>
    

