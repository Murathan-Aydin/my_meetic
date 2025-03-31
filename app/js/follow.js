function follow(followedId, element)
{
    fetch('/app/controllers/UsersController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ followedId: followedId })
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'error') {
                alert("Utilisateur  Error!");
            } else {
                const addFollower = document.querySelector('#addFollower');
                addFollower.disabled = true;
                addFollower.innerHTML = 'Déja suivi';
                alert('Utilisateur ajouté');
            }
        })
        .catch(error => {
            console.log('Erreur lors du fetch pour add : ', error);
        });
}

function init() {
    const addFollowers = document.querySelectorAll('#addFollower');

    addFollowers.forEach(button => {
        button.addEventListener('click', (e) => {
            const followedId = e.target.getAttribute('data-id');
            console.log("ID de l'utilisateur à ajouter :", followedId);
            follow(followedId, e.target);
        });
    });
}
