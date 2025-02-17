<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Wishlist</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive wishlist_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-stock-status">Stock Status</th>
                                    <th class="product-add-to-cart"></th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="wishlist_table">
                                {{-- <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="assets/images/product_img1.jpg" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product"><a href="#">Blue Dress For Woman</a></td>
                                    <td class="product-price" data-title="Price">$45.00</td>
                                      <td class="product-stock-status" data-title="Stock Status"><span class="badge rounded-pill text-bg-success">In Stock</span></td>
                                    <td class="product-add-to-cart"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Add to Cart</a></td>
                                    <td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
</div>

<script>
    Productwishlist();
    async function Productwishlist(){
        let res = await axios.get('/Productwishlist');

        res.data['data'].forEach((item,i)=>{
            let eachItem = `<tr>
                                <td class="product-thumbnail"><a href="#"><img src="assets/images/product_img1.jpg" alt="product1"></a></td>
                                <td class="product-name" data-title="Product"><a href="#">${item['product']['title']}</a></td>
                                <td class="product-price" data-title="Price">$${item['product']['price']}</td>
                                    <td class="product-stock-status" data-title="Stock Status"><span class="badge rounded-pill text-bg-success">In Stock</span></td>
                                <td class="product-add-to-cart"><a href="#" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Add to Cart</a></td>
                                <td class="product-remove" data-title="Remove"><button class="btn btn-danger" data-id="${item['product']['id']}">Remove</button></td>
                            </tr>`;

            $('#wishlist_table').append(eachItem);
        });   
    }

    document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.getAttribute('data-id');

                if(confirm("Do you want to remove this item from wishlist?"))
                    Removewishlist(id);
            });
        });
    });

    async function Removewishlist(id){
        let res = await axios.get("Removewishlist/"+id);

        if(res.status == 200){
            window.location.reload();
        }
        else{
            alert("Remove failed");
        }
    }
</script>