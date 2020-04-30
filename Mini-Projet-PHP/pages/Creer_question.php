<?php
   require_once("./traitements/fonction.php");
  // require_once("./traitements/const.php");
   if(isset($_POST['btn'])){
       $data_quiz=array(
           "question"=> $_POST["question"],
           "nbre_point"=> $_POST["nbpoint"],
           "type"=> $_POST["choix"],
           "Reponse"=>"" 
       );
 // Je fais l'enregistrement du joueeur + la verification
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
            <form method="POST" action="" id="add-name">
                <div class="qcm">
                    <label>Questions</label>
                    <input name="question"  ></input>
                </div><br><br>
                <div class="nbrpoint">
                        <label for="">Nbre de Points</label>
                        <input class="nbpoint" type="number" error="error-2" name="nbpoint">
                        <div class="error-form" id="error-2"></div>     
                </div><br><br>
                    
                <div class="trep">
                    <label for="">Type de Reponse</label>
                    <select id="choix" name="choix" onchange="choisir();">
                        <option >Donnez le type de Reponse</option>
                        <option value="texte">choix texte</option>
                        <option value="simple">choix simple</option>
                        <option value="multiple">choix multiple</option>
                    </select> <br><br>
                        <button type="button" class="btn-add"  id="ajout" onclick="addInputs()">+
                                <img src="./public/images/ic-ajout-réponse.png" alt="">
                        </button>
                </div>
                <div class="inputs" id="inputs">        
                </div>
                    <button type="submit" class="btn-enrg" name="btn" onclick="getValue();" >Enregistrer</button>
            </form>  
        </div>
</div>
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
                    <input type="text" name="Reponse${nbr_row}" id="Reponse${nbr_row}" class="rep">
                    <input type="radio" class="radio" name="lechoix">
                    <button type="button" class="btn-del" onclick="deleteInput(${nbr_row});" >
                        <img src="./public/images/ic-supprimer.png" alt="IMAGEHOLDER"> 
                    </button>`;           
       }
       else if (choix==="multiple") {
        newInput.innerHTML=`<label for="" class="rep1">Reponse${nbr_row}</label>
                    <input type="text" name="Reponse${nbr_row}" id="Reponse${nbr_row}" class="rep">
                    <input type="checkbox"  class="check" >
                    <button type="button" class="btn-del" onclick="deleteInput(${nbr_row});" >
                        <img src="./public/images/ic-supprimer.png" alt="IMAGEHOLDER"> 
                    </button>`;           
       }
       else{
        newInput.innerHTML=`<label for="">Reponse${nbr_row}</label>
                    <input type="text"name="Reponse${nbr_row}" id="Reponse${nbr_row}" class="rep">
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
        alert(longeur);
        var data_quizz=document.getElementsByTagName('input');
         
     }
     
</script>

<!--validation question
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
        
    })
</script>

