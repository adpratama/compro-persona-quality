<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Setting extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list()
    {
        $query = $this->db->get('settings')->result();
        return $query;
    }

    public function setting($clause)
    {
        $query = $this->db->where('kategori', $clause)->get('settings')->row_array();
        return $query;
    }

    public function footer_section($language, $clause)
    {
        $query = $this->db->select('judul_setting_' . $language . ' as judul_setting, content_' . $language . ' as content')->where('kategori', $clause)->get('settings')->row_array();
        return $query;
    }

    public function update_visimisi($data_visi, $data_misi)
    {
        $this->db->where('kategori', 'visi');
        $this->db->update('settings', $data_visi);

        $this->db->where('kategori', 'misi');
        $this->db->update('settings', $data_misi);

        $this->session->set_flashdata('message_name', 'Visi misi information has been successfully updated.');
        // After that you need to used redirect function instead of load view such as 
        redirect("dash/settings");
    }

    public function update_contact($data_alamat, $data_telepon, $data_email)
    {
        $this->db->where('kategori', 'alamat');
        $this->db->update('settings', $data_alamat);

        $this->db->where('kategori', 'telepon');
        $this->db->update('settings', $data_telepon);

        $this->db->where('kategori', 'email');
        $this->db->update('settings', $data_email);

        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Contact information has been successfully updated.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("dash/settings");
    }

    public function category()
    {
        $query = $this->db->order_by('category_name', 'ASC')->get('article_category')->result();

        return $query;
    }

    public function add_category($data)
    {

        $this->db->select('count(Id) as id');
        $this->db->where('slug', $data["slug"]);
        $query_check = $this->db->get('article_category')->row_array();

        $hasil = $query_check["id"];

        if ($hasil > 0) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			The category is already available.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('dash/settings');
        } else {

            $this->db->insert('article_category', $data);
            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				The category added successfully.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
            // After that you need to used redirect function instead of load view such as 
            redirect("dash/settings");
        }
    }

    public function detail_category($id)
    {
        $query = $this->db->where('Id', $id)->get('article_category')->row_array();

        return $query;
    }

    public function chat()
    {
        $query = $this->db->from('contact a')->join('social_media b', 'b.Id = a.id_sosmed_category')->get()->result();

        return $query;
    }

    public function social_media()
    {
        $query = $this->db->get('social_media')->result();

        return $query;
    }

    public function detail_social_media($id)
    {
        $query = $this->db->where('Id', $id)->get('social_media')->result();

        return $query;
    }

    public function add_contact($data)
    {
        $this->db->select('count(Id) as id');
        $this->db->where('slug', $data["slug"]);
        $query_check = $this->db->get('contact')->row_array();

        $hasil = $query_check["id"];

        if ($hasil > 0) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			The contact is already available.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('dash/settings');
        } else {

            $this->db->insert('contact', $data);
            $this->session->set_flashdata('message_name', '
            <div class="alert alert-success alert-dismissible alert-dismissible fade show" role="alert">
				The contact added successfully.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');

            // After that you need to used redirect function instead of load view such as 
            redirect("dash/settings");
        }
    }

    public function update_contact_chat($data, $old_slug)
    {
        $this->db->where('slug', $old_slug);
        $this->db->update('contact', $data);

        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Contact has been successfully updated.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("dash/settings");
    }

    public function detail_contact($id)
    {
        $query = $this->db->where('Id', $id)->get('contact')->row_array();

        return $query;
    }

    public function faq($language)
    {
        $query = $this->db->select('question_' . $language . ' as question, answer_' . $language . ' as answer')->get('faq')->result();
        return $query;
    }
}
