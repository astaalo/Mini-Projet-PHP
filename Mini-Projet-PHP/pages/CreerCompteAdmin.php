<?php
is_connect();
require_once("./traitements/fonction.php");
if(isset($_POST['btn_submit'])){
    // Je recupere l'input de l'image uploadé
        $fichier_image=$_FILES['avatar']; 
    
        $data=array(
            "prenom"=> $_POST["prenom"],
            "nom"=> $_POST["nom"],
            "login"=> $_POST["login"],
            "pwd"=> $_POST["pwd"],
            "role"=>"admin",
            "score"=>"0"   
        );
        // Je verifie si le joueur existe ou pas
        if (!login_existe($data)) {
            // Si c'est le cas je verifie l'etat de l'upload 
            if(upload_fichier($fichier_image)){
                // J'ajoute le nom de l'image dans l'attibut photo de $data
                $data[]=$fichier_image['name'];
                // Je fais l'enregistrement du joueeur + la verification
                if (enregistrer_user($data)) {
                    echo "Compte creer avec succes ";
                }else{
                    echo "Oups echec inscription";
                }
            }else{
                echo " Le fichier n'est pas uploadé";
            }
            
        }else{
            echo " Le login existe deja";
        }
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
                    <form action="" method="POST" id="form-connexion" enctype="multipart/form-data">
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
                            <div id="file_img"><input type="file" name="avatar"></div><br><br>
                        <div class="form2-input">
                            <button type="submit" class="btn-form" error="error-6" name="btn_submit" id="" >Creer Compte</button>
                            <div class="error-form" id="error-6"></div>
                        </div>
                        
                    </form>
                </div>
</div>

<!--script type="text/javascript" src="file.js"></script>-->

<!--validation admin -->
<script>
    const inputs=document.getElementsByTagName("input");
    for(input of inputs){
        input.addEventListener("keyup",function(e){
            if (e.target.hasAttribute("error")) {
                var  idDivError=e.target.getAttribute("error");
                document.getElementById(idDivError).innerText=""
            }
        })
    }
    document.getElementById("form-connexion").addEventListener("submit",function(e) {
        const inputs=document.getElementsByTagName("input");
        var error=false;
        for(input of inputs){
            if (input.hasAttribute("error")) {
                var  idDivError=input.getAttribute("error");
            if (!input.value) {
                    document.getElementById(idDivError).innerText="Champ obligatoire"
                    error=true
                }
                
            }
            
        }
        if (error) {
            e.preventDefault();
            return false;
        }
        
    })

</script>