<?php $this->extend('admin/layout/main-layout'); ?>
<?php $this->section('content'); ?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Vehicle</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Vehicle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h4">Edit Vehicle Details</h4>
                </div>
                <div id="vehicleBasicInformationMultipartFormWrapper">
                    <?= form_open('admin/update-vehicle', 'id="update_vehicle_form" ') ?>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="vehicleId" id="vehicleId" value="<?php echo isset($vehicleDetails['id'])?$vehicleDetails['id']:''; ?>">
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
                                        <select class="custom-select formInput" name="branch_id" id="branch_id"
                                            placeholder="Please choose dealer branch.">
                                            <option value="">Choose...</option>
                                            <?php if(isset($showroomList) && !empty($showroomList)){ foreach ($showroomList as $value) { ?>
                                            <option value="<?php echo isset($value['id'])?$value['id']:''; ?>"
                                                <?php if($vehicleDetails['branch_id']==$value['id']){echo'selected';} ?>>
                                                <?php echo isset($value['name'])?$value['name']:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Vehicle Type<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="vehicle_type" id="vehicle_type" placeholder="Please choose Vehicle Type.">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php if($vehicleDetails['vehicle_type']==1){echo'selected';} ?>>Car</option>
                                            <option value="2" <?php if($vehicleDetails['vehicle_type']==2){echo'selected';} ?>>Bike</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Make<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="cmp_id" id="vehicleCompany">
                                            <option value="">Choose...</option>
                                            <?php if(isset($cmpList) && !empty($cmpList)){ foreach ($cmpList as $value) { ?>
                                            <option value="<?php echo isset($value['id'])?$value['id']:''; ?>"
                                                <?php if($vehicleDetails['cmp_id']==$value['id']){echo'selected';} ?>>
                                                <?php echo isset($value['cmp_name'])?$value['cmp_name']:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Model<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="model_id"
                                            id="vehicleCompanyModel">
                                            <option value="">Choose...</option>
                                            <?php if(isset($cmpModelList) && !empty($cmpModelList)){ foreach ($cmpModelList as $value) { ?>
                                            <option value="<?php echo isset($value['id'])?$value['id']:''; ?>"
                                                <?php if($vehicleDetails['model_id']==$value['id']){echo'selected';} ?>>
                                                <?php echo isset($value['model_name'])?$value['model_name']:''; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Fuel Type<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="fuel_type" id="fuel_type">
                                            <option value="">Choose...</option>
                                            <?php if(isset($fuelTypeList) && !empty($fuelTypeList)){ foreach ($fuelTypeList as $value) { ?>
                                            <option value="<?php echo isset($value->id)?$value->id:''; ?>"
                                                <?php if($vehicleDetails['fuel_type']==$value->id){echo'selected';} ?>>
                                                <?php echo isset($value->name)?$value->name:''; ?></option>
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
                                            <option value="<?php echo isset($value->id)?$value->id:''; ?>"
                                                <?php if($vehicleDetails['variant_id']==$value->id){echo'selected';} ?>>
                                                <?php echo isset($value->name)?$value->name:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Mileage<span class="required">*</span></label>
                                        <input type="text" name="mileage" id="mileage"
                                            value="<?php echo isset($vehicleDetails['mileage'])?$vehicleDetails['mileage']:''; ?>"
                                            class="form-control formInput">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Kilometers Driven<span class="required">*</span></label>
                                        <input type="text" name="kms_driven" id="kms_driven"
                                            value="<?php echo isset($vehicleDetails['kms_driven'])?$vehicleDetails['kms_driven']:''; ?>"
                                            class="form-control formInput">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Owner<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="owner" id="owner">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php if($vehicleDetails['owner']==1){echo'selected';} ?>>1st</option>
                                            <option value="2" <?php if($vehicleDetails['owner']==2){echo'selected';} ?>>2nd</option>
                                            <option value="3" <?php if($vehicleDetails['owner']==3){echo'selected';} ?>>3rd</option>
                                            <option value="4" <?php if($vehicleDetails['owner']==4){echo'selected';} ?>>3+ Owner</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Gear Transmission<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="transmission_id"
                                            id="transmission_id">
                                            <option value="">Choose...</option>
                                            <?php if(isset($transmissionList) && !empty($transmissionList)){ foreach ($transmissionList as $value) { ?>
                                            <option value="<?php echo isset($value->id)?$value->id:''; ?>"
                                                <?php if($vehicleDetails['transmission_id']==$value->id){echo'selected';} ?>>
                                                <?php echo isset($value->title)?$value->title:''; ?></option>
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
                                            <option value="<?php echo isset($value->id)?$value->id:''; ?>"
                                                <?php if($vehicleDetails['color_id']==$value->id){echo'selected';} ?>>
                                                <?php echo isset($value->name)?$value->name:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Featured Status<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="featured_status" id="featured_status">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php if($vehicleDetails['featured_status']==1){echo'selected';} ?>>Yes</option>
                                            <option value="2" <?php if($vehicleDetails['featured_status']==2){echo'selected';} ?>>No</option>
                                        </select>
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
                                        <select class="custom-select formInput" name="manufacture_year"
                                            id="manufacture_year">
                                            <option value="">Choose...</option>
                                            <?php for($i=1975;$i<=date("Y");$i++){ ?>
                                            <option value="<?php echo $i; ?>"
                                                <?php if($vehicleDetails['manufacture_year']==$i){echo'selected';} ?>>
                                                <?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Registration Year<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="registration_year"
                                            id="registration_year">
                                            <option value="">Choose...</option>
                                            <?php for($i=1975;$i<=date("Y");$i++){ ?>
                                            <option value="<?php echo $i; ?>"
                                                <?php if($vehicleDetails['registration_year']==$i){echo'selected';} ?>>
                                                <?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Registered State<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="registered_state_id"
                                            id="registeredStateRto">
                                            <option value="">Choose...</option>
                                            <?php if(isset($stateList) && !empty($stateList)){ foreach ($stateList as $value) { ?>
                                            <option value="<?php echo isset($value->id)?$value->id:''; ?>"
                                                <?php if($vehicleDetails['registered_state_id']==$value->id){echo'selected';} ?>>
                                                <?php echo isset($value->name)?$value->name:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>RTO<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="rto" id="registeredRto">
                                            <option value="">Choose...</option>
                                            <?php if(isset($vehicleRegRtoList) && !empty($vehicleRegRtoList)){ foreach ($vehicleRegRtoList as $value) { ?>
                                            <option value="<?php echo isset($value->id)?$value->id:''; ?>"
                                                <?php if($vehicleDetails['rto']==$value->id){echo'selected';} ?>>
                                                <?php echo isset($value->rto_state_code)?$value->rto_state_code:''; ?>
                                            </option>
                                            <?php } } ?>
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
                                        <select class="custom-select formInput" name="insurance_type"
                                            id="insurance_type">
                                            <option value="">Choose...</option>
                                            <option value="1"
                                                <?php if($vehicleDetails['insurance_type']==1){echo'selected';} ?>>Third
                                                Party</option>
                                            <option value="2"
                                                <?php if($vehicleDetails['insurance_type']==2){echo'selected';} ?>>
                                                Comprehensive / Zero Debt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Insurance Validity<span class="required">*</span></label>
                                        <input type="text" name="insurance_validity" id="insurance_validity"
                                            value="<?php echo isset($vehicleDetails['insurance_validity'])?date('d M Y',strtotime($vehicleDetails['insurance_validity'])):''; ?>"
                                            class="form-control formInput date-picker" placeholder="Select Date">
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
                                        <select class="custom-select formInput" name="accidental_status"
                                            id="accidental_status">
                                            <option value="">Choose...</option>
                                            <option value="1"
                                                <?php if($vehicleDetails['accidental_status']==1){echo'selected';} ?>>
                                                Yes</option>
                                            <option value="2"
                                                <?php if($vehicleDetails['accidental_status']==2){echo'selected';} ?>>No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Flooded<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="flooded_status" id="flooded_status">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php if($vehicleDetails['flooded_status']==1){echo'selected';} ?>>Yes</option>
                                            <option value="2" <?php if($vehicleDetails['flooded_status']==2){echo'selected';} ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Last Service Kilometer<span class="required">*</span></label>
                                        <input type="tel" value="<?php echo isset($vehicleDetails['last_service_kms'])?$vehicleDetails['last_service_kms']:''; ?>" class="form-control formInput" name="last_service_kms" id="last_service_kms">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Last Service Date<span class="required">*</span></label>
                                        <input type="text" value="<?php echo isset($vehicleDetails['last_service_date'])?date('d M Y',strtotime($vehicleDetails['last_service_date'])):''; ?>" class="form-control formInput date-picker" name="last_service_date" id="last_service_date">
                                    </div>
                                </div>
                            </div>
                            <!-- Add more fields for Step 2 here -->
                            <button type="button" class="btn btn-primary prev">Previous</button>
                            <button type="button" class="btn btn-primary next">Next</button>
                        </div>
                        <div id="step5" class="step">
                            <h5>Features</h5>
                            <div id="vehicleFeaturesWrapper">
                                <?php if($vehicleDetails['vehicle_type']==1){ ?>
                                    <div class="row" id="car_features_section">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Number of Airbags<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_no_of_airbags" id="car_no_of_airbags">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_no_of_airbags']==1){echo'selected';} ?>>None</option>
                                                    <option value="2" <?php if($vehicleDetails['car_no_of_airbags']==2){echo'selected';} ?>>1 Airbag</option>
                                                    <option value="3" <?php if($vehicleDetails['car_no_of_airbags']==3){echo'selected';} ?>>2 Airbags</option>
                                                    <option value="4" <?php if($vehicleDetails['car_no_of_airbags']==4){echo'selected';} ?>>3 Airbags</option>
                                                    <option value="5" <?php if($vehicleDetails['car_no_of_airbags']==5){echo'selected';} ?>>4 Airbags</option>
                                                    <option value="6" <?php if($vehicleDetails['car_no_of_airbags']==6){echo'selected';} ?>>5 Airbags</option>
                                                    <option value="7" <?php if($vehicleDetails['car_no_of_airbags']==7){echo'selected';} ?>>6 Airbags</option>
                                                    <option value="8" <?php if($vehicleDetails['car_no_of_airbags']==8){echo'selected';} ?>>7 Airbags</option>
                                                    <option value="9" <?php if($vehicleDetails['car_no_of_airbags']==9){echo'selected';} ?>>7+ Airbags</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Central Locking<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_central_locking" id="car_central_locking">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_central_locking']==1){echo'selected';} ?>>None</option>
                                                    <option value="2" <?php if($vehicleDetails['car_central_locking']==2){echo'selected';} ?>>Key</option>
                                                    <option value="3" <?php if($vehicleDetails['car_central_locking']==3){echo'selected';} ?>>Keyless</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Seat Upholstery<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_seat_upholstery" id="car_seat_upholstery">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_seat_upholstery']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['car_seat_upholstery']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Sunroof/Moonroof<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_sunroof" id="car_sunroof">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_sunroof']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['car_sunroof']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Integrated Music System<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_integrated_music_system" id="car_integrated_music_system">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_integrated_music_system']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['car_integrated_music_system']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Rear AC<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_rear_ac" id="car_rear_ac">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_rear_ac']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['car_rear_ac']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Outside Rear View Mirrors<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_outside_rear_view_mirrors" id="car_outside_rear_view_mirrors">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_outside_rear_view_mirrors']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['car_outside_rear_view_mirrors']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Power Windows<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_power_windows" id="car_power_windows">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_power_windows']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['car_power_windows']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Engine Start-Stop<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_engine_start_stop" id="car_engine_start_stop">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_engine_start_stop']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['car_engine_start_stop']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Headlamps<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_headlamps" id="car_headlamps">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_headlamps']==1){echo'selected';} ?>>LED</option>
                                                    <option value="2" <?php if($vehicleDetails['car_headlamps']==2){echo'selected';} ?>>Halogen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Power Steering<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="car_power_steering" id="car_power_steering">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['car_power_steering']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['car_power_steering']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php }elseif($vehicleDetails['vehicle_type']==2){ ?>
                                    <div class="row" id="bike_features_section">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Headlight Type<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_headlight_type" id="bike_headlight_type">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_headlight_type']==1){echo'selected';} ?>>LED</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_headlight_type']==2){echo'selected';} ?>>Halogen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Odometer<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_odometer" id="bike_odometer">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_odometer']==1){echo'selected';} ?>>None</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_odometer']==2){echo'selected';} ?>>Digital</option>
                                                    <option value="3" <?php if($vehicleDetails['bike_odometer']==3){echo'selected';} ?>>Analogue</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>DRLs (Day Time Running Lights)<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_drl" id="bike_drl">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_drl']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_drl']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Mobile Connectivity<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_mobile_connectivity" id="bike_mobile_connectivity">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_mobile_connectivity']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_mobile_connectivity']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>GPS Navigation<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_gps_navigation" id="bike_gps_navigation">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_gps_navigation']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_gps_navigation']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>USB Charging Port<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_usb_charging_port" id="bike_usb_charging_port">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_usb_charging_port']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_usb_charging_port']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Low Battery Indicator<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_low_battery_indicator" id="bike_low_battery_indicator">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_low_battery_indicator']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_low_battery_indicator']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Under Seat Storage<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_under_seat_storage" id="bike_under_seat_storage">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_under_seat_storage']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_under_seat_storage']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group"><label>Speedometer<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_speedometer" id="bike_speedometer">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_speedometer']==1){echo'selected';} ?>>Digital</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_speedometer']==2){echo'selected';} ?>>Analogue</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Stand Alarm<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_stand_alarm" id="bike_stand_alarm">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_stand_alarm']==1){echo'selected';} ?>>Digital</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_stand_alarm']==2){echo'selected';} ?>>Analogue</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Low Fuel Indicator<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_low_fuel_indicator" id="bike_low_fuel_indicator">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_low_fuel_indicator']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_low_fuel_indicator']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Low Oil Indicator<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_low_oil_indicator" id="bike_low_oil_indicator">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_low_oil_indicator']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_low_oil_indicator']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Start Type<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_start_type" id="bike_start_type">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_start_type']==1){echo'selected';} ?>>Electric Start</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_start_type']==2){echo'selected';} ?>>Kick Start</option>
                                                    <option value="3" <?php if($vehicleDetails['bike_start_type']==3){echo'selected';} ?>>Electric + KickStart</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Kill Switch<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_kill_switch" id="bike_kill_switch">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_kill_switch']==1){echo'selected';} ?>>Yes</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_kill_switch']==2){echo'selected';} ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Break Light<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_break_light" id="bike_break_light">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_break_light']==1){echo'selected';} ?>>Halogen</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_break_light']==2){echo'selected';} ?>>Analogue</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Turn Signal Indicator<span class="required">*</span></label>
                                                <select class="custom-select formInput" name="bike_turn_signal_indicator" id="bike_turn_signal_indicator">
                                                    <option value="">Choose...</option>
                                                    <option value="1" <?php if($vehicleDetails['bike_turn_signal_indicator']==1){echo'selected';} ?>>Halogen Bulb</option>
                                                    <option value="2" <?php if($vehicleDetails['bike_turn_signal_indicator']==2){echo'selected';} ?>>LED</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <button type="button" class="btn btn-primary prev">Previous</button>
                            <button type="button" class="btn btn-primary next">Next</button>
                        </div>
                        <div id="step6" class="step">
                            <h5>Pricing</h5>
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Regular Price<span class="required">*</span></label>
                                        <input type="tel" value="<?php echo isset($vehicleDetails['regular_price'])?$vehicleDetails['regular_price']:''; ?>" class="form-control formInput" name="regular_price" id="regular_price">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div id="saleInput">
                                        <div class="form-group">
                                            <label>Selling Price<span class="required">*</span></label>
                                            <input type="tel" value="<?php echo isset($vehicleDetails['selling_price'])?$vehicleDetails['selling_price']:''; ?>" class="form-control formInput" name="selling_price" id="selling_price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Pricing Type<span class="required">*</span></label>
                                        <select class="custom-select formInput" name="pricing_type" id="pricing_type">
                                            <option value="">Choose...</option>
                                            <option value="1" <?php if($vehicleDetails['pricing_type']==1){echo'selected';} ?>>Fixed Price</option>
                                            <option value="2" <?php if($vehicleDetails['pricing_type']==2){echo'selected';} ?>>Negotiable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more fields for Step 3 here -->
                            <button type="button" class="btn btn-primary prev">Previous</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <input type="hidden" name="vehicleId" id="vehicleId" class="vehicleId" value="<?php echo isset($vehicleDetails['id'])?$vehicleDetails['id']:''; ?>">
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
                        <div id="thumbnailPreviewContainer">
                            <img src="<?php echo isset($vehicleDetails['thumbnail_url'])?$vehicleDetails['thumbnail_url']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                        </div>
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
                                <input type="hidden" name="vehicleId" id="vehicleId" class="vehicleId" value="<?php echo isset($vehicleDetails['id'])?$vehicleDetails['id']:''; ?>">
                                <h5>Main Images</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Front Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_main_front_img" id="exterior_main_front_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_main_front_img'])?$vehicleImagesDetails['exterior_main_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Right Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_main_right_img" id="exterior_main_right_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_main_right_img'])?$vehicleImagesDetails['exterior_main_right_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Back Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_main_back_img" id="exterior_main_back_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_main_back_img'])?$vehicleImagesDetails['exterior_main_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Left Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_main_left_img" id="exterior_main_left_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_main_left_img'])?$vehicleImagesDetails['exterior_main_left_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Roof Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_main_roof_img" id="exterior_main_roof_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_main_roof_img'])?$vehicleImagesDetails['exterior_main_roof_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bonet Open Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_main_bonetopen_img" id="exterior_main_bonetopen_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_main_bonetopen_img'])?$vehicleImagesDetails['exterior_main_bonetopen_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Engine Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_main_engine_img" id="exterior_main_engine_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_main_engine_img'])?$vehicleImagesDetails['exterior_main_engine_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Diagonal Images</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Right Front Diagonal Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_diagnoal_right_front_img" id="exterior_diagnoal_right_front_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_diagnoal_right_front_img'])?$vehicleImagesDetails['exterior_diagnoal_right_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Right Back Diagonal Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_diagnoal_right_back_img" id="exterior_diagnoal_right_back_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_diagnoal_right_back_img'])?$vehicleImagesDetails['exterior_diagnoal_right_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Left Back Diagonal Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_diagnoal_left_back_img" id="exterior_diagnoal_left_back_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_diagnoal_left_back_img'])?$vehicleImagesDetails['exterior_diagnoal_left_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Left Front Diagonal Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_diagnoal_left_front_img" id="exterior_diagnoal_left_front_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_diagnoal_left_front_img'])?$vehicleImagesDetails['exterior_diagnoal_left_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Wheel Images</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Right Front Wheel Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_wheel_right_front_img" id="exterior_wheel_right_front_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_wheel_right_front_img'])?$vehicleImagesDetails['exterior_wheel_right_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Right Back Wheel Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_wheel_right_back_img" id="exterior_wheel_right_back_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_wheel_right_back_img'])?$vehicleImagesDetails['exterior_wheel_right_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Left Back Wheel Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_wheel_left_back_img" id="exterior_wheel_left_back_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_wheel_left_back_img'])?$vehicleImagesDetails['exterior_wheel_left_back_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Left Front Wheel Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_wheel_left_front_img" id="exterior_wheel_left_front_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_wheel_left_front_img'])?$vehicleImagesDetails['exterior_wheel_left_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Spare Wheel Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_wheel_spare_img" id="exterior_wheel_spare_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_wheel_spare_img'])?$vehicleImagesDetails['exterior_wheel_spare_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Tyre Tread Images</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Right Front Tyre Tread Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_tyrethread_right_front_img" id="exterior_tyrethread_right_front_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_wheel_spare_img'])?$vehicleImagesDetails['exterior_wheel_spare_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Right Back Tyre Tread Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_tyrethread_right_back_img" id="exterior_tyrethread_right_back_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_wheel_spare_img'])?$vehicleImagesDetails['exterior_wheel_spare_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Left Back Tyre Tread Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_tyrethread_left_back_img" id="exterior_tyrethread_left_back_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_wheel_spare_img'])?$vehicleImagesDetails['exterior_wheel_spare_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Left Front Tyre Tread Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_tyrethread_left_front_img" id="exterior_tyrethread_left_front_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_tyrethread_left_front_img'])?$vehicleImagesDetails['exterior_tyrethread_left_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Underbody Images</h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Front Underbody Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_underbody_front_img" id="exterior_underbody_front_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_underbody_front_img'])?$vehicleImagesDetails['exterior_underbody_front_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rear Underbody Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_underbody_rear_img" id="exterior_underbody_rear_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_underbody_rear_img'])?$vehicleImagesDetails['exterior_underbody_rear_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Right Side Underbody Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_underbody_right_img" id="exterior_underbody_right_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_underbody_right_img'])?$vehicleImagesDetails['exterior_underbody_right_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Left Side Underbody Image<span class="required">*</span></label>
                                                    <input type="file" name="exterior_underbody_left_img" id="exterior_underbody_left_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['exterior_underbody_right_img'])?$vehicleImagesDetails['exterior_underbody_right_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
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
                                <input type="hidden" name="vehicleId" id="vehicleId" class="vehicleId" value="<?php echo isset($vehicleDetails['id'])?$vehicleDetails['id']:''; ?>">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dashboard Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_dashboard_img" id="interior_dashboard_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_dashboard_img'])?$vehicleImagesDetails['interior_dashboard_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Infotainment System Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_infotainment_system_img" id="interior_infotainment_system_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_infotainment_system_img'])?$vehicleImagesDetails['interior_infotainment_system_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Steering Wheel Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_steering_wheel_img" id="interior_steering_wheel_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_steering_wheel_img'])?$vehicleImagesDetails['interior_steering_wheel_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Odometer Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_odometer_img" id="interior_odometer_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_odometer_img'])?$vehicleImagesDetails['interior_odometer_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gear Lever Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_gear_lever_img" id="interior_gear_lever_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_gear_lever_img'])?$vehicleImagesDetails['interior_gear_lever_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pedals Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_pedals_img" id="interior_pedals_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_pedals_img'])?$vehicleImagesDetails['interior_pedals_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Front Cabin Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_front_cabin_img" id="interior_front_cabin_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_front_cabin_img'])?$vehicleImagesDetails['interior_front_cabin_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mid Cabin Image <small>(Optional)</small></label>
                                                    <input type="file" name="interior_mid_cabin_img" id="interior_mid_cabin_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_front_cabin_img'])?$vehicleImagesDetails['interior_front_cabin_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rear Cabin Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_rear_cabin_img" id="interior_rear_cabin_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_rear_cabin_img'])?$vehicleImagesDetails['interior_rear_cabin_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Driver Side Door Panel Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_driver_side_door_panel_img" id="interior_driver_side_door_panel_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_driver_side_door_panel_img'])?$vehicleImagesDetails['interior_driver_side_door_panel_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Driver Side Adjustment Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_driver_side_adjustment_img" id="interior_driver_side_adjustment_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_driver_side_adjustment_img'])?$vehicleImagesDetails['interior_driver_side_adjustment_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Boot Inside Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_boot_inside_img" id="interior_boot_inside_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_boot_inside_img'])?$vehicleImagesDetails['interior_boot_inside_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Boot Door Open Image<span class="required">*</span></label>
                                                    <input type="file" name="interior_boot_door_open_img" id="interior_boot_door_open_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['interior_boot_door_open_img'])?$vehicleImagesDetails['interior_boot_door_open_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
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
                                <input type="hidden" name="vehicleId" id="vehicleId" class="vehicleId" value="<?php echo isset($vehicleDetails['id'])?$vehicleDetails['id']:''; ?>">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Keys<span class="required">*</span></label>
                                                    <input type="file" name="others_keys_img" id="others_keys_img" class="form-control-file form-control height-auto onlyImageInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="<?php echo isset($vehicleImagesDetails['others_keys_img'])?$vehicleImagesDetails['others_keys_img']:base_url('assets/admin/src/images/default-img.png'); ?>" class="img img-responsive vehicleImg" alt="Front Image">
                                            </div>
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
        <div class="footer-wrap pd-20 mb-20 card-box"><a href="<?php base_url('admin/dashboard'); ?>" target="_blank">WheelPact</a></div>
    </div>
</div>
<?= $this->endSection() ?>