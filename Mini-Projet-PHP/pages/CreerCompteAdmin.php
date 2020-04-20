<?php
is_connect();
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

    echo 'Creation admin Reussie';
}

?>

<div class="droite">
    <strong><h4>S'INSCRIRE</h4></strong><br>
        <h5>Pour proposer des quizz</h5>
            <div class="img-1">
                <a href="#"><img src="./public/images/img5.jpg" alt=""></a>
                <h6>Admin</h6>
            </div><br>
                <div class="forml-2">
                    <form action="" method="POST" id="form-connexion">
                        <div class="form2-input">
                            <label for="Prenom">Prenom</label>
                            <input type="text" class="form-control" error="error-1" name="prenom" id="" placeholder="Prenom ">
                            <div class="error-form" id="error-1"></div>
                        </div>
                        <div class="form2-input">
                            <label for="Prenom">Nom</label>
                            <input type="text" class="form-control" error="error-2" name="nom" id="" placeholder="Nom ">
                            <div class="error-form" id="error-2"></div>
                        </div>
                        <div class="form2-input">
                            <label for="Prenom">Login</label>
                            <input type="text" class="form-control" error="error-3" name="login" id="" placeholder="Login ">
                            <div class="error-form" id="error-3"></div>
                        </div>
                        <div class="form2-input">
                            <label for="Prenom">Passwword</label>
                            <input type="password" class="form-control" error="error-4" name="pwd" id="" placeholder="Passwword ">
                            <div class="error-form" id="error-4"></div>
                        </div>
                        <div class="form2-input">
                            <label for="Prenom">Confirmation Password</label>
                            <input type="password" class="form-control" error="error-5" name="C_pwd" id="" placeholder="Confirmation Password ">
                            <div class="error-form" id="error-5"></div>
                        </div>
                        <div class="form2-input">
                            <button type="submit" class="btn-form" error="error-2" name="btn_submit" id="btn1">Choisir Fichier</button>
                            <button type="submit" class="btn-form" error="error-1" name="btn_submit" id="btn2" >Creer Compte</button>
                            <div class="error-form" id="error1"></div>
                        </div>
                        
                    </form>
                </div>
</div>

<script type="text/javascript" src="file.js"></script>