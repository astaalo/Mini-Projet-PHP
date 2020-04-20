<?php
require_once("./traitements/fonction.php");
if(isset($_POST['btn_submit'])){
    $data=array(
        "prenom"=> $_POST["prenom"],
        "nom"=> $_POST["nom"],
        "login"=> $_POST["login"],
        "pwd"=> $_POST["pwd"],
        "role"=>"admin",
        "score"=>"0"   
    );
    $resultat=login_exist_and_data_valid($data);

    echo 'Inscription Reussie';
}
?>
    <div class="b-container">
        <div class="b-header">
            <div class="b-title">CREER ET PARAMETREZ VOS QUIZZ</div>
                <a href="index.php?statut=logout"><button type="submit" class="btn-form-2" name="deconnexion">Deconnection</button></a>
        </div>
            <div class="b-body">
                    <div class="avatar-joueur">
                        <a href="#"><img src="./public/images/img5.jpg" alt=""></a>
                        <h3>Avatar Joueur</h3>
                    </div>
                        <div class="forml">
                            <form action="" method="POST" id="form-connexion">
                                <?php
                                    if(isset($error)){
                                        echo $error;
                                    }
                                ?>
                                <strong><h4>S'INSCRIRE</h4></strong><br>
                                <h5>Pour tester votre niveau</h5><br>
                                <div class="form-input">
                                    <label for="Prenom">Prenom</label>
                                    <input type="text" class="form-control" error="error-1" name="prenom" id="" placeholder="Prenom ">
                                    <div class="error-form" id="error1"></div>
                                </div>
                                <div class="form-input">
                                    <label for="Prenom">Nom</label>
                                    <input type="text" class="form-control" error="error-1" name="nom" id="" placeholder="Nom ">
                                    <div class="error-form" id="error1"></div>
                                </div>
                                <div class="form-input">
                                    <label for="Prenom">Login</label>
                                    <input type="text" class="form-control" error="error-1" name="login" id="" placeholder="Login ">
                                    <div class="error-form" id="error1"></div>
                                </div>
                                <div class="form-input">
                                    <label for="Prenom">Passwword</label>
                                    <input type="password" class="form-control" error="error-1" name="pwd" id="" placeholder="Passwword ">
                                    <div class="error-form" id="error1"></div>
                                </div>
                                <div class="form-input">
                                    <label for="Prenom">Confirmation Password</label>
                                    <input type="password" class="form-control" error="error-1" name="Cpwd" id="" placeholder="Confirmation Password ">
                                    <div class="error-form" id="error1"></div>
                                </div>
                                <div class="form-input">
                                    <button type="submit" class="btn-form" error="error-2" name="btn_submit" id="btn1">Choisir Fichier</button>
                                    <button type="submit" class="btn-form" error="error-1" name="btn_submit" id="btn2" >Creer Compte</button>
                                    <div class="error-form" id="error1"></div>
                                </div>
                                <?php
                                    if(isset($msg)){
                                        echo $msg;
                                    }
                                ?>
                            </form>
                        </div>
            </div>
    </div>
    <script type="text/javascript" src="file.js"></script>