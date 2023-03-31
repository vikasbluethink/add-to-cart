var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.6.3.min.js';
document.getElementsByTagName('head')[0].appendChild(script);
let getUrl = window.location;
let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

$(".increase-cart-btn").click(function(){
    let value = $('input#'+this.id).val();
    value = parseInt(value) + 1;
    $('input#'+this.id).val(value);

})

$(".decrease-cart-btn").click(function(){
    let value = $('input#'+this.id).val();
    if(value == 1){
        $('input#'+this.id).val(value);
        return;
    }
        value = value - 1;
    $('input#'+this.id).val(value);

})



$(".add-to-cart").click(function(){
    var id = this.id;
    var price = $('input#price-'+id).val();
    var qty = $('input#qty-'+id).val();
    var data = {item_id:id,price:price,items_qty:qty};
    $.ajax({
        url: baseUrl+'/index.php/addToCart',
        type:"POST",
        data:data,
        success: function(response) {
            console.log(response.success);
            console.log(response.message);
            $('.alert-success').html(response.message);
            $('.alert-success').show();
            setTimeout(()=>{
                $('.alert-success').hide();
            }, 3000)
        },
        error: function (response, errorThrown) {
            Success = false;//doesn't go here
        }
    })
});
