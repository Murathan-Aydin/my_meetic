
function registerStepTwo(hobbie, image, city)
{
    console.log("hobbie : ", hobbie);
    console.log("image : ", image);
    console.log("city : ", city);

    const formData = new FormData(); 
    formData.append('hobbie', hobbie);
    formData.append('image', image);
    formData.append('city', city);
    formData.append('type', 'stepTwo');

    console.log('FormData entries:');
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    
    fetch('/app/controllers/AuthController.php', {
        method: 'POST',
        body: formData,
        credentials: 'include'
    })
        .then((response) => response.json())
        .then((data) => {
            console.log('Log data : ', data);
            if (data.success === true) {
                window.location.href = '/';
            } else {
                alert('false');
            }
        })
        .catch((error) => {
            console.log('Error lors du fetch registerStepTwo', error);
        })
}

document.addEventListener('DOMContentLoaded', () => {
    const formStepTwo = document.querySelector('#formStepTwo');

    formStepTwo.addEventListener('submit', (e) => {
        e.preventDefault();

        const hobbie = document.querySelector('#hobbies').value;
        const image = document.querySelector('#image').files[0];
        const city = document.querySelector('#citys').value;

        if (!image) {
            alert("Veuillez sélectionner une image !");
            return;
        }

        registerStepTwo(hobbie, image, city);
    });
});
