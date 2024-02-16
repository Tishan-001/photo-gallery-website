<?php $this->view("catalog/header",$data); ?>

<style>
    .image-hover:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
    }
</style>
    
<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?= ASSETS ?>catalog/img/Hero.jpg" style="height: 600px; color: white;">
    <!-- Your hero content goes here -->
    <h1>Welcome to Our Photography World</h1>
    <p><b>Capturing moments that last a lifetime</b></p>
</div>

<!-- Gallery -->
<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row tm-mt-50">
        <h2 class="tm-text-primary">
            Our Portfolio
        </h2>
        <div class="col-lg-4 col-md-12 mb-4">
            <img
            src="<?= ASSETS ?>catalog/img/gallery-1.jpg"
            class="w-100 shadow-1-strong rounded mb-4 image-hover"
            />

            <img
            src="<?= ASSETS ?>catalog/img/gallery-2.jpg"
            class="w-100 shadow-1-strong rounded mb-4 image-hover"
            />
        </div>

        <div class="col-lg-4 mb-4">
            <img
            src="<?= ASSETS ?>catalog/img/gallery-3.jpg"
            class="w-100 shadow-1-strong rounded mb-4 image-hover"
            />

            <img
            src="<?= ASSETS ?>catalog/img/gallery-4.jpg"
            class="w-100 shadow-1-strong rounded mb-4 image-hover"
            />
        </div>

        <div class="col-lg-4 mb-4">
            <img
            src="<?= ASSETS ?>catalog/img/gallery-5.jpg"
            class="w-100 shadow-1-strong rounded mb-4 image-hover"
            />

            <img
            src="<?= ASSETS ?>catalog/img/gallery-6.jpg"
            class="w-100 shadow-1-strong rounded mb-4 image-hover"
            />
        </div>
    </div>
</div>
<!-- Gallery -->

<section class="services bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Our Services</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="service-item text-center">
                    <i class="fas fa-camera fa-3x mb-3"></i>
                    <h3>Photography Sessions</h3>
                    <p>Capture beautiful moments with our professional photography sessions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item text-center">
                    <i class="fas fa-images fa-3x mb-3"></i>
                    <h3>Photo Editing</h3>
                    <p>Enhance your photos with our expert photo editing services.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item text-center">
                    <i class="fas fa-ring fa-3x mb-3"></i>
                    <h3>Special Events</h3>
                    <p>Make your special events memorable with our event photography.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<?php $this->view("catalog/footer"); ?>
 
