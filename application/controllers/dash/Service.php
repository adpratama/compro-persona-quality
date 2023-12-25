<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['string', 'date']);
        $this->load->model(['M_Auth', 'M_Service']);

        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            You have to login first.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
    }

    private function loadServiceView($page, $data)
    {
        $data['title'] = 'Layanan';
        $data['pages'] = "pages/dashboard/service/{$page}";
        $this->load->view('pages/dashboard/index', $data);
    }

    public function index()
    {
        $data['services'] = $this->M_Service->list();
        $this->loadServiceView('v_service', $data);
    }

    public function store()
    {
        $user_id = $this->session->userdata('user_id');
        $service_name = trim($this->input->post('service_name'));

        // pembuatan slug dari nama produk        
        $slug = url_title($service_name, 'dash', TRUE);

        $now = date('Y-m-d H:i:s');

        $old_slug = $this->uri->segment(4);

        $this->form_validation->set_rules('service_name', 'The Title ', 'required');
        $this->form_validation->set_rules('deskripsi', 'The Description ', 'required');

        if ($this->form_validation->run() ===  FALSE) {
            $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));

            $this->session->set_flashdata('service_name', set_value('service_name'));
            $this->session->set_flashdata('deskripsi', set_value('deskripsi'));

            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($old_slug) {

                $data = [
                    'judul' => $service_name,
                    'deskripsi' => trim($this->input->post('deskripsi')),
                    'slug' => trim($slug),
                    'updated_at' => $now,
                    'updated_by' => $user_id
                ];

                $this->M_Service->update_service($data, $old_slug);

                $this->session->set_flashdata('message_name', 'The service updated successfully.');
                // After that you need to used redirect function instead of load view such as 
                redirect('dash/service/edit/' . $slug);
            } else {

                $photo = $_FILES['service_photo']['name']; // Nama file 
                // Mendapatkan extension
                $pathInfo = pathinfo($photo);
                $extension = $pathInfo['extension']; // Extension file
                $newPhotoFileName = $slug . '.' . $extension;

                $config = [
                    'upload_path' => FCPATH . 'assets/front/images/services/',
                    'allowed_types' => 'jpeg|jpg|JPEG|JPG|PNG|png',
                    'overwrite' => TRUE,
                    'max_size' => '99999999999',
                    'max_height' => '2000',
                    'max_width' => '2500',
                    'file_name' => $newPhotoFileName,
                ];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('service_photo')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('message_error', 'Error message: ' . $this->upload->display_errors());

                    $this->session->set_flashdata('service_name', set_value('service_name'));
                    $this->session->set_flashdata('deskripsi', set_value('deskripsi'));

                    // After that you need to used redirect function instead of load view such as 
                    redirect($_SERVER['HTTP_REFERER'], $error);
                } else {

                    $data = [
                        'judul' => $service_name,
                        'deskripsi' => trim($this->input->post('deskripsi')),
                        'photo' => $newPhotoFileName,
                        'slug' => trim($slug),
                        'created_at' => $now,
                        'created_by' => $user_id,
                    ];

                    $this->M_Service->add_service($data);

                    $this->session->set_flashdata('message_name', 'Layanan berhasil ditambahkan');

                    redirect('dash/service');
                }
            }
        }
    }

    public function edit()
    {
        $slug = $this->uri->segment(4);
        $detail = $this->M_Service->detail($slug);
        $data = [
            'service' => $detail,
            'items' => $this->M_Service->items($detail['Id'])
        ];

        $this->loadServiceView('v_detail', $data);
    }

    public function update_photo($slug)
    {
        $user_id = $this->session->userdata('user_id');

        $cek = $this->M_Service->is_available($slug);

        $foto = $cek["photo"];
        $path = "assets/front/images/articles/" . $foto;

        if (file_exists($path)) {
            unlink($path);
        }

        $now = date('Y-m-d H:i:s');

        $photo = $_FILES['service_photo']['name']; // Nama file 
        // Mendapatkan extension
        $pathInfo = pathinfo($photo);
        $extension = $pathInfo['extension']; // Extension file
        $newPhotoFileName = $slug . '.' . $extension;

        $config = array(
            'upload_path' => 'assets/front/images/articles/',
            'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|WEBP",
            'overwrite' => TRUE,
            'max_size' => "99999999999",
            'max_height' => '2000',
            'max_width' => '2500',
            'file_name' => $newPhotoFileName
        );

        // var_dump($config);exit;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('service_photo')) {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('message_error', 'Error message: ' . $this->upload->display_errors());

            // After that you need to used redirect function instead of load view such as 
            redirect($_SERVER['HTTP_REFERER'], $error);
        } else {

            $data = array(
                'photo' => $newPhotoFileName,
                'updated_at' => $now,
                'updated_by' => $user_id
            );

            $this->M_Service->update_photo($data, $slug);

            $this->session->set_flashdata('message_name', 'The photo has been successfully modified.');
            // After that you need to used redirect function instead of load view such as 

            redirect('dash/article/edit/' . $slug);
        }
    }

    public function delete()
    {
        $slug = $this->uri->segment(4);

        $cek = $this->M_Service->is_available($slug);

        $foto = $cek["photo"];

        $path = "assets/front/images/articles/" . $foto;

        if (file_exists($path)) {
            unlink($path);
        }

        $this->M_Service->delete($slug);

        $this->session->set_flashdata('message_name', 'The service has been successfully deleted.');
        // After that you need to used redirect function instead of load view such as 

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_new_item()
    {
        $user_id = $this->session->userdata('user_id');

        $old_slug = $this->uri->segment(4);

        $now = date('Y-m-d H:i:s');
        $slug_service = $this->input->post('slug');
        $item_id = $this->input->post('item_id');
        $id_service = $this->input->post('id_service');
        $item_name = $this->input->post('item_name');

        $slug = url_title($item_name, 'dash', TRUE);

        if ($old_slug) {

            $keterangan = $this->input->post('keterangan' . $item_id);
            $data = [
                'id_service' => $id_service,
                'judul' => $item_name,
                'deskripsi' => $keterangan,
                'slug' => $slug,
                'created_at' => $now,
                'created_by' => $user_id,
            ];

            $this->M_Service->update_item($data, $old_slug);
            $this->session->set_flashdata('message_name', 'The item updated successfully.');

            redirect('dash/service/edit/' . $slug_service);
        } else {

            $keterangan = $this->input->post('keterangan');

            $data = [
                'id_service' => $id_service,
                'judul' => $item_name,
                'deskripsi' => $keterangan,
                'slug' => $slug,
                'created_at' => $now,
                'created_by' => $user_id,
            ];

            $this->M_Service->add_new_item($data);

            $this->session->set_flashdata('message_name', 'The item has been added successfully.');

            redirect('dash/service/edit/' . $slug_service);
        }
    }

    public function delete_item()
    {
        $slug = $this->uri->segment(4);

        $this->M_Service->delete_item($slug);

        $this->session->set_flashdata('message_name', 'The item has been successfully deleted.');
        // After that you need to used redirect function instead of load view such as 

        redirect($_SERVER['HTTP_REFERER']);
    }
}
