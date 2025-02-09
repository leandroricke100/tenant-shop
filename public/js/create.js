function createStore() {
    let isValid = true;

    $('input').each(function () {
        if ($(this).val().trim() === '') {
            // $(this).css('border', '2px solid red');
            isValid = false;
        }
    });

    if (!isValid) {
        toastr.error('Please fill in all fields.');
        return;
    }

    let store_name = $('input[name="store_name"]').val();
    let id_user = $('input[name="id_user"]').val();


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
    let id_store = $('#id_store').val();

    // console.log(name_category, id_user, id_store);

    $.ajax({
        url: '/api/Store',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'CREATE_CATEGORY',
            name_category: name_category,
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

function createProduct() {
    let isValid = true;

    if ($('#id_store').val() === null) {
        toastr.error('Please select a store.');
        isValid = false;
    }

    if ($('#id_category').val() === null || $('#id_category').prop('disabled')) {

        toastr.error('Please select a category.');
        isValid = false;
    }

    if ($('#product_name').val().trim() === '') {
        toastr.error('Please enter a product name.');
        isValid = false;
    }

    if (!isValid) {
        return;
    }


    let id_store = $('#id_store').val();
    let id_category = $('#id_category').val();
    let name_product = $('#product_name').val();
    let id_user = $('input[name="id_user"]').val();

    console.log(id_store, id_category, product_name, id_user);

    // console.log(name_category, id_user, id_store);

    $.ajax({
        url: '/api/Store',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'CREATE_PRODUCT',
            id_store: id_store,
            id_category: id_category,
            name_product: name_product,
            id_user: id_user

        },
        success: function (response) {
            console.log(response);
            if (response.status) {
                if (response.user.admin == 1) {
                    toastr.success(response.msg);
                    //esperrar 2 segundos
                    setTimeout(function () {
                        window.location.href = '/admin/product-list';
                    }, 1000);

                    // window.location.href = '/admin/dashboard';
                } else {
                    toastr.success(response.msg);
                    setTimeout(function () {
                        window.location.href = '/merchant/product-list';
                    }, 1000);
                    // window.location.href = '/merchant/store-list';
                }

            } else {
                toastr.error(response.msg);
            }
        }
    });
}

$(document).ready(function () {
    $('#id_store').on('change', function () {
        var storeId = $(this).val();

        console.log(storeId);
        $.ajax({
            url: '/api/Store',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                metodo: 'RELEASE_CATEGORY',
                id_store: storeId
            },
            success: function (response) {
                console.log(response);

                // Limpar as opções atuais do select de categorias
                $('#id_category').empty();

                // Adicionar uma opção inicial "Choose a category"
                $('#id_category').append('<option selected disabled>Choose a category</option>');

                // Verificar se a resposta contém categorias
                if (response.category && response.category.length > 0) {
                    // Habilitar o select de categorias
                    $('#id_category').prop('disabled', false);

                    // Adicionar as opções de categoria ao select
                    $.each(response.category, function (index, category) {
                        $('#id_category').append('<option value="' + category.id + '">' + category.name + '</option>');
                    });
                } else {
                    // Caso não haja categorias, desabilitar o select
                    $('#id_category').prop('disabled', true);
                    toastr.error('No categories found for this store.');
                }
            },
            error: function () {
                toastr.error('An error occurred while fetching categories.');
            }
        });
    });
});

