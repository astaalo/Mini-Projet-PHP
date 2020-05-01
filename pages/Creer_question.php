<?php
   require_once("./traitements/fonction.php");
   // require_once("./traitements/const.php");
   if (isset($_POST['btn'])) {
       $data_quiz = array(
           "question" => $_POST["question"],
           "nbre_point" => $_POST["nbpoint"],
           "type" => $_POST["choix"],
   
       );
   
       if ($_POST['choix'] == "simple" || $_POST['choix'] == "multiple") {
           for ($i = 0; $i <= (int) $_POST['nbrep']; $i++) {
               if (isset($_POST["Reponse$i"])) {
                   $tabReponse[] = $_POST["Reponse$i"];
                  // var_dump('$tabreponses');
               }
           }
             $data_quiz['Reponse'] = $tabReponse;
           if ($_POST['choix'] == "multiple") {
               $data_quiz['IndexRepValides'] = $_POST['check'];
           } else {
               $data_quiz['IndexRepValides'] = $_POST['repsimple'];
           }
       } elseif ($_POST['choix'] == "texte") {
           $question['ReponseTexte'] = $_POST['reptexte'];
       }
   
       // Enregistrement et la verification des questions
          if (enregistrer_quiz($data_quiz)) {
              echo "Enregistrement question Reussie ";
          }else{
               echo "Oups echec Enregistrement question";
              }
   }
?>
<div class="droite-qcm">
    <div class="para"> PARAMETRER VOTRE QUESTION</div><br>
        <div class="quizz">
            <form method="POST" action="" id="add-name" enctype="multipart/form-data"s>
                <div class="qcm">
                    <label>Questions</label>
                    <input name="question" error="error-1" ></input>
                    <div class="error-form" id="error-1"></div>     
                </div><br><br>
                <div class="nbrpoint">
                        <label for="">Nbre de Points</label>
                        <input class="nbpoint" type="number" error="error-2" name="nbpoint">
                        <div class="error-form" id="error-2"></div>     
                </div><br><br>
                    
                <div class="trep">
                    <label for="" error="error-3">Type de Reponse</label>
                    <select id="choix" name="choix" onchange="choisir();">
                        <option >Donnez le type de Reponse</option>
                        <option value="texte">choix texte</option>
                        <option value="simple">choix simple</option>
                        <option value="multiple">choix multiple</option>
                        <div class="error-form" id="error-3"></div>     
                    </select> <br><br>
                        <button type="button" class="btn-add"  id="ajout" onclick="addInputs()">+
                                <img src="./public/images/ic-ajout-réponse.png" alt="">
                        </button>
                </div>
                <div class="inputs" id="inputs">        
                </div>
                     <input type="hidden" name="nbrep" id="nbrep" />
                    <button type="submit" class="btn-enrg" name="btn" onclick="getValue();" >Enregistrer</button>
            </form>  
        </div>
</div>
<!--generation champs-->
<script>
    var nbr_row=0;
    function choisir(){
        document.getElementById('inputs').innerHTML="";
        nbr_row=0;
    }
   
    function addInputs()
    {  
        nbr_row+=1;
        var choix=document.getElementById('choix').value;
        var Divajouter=document.getElementById('inputs');
        var newInput=document.createElement('div');
        newInput.setAttribute('class','row');
        newInput.setAttribute('id','row_'+ nbr_row);
        if (choix==="simple") {
        newInput.innerHTML=`<label for="" class="rep1">Reponse${nbr_row}</label>
                    <input type="text" name="repsimple${nbr_row}" id="Reponse${nbr_row}" class="rep">
                    <input type="radio" class="radio" name="lechoix">
                    <button type="button" class="btn-del" onclick="deleteInput(${nbr_row});" >
                        <img src="./public/images/ic-supprimer.png" alt="img"> 
                    </button><br><br>`;           
       }
       else if (choix==="multiple") {
        newInput.innerHTML=`<label for="" class="rep1">Reponse${nbr_row}</label>
                    <input type="text" name="Reponse${nbr_row}" id="Reponse${nbr_row}" class="rep">
                    <input type="checkbox" name="check"  class="check" >
                    <button type="button" class="btn-del" onclick="deleteInput(${nbr_row});" >
                        <img src="./public/images/ic-supprimer.png" alt="img"> 
                    </button><br><br>`;           
       }
       else{
        newInput.innerHTML=`<label for="">Reponse${nbr_row}</label>
                    <input type="text"name="reptexte${nbr_row}" id="Reponse${nbr_row}" class="rep">
        `;
                    document.getElementById('ajout').disabled=true;
       }
        inputs.appendChild(newInput);   
    }
    function deleteInput(n){
       var del=document.getElementById('row_'+n);
       del.remove();
    }
     function getValue()
     {  var tab=document.getElementsByClassName('rep');
        var longeur=tab.length;
       // alert(longeur);
        var data=document.getElementsByTagName('input');
         
     } 

//validation question
   /* const inputs=document.getElementsByTagName("input");
    for(input of inputs){
        input.addEventListener("keyup",function(e){
            if (e.target.hasAttribute("error")) {
                var  idDivError=e.target.getAttribute("error");
                document.getElementById(idDivError).innerText=""
            }
        })
    }
    document.getElementById("add-name").addEventListener("submit",function(e) {
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
        
    })*/
</script>