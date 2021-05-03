// $('.cart').on('click', function () {
//     $('#cart').modal('show');
// });

//var urls = ['cart/add', '/cart/add'];

//'cart/open', '../cart/open', 

function openCart(event) {
    event.preventDefault();
    $.ajax({
        url: 'cart/open',
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

// function openCart(event) {
//     event.preventDefault();
//     $.ajax({
//         url: '/cart/open',
//         type: 'GET',
//         success: function (res) {
//             $('#cart .modal-content').html(res);
//             $('#cart').modal('show');
//         },
//         error: function () {
//             alert("not ok");
//         }
//     })
// }
// $('.product-button__add').on('click', function (event) {
//     event.preventDefault();
//     let name = $(this).data('name');
//     console.log(name);

//     $.ajax({
//         url: '/cart/add',
//         data: { name: name },
//         type: 'GET',
//         success: function (res) {
//             $('#cart .modal-content').html(res);
//         },
//         error: function () {
//             alert("not ok");
//         }
//     })
// })

$('.product-button__add').on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');
    console.log(name);
    // $.each(urls, function (i, u) {
    //     $.ajax(u,
    //         {
    //             type: 'GET',
    //             function(res) {
    //                 $('#cart .modal-content').html(res);
    //             },
    //             error: function () {
    //                 alert("not ok");
    //             }
    //         }
    //     );
    // });
    $.ajax({
        url: 'cart/add',
        data: { name: name },
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
        },
        error: function () {
            alert("not ok");
        }
    })
})