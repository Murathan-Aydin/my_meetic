function loginUser(email, password) {
    const bodyData = JSON.stringify({ email: email, password: password, type: 'login' });

    fetch('/app/controllers/AuthController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: bodyData,
        credentials: 'include'
    })
        .then((response) => { return response.json(); })
        .then(data => {
            // console.log('Réponse du serveur : ', data);
            if (data.response === true) {
                window.location.href = '/';
            } else {
                const form = document.querySelector('#form');
                const error = document.createElement('span');
                const existError = document.querySelector("#error");
                if (existError) {
                    existError.remove();
                }
                error.innerHTML = "";
                error.setAttribute('id', "error");
                error.textContent = 'Email ou mots de passe incorrect !!';
                error.style.color = 'red';
                form.appendChild(error);
            }
        })
        .catch((error) => {
            console.error('Erreur lors du fetch du login : ', error);
        });
}

document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.querySelector('#form');

    formLogin.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = document.querySelector('#email').value.trim();
        const password = document.querySelector('#password').value.trim();

        console.log(email + ' ' + password);
        loginUser(email, password);
    });
});
