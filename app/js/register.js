function register(pseudo, lastname, firstname, email, password, genre, birthdate) {
    const bodyData = JSON.stringify({
        pseudo: pseudo,
        lastname: lastname,
        firstname: firstname,
        email: email,
        password: password,
        genre: genre,
        birthdate: birthdate,
        type: 'register'
    });

    fetch('/app/controllers/AuthController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: bodyData,
        credentials: 'include'
    })
        .then((response) => response.json())
        .then(data => {
            console.log('Réponse du serveur : ', data);
            if (data.success === true) {
                window.location.href = '/';
            } else {
                alert("Erreur : " + (data.error || "Une erreur est survenue."));
            }
        })
        .catch((error) => {
            console.error('Erreur lors du fetch du register : ', error);
        });
}

function isValidAge(birthdate) {
    let birthDateObj = new Date(birthdate);
    let today = new Date();
    let age = today.getFullYear() - birthDateObj.getFullYear();

    let monthDiff = today.getMonth() - birthDateObj.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDateObj.getDate())) {
        age--;
    }

    return age >= 18;
}
document.addEventListener('DOMContentLoaded', () => {
    const formRegister = document.querySelector('#form');

    formRegister.addEventListener('submit', (e) => {
        e.preventDefault();

        const pseudo = document.querySelector('#pseudo').value.trim();
        const lastname = document.querySelector('#lastname').value.trim();
        const firstname = document.querySelector('#firstname').value.trim();
        const email = document.querySelector('#email').value.trim();
        const password = document.querySelector('#password').value.trim();
        const genre = document.querySelector('#genre').value.trim();
        const birthdate = document.querySelector('#birthdate').value.trim();

        // Vérification de l'âge (minimum 18 ans)
        if (!isValidAge(birthdate)) {
            alert("Vous devez avoir au moins 18 ans pour vous inscrire.");
            return;
        }

        register(pseudo, lastname, firstname, email, password, genre, birthdate);
    });
});

