<?php
$this->load->view('layout/header');
?>


<hr/>

<div class="single-blog-page-area" style="padding: 50px 0 30px;">
    <div class="container">
        <div class="row">
            <?php
            $this->load->view('pages/packageblock');
            ?>

        </div>
    </div>
</div>







<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>