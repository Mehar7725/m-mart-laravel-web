
    $(document).ready( function(){

$('.addTocartBtn').click( function (e){
    e.preventDefault();

    var product_id = $(this).closest('.product_data').find('.prod_id').val();
    var product_qty = $(this).closest('.product_data').find('.qty-input').val();
   
   
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    
    $.ajax({
        method: "POST",
        url: "/add-to-cart",
        data: {
            'product_id' : product_id,
            'product_qty' : product_qty,
        },
        success: function (response) {
            swal(response.status);
        }
    });


});




        // $('.increment-btn').click( function (e) {
        //     e.preventDefault();
        //     // var inc_value = $('.qty-input').val();
        //     var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            
        //     var value = parseInt(inc_value, 10);
        //     value = isNaN(value) ? 0 : value;
        //     if(value < 10)
        //     {
        //         value++;
        //         // $('.qty-input').val(value);
        //         $(this).closest('.product_data').find('.qty-input').val(value);
        //     }
        // })
        // $('.decrement-btn').click( function (e) {
        //     e.preventDefault();
        //     // var dec_value = $('.qty-input').val();
        //     var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        //     var value = parseInt(dec_value, 10);
        //     value = isNaN(value) ? 0 : value;
        //     if(value > 1)
        //     {
        //         value--;
        //         // $('.qty-input').val(value);
        //         $(this).closest('.product_data').find('.qty-input').val(value);
        //     }
        // })



            $('.delete-cart-item').click(function (e) { 
                

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                var prod_id = $(this).data('id');

                $.ajax({
                    method: "GET",
                    url: "delete-cart-item",
                    
                    data: {
                        'prod_id' : prod_id,
                    },
                   
                    success: function(response) {
                        
                           
                            // console.log(response);
                            location.reload();
                     
                        swal("",response.status, "success");
                    }
                });

            });









            var incrementPlus;
var incrementMinus;

var buttonPlus  = $(".cart-qty-plus");
var buttonMinus = $(".cart-qty-minus");

var incrementPlus = buttonPlus.click(function() {
	var $n = $(this)
		.parent(".button-container")
		.parent(".containerr")
		.find(".qty-input");
	$n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
		var $n = $(this)
		.parent(".button-container")
		.parent(".containerr")
		.find(".qty-input");
	var amount = Number($n.val());
	if (amount > 0) {
		$n.val(amount-1);
	}
});



$('.changeQuantity').click(function (e) { 
    e.preventDefault();



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var prod_id = $(this).closest('.button-container').find('.prod_id').val();
    var qty = $(this).closest('.button-container').find('.qty-input').val();
    data = {
        'prod_id': prod_id,
        'prod_qty': qty,
    }
    $.ajax({
        method: "POST",
        url: "update-cart",
        data: data,
        dataType: "json",
        success: function (response) {
            window.location.reload();
            // swal(response.status);
        }
    });
});










    });
