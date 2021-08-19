$(document).ready(function () {
    $('.btn').click(function () {
        let user = $('#user').val();
        let pass = $('#pass').val();

        if (user.length == '') {
            swal.fire({
                icon: 'warning',
                title: 'Oops....',
                text: 'Please enter a valid username address.'
            });
        } else if (pass.length == '') {
            swal.fire({
                icon: 'warning',
                title: 'Oops....',
                text: 'Please enter your password to continue'
            });
        } else {
            $.ajax({
                url: "cek_login.php",
                type: "POST",
                data: {
                    "username": user,
                    "password": pass
                },
                success: function (response) {
                    if (response == "success") {
                        swal.fire({
                            icon: 'success',
                            title: 'Login success',
                        });
                        window.location.href = 'index.php';
                        $('#user').val('');
                        $('#pass').val('');
                    } else {
                        swal.fire({
                            icon: 'error',
                            title: 'Login failed'
                        });
                    }
                    // console.log(response);
                },
                error: function (response) {
                    swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: 'Server Error'
                    });
                }
            });
        }
    });
});