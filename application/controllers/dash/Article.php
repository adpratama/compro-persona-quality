<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['string', 'date']);
        $this->load->model(['M_Auth', 'M_Article']);

        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            You have to login first.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
    }

    private function loadArticleView($page, $data)
    {
        $data['title'] = 'Article';
        $data['pages'] = "pages/dashboard/article/{$page}";
        $this->load->view('pages/dashboard/index', $data);
    }

    public function index()
    {
        $data['articles'] = $this->M_Article->list_dashboard();
        $this->loadArticleView('v_article', $data);
    }

    public function create()
    {
        $data['categories'] = $this->M_Article->category();

        if (!$data['categories']) {
            $this->session->set_flashdata('message_error', 'Article category is empty. Please add some category before you can create a new article.');
            $this->loadArticleView('v_category', $data);
        } else {
            $this->loadArticleView('v_create', $data);
        }
    }

    public function store()
    {
        $old_slug = $this->uri->segment(4);
        $user_id = $this->session->userdata('user_id');
        $now = date('Y-m-d H:i:s');

        if ($old_slug) {
            $this->handleArticleUpdate($old_slug, $user_id, $now);
        } else {
            $this->form_validation->set_rules('kategori_artikel', 'Kategori', 'required');
            $this->form_validation->set_rules('judul_artikel', 'Judul', 'required');
            $this->form_validation->set_rules('headline_artikel', 'Headline', 'required');
            // $this->form_validation->set_rules('isi_artikel', 'Isi', 'required');

            if ($this->form_validation->run() === FALSE) {
                // $this->handleValidationErrors();
                // redirect('dash/article/create');
                $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));
                $this->session->set_flashdata('kategori_artikel', set_value('kategori_artikel'));
                $this->session->set_flashdata('judul_artikel', set_value('judul_artikel'));
                $this->session->set_flashdata('headline_artikel', set_value('headline_artikel'));
                $this->session->set_flashdata('isi_artikel', set_value('isi_artikel'));
                $this->session->set_flashdata('content_artikel', set_value('content_artikel'));
                redirect('dash/article/create');
            } else {
                $this->handleArticleCreation($user_id, $now);
            }
        }
    }

    private function handleArticleUpdate($old_slug, $user_id, $now)
    {
        $data = $this->prepareArticleData($user_id, $now);
        $data['judul'] = $this->input->post('judul_artikel');

        $this->M_Article->update_data($data, $old_slug);
        $this->session->set_flashdata('message_name', 'Article updated successfully');
        redirect('article');
    }

    private function handleValidationErrors()
    {
        $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));
        $this->session->set_flashdata('kategori_artikel', set_value('kategori_artikel'));
        $this->session->set_flashdata('judul_artikel', set_value('judul_artikel'));
        $this->session->set_flashdata('headline_artikel', set_value('headline_artikel'));
        $this->session->set_flashdata('isi_artikel', set_value('isi_artikel'));
        $this->session->set_flashdata('content_artikel', set_value('content_artikel'));
        redirect('dash/article/create');
    }

    private function handleArticleCreation($user_id, $now)
    {
        $data = $this->prepareArticleData($user_id, $now);
        $slug = url_title($this->input->post('judul_artikel'), 'dash', TRUE);
        $data['slug'] = $slug;

        // Check if photo upload is successful
        $photo_name = $this->handlePhotoUpload($slug);

        if ($photo_name) {
            $data['photo'] = $photo_name;

            // Insert the data to the database
            $this->M_Article->add_article($data);

            $this->session->set_flashdata('message_name', 'Article added successfully');
            redirect('dash/article');
        } else {
            // Handle photo upload failure
            $this->handleValidationErrors();
        }
    }


    private function prepareArticleData($user_id, $now)
    {
        return [
            'id_category' => $this->input->post('kategori_artikel'),
            'judul' => $this->input->post('judul_artikel'),
            'headline' => $this->input->post('headline_artikel'),
            'content' => $this->input->post('isi_artikel'),
            'created_at' => $now,
            'created_by' => $user_id,
        ];
    }

    private function handlePhotoUpload($slug)
    {
        $photo = $_FILES['foto_artikel']['name'];
        $path_info = pathinfo($photo);
        $extension = $path_info['extension'];
        $new_photo_file_name = $slug . '.' . $extension;

        $config = [
            'upload_path' => 'assets/front/images/team/',
            'allowed_types' => 'jpeg|jpg|JPEG|JPG|png|PNG',
            'overwrite' => TRUE,
            'max_size' => '99999999999',
            'max_height' => '2000',
            'max_width' => '2500',
            'file_name' => $new_photo_file_name,
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_artikel')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message_error', 'Error message: ' . $error);
            return FALSE; // Return FALSE on upload failure
        } else {
            return $new_photo_file_name; // Return the file name on successful upload
        }
    }

    private function uploadPhoto($slug)
    {
        $photo = $_FILES['foto_artikel']['name'];
        $path_info = pathinfo($photo);
        $extension = $path_info['extension'];
        $new_photo_file_name = $slug . '.' . $extension;

        $config = [
            'upload_path' => 'assets/front/images/team/',
            'allowed_types' => 'jpeg|jpg|JPEG|JPG|png|PNG',
            'overwrite' => TRUE,
            'max_size' => '99999999999',
            'max_height' => '2000',
            'max_width' => '2500',
            'file_name' => $new_photo_file_name,
        ];

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_artikel')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message_error', 'Error message: ' . $error);
            $this->handleValidationErrors();
            return;
        } else {
            // Upload sukses, lanjutkan dengan menyimpan artikel
            $new_photo_file_name = $slug . '.' . $extension;
            $data['photo'] = $new_photo_file_name;
            $this->M_Article->add_article($data);
            $this->session->set_flashdata('message_name', 'Article added successfully');
            redirect('dash/article');
        }
    }
}
