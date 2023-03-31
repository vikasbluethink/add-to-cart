<?php

/**
 * Product controller
 */
class ProductController extends BaseController
{
    /**
     * "/addToCart" Endpoint - Add To Cart Product
     */
    public function addToCartAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $requestData = $_POST;
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $this->validateParams($requestData);
                $productModel = new ProductModel();
                $response = $productModel->addToCartProduct($requestData);
                $responseData = json_encode($response);
            } catch (Exception $e) {
                $strErrorDesc = 'Something went wrong! Please contact support.'.$e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    /**
     * @param $requestData
     * @return true|void
     */
    public function validateParams($requestData)
    {
        $strErrorDesc = '';
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        if(!array_key_exists('item_id', $requestData) || $requestData['item_id'] == ""){
            $strErrorDesc = 'Item id not found';
        }elseif (!array_key_exists('price',$requestData) || $requestData['price'] == ""){
            $strErrorDesc = 'Please set price';
        }elseif (!array_key_exists('items_qty',$requestData) || $requestData['items_qty'] == "" || $requestData['items_qty'] == 0){
            $strErrorDesc = 'Please set product qty';
        }else{
            return true;
        }

        $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
            array('Content-Type: application/json', $strErrorHeader)
        );

    }

    /**
     * "/product/get" Endpoint - Get Products list
     */
    public function getProduct()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if (strtoupper($requestMethod) == 'GET') {
            try {
                $limit = 10;
                $productModel = new ProductModel();
                $response = $productModel->getProduct($limit);
                $responseData = json_encode($response);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}