<?php

require_once PROJECT_ROOT_PATH . "../Model/Database.php";
class ProductModel extends Database
{
    public function addToCartProduct($requestData)
    {
        $itemId = $requestData['item_id'];
        $price = $requestData['price'];
        $itemsQty = $requestData['items_qty'];
        $total = $price*$itemsQty;

         $result = $this->insert("INSERT into quote (`item_id`, `price`,`items_qty`,`total`) values($itemId,$price,$itemsQty,$total)");

         if($result){
             return [
                'success' => true,
                'status'=>200,
                'error'=>0,
                'message'=> 'product added to cart successfully!'
              ];
         }


    }

    /**
     * @param $limit
     * @return array
     * @throws Exception
     */
    public function getProduct($limit){
        return $this->select("select * from product ORDER BY id ASC LIMIT ?", ["i", $limit]);
    }
}