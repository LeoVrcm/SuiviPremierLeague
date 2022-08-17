<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        
        <meta charset="UTF-8" lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" type="image/png" sizes="32x32" href="images/General/Favicon/favicon-32x32.png">     
        <link type="text/css" rel="stylesheet" href="css/Style.css" media='screen'>

        
    </head>
    <body>

        <header>
            <?php
            include "boundaries/partials/Header.php";
            ?>
        </header>

        <div id="homeBanner">

            <?php
            include "daos/Home/ClubEmblemList.php";
            ?>

        </div>

        <div id="homeMessage">
            Welcome ! 

            <?php
            if (empty($_SESSION['idUser'])) {
                ?>

                <p id="loginMessage"> Don't forget to <a class="underlineLink" href="boundaries/LoginIHM.php">log in</a> for a better experience </p>
                <?php
            }
            ?>
        </div>


        <div id="homeMain">

            <p class="homeMainTitle"> Latest News</p>
            <div id="homePLArticle">

                <?php
                include "daos/Home/NewsArticle.php";
                ?>
            </div>

            <p class="homeMainTitle" id="homePLTOTWMatchday"></p>
            <div id="homePLTOTW">

                <a href="https://www.premierleague.com/news/2439560" target="_blank">
                    <div id="TOTWimageZoom">
                        <img id="homePLTOTWImg" alt="" src="images/Home/TOTW/TOTW21.png"/>
                    </div>
                </a>
                <p class="homeMainInfo">
                    Caoimhin Kelleher (LIV)
                    <br>
                    <i>"Produced three outstanding saves and couldn’t do a thing about the two goals Liverpool conceded in their 2-2 draw at Chelsea."</i>
                    <br><br>
                    Mads Roerslev (BRE)
                    <br>
                    <i>"Made a real impact when he got forward into the final third, with a goal and an assist in Brentford's 2-1 win over Aston Villa."</i>
                    <br><br>
                    Conor Coady (WOL)
                    <br>
                    <i>"Marshalled Wolves' defence brilliantly again. Neither Cristiano Ronaldo nor Edinson Cavani got a sniff."</i>
                    <br><br>
                    Dan Burn (BHA)
                    <br>
                    <i>"Scored with a header at one end and made several last-ditch tackles at the other in Brighton & Hove Albion's 3-2 victory at Everton."</i>
                    <br><br>
                    Joao Moutinho (WOL)
                    <br>
                    <i>"He had full control in the midfield and deserved to score the winner. He was the best Portuguese player on the pitch by a long way!"</i>
                    <br><br>
                    Declan Rice (WHU)
                    <br>
                    <i>"Clocking up his 150th Premier League appearance in West Ham United's 3-2 win at Crystal Palace, he seems to be getting better every month. He got another assist this time."</i>
                    <br><br>
                    Mateo Kovacic (CHE)
                    <br>
                    <i>"Brilliant in every department and scored a Goal of the Season contender. The best player in a high-quality match."</i>
                    <br><br>
                    Bukayo Saka (ARS)
                    <br>
                    <i>"An excellent finish in a 2-1 home defeat to Manchester City was the highlight of a very good all-round performance by the Arsenal winger."</i>
                    <br><br>
                    Alexis Mac Allister (BHA)
                    <br>
                    <i>"Scored two excellent and different goals, with a run off the ball into the box and a sublime strike from outside the area."</i>
                    <br><br>
                    Mohamed Salah (LIV)
                    <br>
                    <i>"As soon as he was in behind, a goal seemed inevitable. The run, the skill and the finish were all perfect."</i>
                    <br><br>
                    Manuel Lanzini (WHU)
                    <br>
                    <i>"The man of the match, scoring twice against Palace. He produced brilliant skill and a fine finish in off the crossbar for the first."</i>
                    <br><br>
                    Manager: Bruno Lage (WOL)
                    <br>
                    <i>"Masterminded a superb win at Old Trafford. Wolves were the better team by a mile and deserved their first Premier League victory there."</i>
                </p>

            </div>

            <p class="homeMainTitle"> Premier League history</p>
            <div id="homePLHistory">

                <a href="https://wikipedia.org/wiki/Premier_League" target="_blank">
                    <div class="imageZoom">
                        <img class="homeMainImg" alt="" src="images/Home/Permanent/PL.jpeg"/>
                    </div>
                </a>

                <p class="homeMainInfo">
                    The Premier League, often referred to as the English Premier League or the EPL, is the top level of the English football league system contested by 20 clubs.
                    Seasons run from August to May with each team playing 38 matches (playing all 19 other teams both home and away). Most games are played on Saturday and Sunday afternoons.
                    <br>
                    The competition was founded as the FA Premier League on 20 February 1992 following the decision of clubs in the Football League First Division to break away from the Football League, 
                    founded in 1888, and take advantage of a lucrative television rights sale to Sky.
                    <br> 
                    The Premier League is the most-watched sports league in the world, broadcast in 212 territories to 643 million homes and a potential TV audience of 4.7 billion people.
                    Fifty clubs have competed since the inception of the Premier League in 1992: forty-eight English and two Welsh clubs. 
                    Seven of them have won the title: Manchester United (13), Chelsea (5), Manchester City (5), Arsenal (3), Blackburn Rovers (1), Leicester City (1) and Liverpool (1).
                    <br>
                    The Premier League ranks first in the UEFA coefficients of leagues based on performances in European competitions over the past five seasons as of 2021.
                    The English top-flight has produced the second-highest number of UEFA Champions League/European Cup titles, with five English clubs having won fourteen European trophies in total.

                </p>

            </div>


            <p class="homeMainTitle"> All-time honours</p>
            <div id="homePLHonours">

                <p class="homeMainInfo">

                    Most titles by a team 
                    <br>
                    Most titles by a manager 
                    <br>
                    Most titles by a player 
                    <br>
                    Longest unbeaten run
                    <br>
                    Most wins
                    <br>
                    Most goals by a team
                    <br>
                    Most apparences 
                    <br>
                    Most goals 
                    <br>
                    Most assists 
                    <br>
                    Most clean sheets 


                </p>

                <p class="homeMainInfo">

                    Manchester United (13)
                    <br>
                    Sir Alex Ferguson (13)
                    <br>
                    Ryan Giggs (13)
                    <br>
                    Arsenal (49)
                    <br>
                    Manchester United (696)
                    <br>
                    Manchester United (2158)
                    <br>
                    Gareth Barry (653)
                    <br>
                    Alan Shearer (260)
                    <br>
                    Ryan Giggs (162)
                    <br>
                    Petr Cech (202)

                </p>

                <a href="https://www.premierleague.com/stats/all-time" target="_blank">
                    <div class="imageZoom">
                        <img class="homeMainImg" alt="" src="images/Home/Permanent/SAF.jpeg"/>
                    </div>
                </a>

            </div>

        </div>

        <div id="sponsorBanner">
            <img id="sponsorBannerImg" alt="" src="images/Home/Permanent/Sponsor.jpeg"/>
        </div>

        <footer>
            <?php
            include "boundaries/partials/Footer.php";
            ?>
        </footer>
        <script src="js/jquery.js"></script>
        <script src="js/index.js"></script>
    </body> 
</html>