<?php

function component($tag, $product_id,$product_name,$product_img,$product_img1,$product_img2,$product_img3,$brand_name,$rental_charge,$rent_days,$retail_price,$size,$delivery_date,$return_date,$product_info){
    $element = "
    
    <div class=\"col-md-4 col-sm-6 my-3 my-md-2\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                        <a href=\"product.php?product_id=$product_id\">
                            <img src=\"$product_img\" alt=\"Image\" class=\"img-fluid card-img-top\">
                        </a>
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\"><span>Product Name : </span><a href=\"product.php?product_id=$product_id\">$product_name</a>
                            </h5>

                            <h5>
                                <span>Brand Name : </span>
                                <span class=\"price\"> $brand_name</span>
                            </h5>

                            <h5>
                                <span>Rental Charge : </span>
                                <span class=\"price\"> $$rental_charge</span>
                                <br>
                            <a  style=\" font-size:20px; float:right; color:red; font-family:papyrus,fantasy;\" href=\"product.php?product_id=$product_id\">Details </a>


                            
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}
// <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
//                              <input type='hidden' name='product_id' value='$product_id'>


function cartElement($tag, $product_id,$product_name,$product_img,$brand_name,$rental_charge,$rent_days,$retail_price,$size,$delivery_date,$return_date,$product_info){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$product_id\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$product_img alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$product_name</h5>
                                <h5 class=\"pt-2\">$$rental_charge</h5>

                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

















