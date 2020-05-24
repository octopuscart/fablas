<?php
$this->load->view('layout/header');
?>
<!-- Slider Area Start Here -->
<!--<div class="main-slider2">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider-3" class="slides">
<?php
foreach ($sliders as $key => $value) {
    ?>
                                                                                                                                                                                <img src="<?php echo imageserverslider . $value->file_name; ?>" alt="" title="#slider-direction-<?php echo $key; ?>" />
    <?php
}
?>        
        </div>


<?php
foreach ($sliders as $key => $value) {
    ?>
                                                                                                                                                                            <div id="slider-direction-<?php echo $key; ?>" class="t-cn slider-direction">
                                                                                                                                                                                <div class="slider-content t-lfl s-tb slider-1">
                                                                                                                                                                                    <div class="title-container s-tb-c">
                                                                                                                                                                                        <h2 class="title<?php echo $key; ?>" style="color:<?php echo $value->title_color; ?>">
    <?php echo $value->title; ?>
                                                                                                                                                                                        </h2>
                                                                                                                                                                                        <p style="color:<?php echo $value->line1_color; ?>"><?php echo $value->line1; ?></p>
                                                                                                                                                                                        <p style="color:<?php echo $value->line2_color; ?>"><?php echo $value->line2; ?></p>
                                                                                                                                                                                        <a href="<?php echo $value->link; ?>" class="btn-shop-now-fill-slider"><?php echo $value->link_text; ?></a>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
    <?php
}
?>

    </div>
</div>-->
<!-- Slider Area End Here -->
<div ng-controller="HomeController">

    <!-- Slider Area Start Here -->
    <div class="main-slider2">
        <div class="bend niceties preview-1">
            <div id="ensign-nivoslider-3" class="slides">
               <img src="<?php echo base_url(); ?>assets/sliders/home-banner-5.jpg" alt="" title="#slider-direction-5" />
           

            </div>
          

          

            <div id="slider-direction-5" class="t-cn slider-direction">
                <div class="slider-content t-lfr s-tb slider-3">
                    <div class="title-container s-tb-c hideonmoile">
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Slider Area End Here -->



    <div class="product2-area">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <span class="title-bar-left"></span>
                        <h2>New Offers</h2>
                        <span class="title-bar-right"></span>
                    </div>
                </div>
            </div>

            <div class="row featuredContainer">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 homeproductblock {{globleCartData.products[product.id] ? 'activeproduct': '' }} " ng-repeat="product in homeInit.offers" >

                    <div class="product-box1" >

                        <div class="product-img-holder" style="background: url(<?php echo PRODUCTIMAGELINK; ?>{{product.file_name}});      background-size: cover;
                             background-position: center;">

                        </div>

                        <div class="product-content-holder">
                            <h3>
                                <a href="#">{{product.title}}  <br>
                                    <span style="font-size: 12px">{{product.short_description}} </span>
                                </a>
                                <span ><span  style="font-size: 12px;">{{product.regular_price|currency:"<?php echo globle_currency; ?> "}}</span>{{product.price|currency:"<?php echo globle_currency; ?> "}}</span>

                            </h3>

                            <div class="productbuttonscontainer">

                                <button ng-click="addToCart(product.id, 1)" class="productbutton" style="    background: #d92229;
                                        color: white;
                                        border-color: #d92229;">Add To Cart</button>
                                <button ng-click="addToBuy(product.id, 1)" type="button" class="productbutton">Buy Now</button>

                            </div>  
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="offer-area1 hidden-after-desk movieblockhome">

        <div class="" style="padding: 0px 50px;">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="brand-area-box-l" style="padding-top: 24px;">
                       
                        <h1>WE HOLD A PROMINENT PLACE IN THE INDIAN TRADITIONAL RETAIL, MODERN TRADE EXPORT MARKETS</h1>
                        <p>We are also preferred suppliers to HORECA, Beauty and SPA, Car Care Business and in B2B sector.Nevertheless the knowledge & experience of our management & skilled personnel committed to deliver consistently the best quality products & services to our customers. We also have the sole exclusive distribution rights in India for SPONTEX Brand. (A leading Brand in Europe)</p>
                    </div>
                </div>
                <div id="countdown2">
<!--                    <div class="countdown-section"><h3>7th</h3> <p>FAB</p> </div>
                    <div class="countdown-section"><h3>8th</h3> <p>FAB</p> </div>
                    <div class="countdown-section"><h3>9th</h3> <p>FAB</p> </div>-->

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="brand-area-box-r">
                        <a href="#"><img src="<?php echo base_url(); ?>assets/images/1.jpg" style="height: 400px" alt="offer"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container block52">
      
            <img src="<?php echo base_url(); ?>assets/images/bottom.JPG" style="width: 100%;" alt="offer">
        
    </div>

  

 
 
</div>
<?php
$this->load->view('layout/footer');
?>