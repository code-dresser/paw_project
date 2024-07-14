<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\OrderModel;
class UserController extends BaseController
{
    public function __construct() {
        helper(['url','form','session','html']);
    }

    public function user_view()
    {
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $orderModel = new OrderModel();

        $userID = session()->get("loggedInUser");
        $userOrders = $orderModel->where('customersID', $userID)->findAll();

        $orderHistory = [];

        foreach ($userOrders as $order) {
            $cart = json_decode($order['cart'], true);
            foreach ($cart as $item) {
                $product = $productModel->find($item['id']);
                if ($product) {
                    $orderHistory[] = [
                        'name' => $product['productTitle'],
                        'qty' => $item['qty'],
                        'total' => $item['qty'] * $product['productPrice'],
                        'created_at' => $order['created_at']
                    ];
                }
            }
        }

        $data = [
            'user' => $userModel->find($userID),
            'orderHistory' => $orderHistory
        ];
        if(isset($userID) && session()->get('userRole') == 'user') {
            return view('header') 
            . view('userPanel',$data);
        }
        if(isset($userID) && session()->get('userRole') == 'admin') {
            return redirect()->to("/admin");
        }
        if(isset($userID) && session()->get('userRole') == 'seller') {
            return redirect()->to("/products");
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


}
