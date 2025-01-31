<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cartlist_table">
                                
                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <td colspan="6" class="px-0">
                                        <div class="row g-0 align-items-center">
    
                                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                                <div class="coupon field_form input-group">
                                                    <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-6  text-start  text-md-end">
                                                <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Cart Subtotal</td>
                                        <td class="cart_total_amount">$349.00</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Shipping</td>
                                        <td class="cart_total_amount">Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount"><strong>$349.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-fill-out">Proceed To CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
</div>

<script>
    
    Cartlist();

    async function Cartlist(){
        let res = await axios.get("/Cartlist");

        res.data['data'].forEach((item,i)=>{
            let eachItem = `<tr>
                                <td class="product-thumbnail"><a href="#"><img src="assets/images/product_img1.jpg" alt="product1"></a></td>
                                <td class="product-name" data-title="Product"><a href="#">${item['product']['title']}</a></td>
                                <td class="product-price" data-title="Price">$${item['product']['price']}</td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="2" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </td>
                                <td class="product-subtotal" data-title="Total">${item['product']['price']}</td>
                                <td class="product-remove" data-title="Remove"><button class="btn btn-danger" data-id="${item['product']['id']}">Remove</button></td>
                            </tr>`;
            
            $('#cartlist_table').append(eachItem);
        });
    }

    document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.getAttribute('data-id');

                if(confirm("Do you want to remove this item from cart?"))
                    Deletecartlist(id);
            });
        });
    });

    async function Deletecartlist(id){
        let res = await axios.get("Deletecartlist/"+id);

        if(res.status == 200){
            window.location.reload();
        }
        else{
            alert("Remove failed");
        }
    }
</script>