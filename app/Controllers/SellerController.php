<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
class SellerController extends BaseController
{

    public function __construct() {
        helper(['url','form','session','html']);
        
    }

    private function checkRole() {
        $userID = session()->get("loggedInUser");
        if(isset($userID) && session()->get('userRole') == 'seller') {
            return true;
        }
        return false;
    }

    public function seller_view() {
    if ($this->checkRole()) {
        $productModel = new ProductModel();
        $data = [
            'products' => $productModel->findAll()
        ];
        return view('header')
        . view('seller_view',$data);
    }else{
        return redirect()->to("/login")->with('fail_L','Failed to authenticate.');
    }
    }


    public function product($id = NULL) {
        if ( $this->checkRole() ) {
        $productModel = new ProductModel();
        if ($id === NULL) {
            return view('header') . view('productForm');
        }else {
            $data = [
                'product' => $productModel->find($id)
            ];
            return view('header') . view('productForm',$data);
        }
    }else{
        return redirect()->to("/login")->with('fail_L','Failed to authenticate.');
    }

    }


    public function save() {
        if ( $this->checkRole() ) {
        $productModel = new ProductModel();
        $id = $this->request->getPost("id");
        $title = $this->request->getPost('productName');
        $description = $this->request->getPost('productDescription');
        $image = $this->request->getFile('productImage')->isValid() ? $this->request->getFile('productImage') : NULL;
        $price = $this->request->getPost('productPrice');
        if ($id == "NULL" ) {
            $filepath = ($image == NULL)  ? "uploads/images/about-img.png" : 'uploads/' . $image->store('images/',$image->getName()) ; 
            $data = [
                'productTitle' => $title,
                'productDescription' => $description,
                'productImage' => $filepath,
                'productPrice' => $price
            ];
            $productModel->save($data);
            
        }else  {
            $filepath = ($image == NULL) ? $productModel->select("productImage")->where('id',$id)->findAll()[0] : 'uploads/' . $image->store('images/',$image->getName());
            $data = [
                'productTitle' => $title,
                'productDescription' => $description,
                'productImage' => $filepath,
                'productPrice' => $price
            ];
            $productModel->update(intval($id),$data);
        }

        return redirect()->to("/products");
    }else{
        return redirect()->to("/login")->with('fail_L','Failed to authenticate.');
    }
    }

}
