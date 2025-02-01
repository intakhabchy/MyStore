<div class="row">
    <div class="col-12">
        <div class="tab-style3">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                  </li>
            </ul>
            <div class="tab-content shop_info_tab">
                  <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                  </div>
                  <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                    <table class="table table-bordered">
                        <tr>
                            <td>Capacity</td>
                            <td>5 Kg</td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>Black, Brown, Red,</td>
                        </tr>
                        <tr>
                            <td>Water Resistant</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Material</td>
                            <td>Artificial Leather</td>
                        </tr>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                    <div class="comments">
                        <h5 class="product_tab_title"><span id="review_cnt"></span> Review For <span>Blue Dress For Woman</span></h5>
                        <ul class="list_none comment_list mt-4" id="review_table">
                                                        
                        </ul>
                    </div>
                    <div class="review_form field_form">
                        <h5>Add a review</h5>
                        <form class="row mt-3">
                            <div class="form-group col-12 mb-3">
                                <div class="star_rating">
                                    <span data-value="1"><i class="far fa-star"></i></span>
                                    <span data-value="2"><i class="far fa-star"></i></span> 
                                    <span data-value="3"><i class="far fa-star"></i></span>
                                    <span data-value="4"><i class="far fa-star"></i></span>
                                    <span data-value="5"><i class="far fa-star"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-12 mb-3">
                                <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                             </div>
                            <div class="form-group col-md-6 mb-3">
                                <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                            </div>
                           
                            <div class="form-group col-12 mb-3">
                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                            </div>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="small_divider"></div>
        <div class="divider"></div>
        <div class="medium_divider"></div>
    </div>
</div>

<script>
    ProductReview();
    async function ProductReview(){
        let searchParam = new URLSearchParams(window.location.search);
        let id_rv = searchParam.get('id');

        let res = await axios.get("/Productreview/"+id_rv);

        let review_cnt = 0;

        res.data['data'].forEach((item,i)=>{
            review_cnt++;

            let eachItem = `<li>
                                <div class="comment_img">
                                    <img src="assets/images/user1.jpg" alt="user1"/>
                                </div>
                                <div class="comment_block">
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                    </div>
                                    <p class="customer_meta">
                                        <span class="review_author">${item['user']['name']}</span>
                                        <span class="comment-date">${item['created_at']}</span>
                                    </p>
                                    <div class="description">
                                        <p>${item['reviews']}</p>
                                    </div>
                                </div>
                            </li>`;

            $("#review_table").append(eachItem);
        });

        $("#review_cnt").html(review_cnt);
    }
</script>