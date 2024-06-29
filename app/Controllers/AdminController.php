<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
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
}