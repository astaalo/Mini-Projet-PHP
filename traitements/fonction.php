<?php


function connexion($login,$pwd){
    $users=getData();
    foreach($users as $key => $user){
        if($user["login"]===$login && $user["pwd"]===$pwd){
            $_SESSION['user']=$user;
            $_SESSION['statut']="login";
            if($user["role"]==="admin"){
                return "accueil";

            }else{
                return "jeux";
            }
        }
    }
    return "error";
}

function is_connect(){
   if(!isset($_SESSION['statut'])){
       header("location:index.php");
   }  
}
//unset supprime l'existance d'une variable
function deconnection(){
    unset($_SESSION['user']);
    unset($_SESSION['statut']);
    SESSION_destroy();
}
//recupere fichier json
function getData($files="utilisateurs"){
    $data=file_get_contents("./data/".$files.".json");
    $data=json_decode($data, true);
    return $data;
}
//teste si le formulaire est valide
    function creer_admin_player($prenom,$nom,$login,$pwd,$C_pwd){
        $tab['prenom']=$prenom;
        $tab['nom']=$nom;
        $tab['login']=$login;
        $tab['pwd']=$pwd;
        $tab['c_pwd']=$C_pwd;
        $users[]=$tab;
        $data=file_put_contents($users);
            $data=json_encode($data);
    
        if(login_exist($login)==true){
            echo 'inscription reussi';
        }else{
            echo 'login existe deja';
        }

    }

    //teste si login existe deja
function login_existe($login){
    $data_json=file_get_contents('./data/utilisateurs.json');
    $tab_data=json_decode($data_json, true);
    
    foreach ($tab_data as $value) {
        if($login==$value['login']){
            return TRUE;
        }
    }
    return FALSE;
}
//enregistrer user
function enregistrer_user($data){
    $data_json=file_get_contents('./data/utilisateurs.json');
    $tab_data=json_decode($data_json, true);
    $tab_data[]=$data;
    $tab_data=json_encode($tab_data);
    if(file_put_contents('./data/utilisateurs.json',$tab_data)){
        return TRUE;
    }else{
        return FALSE;
    }    
}
//uploader fichier 
    function upload_fichier($file){
        $dossier = './public/images/upload/';
        $fichier = basename($file['name']);
            if(move_uploaded_file($file['tmp_name'], $dossier .$fichier)) 
            {
                return True;
            }
            else 
            {
                return False;
            }
}
//liste meilleur score
function list_meilleur_score(){
    $data_json=file_get_contents('./data/utilisateurs.json');
    $tab_data=json_decode($data_json, true);
    $column=array_column($tab_data, 'score');
    array_multisort($column, SORT_DESC, $tab_data);
        $i=0;
    foreach ($tab_data as $value){
        echo '<tr>';
            echo '<td>'.$value['prenom'].'</td>'.'<br>';
            echo '<td>'. $value['nom'].'</td>'.'<br>';
            echo '<td>'. $value['score'].'</td>'.'<br>';
        echo '</tr>';
        $i++;
            if($i==5){
            break;
            }
        }
    }

//pagination
function pagination ($tab_data){
    $NumPage=0;
    $NbValeurTotal = count( $tab_data);
    $NbValeurParPage = 15;
    $NbPages = ceil($NbValeurTotal / $NbValeurParPage);
    if (isset($_GET['page'])) {
        $NumPage = $_GET['page'];
    }else{
        $NumPage=1;
    }
    $IndiceDebut = ($NumPage - 1) * $NbValeurParPage;
    $IndiceFin = $IndiceDebut + $NbValeurParPage - 1;
    for ($i=$IndiceDebut; $i<=$IndiceFin; $i++){
        if (array_key_exists($i, $tab_data)) {
            echo '<tr>';
                echo '<td>' . $tab_data[$i]['prenom'] . '</td>';
                echo '<td>' . $tab_data[$i]['nom'] . '</td>';
                echo '<td>' . $tab_data[$i]['score'] . ' pts</td>';
            echo '</tr>';
        }

    }
    echo '</table>';
    echo '<div class="div">';
    if ($NumPage > 1){
        $precedent= $NumPage - 1;
        echo '<a class="pre"  href="index.php?lien=accueil&menu=liste_joueur&page='.$precedent.'">PRECEDANT</a>';
    }

    if ($NumPage != $NbPages){
        $suivant= $NumPage + 1;
        echo '<a class="sui" href="index.php?lien=accueil&menu=liste_joueur&page='.$suivant.'">SUIVANT</a>';
    }

    echo '</div>';
}

//recupere fichier json de creerquestion
function get_Data($files="questions"){
    $data_quiz=file_get_contents("./data/".$files.".json");
    $data_quiz=json_decode($data_quiz, true);
    return $data_quiz;
}

//enregistrer question
function enregistrer_quiz($data_quiz){
    $data_json_quiz=file_get_contents('./data/questions.json');
    $tab_data_quiz=json_decode($data_json_quiz, true);
    $tab_data_quiz[]=$data_quiz;
    $tab_data_quiz=json_encode($tab_data_quiz);
    if(file_put_contents('./data/questions.json',$tab_data_quiz)){
        return TRUE;
    }else{
        return FALSE;
    }    
}
?>
