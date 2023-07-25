$(document).ready(function () {

    function showCart(data){
        $("#cart .modal-body").html(data);
        $("#cart").modal("show");
    }

    //Korzinaga qoshish
    $(".add-to-cart").on('click',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let qty= $("#qty").val();
        $.ajax({
            method : 'GET',
            url : '/cart/add',
            data : {id:id,qty:qty},
            success : function (data) {
                showCart(data);
            },

            error : function () {
                alert('OSHIBICHKA');
            }
        })
    })

    //izbrinniyga qoshish
    $(".add-to-like").on('click',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let qty = 1;
        $.ajax({
            url : '/cart/add-like',
            method : 'GET',
            data : {id:id,qty:qty},
            success : function () {
                alert("Добавлено успешно!");
            },
            error : function () {
                alert('Error!');
            }
        })

    })



    $("#cart .modal-body ").on('click','.remove-item',function (e) {

        let id = $(this).data('id');

        $.ajax({
            url : '/cart/del-item',
            method : 'GET',
            data : {id:id},
            success : function (data) {

                showCart(data);
            },
            error : function () {
                alert('ERROR!');
            }
        })

    })

    $( document ).ajaxComplete(function() {
        //Korzinadan donalab uchirish
        $(".minus-btn").on('click',function (e) {
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                method : 'GET',
                url : '/cart/minus',
                data : {id:id,count:-1},
                success : function (data) {

                    showCart(data);
                },

                error : function () {
                    alert('OSHIBICHKA');
                }
            })
        })

        $(".plus-btn").on('click',function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let count = 1;

            $.ajax({
                method : 'GET',
                url : '/cart/minus',
                data:{id:id,count:count},
                success : function (data) {

                    showCart(data);
                },

                error : function () {
                    alert('OSHIBICHKA');
                }
            })

        })

    });

    function allLikeCount(){
        $.ajax({
            method : 'GET',
            url : '/cart/all-like',
            success : function (data) {

                $(".count-like").html(data);
            },
        })
    }

    // clear cart
    $("#cart #clear-cart").on('click',function (e) {
        e.preventDefault();
        let id = $(this).data('id');

        $.ajax({
            url : '/cart/clear',
            method : 'GET',
            data : {id:id},
            success : function (data) {
                showCart(data);
            },
            error : function () {
                alert('ERROR!');
            }
        })
    })

    //korzina buttoni bosilganda modalkani chiqarish

    $("header .cart").on('click',function(){
        $.ajax({
            url : '/cart/show',
            method : 'GET',
            success : function (data) {
                showCart(data);
            },
            error : function () {
                alert('ERROR!');
            }
        })
        return false;
    })

    //modal close btn

    $("#cart #close_btn").on('click',function () {
        $("#cart").modal("hide");
    })

    $("#cart #close-button").on('click',function () {
        $("#cart").modal("hide");
    })


})