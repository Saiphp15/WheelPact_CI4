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
                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard">
                        <h5>Vehicle Info</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Choose Showroom<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected>Choose...</option>
                                            <?php if(isset($showroomList) && !empty($showroomList)){ foreach ($showroomList as $value) { ?>
                                                <option value="<?php echo isset($value['id'])?$value['id']:''; ?>"><?php echo isset($value['name'])?$value['name']:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Vehicle Type<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected>Choose...</option>
                                            <option value="1">Car</option>
                                            <option value="2">Bike</option>
                                        </select>
                                    </div>
                                </div>
                                      
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Make<span class="required">*</span></label>
                                        <select class="custom-select" name="" id="vehicleCompany">
                                            <option selected>Choose...</option>
                                            <?php if(isset($cmpList) && !empty($cmpList)){ foreach ($cmpList as $value) { ?>
                                                <option value="<?php echo isset($value['id'])?$value['id']:''; ?>"><?php echo isset($value['cmp_name'])?$value['cmp_name']:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Model<span class="required">*</span></label>
                                        <select class="custom-select" name="" id="vehicleCompanyModel">
                                            <option selected>Choose...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Fuel Type<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <?php if(isset($fuelTypeList) && !empty($fuelTypeList)){ foreach ($fuelTypeList as $value) { ?>
                                                <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->name)?$value->name:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Variant<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected>Choose...</option>
                                            
                                            <?php if(isset($fuelVariantList) && !empty($fuelVariantList)){ foreach ($fuelVariantList as $value) { ?>
                                                <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->name)?$value->name:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Kilometers Driven<span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Owner<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
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
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <?php if(isset($transmissionList) && !empty($transmissionList)){ foreach ($transmissionList as $value) { ?>
                                                <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->title)?$value->title:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Colour<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <?php if(isset($colorList) && !empty($colorList)){ foreach ($colorList as $value) { ?>
                                                <option value="<?php echo isset($value->id)?$value->id:''; ?>"><?php echo isset($value->name)?$value->name:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h5>Registration Details</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Make Year<span class="required">*</span></label>
                                        <input class="form-control month-picker" placeholder="Month & Year">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Registration Year<span class="required">*</span></label>
                                        <input class="form-control month-picker" placeholder="Month & Year">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Registered State<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Maharashtra</option>
                                            <option value="2">Gujarat</option>
                                            <option value="3">Uttar Pradesh</option>
                                            <option value="4">Delhi</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>RTO<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">MH01</option>
                                            <option value="2">MH02</option>
                                            <option value="3">MH03</option>
                                            <option value="4">MH04</option>
                                            <option value="4">MH05</option>
                                            <option value="4">MH47</option>
                                            <option value="4">MH48</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 3 -->
                        <h5>Insurance Details</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Insurance Type<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Zero Dep</option>
                                            <option value="2">Comprehensive</option>
                                            <option value="3">Third Party</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Insurance Validity<span class="required">*</span></label>
                                        <input class="form-control date-picker" placeholder="Select Date"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 4 -->
                        <h5>Overview</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Accidental<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Flooded<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Last Service Kilometer<span class="required">*</span></label>
                                        <input type="tel" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Last Service Date<span class="required">*</span></label>
                                        <input type="tel" class="form-control date-picker">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 5 -->
                        <h5>Features</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Number of Airbags<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option>None</option>
                                            <option value="1">1 Airbag</option>
                                            <option value="2">2 Airbags</option>
                                            <option value="3">3 Airbags</option>
                                            <option value="4">4 Airbags</option>
                                            <option value="5">5 Airbags</option>
                                            <option value="6">6 Airbags</option>
                                            <option value="7">7 Airbags</option>
                                            <option value="8">7+ Airbags</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Central Locking<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option>None</option>
                                            <option value="1">Key</option>
                                            <option value="2">Keyless</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Seat Upholstery<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Sunroof/Moonroof<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Integrated Music System<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Rear AC<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Outside Rear View Mirrors<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Power Windows<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Engine Start-Stop<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Headlamps<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">LED</option>
                                            <option value="2">Halogen</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Power Steering<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 6 -->
                        <h5>Pricing</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Deal Type<span class="required">*</span></label>
                                        <select class="custom-select">
                                            <option selected="">Choose...</option>
                                            <option value="1">Fixed Price</option>
                                            <option value="2">Negotiable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Pricing Type<span class="required">*</span></label>
                                        <select class="custom-select" id="pricingTypeList">
                                            <option value="regularPrice">Regular Price</option>
                                            <option value="salePrice">Sale Price</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Regular Price<span class="required">*</span></label>
                                        <input type="tel" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div id="saleInput">
                                        <div class="form-group">
                                            <label>Sale Price<span class="required">*</span></label>
                                            <input type="tel" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <h5 class="text-blue mb-3">Car Images</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Thumbnail Image<span class="required">*</span></label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#exterior" role="tab"
                                aria-selected="true">Exterior</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#interior" role="tab"
                                aria-selected="false">Interior</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#others" role="tab"
                                aria-selected="false">Others</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="exterior" role="tabpanel">
                            <div class="pd-20">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="text-blue">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Main Images<span class="required">*</span>
                                                </button>
                                                <div class="pull-right">
                                                    <button class="btn btn-primary">Upload</button>
                                                </div>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Front Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Right Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Back Image<span class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Left Image<span class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Roof Image<span class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Bonet Open Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Engine Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    Diagonal Images<span class="required">*</span>
                                                </button>
                                                <div class="pull-right">
                                                    <button class="btn btn-primary">Upload</button>
                                                </div>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Right Front Diagonal Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Right Back Diagonal Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Left Back Diagonal Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Left Front Diagonal Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    Wheel Images<span class="required">*</span>
                                                </button>
                                                <div class="pull-right">
                                                    <button class="btn btn-primary">Upload</button>
                                                </div>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Right Front Wheel Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Right Back Wheel Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Left Back Wheel Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Left Front Wheel Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Spare Wheel Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    Tyre Tread Images<span class="required">*</span>
                                                </button>
                                                <div class="pull-right">
                                                    <button class="btn btn-primary">Upload</button>
                                                </div>
                                            </h2>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Right Front Tyre Tread Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Right Back Tyre Tread Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Left Back Tyre Tread Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Left Front Tyre Tread Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFive">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseFive"
                                                    aria-expanded="false" aria-controls="collapseFive">
                                                    Underbody Images<span class="required">*</span>
                                                </button>
                                                <div class="pull-right">
                                                    <button class="btn btn-primary">Upload</button>
                                                </div>
                                            </h2>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Front Underbody Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Rear Underbody Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Right Side Underbody Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Left Side Underbody Image<span
                                                                    class="required">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file form-control height-auto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="interior" role="tabpanel">
                            <div class="pd-20">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Dashboard Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Infotainment System Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Steering Wheel Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Odometer Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Gear Lever Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Pedals Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Front Cabin Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Mid Cabin Image <small>(Optional)</small></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Rear Cabin Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Driver Side Door Panel Image<span
                                                    class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Driver Side Adjustment Image<span
                                                    class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Boot Inside Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Boot Door Open Image<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="others" role="tabpanel">
                            <div class="pd-20">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Keys<span class="required">*</span></label>
                                            <input type="file" class="form-control-file form-control height-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
                Hingarajiya</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

