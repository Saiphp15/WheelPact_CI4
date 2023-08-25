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
            $thumbnailImage->move(ROOTPATH . 'public/uploads/vehicle_thubnails', $newName);

            // Get the thumbnail image URL to display in the preview
            $thumbnailUrl = base_url('uploads/vehicle_thubnails/' . $newName);

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
            $data = ['vehicle_id' => $vehicleId];
            if(isset($_FILES['exterior_main_front_img']['name']) && !empty($_FILES['exterior_main_front_img']['name'])){
                $data = array_merge(['exterior_main_front_img' => $this->uploadImage("exterior_main_front_img")], $data);
            }
            if(isset($_FILES['exterior_main_right_img']['name']) && !empty($_FILES['exterior_main_right_img']['name'])){
                $data = array_merge(['exterior_main_right_img' => $this->uploadImage("exterior_main_right_img")], $data);
            }
            if(isset($_FILES['exterior_main_back_img']['name']) && !empty($_FILES['exterior_main_back_img']['name'])){
                $data = array_merge(['exterior_main_back_img' => $this->uploadImage("exterior_main_back_img")], $data);
            }
            if(isset($_FILES['exterior_main_left_img']['name']) && !empty($_FILES['exterior_main_left_img']['name'])){
                $data = array_merge(['exterior_main_left_img' => $this->uploadImage("exterior_main_left_img")], $data);
            }
            if(isset($_FILES['exterior_main_roof_img']['name']) && !empty($_FILES['exterior_main_roof_img']['name'])){
                $data = array_merge(['exterior_main_roof_img' => $this->uploadImage("exterior_main_roof_img")], $data);
            }
            if(isset($_FILES['exterior_main_bonetopen_img']['name']) && !empty($_FILES['exterior_main_bonetopen_img']['name'])){
                $data = array_merge(['exterior_main_bonetopen_img' => $this->uploadImage("exterior_main_bonetopen_img")], $data);
            }
            if(isset($_FILES['exterior_main_engine_img']['name']) && !empty($_FILES['exterior_main_engine_img']['name'])){
                $data = array_merge(['exterior_main_engine_img' => $this->uploadImage("exterior_main_engine_img")], $data);
            }
            if(isset($_FILES['exterior_diagnoal_right_front_img']['name']) && !empty($_FILES['exterior_diagnoal_right_front_img']['name'])){
                $data = array_merge(['exterior_diagnoal_right_front_img' => $this->uploadImage("exterior_diagnoal_right_front_img")], $data);
            }
            if(isset($_FILES['exterior_diagnoal_right_back_img']['name']) && !empty($_FILES['exterior_diagnoal_right_back_img']['name'])){
                $data = array_merge(['exterior_diagnoal_right_back_img' => $this->uploadImage("exterior_diagnoal_right_back_img")], $data);
            }
            if(isset($_FILES['exterior_diagnoal_left_back_img']['name']) && !empty($_FILES['exterior_diagnoal_left_back_img']['name'])){
                $data = array_merge(['exterior_diagnoal_left_back_img' => $this->uploadImage("exterior_diagnoal_left_back_img")], $data);
            }
            if(isset($_FILES['exterior_diagnoal_left_front_img']['name']) && !empty($_FILES['exterior_diagnoal_left_front_img']['name'])){
                $data = array_merge(['exterior_diagnoal_left_front_img' => $this->uploadImage("exterior_diagnoal_left_front_img")], $data);
            }
            if(isset($_FILES['exterior_wheel_right_front_img']['name']) && !empty($_FILES['exterior_wheel_right_front_img']['name'])){
                $data = array_merge(['exterior_wheel_right_front_img' => $this->uploadImage("exterior_wheel_right_front_img")], $data);
            }
            if(isset($_FILES['exterior_wheel_right_back_img']['name']) && !empty($_FILES['exterior_wheel_right_back_img']['name'])){
                $data = array_merge(['exterior_wheel_right_back_img' => $this->uploadImage("exterior_wheel_right_back_img")], $data);
            }
            if(isset($_FILES['exterior_wheel_left_back_img']['name']) && !empty($_FILES['exterior_wheel_left_back_img']['name'])){
                $data = array_merge(['exterior_wheel_left_back_img' => $this->uploadImage("exterior_wheel_left_back_img")], $data);
            }
            if(isset($_FILES['exterior_wheel_left_front_img']['name']) && !empty($_FILES['exterior_wheel_left_front_img']['name'])){
                $data = array_merge(['exterior_wheel_left_front_img' => $this->uploadImage("exterior_wheel_left_front_img")], $data);
            }
            if(isset($_FILES['exterior_wheel_spare_img']['name']) && !empty($_FILES['exterior_wheel_spare_img']['name'])){
                $data = array_merge(['exterior_wheel_spare_img' => $this->uploadImage("exterior_wheel_spare_img")], $data);
            }
            if(isset($_FILES['exterior_tyrethread_right_front_img']['name']) && !empty($_FILES['exterior_tyrethread_right_front_img']['name'])){
                $data = array_merge(['exterior_tyrethread_right_front_img' => $this->uploadImage("exterior_tyrethread_right_front_img")], $data);
            }
            if(isset($_FILES['exterior_tyrethread_right_back_img']['name']) && !empty($_FILES['exterior_tyrethread_right_back_img']['name'])){
                $data = array_merge(['exterior_tyrethread_right_back_img' => $this->uploadImage("exterior_tyrethread_right_back_img")], $data);
            }
            if(isset($_FILES['exterior_tyrethread_left_back_img']['name']) && !empty($_FILES['exterior_tyrethread_left_back_img']['name'])){
                $data = array_merge(['exterior_tyrethread_left_back_img' => $this->uploadImage("exterior_tyrethread_left_back_img")], $data);
            }
            if(isset($_FILES['exterior_tyrethread_left_front_img']['name']) && !empty($_FILES['exterior_tyrethread_left_front_img']['name'])){
                $data = array_merge(['exterior_tyrethread_left_front_img' => $this->uploadImage("exterior_tyrethread_left_front_img")], $data);
            }
            if(isset($_FILES['exterior_underbody_front_img']['name']) && !empty($_FILES['exterior_underbody_front_img']['name'])){
                $data = array_merge(['exterior_underbody_front_img' => $this->uploadImage("exterior_underbody_front_img")], $data);
            }
            if(isset($_FILES['exterior_underbody_rear_img']['name']) && !empty($_FILES['exterior_underbody_rear_img']['name'])){
                $data = array_merge(['exterior_underbody_rear_img' => $this->uploadImage("exterior_underbody_rear_img")], $data);
            }
            if(isset($_FILES['exterior_underbody_right_img']['name']) && !empty($_FILES['exterior_underbody_right_img']['name'])){
                $data = array_merge(['exterior_underbody_right_img' => $this->uploadImage("exterior_underbody_right_img")], $data);
            }
            if(isset($_FILES['exterior_underbody_left_img']['name']) && !empty($_FILES['exterior_underbody_left_img']['name'])){
                $data = array_merge(['exterior_underbody_left_img' => $this->uploadImage("exterior_underbody_left_img")], $data);
            }
            if(isset($_FILES['interior_dashboard_img']['name']) && !empty($_FILES['interior_dashboard_img']['name'])){
                $data = array_merge(['interior_dashboard_img' => $this->uploadImage("interior_dashboard_img")], $data);
            }
            if(isset($_FILES['interior_infotainment_system_img']['name']) && !empty($_FILES['interior_infotainment_system_img']['name'])){
                $data = array_merge(['interior_infotainment_system_img' => $this->uploadImage("interior_infotainment_system_img")], $data);
            }
            if(isset($_FILES['interior_steering_wheel_img']['name']) && !empty($_FILES['interior_steering_wheel_img']['name'])){
                $data = array_merge(['interior_steering_wheel_img' => $this->uploadImage("interior_steering_wheel_img")], $data);
            }
            if(isset($_FILES['interior_odometer_img']['name']) && !empty($_FILES['interior_odometer_img']['name'])){
                $data = array_merge(['interior_odometer_img' => $this->uploadImage("interior_odometer_img")], $data);
            }
            if(isset($_FILES['interior_gear_lever_img']['name']) && !empty($_FILES['interior_gear_lever_img']['name'])){
                $data = array_merge(['interior_gear_lever_img' => $this->uploadImage("interior_gear_lever_img")], $data);
            }
            if(isset($_FILES['interior_pedals_img']['name']) && !empty($_FILES['interior_pedals_img']['name'])){
                $data = array_merge(['interior_pedals_img' => $this->uploadImage("interior_pedals_img")], $data);
            }
            if(isset($_FILES['interior_front_cabin_img']['name']) && !empty($_FILES['interior_front_cabin_img']['name'])){
                $data = array_merge(['interior_front_cabin_img' => $this->uploadImage("interior_front_cabin_img")], $data);
            }
            if(isset($_FILES['interior_mid_cabin_img']['name']) && !empty($_FILES['interior_mid_cabin_img']['name'])){
                $data = array_merge(['interior_mid_cabin_img' => $this->uploadImage("interior_mid_cabin_img")], $data);
            }
            if(isset($_FILES['interior_rear_cabin_img']['name']) && !empty($_FILES['interior_rear_cabin_img']['name'])){
                $data = array_merge(['interior_rear_cabin_img' => $this->uploadImage("interior_rear_cabin_img")], $data);
            }
            if(isset($_FILES['interior_driver_side_door_panel_img']['name']) && !empty($_FILES['interior_driver_side_door_panel_img']['name'])){
                $data = array_merge(['interior_driver_side_door_panel_img' => $this->uploadImage("interior_driver_side_door_panel_img")], $data);
            }
            if(isset($_FILES['interior_driver_side_adjustment_img']['name']) && !empty($_FILES['interior_driver_side_adjustment_img']['name'])){
                $data = array_merge(['interior_driver_side_adjustment_img' => $this->uploadImage("interior_driver_side_adjustment_img")], $data);
            }
            if(isset($_FILES['interior_boot_inside_img']['name']) && !empty($_FILES['interior_boot_inside_img']['name'])){
                $data = array_merge(['interior_boot_inside_img' => $this->uploadImage("interior_boot_inside_img")], $data);
            }
            if(isset($_FILES['interior_boot_door_open_img']['name']) && !empty($_FILES['interior_boot_door_open_img']['name'])){
                $data = array_merge(['interior_boot_door_open_img' => $this->uploadImage("interior_boot_door_open_img")], $data);
            }
            if(isset($_FILES['others_keys_img']['name']) && !empty($_FILES['others_keys_img']['name'])){
                $data = array_merge(['others_keys_img' => $this->uploadImage("others_keys_img")], $data);
            }
            
            $message = '';
            // Check if the vehicle_id exists in the table
            $existingRecord = $this->VehicleImagesModel->where('vehicle_id', $vehicleId)->first();
            if ($existingRecord) {
                // Update the existing record
                $this->VehicleImagesModel->update($existingRecord['id'], $data);
                $message = 'Vehicle Exterior Images Updated Successfully';
            } else {
                // Insert a new record
                $this->VehicleImagesModel->insert($data);
                $message = 'Vehicle Exterior Images Added Successfully';
            }

            // Return the URL to be used by the jQuery success function
            return $this->response->setJSON(['status' => 'success', 'message' => $message]);

        }else{
            return $this->response->setJSON(['status' => 'error', 'message' => 'Vehicle ID Required.']);
        }
    }

    public function upload_interior_vehicle_images()
    {
        $vehicleId = $this->request->getPost('vehicleId');
        if(isset($vehicleId) && !empty($vehicleId)){

            $data = ['vehicle_id' => $vehicleId];
            if(isset($_FILES['interior_dashboard_img']['name']) && !empty($_FILES['interior_dashboard_img']['name'])){
                $data = array_merge(['interior_dashboard_img' => $this->uploadImage("interior_dashboard_img")], $data);
            }
            if(isset($_FILES['interior_infotainment_system_img']['name']) && !empty($_FILES['interior_infotainment_system_img']['name'])){
                $data = array_merge(['interior_infotainment_system_img' => $this->uploadImage("interior_infotainment_system_img")], $data);
            }
            if(isset($_FILES['interior_steering_wheel_img']['name']) && !empty($_FILES['interior_steering_wheel_img']['name'])){
                $data = array_merge(['interior_steering_wheel_img' => $this->uploadImage("interior_steering_wheel_img")], $data);
            }
            if(isset($_FILES['interior_odometer_img']['name']) && !empty($_FILES['interior_odometer_img']['name'])){
                $data = array_merge(['interior_odometer_img' => $this->uploadImage("interior_odometer_img")], $data);
            }
            if(isset($_FILES['interior_gear_lever_img']['name']) && !empty($_FILES['interior_gear_lever_img']['name'])){
                $data = array_merge(['interior_gear_lever_img' => $this->uploadImage("interior_gear_lever_img")], $data);
            }
            if(isset($_FILES['interior_pedals_img']['name']) && !empty($_FILES['interior_pedals_img']['name'])){
                $data = array_merge(['interior_pedals_img' => $this->uploadImage("interior_pedals_img")], $data);
            }
            if(isset($_FILES['interior_front_cabin_img']['name']) && !empty($_FILES['interior_front_cabin_img']['name'])){
                $data = array_merge(['interior_front_cabin_img' => $this->uploadImage("interior_front_cabin_img")], $data);
            }
            if(isset($_FILES['interior_mid_cabin_img']['name']) && !empty($_FILES['interior_mid_cabin_img']['name'])){
                $data = array_merge(['interior_mid_cabin_img' => $this->uploadImage("interior_mid_cabin_img")], $data);
            }
            if(isset($_FILES['interior_rear_cabin_img']['name']) && !empty($_FILES['interior_rear_cabin_img']['name'])){
                $data = array_merge(['interior_rear_cabin_img' => $this->uploadImage("interior_rear_cabin_img")], $data);
            }
            if(isset($_FILES['interior_driver_side_door_panel_img']['name']) && !empty($_FILES['interior_driver_side_door_panel_img']['name'])){
                $data = array_merge(['interior_driver_side_door_panel_img' => $this->uploadImage("interior_driver_side_door_panel_img")], $data);
            }
            if(isset($_FILES['interior_driver_side_adjustment_img']['name']) && !empty($_FILES['interior_driver_side_adjustment_img']['name'])){
                $data = array_merge(['interior_driver_side_adjustment_img' => $this->uploadImage("interior_driver_side_adjustment_img")], $data);
            }
            if(isset($_FILES['interior_boot_inside_img']['name']) && !empty($_FILES['interior_boot_inside_img']['name'])){
                $data = array_merge(['interior_boot_inside_img' => $this->uploadImage("interior_boot_inside_img")], $data);
            }
            if(isset($_FILES['interior_boot_door_open_img']['name']) && !empty($_FILES['interior_boot_door_open_img']['name'])){
                $data = array_merge(['interior_boot_door_open_img' => $this->uploadImage("interior_boot_door_open_img")], $data);
            }

            $message = '';
            // Check if the vehicle_id exists in the table
            $existingRecord = $this->VehicleImagesModel->where('vehicle_id', $vehicleId)->first();
            if ($existingRecord) {
                // Update the existing record
                $this->VehicleImagesModel->update($existingRecord['id'], $data);
                $message = 'Vehicle Interior Images Updated Successfully';
            } else {
                // Insert a new record
                $this->VehicleImagesModel->insert($data);
                $message = 'Vehicle Interior Images Added Successfully';
            }

            // Return the URL to be used by the jQuery success function
            return $this->response->setJSON(['status' => 'success', 'message' => $message]);

        }else{
            return $this->response->setJSON(['status' => 'error', 'message' => 'Vehicle ID Required.']);
        }
    }

    public function upload_others_vehicle_images(){
        $vehicleId = $this->request->getPost('vehicleId');
        if(isset($vehicleId) && !empty($vehicleId)){
            $data = ['vehicle_id' => $vehicleId];
            if(isset($_FILES['others_keys_img']['name']) && !empty($_FILES['others_keys_img']['name'])){
                $data = array_merge(['others_keys_img' => $this->uploadImage("others_keys_img")], $data);
            }

            $message = '';
            // Check if the vehicle_id exists in the table
            $existingRecord = $this->VehicleImagesModel->where('vehicle_id', $vehicleId)->first();
            if ($existingRecord) {
                // Update the existing record
                $this->VehicleImagesModel->update($existingRecord['id'], $data);
                $message = 'Vehicle Other Images Updated Successfully';
            } else {
                // Insert a new record
                $this->VehicleImagesModel->insert($data);
                $message = 'Vehicle Other Images Added Successfully';
            }

            // Return the URL to be used by the jQuery success function
            return $this->response->setJSON(['status' => 'success', 'message' => $message]);
        }else{
            return $this->response->setJSON(['status' => 'error', 'message' => 'Vehicle ID Required.']);
        }
    }

    

}

?>