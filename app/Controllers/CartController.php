<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\OrderModel;

class CartController extends Controller
{

    public function __construct() {
        helper(['url','form','session','html']);
    }

    
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
    
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $index = $this->exists($id);
    
            if ($index === false || $index === null) {
                array_push($cart, $item);
            } else {
                $cart[$index]['qty']++;
            }
    
            session()->set('cart', $cart);
        } else {
            $cart = array($item);
            session()->set('cart', $cart);
        }
    
        return redirect()->to('/');
    }
    

    private function exists($id) {
        $cart = session()->get('cart');
    
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
        $cart = session()->get('cart');
        $index = $this->exists($id);
        
        if ($index === false) {
            return redirect()->to('/cart')->with('error', 'Product not found in your cart!');
        }
    
        unset($cart[$index]);
        session()->set('cart', array_values($cart)); // Re-index array
    
        return redirect()->to('/cart');
    }

    public function updateItem($id) {
        $cart = session()->get('cart');
        $index = $this->exists($id);
        
        if ($index === false) {
            echo "Product not found in your cart!";
        } else {
            $qty = $this->request->getPost('qty');
            $cart[$index]['qty'] = $qty;
            session()->set('cart', $cart);
        }
        
        return redirect()->to('/cart');
    }
    
    
    public function showCart() {
        $userModel = new UserModel();
        $cart = session()->get('cart');
        $data['items'] = (!empty(session()->get('cart'))) ? array_values($cart) : NULL;
        $data['user'] = (session()->has("loggedInUser")) ? $userModel->find(session()->get('loggedInUser')) : NULL;
        return view('header') 
        . view('cart', $data);
    }

    private function getCartSummary($cart)
    {
        $cartSummary = [];
        foreach ($cart as $item) {
            $cartSummary[] = [
                'id'  => $item['id'],
                'qty' => $item['qty']
            ];
        }
        return $cartSummary;
    }


    public function placeOrder() {
        $orderModel = new OrderModel();
        if (session()->has("loggedInUser") ) {
            $validated = $this->validate([ 
            'name' => 'required|max_length[100]',
            'email' => 'required|max_length[75]|valid_email',
            'address' => 'required|max_length[150]',
            'city' => 'required|max_length[75]',
            'postal_code' => 'required|max_length[8]',
            'phone' => 'required|max_length[11]',
            'delivery_method' => 'required',
            'payment_method' => 'required']);

            if (! $validated ) {
                return redirect()->to("/cart")->with('fail', 'Incorrect data');
            }else {
                $cart = session()->get('cart');

                $data = [
                    'customersID' => session()->get("loggedInUser") ,
                    'fullName' => $this->request->getPost("name"),
                    'email' => $this->request->getPost("email"), 
                    'adress' => $this->request->getPost("address"), 
                    'city' => $this->request->getPost("city"), 
                    'postalCode' => $this->request->getPost("postal_code"), 
                    'phone' => $this->request->getPost("phone"), 
                    'deliveryMethod' => $this->request->getPost("delivery_method"), 
                    'paymentMethod' => $this->request->getPost("payment_method"),
                    'cart' => json_encode($this->getCartSummary($cart)),
                ];
                if ( $orderModel->insert($data,false) ) {
                    session()->setFlashdata('success_c', 'Order placed successfully');
                    session()->remove('cart');
                    return redirect()->to("/cart");
                }else {
                    session()->setFlashdata('fail_c', 'Order failed');
                    return redirect()->to("/cart");
                };
            }
        }else {
            session()->setFlashdata('fail_c','User must be logged in');
            return redirect()->to("/cart");
        }

    }
}
