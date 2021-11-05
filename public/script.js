const message=
"Merci d’avoir soumis votre demande. En attendant, nous sommes mobilisés pour prendre soin de votre futur chat ! :-)"

document
.getElementById("Formulaire")
addEventListener("submit",function (event){
  event.preventDefault();
  alert(message);});