function login() {
    console.log('teste');

    $.ajax({
        url: '/api/Login',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'LOGAR',
            login: 'leandeo',
            password: '123456'

        },
        success: function (response) {
            if (response.status) {
                // location.reload();
                toastr.success(response.msg);
            } else {
                toastr.error(response.msg);
            }
        }
    });
}

