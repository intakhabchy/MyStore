<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div class="carousel-inner" id="carousel_section">
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<script>
    // Hero();
    
    async function Hero(){
        let res = await axios.get('/Productslider');

        $("#carousel_section").empty();

        res.data['data'].forEach((item,i)=>{
            let activeClass = "";
            
            if(i==0){
                activeClass = "active";
            }

            let sliderItem = `<div class="carousel-item background_bg ${activeClass}" data-img-src="${item['image']}">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner_content overflow-hidden">
                                	<h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">${item['short_description']}</h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">${item['title']}</h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>`;

            $("#carousel_section").append(sliderItem);
        });
    }
</script>

<!-- END MAIN CONTENT -->