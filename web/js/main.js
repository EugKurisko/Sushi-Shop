$('.modal-content').on('click', '.btn-next', function () {
    $.ajax({
        url: 'cart/order', //a.attr('href'),//'~/cart/open',
        type: 'GET',
        success: function (res) {
            $('#order .modal-content').html(res);
            $('#cart').modal('hide');
            $('#order').modal('show');
        },
        error: function () {
            alert("not ok");
        }
    })
});

function openCart(event) {
    event.preventDefault();
    $.ajax({
        url: 'cart/open', //a.attr('href'),//'~/cart/open',
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('#cart').modal('show');
        },
        error: function () {
            alert("not ok");
        }
    })
}

function clearCart(event) {
    if (confirm('Точно очистить корзину?')) {
        event.preventDefault();
        $.ajax({
            url: 'cart/clear', //a.attr('href'),//'~/cart/open',
            type: 'GET',
            success: function (res) {
                $('#cart .modal-content').html(res);
                $('.menu-quantity').html('(0)');
            },
            error: function () {
                alert("not ok");
            }
        })
    }
}

$('.product-button__add').on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');
    console.log(name);
    $.ajax({
        url: 'cart/add', //a.attr('href'),//'~/cart/add',
        data: { name: name },
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('.menu-quantity').html('(' + $('.total-quantity').html() + ')');
        },
        error: function () {
            alert("not ok");
        }
    })
})

$('.modal-content').on('click', '.btn-close', function () {//refer to parent class. and using parent refer to child class
    //use when something generates dynamically
    $('#cart').modal('hide');
})

$('.modal-content').on('click', '.delete', function () {//refer to parent class. and using parent refer to child class
    let id = $(this).data('id');
    //console.log(id);
    $.ajax({
        url: 'cart/delete', //a.attr('href'),//'~/cart/add',
        data: { id: id },
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
            if ($('.total-quantity').html()) {
                $('.menu-quantity').html('(' + $('.total-quantity').html() + ')');
            } else {
                $('.menu-quantity').html('(0)');
            }
        },
        error: function () {
            alert("not ok");
        }
    })
})