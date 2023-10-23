document.addEventListener("DOMContentLoaded", function() {
const comments = document.querySelectorAll(".js-comment")
const dialogs = document.querySelectorAll(".js-dialog")

comments.forEach((comment, index) => {
     function commentClickHandler(event) {
     event.preventDefault(); 
          dialogs[index].classList.remove("display-none")

          comment.removeEventListener("click", commentClickHandler) // Supprime le gestionnaire d'événements
}

          comment.addEventListener("click", commentClickHandler) 
})
     

const closeDialogs = document.querySelectorAll("#closeDialog")

closeDialogs.forEach((closeDialog, index) => {

     function closeDialogClickHandler(event) {
          event.preventDefault() // Empêche le comportement par défaut du bouton "X"

          dialogs[index].classList.add("display-none")

          closeDialog.removeEventListener("click", closeDialogClickHandler); // Supprime le gestionnaire d'événements
          location.reload() // Recharge la page sinon il n'est pas possible de recliquer
     }
          
          closeDialog.addEventListener("click", closeDialogClickHandler);

     })
})


