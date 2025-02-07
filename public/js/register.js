function register() {

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


    let name = $('input[name="name"]').val();
    let email = $('input[name="email"]').val();
    let store_name = $('input[name="store_name"]').val();
    let password = $('input[name="password"]').val();

    $.ajax({
        url: '/api/Login',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'REGISTER',
            name: name,
            email: email,
            store_name: store_name,
            password: password
        },
        success: function (response) {
            console.log(response);
            if (response.status) {
                window.location.href = '/';
                toastr.success(response.msg);
            } else {
                toastr.error(response.msg);
            }
        }
    });
}

