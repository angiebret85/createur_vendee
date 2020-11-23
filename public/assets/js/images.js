window.onload =()=> {
    //Gestion des boutons "supprimer"
    let links = document.querySelectorAll("[data-delete]")

    //on boucle sur links
    for(link of links){
        // on ecoute le clic
        link.addEventListener("click", function(e){
            // on empêche la navigation
            e.preventDefault()
            // on demende confirmation de la suppression
            if(confirm("Voulez-vous supprimer cette image ?")){
                //on envoie requete ajax vers le href du lien avec la methode delete
                fetch(this.getAttribute("href"), {
                    method:"DELETE",
                    headers: {
                        'X-Requested-With' : "XMLHttpRequest",
                        'Content-Type' : "application/JSON"
                    },
                    body: JSON.stringify({"_token": this.dataset.token})
                }).then(
                    //on recupere la reponse en json
                    response => response.json()
                ).then(data =>{
                    if(data.success)
                        this.parentElement.remove()
                    else
                        alert(data.error)
                }).catch(e => alert(e))
            }
        })
    }
}

