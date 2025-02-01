<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <div class="card">
        <div class="card-header">
            <h3>Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="order_table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    Invoicelist();

    async function Invoicelist(){
        let res = await axios.get("/Invoicelist");

        res.data['data'].forEach((item,i)=>{
            let eachItem = `<tr>
                                <td>${i+1}</td>
                                <td>${item['created_at']}</td>
                                <td>${item['payment_status']}</td>
                                <td>${item['delivery_status']}</td>
                                <td>$${item['payable']}</td>
                            </tr>`;
            
            $("#order_table").append(eachItem);
        });
    }
</script>