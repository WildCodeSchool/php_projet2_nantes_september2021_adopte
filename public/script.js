 //function qui se réfère à un bouton, dans le html cela s'écrit ainsi onclick="clicked(event)"
function clicked(e) {
  if(!confirm("Merci d’avoir soumis votre demande. Nous vous répondrons dans les plus brefs délais ! :-)")){
    e.preventDefault();
  }
}