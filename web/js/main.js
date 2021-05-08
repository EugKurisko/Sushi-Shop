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

let split = window.location.href.split('=');
let id = split[split.length - 1];
let nav = document.getElementsByClassName('nav-link');
let flag = false;
for (let i = 0; i < nav.length; i++) {
    if (nav[i].getAttribute('data-id') == id) {
        nav[i].classList.add('active');
        flag = true;
        break;
    }
}

if (!flag) {
    nav[0].classList.add('active');
}

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