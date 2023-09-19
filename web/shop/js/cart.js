let url = '/shop/cart/view', url_0 = '/shop/cart/view';

function getCart(){
    $.ajax({
        url:url,
        method:'post',
        async:false,
        success:function(data){
            if (data) {
                $('#body-cart').html(data);
            }
        }
    })
}


$(document).ready(()=>{

    $('#cart-link').click(function(e){
        e.preventDefault();
        getCart();
        $('#cart-modal').modal('show');
    })

    $('#catalog-pjax').on('click' , '.add-to-cart', function(e) {
        e.preventDefault();
        $.ajax({
            url:url + '?btn=btn-add&id=' + $(this).data('id'),
            method:'post',
            async:false,
            success: (data) => {
                if(data === false){
                 $('#model-error').modal('show');
                }
            }
        })
    })

    $('#card-pjax').on('click' , '.add-to-cart', function(e) {
        e.preventDefault();
        $.ajax({
            url:url + '?btn=btn-add&id=' + $(this).data('id'),
            method:'post',
            async:false,
            success: (data) => {
                if(data === false){
                 $('#model-error').modal('show');
                }
            }
        })
    })

    $('#clear').click(function(e){
        e.preventDefault();
        url = url_0;
        $.ajax({
            url: url + "?btn=clear",
            method: 'post',
            async: false,
            success: function(data) {
                if(data) 
                    getCart();
            }
        })
    })

})