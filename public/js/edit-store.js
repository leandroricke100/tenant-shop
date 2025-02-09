function editStore() {
    let isValid = true;

    $('input').each(function () {
        if ($(this).val().trim() === '') {
            // $(this).css('border', '2px solid red');
            isValid = false;
        }
    });

    if (!isValid) {
        toastr.error('Store name is required.');
        return;
    }

    let store_name = $('input[name="store_name"]').val();
    let id_user = $('input[name="id_user"]').val();
    let id_store = $('input[name="id_store"]').val();

    console.log(store_name, id_user);

    $.ajax({
        url: '/api/Store',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'EDIT_STORE',
            store_name: store_name,
            id_user: id_user,
            id_store: id_store
        },
        success: function (response) {
            console.log(response);
            if (response.status) {
                if (response.user.admin == 1) {
                    toastr.success(response.msg);
                    //esperrar 2 segundos
                    setTimeout(function () {
                        window.location.href = '/admin/dashboard';
                    }, 1000);

                    // window.location.href = '/admin/dashboard';
                } else {
                    toastr.success(response.msg);
                    setTimeout(function () {
                        window.location.href = '/merchant/store-list';
                    }, 1000);
                    // window.location.href = '/merchant/store-list';
                }

            } else {
                toastr.error(response.msg);
            }
        }
    });
}

function deleteStore(id) {
    console.log(id);
    $.ajax({
        url: '/api/Store',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'DELETE_STORE',
            id_store: id
        },
        success: function (response) {
            console.log(response);
            if (response.status) {

                toastr.success(response.msg);
                setTimeout(function () {
                    //atualizar a pagina reaload
                    window.location.reload();

                }, 1000);

            } else {
                toastr.error(response.msg);
            }
        }
    });
}

