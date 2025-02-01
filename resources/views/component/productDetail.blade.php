<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Product Detail</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
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
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img" src='assets/images/product_img1.jpg' data-zoom-image="assets/images/product_zoom_img1.jpg" alt="product_img1" />
                            <a href="#" class="product_img_zoom" title="Zoom">
                                <span class="linearicons-zoom-in"></span>
                            </a>
                        </div>
                        <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                            <div class="item">
                                <a href="#" class="product_gallery_item active" data-image="assets/images/product_img1.jpg" data-zoom-image="assets/images/product_zoom_img1.jpg">
                                    <img src="assets/images/product_small_img1.jpg" alt="product_small_img1" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-2.jpg" data-zoom-image="assets/images/product_zoom_img2.jpg">
                                    <img src="assets/images/product_small_img2.jpg" alt="product_small_img2" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-3.jpg" data-zoom-image="assets/images/product_zoom_img3.jpg">
                                    <img src="assets/images/product_small_img3.jpg" alt="product_small_img3" />
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="assets/images/product_img1-4.jpg" data-zoom-image="assets/images/product_zoom_img4.jpg">
                                    <img src="assets/images/product_small_img4.jpg" alt="product_small_img4" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a href="#" id="txt_title"></a></h4>
                            <div class="product_price">
                                <span class="price" id="txt_price"></span>
                                <del>$55.25</del>
                                <div class="on_sale">
                                    <span>35% Off</span>
                                </div>
                            </div>
                            <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                            <div class="pr_desc">
                                <p id="txt_description"></p>
                            </div>
                            <div class="product_sort_info">
                                <ul>
                                    <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                    <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                    <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                                </ul>
                            </div>
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Color</span>
                                <div class="product_color_switch">
                                    <span class="active" data-color="#87554B"></span>
                                    <span data-color="#333333"></span>
                                    <span data-color="#DA323F"></span>
                                </div>
                            </div>
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Size</span>
                                <div class="product_size_switch">
                                    <span data-size="xs">xs</span>
                                    <span data-size="s">s</span>
                                    <span data-size="m">m</span>
                                    <span data-size="l">l</span>
                                    <span data-size="xl">xl</span>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" id="p_qty" name="quantity" value="1" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                            <div class="cart_btn">
                                <button class="btn btn-fill-out btn-addtocart" onclick="addToCart()" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
                                <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                                <a class="add_wishlist" onclick="addToWishlist()"><i class="icon-heart"></i></a>
                            </div>
                        </div>
                        <hr />
                        <ul class="product-meta">
                            <li>SKU: <a href="#">BE45VGRT</a></li>
                            <li>Category: <a href="#" id="txt_category"></a></li>
                            <li>Brand: <a href="#" id="txt_brand"></a></li>
                            <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li>
                        </ul>
                        
                        <div class="product_share">
                            <span>Share:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>

            @include('component.productDetailReviewComponent')
            
        </div>
    </div>
    <!-- END SECTION SHOP -->
</div>

<script>
    let searchParam = new URLSearchParams(window.location.search);
    let id = searchParam.get('id');

    productDetailById();
    async function productDetailById(){


        // alert(id);
        let res = await axios.get(`/Productdetailbyid/${id}`);

        let title = res.data['data'][0]['title'];
        let price = '$'+res.data['data'][0]['price'];
        let description = res.data['data'][0]['short_description'];
        let category = res.data['data'][0]['category']['category_name'];
        let brand = res.data['data'][0]['brand']['brand_name'];

        $('#txt_title').text(title);
        $('#txt_price').text(price);
        $('#txt_description').text(description);
        $('#txt_category').text(category);
        $('#txt_brand').text(brand);
    }

    // Cart - start
    
    // Global variable to store the selected size
    let selectedSize = null;

    // Function to handle size selection
    function initializeSizeSelection() {
        let sizeElements = document.querySelectorAll('.product_size_switch span');

        // Add a click event listener to each size element
        sizeElements.forEach(span => {
            span.addEventListener('click', function () {
                // Remove any previously selected size's "active" state (optional visual feedback)
                sizeElements.forEach(el => el.classList.remove('active'));

                // Mark the clicked size as active
                this.classList.add('active');

                // Update the selected size
                selectedSize = this.textContent.trim();

                // console.log('Selected Size:', selectedSize); // Log for debugging
            });
        });
    }

    // Initialize size selection on page load
    document.addEventListener('DOMContentLoaded', initializeSizeSelection);

    // Function to handle adding to cart
    async function addToCart() {
        try {
            // Fetch quantity
            let p_qty = document.getElementById('p_qty').value;

            // Fetch color
            let colorElement = document.querySelector('.product_color_switch .active');
            let p_color = colorElement ? colorElement.getAttribute('data-color') : null;

            let p_size = selectedSize;

            // console.log('qty : '+p_qty);
            // console.log('size : '+p_size);
            // console.log('color : '+p_color);

            if(p_qty==0){
                alert("Please select a quantity");
            }
            else if(p_color==null){
                alert("Please select a color");
            }
            else if(p_size==null){
                alert("Please select a size");
            }
            else{                
                let jsonProductData = {
                    product_id: id,
                    color: p_color,
                    size: selectedSize,
                    qty: p_qty
                };

                let res = await axios.post('/Addtocart', jsonProductData);
                // console.log(res.data);

                if(res.status == 200)
                    alert("Successfully added to cart");
            }
        } catch (e) {
            if (e.response) {
                sessionStorage.setItem("last_location",window.location.href);
                window.location.href = "/login-page";
            } else {
                console.error('Error adding to cart:', e);
            }
        }
    }

    // Cart - end

    async function addToWishlist(){
        
        try{
            let res = await axios.get('/Createwishlist/'+id);
            // window.location.href='/wishlist-page';
        }catch(e){            
            if(e.response){
                sessionStorage.setItem("last_location",window.location.href);
                window.location.href = "/login-page";
            }
        }
    }
</script>