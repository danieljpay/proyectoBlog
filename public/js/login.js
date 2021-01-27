const loginbutton = document.getElementById('login-btn');
const email = document.getElementById('email-input').value;
const password = document.getElementById('password-input').value;

loginbutton.addEventListener('click', function(e){
    fetch(location.href + '/iniciarSesion', {
        method: "POST",
        body: JSON.stringify({
            email: email,
            password: password
        }),
        headers: {
            "Content-type": "application/json;"
        }
    })
    .then(response => response.json())
    .then(json => console.log(json))
    .catch(err => console.log(err));
});

