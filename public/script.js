const message=
"Merci d’avoir soumis votre demande. Nous vous répondrons dans les plus brefs délais ! :-)"

document
.getElementById("formulaire")
addEventListener("submit",function (event){
  event.preventDefault();
  alert(message);});