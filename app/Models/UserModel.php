<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'users';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['name', 'email', 'addr_residential', 'addr_permanent', 'date_of_birth', 'gender', 'profile_image', 'country_id', 'state_id', 'city_id', 'zipcode', 'contact_no', 'social_fb_link', 'social_twitter_link', 'social_linkedin_link', 'social_skype_link', 'role_id', 'is_active', 'created_at', 'updated_at'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function getUsers() {
        return $this->findAll();
    }

    public function getUser($id) {
        return $this->find($id);
    }

    public function createUser($data) {
        return $this->insert($data);
    }

    public function updateUser($id, $data) {
        return $this->update($id, $data);
    }

    public function deleteUser($id) {
        return $this->delete($id);
    }

    public function chkUserCredentials($email, $password) {

        // Retrieve the user record based on the email
        $user = $this->select(['u.email', 'u.role_id', 'ur.role_name', 'u.is_active', 'uc.password'])
        ->from('users as u')
        ->join('userscredentials as uc', 'u.id = uc.user_id')
        ->join('userroles as ur', 'u.role_id = ur.id')
        ->where('u.email', $email)
        ->first();

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct
            unset($user['password']); // Remove the password field from the user data before returning
            return $user;
        }

        // Invalid email or password
        return null;
    }

    public function checkEmail($email) {
        return $this->where(['email' => $email])->first();
    }



	
}

?>