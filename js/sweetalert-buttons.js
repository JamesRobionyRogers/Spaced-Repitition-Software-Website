$(document).ready(function () {

    $('.login').on('click', function() {
        
        Swal.fire({
            title: 'Login Form',
            text: 'Email Address',
            html:   `<input type="text" id="login" class="swal2-input" placeholder="Email Address">
                    <input type="password" id="password" class="swal2-input" placeholder="Password">`,
            confirmButtonText: 'Sign in',
            focusConfirm: false,
            preConfirm: () => {
                const login = Swal.getPopup().querySelector('#login').value
                const password = Swal.getPopup().querySelector('#password').value
                if (!login || !password) {
                    Swal.showValidationMessage(`Please enter login and password`)
                }
                return { login: login, password: password }
            }

        }).then((result) => {
            Swal.fire(`
            Login: ${result.value.login}
            Password: ${result.value.password}
            `.trim())
        })

        // TODO: remove the scroll bar and width of the blur
        // $('html').toggleClass('static');


    })
    
});