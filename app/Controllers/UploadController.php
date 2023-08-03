<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\VehicleModel;

class UploadController extends BaseController
{
    protected $VehicleModel;
    public function __construct()
    {
        // Create a Model instance
        $this->VehicleModel = new VehicleModel();
    }

    public function uploadThumbnail()
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
                    return $this->response->setJSON(['status' => 'success', 'thumbnail_url' => $thumbnailUrl]);
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
}

?>