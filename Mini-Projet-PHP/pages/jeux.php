<?php
    is_connect(); 
    echo 'Bienvenue ' .$_SESSION['user']['login'];
    //require_once("./traitements/fonction.php");   
?>
<div class="bj-container">
    <div class="bj-container-header">
        <div class="image">
            <a href="#"><img src="./public/images/upload/<?php echo $_SESSION['user']['avatar']?>" alt="img"></a>
        </div>
            <div class="bj-title"> BIENVENUE SUR LA PLATEFORME DE JEUX<br>
                JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</div>
                 <a href="PageConnexion.php"><button type="submit" class="btn-form-2" name="deconnexion" >Deconnection</button></a>
    </div>
    <div class="bj-1-container">
        <div class="bj-2-container">
            <div class="bjj">
                <div class="bj-3-container">
                    <h4>Question 1/5:</h4><br>
                    <h5>Les Langages Web</h5> 
                </div>
            </div>
            <!--<div class="blog-score">-->
                <div class="title-score">Top Scores
                     <div class="list-score">
                        <table >
                            <thead>
                                <tr>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                                <?php
                                    list_meilleur_score();
                                ?>
                           
                        </table>
                  </div>
                </div>
           <!--</div>-->
        </div>
    </div>
</div>


