async function getUser() {
    const userPseudo = document.querySelector('#pseudo');
    const userEmail = document.querySelector('#email');
    const userLastname = document.querySelector('#lastname');
    const userFirstname = document.querySelector('#firstname');
    const hobbie = document.querySelector('#hobbie');
    const city = document.querySelector("#city");

    await fetch('/app/controllers/AuthController.php', {
        method: 'GET'
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("Données JSON : ", data);

            const avatar = document.createElement('img');
            const avatarDiv = document.querySelector('#avatar');

            data.result.forEach(user => {
                userPseudo.textContent = user.pseudo;
                userEmail.textContent = user.email;
                userFirstname.textContent = user.firstname;
                userLastname.textContent = user.lastname;
                city.textContent = user.city;
                hobbie.textContent = user.hobbie;
                avatar.setAttribute('src', `/public/storage/${user.image}`);

            });
            avatarDiv.appendChild(avatar);

        })
        .catch((error) => {
            console.log('Il y a une erreur de fetch : ', error);
        })
}

document.addEventListener('DOMContentLoaded', async () => {
    await getUser();
});