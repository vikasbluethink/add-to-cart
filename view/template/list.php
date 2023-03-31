<?php

    $url = 'localhost/CartJS/index.php/getProduct';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $products = json_decode($response);

    curl_close($ch);
    ?>
    <div class="container">
        <div class="row">
<?php
foreach ($products as $product) {
    ?>

            <div class="card m-3" style="width: 18rem;">
                <img src="https://media.istockphoto.com/id/1396307692/photo/mockup-of-laptop-with-empty-white-screen-transparent-pattern-background.jpg?s=2048x2048&w=is&k=20&c=HCok1Ot8WqGlThdXx_p24s-xRo_pDJJymbD1pdUAZNA=" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$product->product_name?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <input type="hidden" id="<?='price-'.$product->id?>" value="<?=$product->price?>">

                    <button class="btn btn-primary add-to-cart" id="<?=$product->id?>">Add to Cart</button>
                    <span class="m-1 "><?='Price: $'.$product->price?></span>
                    <p class="card-text" id="qty"><?='Available:'.$product->qty?></p>
                    <div class="counter">
                        <div class="increase-cart-btn" id="<?='qty-'.$product->id?>">+</div>
                        <input type="text" name="qty" class="item-qty" id="<?='qty-'.$product->id?>" value="1">
                        <div class="decrease-cart-btn" id="<?='qty-'.$product->id?>">-</div>
                    </div>
                </div>
            </div>


<?php
    }
?>
        </div>
    </div>
