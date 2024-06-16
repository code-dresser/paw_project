<?php
if (session()->has("loggedInUser")){
    echo "Hello ";
    echo $user[0]['firstName'] . "  "  . $user[0]['lastName'];
    echo '<br/><a href="'. base_url('/logout').'">Logout</a><br/>';
}else{
    echo '<a href="'. base_url('/login').'">Login</a><br/>';
}


foreach($products as $product){
    echo "<h2>";
    echo $product["productTitle"];
    echo "</h2> <br/>";
    echo $product["productDescription"];
    echo "<br/><h3>Price:";
    echo $product["productPrice"];
    echo "</h3><br/><br/><br/>";
}

?>