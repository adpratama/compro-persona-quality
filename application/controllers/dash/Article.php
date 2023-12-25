<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation']);
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
        $user_id = $this->session->userdata('user_id');
        $judul_artikel = trim($this->input->post('judul_artikel'));

        // pembuatan slug dari nama produk        
        $slug = url_title($judul_artikel, 'dash', TRUE);

        $now = date('Y-m-d H:i:s');

        $old_slug = $this->uri->segment(4);

        $this->form_validation->set_rules('judul_artikel', 'The Title ', 'required');
        $this->form_validation->set_rules('kategori_artikel', 'The Category ', 'required');
        $this->form_validation->set_rules('headline_artikel', 'The Headline ', 'required');
        $this->form_validation->set_rules('isi_artikel', 'The Content ', 'required');

        if ($this->form_validation->run() ===  FALSE) {
            $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));

            $this->session->set_flashdata('judul_artikel', set_value('judul_artikel'));
            $this->session->set_flashdata('kategori_artikel', set_value('kategori_artikel'));
            $this->session->set_flashdata('headline_artikel', set_value('headline_artikel'));
            $this->session->set_flashdata('isi_artikel', set_value('isi_artikel'));

            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($old_slug) {

                $data = [
                    'id_category' => $this->input->post('kategori_artikel'),
                    'judul' => $judul_artikel,
                    'headline' => trim($this->input->post('headline_artikel')),
                    'content' => trim($this->input->post('isi_artikel')),
                    'author' => $user_id,
                    'slug' => trim($slug),
                    'updated_at' => $now,
                    'updated_by' => $user_id
                ];

                $this->M_Article->update_article($data, $old_slug);


                $this->session->set_flashdata('message_name', 'The article updated successfully.');
                // After that you need to used redirect function instead of load view such as 
                redirect('dash/article/edit/' . $slug);
            } else {

                $photo = $_FILES['foto_artikel']['name']; // Nama file 
                // Mendapatkan extension
                $pathInfo = pathinfo($photo);
                $extension = $pathInfo['extension']; // Extension file
                $newPhotoFileName = $slug . '.' . $extension;

                $config = [
                    'upload_path' => FCPATH . 'assets/front/images/articles/',
                    'allowed_types' => 'jpeg|jpg|JPEG|JPG|PNG|png',
                    'overwrite' => TRUE,
                    'max_size' => '99999999999',
                    'max_height' => '2000',
                    'max_width' => '2500',
                    'file_name' => $newPhotoFileName,
                ];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto_artikel')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('message_error', 'Error message: ' . $this->upload->display_errors());

                    $this->session->set_flashdata('judul_artikel', set_value('judul_artikel'));
                    $this->session->set_flashdata('kategori_artikel', set_value('kategori_artikel'));
                    $this->session->set_flashdata('headline_artikel', set_value('headline_artikel'));
                    $this->session->set_flashdata('isi_artikel', set_value('isi_artikel'));
                    $this->session->set_flashdata('content_artikel', set_value('content_artikel'));

                    // After that you need to used redirect function instead of load view such as 
                    redirect($_SERVER['HTTP_REFERER'], $error);
                } else {

                    $data = [
                        'id_category' => $this->input->post('kategori_artikel'),
                        'judul' => $judul_artikel,
                        'headline' => trim($this->input->post('headline_artikel')),
                        'content' => trim($this->input->post('isi_artikel')),
                        'author' => $user_id,
                        'photo' => $newPhotoFileName,
                        'slug' => trim($slug),
                        'created_at' => $now,
                        'created_by' => $user_id,
                    ];

                    $this->M_Article->add_article($data);

                    $this->session->set_flashdata('message_name', 'Artikel berhasil ditambahkan');

                    redirect('dash/article');
                }
            }
        }
    }

    public function edit()
    {
        $slug = $this->uri->segment(4);
        $data = [
            'categories' => $this->M_Article->category(),
            'article' => $this->M_Article->detail($slug),
        ];

        $this->loadArticleView('v_create', $data);
    }

    public function update_photo($slug)
    {
        $user_id = $this->session->userdata('user_id');

        $cek = $this->M_Article->is_available($slug);

        $foto = $cek["photo"];
        $path = "assets/front/images/articles/" . $foto;

        if (file_exists($path)) {
            unlink($path);
        }

        $now = date('Y-m-d H:i:s');

        $photo = $_FILES['foto_artikel']['name']; // Nama file 
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

        if (!$this->upload->do_upload('foto_artikel')) {
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

            $this->M_Article->update_photo($data, $slug);

            $this->session->set_flashdata('message_name', 'The photo has been successfully modified.');
            // After that you need to used redirect function instead of load view such as 

            redirect('dash/article/edit/' . $slug);
        }
    }

    public function delete()
    {
        $slug = $this->uri->segment(4);

        $cek = $this->M_Article->is_available($slug);

        $foto = $cek["photo"];

        $path = "assets/front/images/articles/" . $foto;

        if (file_exists($path)) {
            unlink($path);
        }

        $this->M_Article->delete($slug);

        $this->session->set_flashdata('message_name', 'The article has been successfully deleted.');
        // After that you need to used redirect function instead of load view such as 

        redirect($_SERVER['HTTP_REFERER']);
    }
}
