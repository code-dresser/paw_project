<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
class UserController extends BaseController
{

    public function __construct() {
        helper(['url','form','session']);
    }

    public function user_view()
    {
        $userModel = new UserModel();
        $userID = session()->get("loggedInUser");
        $data = [
            'user' => $userModel->find($userID) ,
        ];
        if(isset($userID) && session()->get('userRole') == 'user') {
            return view('header') 
            . view('userPanel',$data);
        }else{
           return redirect()->to("/login")->with('fail_L','Failed to authenticate.');
        }
    }

    public function shop_view() {

        $productModel = new ProductModel();
        $userModel = new UserModel();

        $user = $userModel->select("firstName,lastName")->where("ID",session()->get("loggedInUser"))->find();
        $data = [
            'products' => $productModel->findAll(), 
            'user' => $user
        ];
        return view('header')
        . view('shopView',$data);
    }

    public function cart() {
        $productModel = new ProductModel();
        $prices = $productModel->select("productTitle,productPrice")->findAll();
        $map = [];
        $items = json_decode($_POST['cart'],TRUE);
        foreach($prices as $price) {
            $map[$price['productTitle']] = floatval($price['productPrice']);
        }
        $data = [
            'prices' => $map,
            'items' => $items
        ];
        return view('header') 
        . view('cart',$data);
    }
}
