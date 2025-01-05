<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1><span id="policy_text"></span></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- STAT SECTION ABOUT --> 
<div class="section">
	<div class="container">
    	<div class="row align-items-center">
            <div id="div_policy" class="col-lg-12">
                
            </div>
        </div>
    </div>
</div>
<!-- END SECTION ABOUT --> 

<script>
    // policy();
    async function policy(){
        let searchParam = new URLSearchParams(window.location.search);
        let type = searchParam.get('type');

        if(type="about")
            $("#policy_text").text("About Us");

        let res = await axios.get('/PolicyByType/'+type);
        let des = res.data['data'][0]['des'];
        $("#div_policy").html(des);
    }
</script>