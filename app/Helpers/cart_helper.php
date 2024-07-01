<?php
if (! function_exists('get_cart_item_count')) {
    function get_cart_item_count() {
        $session = session();
        $cart = $session->get('cart');
        
        $cartItemCount = 0;
        if ($cart && is_array($cart)) {
            foreach ($cart as $item) {
                $cartItemCount += $item['qty'];
            }
        }
        
        return $cartItemCount;
    }
}
