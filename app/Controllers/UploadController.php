<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\VehicleModel;
use App\Models\VehicleImagesModel;

class UploadController extends BaseController
{
    protected $VehicleModel;
    protected $VehicleImagesModel;
    public function __construct()
    {
        // Create a Model instance
        $this->VehicleModel = new VehicleModel();
        $this->VehicleImagesModel = new VehicleImagesModel();
    }

    public function upload_thumbnail()
    {
        // Check if the thumbnail image file was uploaded successfully
        if ($thumbnailImage = $this->request->getFile('thumbnailImage')) {
            // Generate a new name for the thumbnail image to prevent name conflicts
            $newName = $thumbnailImage->getRandomName();

            // Move the uploaded file to the writable/uploads directory
            $thumbnailImage->move(ROOTPATH . 'writable/uploads/vehicle_thubnails', $newName);

            // Get the thumbnail image URL to display in the preview
            $thumbnailUrl = base_url('writable/uploads/vehicle_thubnails/' . $newName);

            $id = $this->request->getPost('vehicleId');
            if(isset($id) && !empty($id)){
                // Update the thumbnail URL in the database
                $data = [
                    'thumbnail_url' => $thumbnailUrl
                ];

                // Check if there is valid data to update
                if (!empty($data) && !empty($id)) {
                    // Update the database record
                    $this->VehicleModel->update($id, $data);

                    // Return the URL to be used by the jQuery success function
                    return $this->response->setJSON(['status' => 'success', 'message'=>'Thumbnail Uploaded Successfully.', 'thumbnail_url' => $thumbnailUrl]);
                } else {
                    // Return an error message if there is no data to update or if the ID is not provided
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update thumbnail URL.']);
                }
            }else{
                return $this->response->setJSON(['status' => 'error', 'message' => 'Vehicle ID Required.']);
            }

        } else {
            // Return an error message if the upload failed
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to upload thumbnail image.']);
        }
    }

    public function upload_exterior_main_vehicle_images()
    {
        $vehicleId = $this->request->getPost('vehicleId');
        if(isset($vehicleId) && !empty($vehicleId)){
            // insert the images URL in the database
            $data = [
                'vehicle_id' => $vehicleId,
                'exterior_main_front_img' => $this->uploadImage("exterior_main_front_img"),
                'exterior_main_right_img' => $this->uploadImage("exterior_main_right_img"),
                'exterior_main_back_img' => $this->uploadImage("exterior_main_back_img"),
                'exterior_main_left_img' => $this->uploadImage("exterior_main_left_img"),
                'exterior_main_roof_img' => $this->uploadImage("exterior_main_roof_img"),
                'exterior_main_bonetopen_img' => $this->uploadImage("exterior_main_bonetopen_img"),
                'exterior_main_engine_img' => $this->uploadImage("exterior_main_engine_img")
            ];

            // insert the database record
            $this->VehicleImagesModel->insert($data);

            // Return the URL to be used by the jQuery success function
            return $this->response->setJSON(['status' => 'success', 'message' => 'Vehicle Exterior Images Added Successfully']);

        }else{
            return $this->response->setJSON(['status' => 'error', 'message' => 'Vehicle ID Required.']);
        }
    }

    public function upload_interior_vehicle_images()
    {
        $vehicleId = $this->request->getPost('vehicleId');
        if(isset($vehicleId) && !empty($vehicleId)){
            // update the images URL in the database
            $data = [
                'vehicle_id' => $vehicleId,
                'interior_dashboard_img'                => $this->uploadImage("interior_dashboard_img"),
                'interior_infotainment_system_img'      => $this->uploadImage("interior_infotainment_system_img"),
                'interior_steering_wheel_img'           => $this->uploadImage("interior_steering_wheel_img"),
                'interior_odometer_img'                 => $this->uploadImage("interior_odometer_img"),
                'interior_gear_lever_img'               => $this->uploadImage("interior_gear_lever_img"),
                'interior_pedals_img'                   => $this->uploadImage("interior_pedals_img"),
                'interior_front_cabin_img'              => $this->uploadImage("interior_front_cabin_img"),
                'interior_mid_cabin_img'                => $this->uploadImage("interior_mid_cabin_img"),
                'interior_rear_cabin_img'               => $this->uploadImage("interior_rear_cabin_img"),
                'interior_driver_side_door_panel_img'   => $this->uploadImage("interior_driver_side_door_panel_img"),
                'interior_driver_side_adjustment_img'   => $this->uploadImage("interior_driver_side_adjustment_img"),
                'interior_boot_inside_img'              => $this->uploadImage("interior_boot_inside_img"),
                'interior_boot_door_open_img'           => $this->uploadImage("interior_boot_door_open_img")
            ];

            // Update the record
            if ($this->VehicleImagesModel->update_vehicle_image($vehicleId, $data)) {
                // Return the URL to be used by the jQuery success function
                return $this->response->setJSON(['status' => 'success', 'message' => 'Vehicle Interior Images Added Successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Error while updating Vehicle Interior Images']);
            }
        }else{
            return $this->response->setJSON(['status' => 'error', 'message' => 'Vehicle ID Required.']);
        }
    }

    public function upload_others_vehicle_images(){
        $vehicleId = $this->request->getPost('vehicleId');
        if(isset($vehicleId) && !empty($vehicleId)){
            // update the images URL in the database
            $data = [
                'vehicle_id' => $vehicleId,
                'others_keys_img'                => $this->uploadImage("others_keys_img")
            ];

            // Update the record
            if ($this->VehicleImagesModel->update_vehicle_image($vehicleId, $data)) {
                // Return the URL to be used by the jQuery success function
                return $this->response->setJSON(['status' => 'success', 'message' => 'Vehicle Other Images Added Successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Error while updating Vehicle Other Images']);
            }
        }else{
            return $this->response->setJSON(['status' => 'error', 'message' => 'Vehicle ID Required.']);
        }
    }

    

}

?>