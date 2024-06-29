<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
class UserController extends BaseController
{

    public function __construct() {
        helper(['url','form','session','html']);
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
        }
        if(isset($userID) && session()->get('userRole') == 'admin') {
            return redirect()->to("/admin");
        }

        return redirect()->to("/login")->with('fail_L','Failed to authenticate.');
    }

    public function update_user()
    {
        $userModel = new UserModel();
        $userID = session()->get("loggedInUser");
        $user = $userModel->find($userID);
        if(isset($userID) && session()->get('userRole') == 'user') {
            $data = [
            'firstName' => $this->request->getPost('first_name'),
            "lastName" => $this->request->getPost('last_name'),
            "email" =>$this->request->getPost('email'),
            "Phone" => $this->request->getPost('phone') ];
            $userModel->update($userID,$data);
            return redirect()->to("/userPanel");

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
