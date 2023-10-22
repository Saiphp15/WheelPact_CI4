<?php $this->extend('web/layout/main-layout'); ?>
<?php $this->section('content'); ?>
    <!-- STORE BANNER SECTION STARTS -->

    <section class="pt-3 pb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="v-banner-wrapper">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"
                            data-bs-interval="false">
                            <div class="carousel-indicators d-none">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                                    aria-label="Slide 5"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                                    aria-label="Slide 6"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                                    aria-label="Slide 7"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"
                                    aria-label="Slide 8"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8"
                                    aria-label="Slide 9"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9"
                                    aria-label="Slide 10"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10"
                                    aria-label="Slide 11"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="11"
                                    aria-label="Slide 12"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="12"
                                    aria-label="Slide 13"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="13"
                                    aria-label="Slide 14"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="14"
                                    aria-label="Slide 15"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="15"
                                    aria-label="Slide 16"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="16"
                                    aria-label="Slide 17"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="17"
                                    aria-label="Slide 18"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="18"
                                    aria-label="Slide 19"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="19"
                                    aria-label="Slide 20"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="20"
                                    aria-label="Slide 21"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="21"
                                    aria-label="Slide 22"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="22"
                                    aria-label="Slide 23"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="23"
                                    aria-label="Slide 24"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="24"
                                    aria-label="Slide 25"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="25"
                                    aria-label="Slide 26"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="26"
                                    aria-label="Slide 27"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="27"
                                    aria-label="Slide 28"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="28"
                                    aria-label="Slide 29"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="29"
                                    aria-label="Slide 30"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="30"
                                    aria-label="Slide 31"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="31"
                                    aria-label="Slide 32"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="32"
                                    aria-label="Slide 33"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="33"
                                    aria-label="Slide 34"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="34"
                                    aria-label="Slide 35"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="35"
                                    aria-label="Slide 36"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item v-image-item active">
                                    <img src="<?php echo isset($vehicleDetails['thumbnail_url']) && !empty($vehicleDetails['thumbnail_url'])?$vehicleDetails['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>" alt="Thumbnail Image">
                                    <div class="image-angle-tag">
                                        <p>Thumbnail Image</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_main_front_img']) && !empty($vehicleDetails['vehicleImages']['exterior_main_front_img'])?$vehicleDetails['vehicleImages']['exterior_main_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Front</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_diagnoal_right_front_img']) && !empty($vehicleDetails['vehicleImages']['exterior_diagnoal_right_front_img'])?$vehicleDetails['vehicleImages']['exterior_diagnoal_right_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Right Front Diagonal</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_main_right_img']) && !empty($vehicleDetails['vehicleImages']['exterior_main_right_img'])?$vehicleDetails['vehicleImages']['exterior_main_right_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Right</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_diagnoal_right_back_img']) && !empty($vehicleDetails['vehicleImages']['exterior_diagnoal_right_back_img'])?$vehicleDetails['vehicleImages']['exterior_diagnoal_right_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Right Back Diagonal</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_main_back_img']) && !empty($vehicleDetails['vehicleImages']['exterior_main_back_img'])?$vehicleDetails['vehicleImages']['exterior_main_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Back</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_diagnoal_left_back_img']) && !empty($vehicleDetails['vehicleImages']['exterior_diagnoal_left_back_img'])?$vehicleDetails['vehicleImages']['exterior_diagnoal_left_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Left Back Diagonal</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_main_left_img']) && !empty($vehicleDetails['vehicleImages']['exterior_main_left_img'])?$vehicleDetails['vehicleImages']['exterior_main_left_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Left</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_diagnoal_left_front_img']) && !empty($vehicleDetails['vehicleImages']['exterior_diagnoal_left_front_img'])?$vehicleDetails['vehicleImages']['exterior_diagnoal_left_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Left Front Diagonal</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_main_bonetopen_img']) && !empty($vehicleDetails['vehicleImages']['exterior_main_bonetopen_img'])?$vehicleDetails['vehicleImages']['exterior_main_bonetopen_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Open Bonet</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_wheel_right_front_img']) && !empty($vehicleDetails['vehicleImages']['exterior_wheel_right_front_img'])?$vehicleDetails['vehicleImages']['exterior_wheel_right_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Right Front Wheel</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_wheel_right_back_img']) && !empty($vehicleDetails['vehicleImages']['exterior_wheel_right_back_img'])?$vehicleDetails['vehicleImages']['exterior_wheel_right_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Right Back Wheel</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_wheel_left_back_img']) && !empty($vehicleDetails['vehicleImages']['exterior_wheel_left_back_img'])?$vehicleDetails['vehicleImages']['exterior_wheel_left_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Left Back Wheel</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_wheel_left_front_img']) && !empty($vehicleDetails['vehicleImages']['exterior_wheel_left_front_img'])?$vehicleDetails['vehicleImages']['exterior_wheel_left_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Left Front Wheel</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_tyrethread_right_front_img']) && !empty($vehicleDetails['vehicleImages']['exterior_tyrethread_right_front_img'])?$vehicleDetails['vehicleImages']['exterior_tyrethread_right_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Right Front Tyre Tread</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_tyrethread_right_back_img']) && !empty($vehicleDetails['vehicleImages']['exterior_tyrethread_right_back_img'])?$vehicleDetails['vehicleImages']['exterior_tyrethread_right_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Right Rear Tyre Tread</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_tyrethread_left_back_img']) && !empty($vehicleDetails['vehicleImages']['exterior_tyrethread_left_back_img'])?$vehicleDetails['vehicleImages']['exterior_tyrethread_left_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Left Rear Tyre Tread</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_tyrethread_left_front_img']) && !empty($vehicleDetails['vehicleImages']['exterior_tyrethread_left_front_img'])?$vehicleDetails['vehicleImages']['exterior_tyrethread_left_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Left Front Tyre Tread</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_wheel_spare_img']) && !empty($vehicleDetails['vehicleImages']['exterior_wheel_spare_img'])?$vehicleDetails['vehicleImages']['exterior_wheel_spare_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Spare Wheels</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_main_roof_img']) && !empty($vehicleDetails['vehicleImages']['exterior_main_roof_img'])?$vehicleDetails['vehicleImages']['exterior_main_roof_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Roof</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_underbody_front_img']) && !empty($vehicleDetails['vehicleImages']['exterior_underbody_front_img'])?$vehicleDetails['vehicleImages']['exterior_underbody_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Front Underbody</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['exterior_underbody_rear_img']) && !empty($vehicleDetails['vehicleImages']['exterior_underbody_rear_img'])?$vehicleDetails['vehicleImages']['exterior_underbody_rear_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Rear Underbody</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_dashboard_img']) && !empty($vehicleDetails['vehicleImages']['interior_dashboard_img'])?$vehicleDetails['vehicleImages']['interior_dashboard_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Dashboard</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_infotainment_system_img']) && !empty($vehicleDetails['vehicleImages']['interior_infotainment_system_img'])?$vehicleDetails['vehicleImages']['interior_infotainment_system_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Infotainment System</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_steering_wheel_img']) && !empty($vehicleDetails['vehicleImages']['interior_steering_wheel_img'])?$vehicleDetails['vehicleImages']['interior_steering_wheel_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Steering Wheel</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_odometer_img']) && !empty($vehicleDetails['vehicleImages']['interior_odometer_img'])?$vehicleDetails['vehicleImages']['interior_odometer_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Odometer</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_gear_lever_img']) && !empty($vehicleDetails['vehicleImages']['interior_gear_lever_img'])?$vehicleDetails['vehicleImages']['interior_gear_lever_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Gear Lever</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_pedals_img']) && !empty($vehicleDetails['vehicleImages']['interior_pedals_img'])?$vehicleDetails['vehicleImages']['interior_pedals_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Pedals</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_front_cabin_img']) && !empty($vehicleDetails['vehicleImages']['interior_front_cabin_img'])?$vehicleDetails['vehicleImages']['interior_front_cabin_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Front Cabin</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_mid_cabin_img']) && !empty($vehicleDetails['vehicleImages']['interior_mid_cabin_img'])?$vehicleDetails['vehicleImages']['interior_mid_cabin_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Mid Cabin</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_rear_cabin_img']) && !empty($vehicleDetails['vehicleImages']['interior_rear_cabin_img'])?$vehicleDetails['vehicleImages']['interior_rear_cabin_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Rear Cabin</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_driver_side_door_panel_img']) && !empty($vehicleDetails['vehicleImages']['interior_driver_side_door_panel_img'])?$vehicleDetails['vehicleImages']['interior_driver_side_door_panel_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Driver Side Door Panel</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_driver_side_adjustment_img']) && !empty($vehicleDetails['vehicleImages']['interior_driver_side_adjustment_img'])?$vehicleDetails['vehicleImages']['interior_driver_side_adjustment_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Driver Side Adjustment</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_boot_inside_img']) && !empty($vehicleDetails['vehicleImages']['interior_boot_inside_img'])?$vehicleDetails['vehicleImages']['interior_boot_inside_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Boot Inside</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['interior_boot_door_open_img']) && !empty($vehicleDetails['vehicleImages']['interior_boot_door_open_img'])?$vehicleDetails['vehicleImages']['interior_boot_door_open_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Boot Door Open</p>
                                    </div>
                                </div>
                                <div class="carousel-item v-image-item">
                                    <img src="<?php echo isset($vehicleDetails['vehicleImages']['others_keys_img']) && !empty($vehicleDetails['vehicleImages']['others_keys_img'])?$vehicleDetails['vehicleImages']['others_keys_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="d-block w-100" alt="...">
                                    <div class="image-angle-tag">
                                        <p>Keys</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="vbd-wrapper">
                        <div class="vehicle-title">
                            <h4><?php echo isset($vehicleDetails['cmp_name']) && !empty($vehicleDetails['cmp_name'])?$vehicleDetails['cmp_name']:''; ?> <?php echo isset($vehicleDetails['cmp_model_name']) && !empty($vehicleDetails['cmp_model_name'])?$vehicleDetails['cmp_model_name']:''; ?></h4>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <div class="vehicle-overview">
                                    <div class="d-flex">
                                        <div class="v-detail-icon">
                                            <i class="icofont-calendar"></i>
                                        </div>
                                        <div class="overview-badge">
                                            <h6>Year</h6>
                                            <h5><?php echo isset($vehicleDetails['registration_year']) && !empty($vehicleDetails['registration_year'])?$vehicleDetails['registration_year']:''; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="vehicle-overview">
                                    <div class="d-flex">
                                        <div class="v-detail-icon">
                                            <i class="icofont-road"></i>
                                        </div>
                                        <div class="overview-badge">
                                            <h6>Driven</h6>
                                            <h5><?php echo isset($vehicleDetails['kms_driven']) && !empty($vehicleDetails['kms_driven'])?$vehicleDetails['kms_driven']:''; ?>km</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="vehicle-overview">
                                    <div class="d-flex">
                                        <div class="v-detail-icon">
                                            <i class="icofont-water-drop"></i>
                                        </div>
                                        <div class="overview-badge">
                                            <h6>Fuel Type</h6>
                                            <h5><?php echo isset($vehicleDetails['fuelTypeName']) && !empty($vehicleDetails['fuelTypeName']) ? $vehicleDetails['fuelTypeName'] : 'NA'; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="vehicle-overview">
                                    <div class="d-flex">
                                        <div class="v-detail-icon">
                                            <i class="icofont-key"></i>
                                        </div>
                                        <div class="overview-badge">
                                            <h6>Owner</h6>
                                            <h5>
                                                <?php 
                                                if(isset($vehicleDetails['owner']) && !empty($vehicleDetails['owner'])){
                                                    if($vehicleDetails['owner']==1){
                                                        echo '<h6>1st</h6>';
                                                    }elseif($vehicleDetails['owner']==2){
                                                        echo '<h6>2nd</h6>';
                                                    }elseif($vehicleDetails['owner']==3){
                                                        echo '<h6>3rd</h6>';
                                                    }elseif($vehicleDetails['owner']==4){
                                                        echo '<h6>3+ Owner</h6>';
                                                    }
                                                }
                                                ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="vehicle-overview">
                                    <div class="d-flex">
                                        <div class="v-detail-icon">
                                            <i class="icofont-traffic-light"></i>
                                        </div>
                                        <div class="overview-badge">
                                            <h6>RTO</h6>
                                            <h5><?php echo isset($vehicleDetails['indiarto_rto_state_code']) && !empty($vehicleDetails['indiarto_rto_state_code']) ? $vehicleDetails['indiarto_rto_state_code'] : 'NA'; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="vehicle-overview">
                                    <div class="d-flex">
                                        <div class="v-detail-icon">
                                            <i class="icofont-umbrella"></i>
                                        </div>
                                        <div class="overview-badge">
                                            <h6>Insurance</h6>
                                            <h5>
                                                <?php 
                                                if(isset($vehicleDetails['insurance_type']) && !empty($vehicleDetails['insurance_type'])){
                                                    if($vehicleDetails['insurance_type']==1){
                                                        echo 'Third-Party';
                                                    }elseif($vehicleDetails['insurance_type']==2){
                                                        echo 'Comprehensive';
                                                    }
                                                }
                                                ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vehicle-price d-flex align-items-center">
                            <h5>₹<?php echo isset($vehicleDetails['selling_price']) && !empty($vehicleDetails['selling_price']) ? number_format($vehicleDetails['selling_price'], 0, '.', ',') : 'NA'; ?></h5>
                            <h6>
                                (
                                    <?php 
                                    if(isset($vehicleDetails['pricing_type']) && !empty($vehicleDetails['pricing_type'])){
                                        if($vehicleDetails['pricing_type']==1){
                                            echo 'Fixed';
                                        }elseif($vehicleDetails['pricing_type']==2){
                                            echo 'Negotiable';
                                        }
                                    }
                                    ?>
                                )
                            </h6>
                        </div>
                        <div class="vehicle-emi d-flex">
                            <h6>EMI from</h6>
                            <h6 class="emi-value"><?php echo isset($vehicleDetails['monthly_emi']) && !empty($vehicleDetails['monthly_emi']) ? number_format($vehicleDetails['monthly_emi'], 0, '.', ',') : 'NA'; ?></h6><span class="emi-month">/month</span>
                        </div>
                    </div>
                    <div class="v-location-wrapper">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h6>Parked At</h6>
                                <a href="#">
                                    <div class="d-flex">
                                        <h5><?php echo isset($vehicleDetails['branch_name']) && !empty($vehicleDetails['branch_name']) ? $vehicleDetails['branch_name'] : 'NA'; ?></h5>
                                        <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-2">
                                <div class="v-detail-icon float-end">
                                    <i class="icofont-location-arrow"></i>
                                </div>
                            </div>
                            <a href="#">
                                <p class="mt-2">Sanjari Business Park, Near Mira Industrial Estate, Western Express
                                    Highway, Mira Road (East), Thane-401107.</p>
                            </a>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="dg-brand-btn">Reserve Now</button>
                        <button class="dg-brand-btn">Contact Seller</button>
                        <button class="whatsapp-brand-btn"><i class="icofont-whatsapp"></i> WhatsApp</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- STORE BANNER SECTION ENDS -->

    <section class="pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="vfd-wrapper">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Overview
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="vehicle-overview-table">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="table-field">Accidental</td>
                                                                <td class="table-field-data">
                                                                    <?php 
                                                                    if(isset($vehicleDetails['accidental_status']) && !empty($vehicleDetails['accidental_status'])){
                                                                        if($vehicleDetails['accidental_status']==1){
                                                                            echo 'Yes';
                                                                        }elseif($vehicleDetails['accidental_status']==2){
                                                                            echo 'No';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="table-field">Flooded</td>
                                                                <td class="table-field-data">
                                                                    <?php 
                                                                    if(isset($vehicleDetails['flooded_status']) && !empty($vehicleDetails['flooded_status'])){
                                                                        if($vehicleDetails['flooded_status']==1){
                                                                            echo 'Yes';
                                                                        }elseif($vehicleDetails['flooded_status']==2){
                                                                            echo 'No';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="table-field">Last Service Kilometer</td>
                                                                <td class="table-field-data"><?php echo isset($vehicleDetails['last_service_kms']) && !empty($vehicleDetails['last_service_kms']) ? number_format($vehicleDetails['last_service_kms'], 0, '.', ',') : 'NA'; ?>km</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="table-field">Last Service Date</td>
                                                                <td class="table-field-data"><?php echo isset($vehicleDetails['last_service_date']) && !empty($vehicleDetails['last_service_date']) ? date("d M Y",strtotime($vehicleDetails['last_service_date'])) : 'NA'; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="vehilce-overview-table">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="table-field">Registered In</td>
                                                                <td class="table-field-data"><?php echo isset($vehicleDetails['registration_year']) && !empty($vehicleDetails['registration_year']) ? $vehicleDetails['registration_year'] : 'NA'; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="table-field">Transmission</td>
                                                                <td class="table-field-data"><?php echo isset($vehicleDetails['transmission_name']) && !empty($vehicleDetails['transmission_name']) ? $vehicleDetails['transmission_name'] : 'NA'; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="table-field">Insurance Type</td>
                                                                <td class="table-field-data">
                                                                    <?php 
                                                                    if(isset($vehicleDetails['insurance_type']) && !empty($vehicleDetails['insurance_type'])){
                                                                        if($vehicleDetails['insurance_type']==1){
                                                                            echo 'Third-Party';
                                                                        }elseif($vehicleDetails['insurance_type']==2){
                                                                            echo 'Comprehensive';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="table-field">Insurance Validity</td>
                                                                <td class="table-field-data"><?php echo isset($vehicleDetails['insurance_validity']) && !empty($vehicleDetails['insurance_validity']) ? date("d M Y",strtotime($vehicleDetails['insurance_validity'])) : 'NA'; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Features
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <?php if(isset($vehicleDetails['vehicle_type']) && $vehicleDetails['vehicle_type']==1){ ?>
                                                <div class="col-md-6">
                                                    <div class="vehicle-overview-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="table-field">Airbags</td>
                                                                    <td class="table-field-data"><?php echo isset($vehicleDetails['car_no_of_airbags']) && !empty($vehicleDetails['car_no_of_airbags']) ? $vehicleDetails['car_no_of_airbags'] : 'NA'; ?> Airbags</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Seat Upholstery</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_seat_upholstery']) &&!empty($vehicleDetails['car_seat_upholstery'])){
                                                                            if($vehicleDetails['car_seat_upholstery']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['car_seat_upholstery']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Integrated (in-dash) Music System</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_integrated_music_system']) &&!empty($vehicleDetails['car_integrated_music_system'])){
                                                                            if($vehicleDetails['car_integrated_music_system']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['car_integrated_music_system']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Outside Rear View Mirrors</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_outside_rear_view_mirrors']) &&!empty($vehicleDetails['car_outside_rear_view_mirrors'])){
                                                                            if($vehicleDetails['car_outside_rear_view_mirrors']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['car_outside_rear_view_mirrors']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Engine start-stop</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_engine_start_stop']) &&!empty($vehicleDetails['car_engine_start_stop'])){
                                                                            if($vehicleDetails['car_engine_start_stop']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['car_engine_start_stop']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="vehilce-overview-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="table-field">Central Locking</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_central_locking']) &&!empty($vehicleDetails['car_central_locking'])){
                                                                            if($vehicleDetails['car_central_locking']==1){
                                                                                echo 'none';
                                                                            }elseif($vehicleDetails['car_central_locking']==2){
                                                                                echo 'key';
                                                                            }elseif($vehicleDetails['car_central_locking']==2){
                                                                                echo 'keyless';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Sunroof / Moonroof</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_sunroof']) &&!empty($vehicleDetails['car_sunroof'])){
                                                                            if($vehicleDetails['car_sunroof']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['car_sunroof']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Rear AC</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_rear_ac']) &&!empty($vehicleDetails['car_rear_ac'])){
                                                                            if($vehicleDetails['car_rear_ac']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['car_rear_ac']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Power Windows</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_power_windows']) &&!empty($vehicleDetails['car_power_windows'])){
                                                                            if($vehicleDetails['car_power_windows']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['car_power_windows']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Headlamps</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['car_headlamps']) &&!empty($vehicleDetails['car_headlamps'])){
                                                                            if($vehicleDetails['car_headlamps']==1){
                                                                                echo 'LED';
                                                                            }elseif($vehicleDetails['car_headlamps']==2){
                                                                                echo 'Hologen';
                                                                            }
                                                                        }
                                                                       ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php }elseif(isset($vehicleDetails['vehicle_type']) && $vehicleDetails['vehicle_type']==2){ ?>
                                                <div class="col-md-6">
                                                    <div class="vehicle-overview-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="table-field">Headlight Type</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_headlight_type']) && !empty($vehicleDetails['bike_headlight_type'])){
                                                                            if($vehicleDetails['bike_headlight_type']==1){
                                                                                echo 'LED';
                                                                            }elseif($vehicleDetails['bike_headlight_type']==2){
                                                                                echo 'Hologen';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Odometer</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_odometer']) && !empty($vehicleDetails['bike_odometer'])){
                                                                            if($vehicleDetails['bike_odometer']==1){
                                                                                echo 'Digital';
                                                                            }elseif($vehicleDetails['bike_odometer']==2){
                                                                                echo 'Analogue';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">DRLs (Day Time Running Lights)</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_drl']) && !empty($vehicleDetails['bike_drl'])){
                                                                            if($vehicleDetails['bike_drl']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_drl']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Mobile Connectivity</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_mobile_connectivity']) && !empty($vehicleDetails['bike_mobile_connectivity'])){
                                                                            if($vehicleDetails['bike_mobile_connectivity']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_mobile_connectivity']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">GPS Navigation</td>
                                                                    <td class="table-field-data">
                                                                    <?php 
                                                                        if(isset($vehicleDetails['bike_gps_navigation']) && !empty($vehicleDetails['bike_gps_navigation'])){
                                                                            if($vehicleDetails['bike_gps_navigation']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_gps_navigation']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">USB Charging Port</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_usb_charging_port']) && !empty($vehicleDetails['bike_usb_charging_port'])){
                                                                            if($vehicleDetails['bike_usb_charging_port']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_usb_charging_port']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Low Battery Indicator</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_low_battery_indicator']) && !empty($vehicleDetails['bike_low_battery_indicator'])){
                                                                            if($vehicleDetails['bike_low_battery_indicator']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_low_battery_indicator']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Under Seat Storage</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_under_seat_storage']) && !empty($vehicleDetails['bike_under_seat_storage'])){
                                                                            if($vehicleDetails['bike_under_seat_storage']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_under_seat_storage']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="vehilce-overview-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="table-field">Speedometer</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_speedometer']) && !empty($vehicleDetails['bike_speedometer'])){
                                                                            if($vehicleDetails['bike_speedometer']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_speedometer']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Stand Alarm</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_stand_alarm']) &&!empty($vehicleDetails['bike_stand_alarm'])){
                                                                            if($vehicleDetails['bike_stand_alarm']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_stand_alarm']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Low Fuel Indicator</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_low_fuel_indicator']) &&!empty($vehicleDetails['bike_low_fuel_indicator'])){
                                                                            if($vehicleDetails['bike_low_fuel_indicator']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_low_fuel_indicator']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Low Oil Indicator</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_low_oil_indicator']) &&!empty($vehicleDetails['bike_low_oil_indicator'])){
                                                                            if($vehicleDetails['bike_low_oil_indicator']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_low_oil_indicator']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Start Type</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_start_type']) &&!empty($vehicleDetails['bike_start_type'])){
                                                                            if($vehicleDetails['bike_start_type']==1){
                                                                                echo 'Electric';
                                                                            }elseif($vehicleDetails['bike_start_type']==2){
                                                                                echo 'Kick start';
                                                                            }elseif($vehicleDetails['bike_start_type']==3){
                                                                                echo 'Electric + Kick Start';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Kill Switch</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_kill_switch']) &&!empty($vehicleDetails['bike_kill_switch'])){
                                                                            if($vehicleDetails['bike_kill_switch']==1){
                                                                                echo 'Yes';
                                                                            }elseif($vehicleDetails['bike_kill_switch']==2){
                                                                                echo 'No';
                                                                            }
                                                                        }
                                                                       ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Break Light</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_break_light']) &&!empty($vehicleDetails['bike_break_light'])){
                                                                            if($vehicleDetails['bike_break_light']==1){
                                                                                echo 'Hologen';
                                                                            }elseif($vehicleDetails['bike_break_light']==2){
                                                                                echo 'Analogue';
                                                                            }
                                                                        }
                                                                       ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-field">Turn Signal Indicator</td>
                                                                    <td class="table-field-data">
                                                                        <?php 
                                                                        if(isset($vehicleDetails['bike_turn_signal_indicator']) &&!empty($vehicleDetails['bike_turn_signal_indicator'])){
                                                                            if($vehicleDetails['bike_turn_signal_indicator']==1){
                                                                                echo 'Hologen Bulb';
                                                                            }elseif($vehicleDetails['bike_turn_signal_indicator']==2){
                                                                                echo 'LED';
                                                                            }
                                                                        }
                                                                      ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-sm-12 col-md-4 mx-auto mt-3 mb-3">
                        <button class="dg-brand-btn"><i class="icofont-file-pdf"></i> Download Inspection Report</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="emi-calc-wrapper">
                        <div class="emi-sec-title">
                            <h5>EMI Calculator</h5>
                        </div>

                        <div class="calc-form">
                            <form action="#">
                                <div class="mb-2">
                                    <label class="brand-label mb-1">Loan Amount</label>
                                    <input type="text" value="720000" class="brand-input loan-amount">
                                </div>

                                <div class="mb-2">
                                    <label class="brand-label mb-1">Interest Rate (%)</label>
                                    <input type="text" value="12.99" class="brand-input interest-rate">
                                </div>

                                <div class="mb-2">
                                    <label class="brand-label mb-1">Tenure (in months)</label>
                                    <input type="text" value="35" class="brand-input loan-tenure">
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto mt-3 mb-3">
                                    <button class="dg-brand-btn calculate-btn">Calculate EMI</button>
                                </div>
                            </form>
                        </div>

                        <div class="row align-items-end">
                            <div class="col-4">
                                <div class="calc-result mt-3">
                                    <div class="loan-emi">
                                        <h6>EMI</h6>
                                        <h5 class="value">0</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="calc-result mt-3">
                                    <div class="total-interest">
                                        <h6>Interest Payable</h6>
                                        <h5 class="value">0</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="calc-result mt-3">
                                    <div class="total-amount">
                                        <h6>Total Amount</h6>
                                        <h5 class="value">0</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="loan-chart">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SIMILAR CAR SECTION STARTS -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="section-title mb-4">
                        <h3>Similar Cars</h3>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="dg-brand-btn">View All</button>
                    </div>
                </div>
            </div>

            <div class="carousel-wrapper mt-3">
                <div id="similar-vehicle-carousel" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/mercedes-gle300d-white-7077.jpg">
                            </a>

                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Mercedes-Benz GLE</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>50,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Diesel</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>

                                <div class="wishlist">
                                    <i class="icofont-heart"></i>
                                </div>
                            </div>
                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹56,00,0000</h5>
                                <h6>(Negotiable)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>40,000/month</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <a href="#">
                            <div class="vehicle-wrapper">
                                <a href="#">
                                    <img
                                        src="https://cdn.bigboytoyz.com/new-version/products/porsche718boxsteryellow-1.jpg">
                                </a>
                                <div class="vehicle-wrapper-title">
                                    <a href="#">
                                        <h5>Porsche Panamera</h5>
                                    </a>
                                </div>
                                <div class="d-flex vehicle-overview">
                                    <div class="overview-badge">
                                        <h6>Year</h6>
                                        <h5>2021</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Driven</h6>
                                        <h5>20,000km</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Fuel Type</h6>
                                        <h5>Petrol</h5>
                                    </div>

                                    <div class="overview-badge">
                                        <h6>Owner</h6>
                                        <h5>1st</h5>
                                    </div>
                                </div>

                                <div class="wishlist">
                                    <i class="icofont-heart"></i>
                                </div>

                                <div class="vehicle-price d-flex align-items-center">
                                    <h5>₹32,00,0000</h5>
                                    <h6>(Fixed Price)</h6>
                                </div>
                                <div class="vehicle-emi d-flex">
                                    <h6>EMI from</h6>
                                    <h6>23,000/month</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/mercedes-gle300d-white-7077.jpg">
                            </a>
                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Mercedes-Benz GLE</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>50,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Diesel</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>
                            </div>

                            <div class="wishlist">
                                <i class="icofont-heart"></i>
                            </div>

                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹56,00,0000</h5>
                                <h6>(Negotiable)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>40,000/month</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="vehicle-wrapper">
                            <a href="#">
                                <img
                                    src="https://cdn.bigboytoyz.com/new-version/products/porsche718boxsteryellow-1.jpg">
                            </a>

                            <div class="vehicle-wrapper-title">
                                <a href="#">
                                    <h5>Porsche Panamera</h5>
                                </a>
                            </div>
                            <div class="d-flex vehicle-overview">
                                <div class="overview-badge">
                                    <h6>Year</h6>
                                    <h5>2021</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Driven</h6>
                                    <h5>20,000km</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Fuel Type</h6>
                                    <h5>Petrol</h5>
                                </div>

                                <div class="overview-badge">
                                    <h6>Owner</h6>
                                    <h5>1st</h5>
                                </div>
                            </div>

                            <div class="wishlist">
                                <i class="icofont-heart"></i>
                            </div>

                            <div class="vehicle-price d-flex align-items-center">
                                <h5>₹32,00,0000</h5>
                                <h6>(Fixed Price)</h6>
                            </div>
                            <div class="vehicle-emi d-flex">
                                <h6>EMI from</h6>
                                <h6>23,000/month</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SIMILAR CAR SECTION ENDS -->
<?= $this->endSection() ?>