function deleteUser() {
    fetch('/app/controllers/deleteController.php')
        .then(response => response.json())
        .then((data) => {
            console.log('data ', data)
        })
        .catch(error => console.log('error : ', error));
}

document.addEventListener('DOMContentLoaded', () => {
    const deleteUserButton = document.querySelector('#deleteUser');

    deleteUserButton.addEventListener('click', () => {
        deleteUser();
    });
});