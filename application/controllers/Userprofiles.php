<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofiles extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('modUser'); // Pastikan model modUser diload
    }

    public function index($uId) {
        if (userLoggedIn()) {
            if (!empty($uId) && isset($uId)) {
                $data['users'] = $this->modUser->checkUserById($uId);
                if (count($data['users']) == 1) {
                    $this->load->view('templates/header');
                    $this->load->view('templates/users/topbar', $data);
                    $this->load->view('templates/users/user_profiles', $data);
                    $this->load->view('templates/footer');
                } else {
                    $this->session->set_flashdata('error', 'User not found');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid User ID');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('error', 'Please login first to continue');
            redirect('home/login');
        }
    }

    public function editProfile($uId) {
        if (userLoggedIn()) {
            if (!empty($uId)) {
                $data['user'] = $this->modUser->checkUserById($uId);
                if (count($data['user']) == 1) {
                    // Add the functionality to edit the profile
                    $this->load->view('templates/header');
                    $this->load->view('templates/users/edit_profile', $data);
                    $this->load->view('templates/footer');
                } else {
                    $this->session->set_flashdata('error', 'User not found');
                    redirect('userprofiles');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid User ID');
                redirect('userprofiles');
            }
        } else {
            $this->session->set_flashdata('error', 'Please login first to edit your profile');
            redirect('home/login');
        }
    }

    public function updateProfile() {
        if (userLoggedIn()) {
            $data = array(
                'name' => $this->input->post('userName', true),
                'email' => $this->input->post('userEmail', true),
                'address' => $this->input->post('userAddress', true),
                'education' => $this->input->post('userEducation', true),
                'skills' => $this->input->post('userSkills', true)
            );

            if (!empty($data['name']) && !empty($data['email']) && !empty($data['address'])) {
                if (isset($_FILES['images']) && is_uploaded_file($_FILES['images']['tmp_name'])) {
                    $path = realpath(APPPATH.'../assets/images');
                    $config = array(
                        'upload_path' => $path,
                        'max_size' => 400,
                        'allowed_types' => 'gif|png|jpg|jpeg'
                    );
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('images')) {
                        $error = $this->upload->display_errors();
                        setFlashData('alert-danger', $error, 'userprofiles');
                        return;
                    } else {
                        $fileName = $this->upload->data();
                        $data['images'] = $fileName['file_name'];
                    }
                }

                $uId = $this->session->userdata('uId');
                $updateData = $this->modUser->updateProfile($data, $uId);
                if ($updateData) {
                    setFlashData('alert-success', 'Profile has been updated', 'userprofiles');
                } else {
                    setFlashData('alert-danger', 'Unable to update profile', 'userprofiles');
                }
            } else {
                setFlashData('alert-danger', 'Name, Email, and Address are required', 'userprofiles');
            }
        } else {
            setFlashData('alert-danger', 'Please login first to edit your profile', 'home/login');
        }
    }
}
?>