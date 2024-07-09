<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\UserModel;

class CartController extends Controller
{
    public function addItem($id) {
        $productModel = new ProductModel();
        $product = $productModel->find($id);
    
        if (!$product) {
            return redirect()->to('/');
        }
    
        $item = array(
            'id'      => $product['ID'],
            'qty'     => 1,
            'price'   => $product['productPrice'],
            'name'    => $product['productTitle']
        );
    
        $session = session();
        if ($session->has('cart')) {
            $cart = $session->get('cart');
            $index = $this->exists($id);
    
            if ($index === false || $index === null) {
                array_push($cart, $item);
            } else {
                $cart[$index]['qty']++;
            }
    
            $session->set('cart', $cart);
        } else {
            $cart = array($item);
            $session->set('cart', $cart);
        }
    
        return redirect()->to('/');
    }
    

    private function exists($id) {
        $session = session();
        $cart = $session->get('cart');
    
        if (!is_array($cart) || empty($cart)) {
            return false;
        }
    
        foreach ($cart as $index => $item) {
            if ($item['id'] == $id) {
                return $index;
            }
        }
    
        return false;
    }

    public function deleteItem($id) {
        $session = session();
        $cart = $session->get('cart');
        $index = $this->exists($id);
        
        if ($index === false) {
            return redirect()->to('/cart')->with('error', 'Product not found in your cart!');
        }
    
        unset($cart[$index]);
        $session->set('cart', array_values($cart)); // Re-index array
    
        return redirect()->to('/cart');
    }

    public function updateItem($id) {
        $session = session();
        $cart = $session->get('cart');
        $index = $this->exists($id);
        
        if ($index === false) {
            echo "Product not found in your cart!";
        } else {
            $qty = $this->request->getPost('qty');
            $cart[$index]['qty'] = $qty;
            $session->set('cart', $cart);
        }
        
        return redirect()->to('/cart');
    }
    
    
    public function showCart() {
        $userModel = new UserModel();
        $session = session();
        $cart = $session->get('cart');
        $data['items'] = (!empty(session()->get('cart'))) ? array_values($cart) : NULL;
        $data['user'] = $userModel->find($session->get('loggedInUser'));
        return view('header') 
        . view('cart', $data);
    }
}
