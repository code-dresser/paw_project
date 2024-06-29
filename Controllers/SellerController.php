<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
class SellerController extends BaseController
{

    public function __construct() {
        helper(['url','form','session','html']);
        
    }

    public function seller_view() {
        $productModel = new ProductModel();
        $data = [
            'products' => $productModel->findAll()
        ];
        return view('header')
        . view('seller_view',$data);
    }


    public function product($id = NULL) {
        $productModel = new ProductModel();
        if ($id === NULL) {
            return view('header') . view('productForm');
        }else {
            $data = [
                'product' => $productModel->find($id)
            ];
            return view('header') . view('productForm',$data);
        }

    }


    public function save() {
        
        $productModel = new ProductModel();
        $id = $this->request->getPost("id");
        $title = $this->request->getPost('productName');
        $description = $this->request->getPost('productDescription');
        $image = $this->request->getFile('productImage');
        $filepath = WRITEPATH . 'uploads/' . $image->store('images/',$image->getName()) ; 
        $image_name =  $filepath;
        $price = $this->request->getPost('productPrice');
        $data = [
            'productTitle' => $title,
            'productDescription' => $description,
            'productImage' => $image_name,
            'productPrice' => $price
        ];
        if ($id == "NULL" ) {
            $productModel->save($data);
        }else  {
            $productModel->update(intval($id),$data);
        }

        return redirect()->to("/products");
    }

}
