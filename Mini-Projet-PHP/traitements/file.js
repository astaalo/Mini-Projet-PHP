
//recupere les inputs kryup efface l'erreur quand on ecrit et qu'on leve la main
 const inputs =document.getElementByTagname("input");
 for(input of inputs){
     input.addEventListener("keyup",function(e){
         if(e.target.hasAttribute("error")){
            var idDivError=target.getAttribute("error");
            document.getElementById(idDivError).innerText=""
         }
     })
 }

//recupere l'objet du formulaire(id=forme-conexion)
document.getElementById("form-connexion").addEventListerner("submit",function(e){
    //recupere les inputs
   const inputs =document.getElementByTagname("input");
   var error=false;
   for(input of inputs){
        if(input.hasAttribute("error")){
           var idDivError=input.getAttribute("error");
       if(!input.value){
         document.getElementById(idDivError).innerText="ce champs est obligatoire"
         error=true;
           }
           
       }else{
        document.getElementById(idDivError).innerText=""
       }
   }
   if(error){
        e.preventDefault();
        return false;
   }
})
