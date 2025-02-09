function createStore() {
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

    console.log(store_name, id_user);

    $.ajax({
        url: '/api/Store',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'CREATE_STORE',
            store_name: store_name,
            id_user: id_user

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

function createCategory() {
    let isValid = true;
    $('input').each(function () {
        if ($(this).val().trim() === '') {
            // $(this).css('border', '2px solid red');
            isValid = false;
        }
    });

    if (!isValid) {
        toastr.error('Category name is required.');
        return;
    }

    let name_category = $('input[name="name_category"]').val();
    let id_user = $('input[name="id_user"]').val();

    console.log(name_category, id_user);

    $.ajax({
        url: '/api/Store',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'CREATE_CATEGORY',
            name_category: name_category,
            id_user: id_user

        },
        success: function (response) {
            console.log(response);
            if (response.status) {
                if (response.user.admin == 1) {
                    toastr.success(response.msg);
                    //esperrar 2 segundos
                    setTimeout(function () {
                        window.location.href = '/admin/category-list';
                    }, 1000);

                    // window.location.href = '/admin/dashboard';
                } else {
                    toastr.success(response.msg);
                    setTimeout(function () {
                        window.location.href = '/merchant/category-list';
                    }, 1000);
                    // window.location.href = '/merchant/store-list';
                }

            } else {
                toastr.error(response.msg);
            }
        }
    });
}

