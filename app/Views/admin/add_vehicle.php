<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add Vehicle</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
                                <li class="breadcrumb-item active" aria-current="page">Add Vehicle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Vehicle Details</h4>
                </div>
                <div id="vehicleBasicInformationMultipartFormWrapper">
                    <?= form_open('admin/save-vehicle', 'id="save_vehicle_form" ') ?>
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <!-- Step Indicators -->
                            <ul class="step-indicators">
                                <li><span class="indicator active" data-step="1">1</span></li>
                                <li><span class="indicator" data-step="2">2</span></li>
                                <li><span class="indicator" data-step="3">3</span></li>
                                <li><span class="indicator" data-step="4">4</span></li>
                                <li><span class="indicator" data-step="5">5</span></li>
                                <li><span class="indicator" data-step="6">6</span></li>
                            </ul>
                            <div id="step1" class="step">
                                <h5>Vehicle Info</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Choose Showroom<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="branch_id" id="branch_id" placeholder="Please choose dealer branch." >
                                                <option value="">Choose...</option>
                                                <?php if(isset($showroomList) && !empty($showroomList)){ foreach ($showroomList as $value) { ?>
                                                    <option value="<?php echo isset($value['id'])?$value['id']:''; ?>"><?php echo isset($value['name'])?$value['name']:''; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Vehicle Type<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="vehicle_type" id="vehicle_type" placeholder="Please choose Vehicle Type." >
                                                <option value="">Choose...</option>
                                                <option value="1">Car</option>
                                                <option value="2">Bike</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Make<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="cmp_id" id="vehicleCompany">
                                                <option value="">Choose...</option>
                                                <?php if(isset($cmpList) && !empty($cmpList)){ foreach ($cmpList as $value) { ?>
                                                    <option value="<?php echo isset($value['id'])?$value['id']:''; ?>"><?php echo isset($value['cmp_name'])?$value['cmp_name']:''; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Model<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="model_id" id="vehicleCompanyModel">
                                                <option value="">Choose...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Fuel Type<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="fuel_type" id="fuel_type">
                                                <option value="">Choose...</option>
                                                <?php if(isset($fuelTypeList) && !empty($fuelTypeList)){ foreach ($fuelTypeList as $value) { ?>
                                                    <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->name)?$value->name:''; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Variant<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="variant_id" id="variant_id">
                                                <option value="">Choose...</option>
                                                <?php if(isset($fuelVariantList) && !empty($fuelVariantList)){ foreach ($fuelVariantList as $value) { ?>
                                                    <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->name)?$value->name:''; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Mileage<span class="required">*</span></label>
                                            <input type="text" name="mileage" id="mileage" class="form-control formInput">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Kilometers Driven<span class="required">*</span></label>
                                            <input type="text" name="kms_driven" id="kms_driven" class="form-control formInput">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Owner<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="owner" id="owner">
                                                <option value="">Choose...</option>
                                                <option value="1">1st</option>
                                                <option value="2">2nd</option>
                                                <option value="3">3rd</option>
                                                <option value="4">3+ Owner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Gear Transmission<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="transmission_id" id="transmission_id">
                                                <option value="">Choose...</option>
                                                <?php if(isset($transmissionList) && !empty($transmissionList)){ foreach ($transmissionList as $value) { ?>
                                                    <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->title)?$value->title:''; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Colour<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="color_id" id="color_id">
                                                <option value="">Choose...</option>
                                                <?php if(isset($colorList) && !empty($colorList)){ foreach ($colorList as $value) { ?>
                                                    <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->name)?$value->name:''; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Featured Status<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="featured_status" id="featured_status">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>On Sale Status<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="onsale_status" id="onsale_status">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4" id="onsale_percentage_div" style="display:none;">
                                        <div class="form-group">
                                            <label>On Sale Percentage<span class="required">*</span></label>
                                            <input type="text" class="form-control formInput" name="onsale_percentage" id="onsale_percentage">
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more fields for Step 1 here -->
                                <button type="button" class="btn btn-primary next">Next</button>
                            </div>
                            <div id="step2" class="step">
                                <h5>Registration Details</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Make Year<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="manufacture_year" id="manufacture_year">
                                                <option value="">Choose...</option>
                                                <?php for($i=1975;$i<=date("Y");$i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Registration Year<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="registration_year" id="registration_year">
                                                <option value="">Choose...</option>
                                                <?php for($i=1975;$i<=date("Y");$i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Registered State<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="registered_state_id" id="registeredStateRto">
                                                <option value="">Choose...</option>
                                                <?php if(isset($stateList) && !empty($stateList)){ foreach ($stateList as $value) { ?>
                                                    <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->name)?$value->name:''; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>RTO<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="rto" id="registeredRto">
                                                <option value="">Choose...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more fields for Step 2 here -->
                                <button type="button" class="btn btn-primary prev">Previous</button>
                                <button type="button" class="btn btn-primary next">Next</button>
                            </div>
                            <div id="step3" class="step">
                                <h5>Insurance Details</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Insurance Type<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="insurance_type" id="insurance_type">
                                                <option value="">Choose...</option>
                                                <option value="1">Third Party</option>
                                                <option value="2">Comprehensive / Zero Debt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Insurance Validity<span class="required">*</span></label>
                                            <input name="insurance_validity" id="insurance_validity" class="form-control formInput date-picker" placeholder="Select Date" type="text">
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more fields for Step 2 here -->
                                <button type="button" class="btn btn-primary prev">Previous</button>
                                <button type="button" class="btn btn-primary next">Next</button>
                            </div>
                            <div id="step4" class="step">
                                <h5>Overview</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Accidental<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="accidental_status" id="accidental_status">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Flooded<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="flooded_status" id="flooded_status">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Last Service Kilometer<span class="required">*</span></label>
                                            <input type="tel" class="form-control formInput" name="last_service_kms" id="last_service_kms">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Last Service Date<span class="required">*</span></label>
                                            <input type="text" class="form-control formInput date-picker" name="last_service_date" id="last_service_date">
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more fields for Step 2 here -->
                                <button type="button" class="btn btn-primary prev">Previous</button>
                                <button type="button" class="btn btn-primary next">Next</button>
                            </div>
                            <div id="step5" class="step">
                                <h5>Features</h5>
                                <div id="vehicleFeaturesWrapper"></div>
                                <!-- <div class="row" id="car_features_section" style="display:none;">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Number of Airbags<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_no_of_airbags" id="car_no_of_airbags">
                                                <option value="">Choose...</option>
                                                <option value="1">None</option>
                                                <option value="2">1 Airbag</option>
                                                <option value="3">2 Airbags</option>
                                                <option value="4">3 Airbags</option>
                                                <option value="5">4 Airbags</option>
                                                <option value="6">5 Airbags</option>
                                                <option value="7">6 Airbags</option>
                                                <option value="8">7 Airbags</option>
                                                <option value="9">7+ Airbags</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Central Locking<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_central_locking" id="car_central_locking">
                                                <option value="">Choose...</option>
                                                <option value="1">None</option>
                                                <option value="2">Key</option>
                                                <option value="3">Keyless</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Seat Upholstery<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_seat_upholstery" id="car_seat_upholstery">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Sunroof/Moonroof<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_sunroof" id="car_sunroof">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Integrated Music System<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_integrated_music_system" id="car_integrated_music_system">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Rear AC<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_rear_ac" id="car_rear_ac">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Outside Rear View Mirrors<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_outside_rear_view_mirrors" id="car_outside_rear_view_mirrors">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Power Windows<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_power_windows" id="car_power_windows">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Engine Start-Stop<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_engine_start_stop" id="car_engine_start_stop">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Headlamps<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_headlamps" id="car_headlamps">
                                                <option value="">Choose...</option>
                                                <option value="1">LED</option>
                                                <option value="2">Halogen</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Power Steering<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="car_power_steering" id="car_power_steering">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="bike_features_section" style="display:none;">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Headlight Type<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_headlight_type" id="bike_headlight_type">
                                                <option value="">Choose...</option>
                                                <option value="1">LED</option>
                                                <option value="2">Halogen</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Odometer<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_odometer" id="bike_odometer">
                                                <option value="">Choose...</option>
                                                <option value="1">None</option>
                                                <option value="2">Digital</option>
                                                <option value="3">Analogue</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>DRL's (Day Time Running Lights)<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_drl" id="bike_drl">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Mobile Connectivity<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_mobile_connectivity" id="bike_mobile_connectivity">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>GPS Navigation<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_gps_navigation" id="bike_gps_navigation">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>USB Charging Port<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_usb_charging_port" id="bike_usb_charging_port">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Low Battery Indicator<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_low_battery_indicator" id="bike_low_battery_indicator">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Under Seat Storage<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_under_seat_storage" id="bike_under_seat_storage">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Speedometer<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_speedometer" id="bike_speedometer">
                                                <option value="">Choose...</option>
                                                <option value="1">Digital</option>
                                                <option value="2">Analogue</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Stand Alarm<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_stand_alarm" id="bike_stand_alarm">
                                                <option value="">Choose...</option>
                                                <option value="1">Digital</option>
                                                <option value="2">Analogue</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Low Fuel Indicator<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_low_fuel_indicator" id="bike_low_fuel_indicator">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Low Oil Indicator<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_low_oil_indicator" id="bike_low_oil_indicator">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Start Type<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_start_type" id="bike_start_type">
                                                <option value="">Choose...</option>
                                                <option value="1">Electric Start</option>
                                                <option value="2">Kick Start</option>
                                                <option value="3">Electric + KickStart</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Kill Switch<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_kill_switch" id="bike_kill_switch">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Break Light<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_break_light" id="bike_break_light">
                                                <option value="">Choose...</option>
                                                <option value="1">Halogen</option>
                                                <option value="2">Analogue</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Turn Signal Indicator<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="bike_turn_signal_indicator" id="bike_turn_signal_indicator">
                                                <option value="">Choose...</option>
                                                <option value="1">Halogen Bulb</option>
                                                <option value="2">LED</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Add more fields for Step 2 here -->
                                <button type="button" class="btn btn-primary prev">Previous</button>
                                <button type="button" class="btn btn-primary next">Next</button>
                            </div>
                            <div id="step6" class="step">
                                <h5>Pricing</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Regular Price<span class="required">*</span></label>
                                            <input type="tel" class="form-control formInput" name="regular_price" id="regular_price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div id="saleInput">
                                            <div class="form-group">
                                                <label>Selling Price<span class="required">*</span></label>
                                                <input type="tel" class="form-control formInput" name="selling_price" id="selling_price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Pricing Type<span class="required">*</span></label>
                                            <select class="custom-select formInput" name="pricing_type" id="pricing_type">
                                                <option value="">Choose...</option>
                                                <option value="1">Fixed Price</option>
                                                <option value="2">Negotiable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more fields for Step 3 here -->
                                <button type="button" class="btn btn-primary prev">Previous</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </div>
                    <?= form_close() ?>
                </div>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <input type="hidden" name="vehicleId" id="vehicleId" class="vehicleId" value="">
                <h5 class="text-blue mb-3">Vehicle Images</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Thumbnail Image<span class="required">*</span></label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control onlyImageInput" id="thumbnailImage" accept="image/*">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="uploadThumbnail">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Add a container to display the thumbnail preview -->
                        <div id="thumbnailPreviewContainer"></div>
                    </div>
                </div>

                <div class="tab">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#exterior" role="tab" aria-selected="true">Exterior</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#interior" role="tab" aria-selected="false">Interior</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#others" role="tab" aria-selected="false">Others</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="exterior" role="tabpanel">
                            <div class="pd-20">
                                <?= form_open_multipart('upload/upload-exterior-main-vehicle-images', 'id="upload_exterior_main_vehicle_images_form" ') ?>
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="vehicleId" id="vehicleId" class="vehicleId" value="">
                                    <h5>Main Images</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Front Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_main_front_img" id="exterior_main_front_img" class="form-control-file form-control height-auto formInput onlyImageInput">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Right Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_main_right_img" id="exterior_main_right_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Back Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_main_back_img" id="exterior_main_back_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Left Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_main_left_img" id="exterior_main_left_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Roof Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_main_roof_img" id="exterior_main_roof_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Bonet Open Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_main_bonetopen_img" id="exterior_main_bonetopen_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Engine Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_main_engine_img" id="exterior_main_engine_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Diagonal Images</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Right Front Diagonal Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_diagnoal_right_front_img" id="exterior_diagnoal_right_front_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Right Back Diagonal Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_diagnoal_right_back_img" id="exterior_diagnoal_right_back_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Left Back Diagonal Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_diagnoal_left_back_img" id="exterior_diagnoal_left_back_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Left Front Diagonal Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_diagnoal_left_front_img" id="exterior_diagnoal_left_front_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Wheel Images</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Right Front Wheel Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_wheel_right_front_img" id="exterior_wheel_right_front_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Right Back Wheel Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_wheel_right_back_img" id="exterior_wheel_right_back_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Left Back Wheel Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_wheel_left_back_img" id="exterior_wheel_left_back_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Left Front Wheel Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_wheel_left_front_img" id="exterior_wheel_left_front_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Spare Wheel Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_wheel_spare_img" id="exterior_wheel_spare_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Tyre Tread Images</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Right Front Tyre Tread Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_tyrethread_right_front_img" id="exterior_tyrethread_right_front_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Right Back Tyre Tread Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_tyrethread_right_back_img" id="exterior_tyrethread_right_back_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Left Back Tyre Tread Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_tyrethread_left_back_img" id="exterior_tyrethread_left_back_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Left Front Tyre Tread Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_tyrethread_left_front_img" id="exterior_tyrethread_left_front_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Underbody Images</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Front Underbody Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_underbody_front_img" id="exterior_underbody_front_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Rear Underbody Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_underbody_rear_img" id="exterior_underbody_rear_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Right Side Underbody Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_underbody_right_img" id="exterior_underbody_right_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Left Side Underbody Image<span class="required">*</span></label>
                                                <input type="file" name="exterior_underbody_left_img" id="exterior_underbody_left_img" class="form-control-file form-control height-auto ">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                <?= form_close() ?> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="interior" role="tabpanel">
                            <div class="pd-20">
                                <?= form_open_multipart('upload/upload-interior-vehicle-images', 'id="upload_interior_vehicle_images_form" ') ?>
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="vehicleId" id="vehicleId" class="vehicleId" value="">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Dashboard Image<span class="required">*</span></label>
                                                <input type="file" name="interior_dashboard_img" id="interior_dashboard_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Infotainment System Image<span class="required">*</span></label>
                                                <input type="file" name="interior_infotainment_system_img" id="interior_infotainment_system_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Steering Wheel Image<span class="required">*</span></label>
                                                <input type="file" name="interior_steering_wheel_img" id="interior_steering_wheel_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Odometer Image<span class="required">*</span></label>
                                                <input type="file" name="interior_odometer_img" id="interior_odometer_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Gear Lever Image<span class="required">*</span></label>
                                                <input type="file" name="interior_gear_lever_img" id="interior_gear_lever_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Pedals Image<span class="required">*</span></label>
                                                <input type="file" name="interior_pedals_img" id="interior_pedals_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Front Cabin Image<span class="required">*</span></label>
                                                <input type="file" name="interior_front_cabin_img" id="interior_front_cabin_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Mid Cabin Image <small>(Optional)</small></label>
                                                <input type="file" name="interior_mid_cabin_img" id="interior_mid_cabin_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Rear Cabin Image<span class="required">*</span></label>
                                                <input type="file" name="interior_rear_cabin_img" id="interior_rear_cabin_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Driver Side Door Panel Image<span class="required">*</span></label>
                                                <input type="file" name="interior_driver_side_door_panel_img" id="interior_driver_side_door_panel_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Driver Side Adjustment Image<span class="required">*</span></label>
                                                <input type="file" name="interior_driver_side_adjustment_img" id="interior_driver_side_adjustment_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Boot Inside Image<span class="required">*</span></label>
                                                <input type="file" name="interior_boot_inside_img" id="interior_boot_inside_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Boot Door Open Image<span class="required">*</span></label>
                                                <input type="file" name="interior_boot_door_open_img" id="interior_boot_door_open_img" class="form-control-file form-control height-auto">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                <?= form_close() ?> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="others" role="tabpanel">
                            <div class="pd-20">
                                <?= form_open_multipart('upload/upload-others-vehicle-images', 'id="upload_others_vehicle_images_form" ') ?>
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="vehicleId" id="vehicleId" class="vehicleId" value="">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Keys<span class="required">*</span></label>
                                                <input type="file" name="others_keys_img" id="others_keys_img" class="form-control-file form-control height-auto formInput">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                <?= form_close() ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a></div>
    </div>
</div>
<?= $this->endSection() ?>

