function showMsg() {
    alertify.set('notifier','position', 'top-right');
    alertify.error('Chức năng này hiện chưa có');
}

function addCart(id) {
    $.ajax({
        url: "client-add-cart/" + id,
        type: "GET",
    }).done(function (response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        alertify.set('notifier','position', 'top-right');
        alertify.success('Thêm sản phẩm thành công');
    });
    $.ajax({
        url: "client-add-cart-item",
        type: "GET",
    }).done(function (response) {
        $("#delete-item-cart").empty();
        $("#delete-item-cart").html(response);
    });
}
 
function deleteCart(id) {
    $.ajax({
        url: "client-delete-cart-item/" + id,
        type: "GET",
    }).done(function (response) {
        $("#delete-item-cart").empty();
        $("#delete-item-cart").html(response);
        alertify.set('notifier','position', 'top-right');
        alertify.success('Xóa sản phẩm thành công');
    });
}

function updateCartItem(id) {
    $.ajax({
        url: "client-update-cart-item/" + id + '/' + $("#quanty-item-" + id).val(),
        type: "GET",
    }).done(function (response) {
        $("#delete-item-cart").empty();
        $("#delete-item-cart").html(response);
        alertify.set('notifier','position', 'top-right');
        alertify.success('Cập nhật sản phẩm thành công');
    });
}   

$(document).ready(function () {
    $("#change-item-cart").on("click", ".text-center button", function () {
        $.ajax({
            url: "client-delete-cart/" + $(this).data("id"),
            type: "GET",
        }).done(function (response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            alertify.set('notifier','position', 'top-right');
            alertify.success('Xóa sản phẩm hành công');
        });
    });
});

