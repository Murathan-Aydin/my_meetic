function card(user, followId) {
    const div = document.createElement('div');
    div.setAttribute('key', user.id);
    div.classList.add('card');

    const avatar = document.createElement('img');
    avatar.setAttribute('src', `/public/storage/${user.image}`);
    avatar.classList.add('avatar');

    const spanPseudo = document.createElement('span');
    spanPseudo.id = "pseudo";
    spanPseudo.textContent = user.pseudo;

    const buttonAdd = document.createElement('button');
    buttonAdd.setAttribute('data-id', user.id);
    buttonAdd.setAttribute('id', "addFollower");
    if (followId.includes(user.id)) {
        buttonAdd.textContent = "Déjà suivi";
        buttonAdd.disabled = true;
        buttonAdd.classList.add('followed');
    } else {
        buttonAdd.textContent = "Ajouter";
    }

    div.appendChild(avatar);
    div.appendChild(spanPseudo);
    div.appendChild(buttonAdd);

    return div;
}

async function getUser() {

    await fetch('/app/controllers/UsersController.php', {
        method: 'GET'
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Données JSON : ", data);
            const container = document.querySelector('#user-container');
            const followId = data.followId;

            data.users.forEach(user => {
                const userCard = card(user, followId);
                container.appendChild(userCard);
            });
    
            init();
        })
        .catch((error) => {
            console.log('Il y a une erreur de fetch : ', error);
        })
}

document.addEventListener('DOMContentLoaded', async () => {
    await getUser();
});