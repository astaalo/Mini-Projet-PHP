<?php
    if(isset($_POST['btn_submit'])){
        $login=$_POST['login'];
        $pwd=$_POST['pwd'];
        $result=connexion($login,$pwd);
        if($result=="error"){
            echo "login ou mot de pass incorrect";
        }else{
            header("Location:index.php?lien=".$result);
        }
}

?>
<div class="container">
    <div class="container-header">
        <div class="title"> Login Form</div>
    </div>
    <div class="container-body">
        <form action="" method="post" id="form-connexion">

            <div class="input-form">
                <div class="icon-form icon-form-login"></div>
                <input type="text" class="form-control" error="error-1" name="login" id="" placeholder="login ">
                <div class="error-form" id="error1"></div>
            </div>
            <div class="input-form">
                <div class="icon-form icon-form-pwd"></div>
                <input type="password" class="form-control" name="pwd" id="" placeholder="password">
                <div class="error-form" id="error-2"></div>
            </div>
            <div class="input-form">
                <button type="submit" class="btn-form" error="error-2" name="btn_submit" id="">connexion</button>
                <a href="index.php?lien=inscription" class="link-form">S'inscrire pour jouer</a>
            </div>
           
        </form>
    </div>
 </div>
 <script type="text/javascript" src="file.js"></script>
   
