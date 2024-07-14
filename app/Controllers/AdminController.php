<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\OrderModel;
class AdminController extends BaseController
{

    public function __construct() {
        helper(['url','form','session','html']);
    }

    private function checkAdmin() {
        $userID = session()->get("loggedInUser");
        if(isset($userID) && session()->get('userRole') == 'admin') {
            return true;
        }
        return false;
    }

    public function admin_view() {
        if ($this->checkAdmin()) {
            return view('admin/adminheader')
            . view('admin/admin_view');
        }
        return redirect()->to("/login")->with('fail_L','Failed to authenticate.');
    }

    public function admin_seller_form() {
        if ($this->checkAdmin()) {
            return view('admin/adminheader') 
            . view('admin/admin_seller_form');
        }
        return redirect()->to("/login")->with('fail_L','Failed to authenticate.');
    }

    public function admin_purchase_history() {
        if ($this->checkAdmin()) {
            return view('admin/adminheader') 
            . view('admin/admin_purchase_history');
        }
        return redirect()->to("/login")->with('fail_L','Failed to authenticate.');
    }

    public function adminPurchaseHistory()
{
    $orderModel = new OrderModel();
    $productModel = new ProductModel();
    $userModel = new UserModel();

    $orderID = $this->request->getPost('id_zamowienia_admin_history');
    $customerID = $this->request->getPost('id_klienta_admin_history');

    $orderHistory = [];

    if ($orderID) {
        $orders = $orderModel->where('orderID', $orderID)->findAll();
    } elseif ($customerID) {
        $orders = $orderModel->where('customersID', $customerID)->findAll();
    } else {
        return redirect()->back()->with('fail', 'Proszę podać ID zamówienia lub ID klienta.');
    }

    if (!$orders) {
        return redirect()->back()->with('fail', 'Nie znaleziono zamówienia/klienta.');
    }

    foreach ($orders as $order) {
        $cart = json_decode($order['cart'], true);
        foreach ($cart as $item) {
            $product = $productModel->find($item['id']);
            if ($product) {
                $orderHistory[] = [
                    'orderID' => $order['orderID'],
                    'name' => $product['productTitle'],
                    'qty' => $item['qty'],
                    'total' => $item['qty'] * $product['productPrice'],
                    'created_at' => $order['created_at'],
                    'customersID' => $order['customersID'],
                    'customer' => $userModel->find($order['customersID'])['firstName'] // Fetch customer name
                ];
            }
        }
    }

    $data = [
        'orderHistory' => $orderHistory,
    ];
    return view('admin/adminheader') .
    view('admin/admin_purchase_history', $data);
}
}