function login() {
    let isValid = true;

    $('input').each(function () {
        if ($(this).val().trim() === '') {
            $(this).css('border', '2px solid red');
            isValid = false;
        } else {
            $(this).css('border', '');
        }
    });

    if (!isValid) {
        toastr.error('Please fill in all fields.');
        return;
    }

    let email = $('input[name="email"]').val();
    let password = $('input[name="password"]').val();

    $.ajax({
        url: '/api/User',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'LOGAR',
            email: email,
            password: password

        },
        success: function (response) {
            console.log(response);
            if (response.status) {
                if (response.user.admin == 1) {
                    toastr.success(response.msg);
                    //esperrar 2 segundos
                    setTimeout(function () {
                        window.location.href = '/admin/dashboard';
                    }, 2000);

                    window.location.href = '/admin/dashboard';
                } else {
                    window.location.href = '/merchant/store-list';
                }

            } else {
                toastr.error(response.msg);
            }
        }
    });
}

