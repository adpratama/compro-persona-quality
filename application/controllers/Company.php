<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form', 'url', 'date']);
        $this->load->library(['form_validation', 'Phpmailer_lib']);
        $this->load->model(['M_Client', 'M_Setting', 'M_Team', 'M_Service', 'M_Testimonial']);
        $this->data['values'] = $this->M_Setting->our_values();
    }

    public function about()
    {
        $this->data += [
            'title' => 'Tentang',
            'pages' => 'pages/v_about',
            'visi' => $this->M_Setting->setting('visi'),
            'misi' => $this->M_Setting->setting('misi'),
            'tentang' => $this->M_Setting->setting('tentang'),
        ];

        $this->load->view('index', $this->data);
    }

    public function team()
    {
        $this->data += [
            'title' => 'Tim',
            'pages' => 'pages/v_team',
            'teams' => $this->M_Team->list(),
        ];

        $this->load->view('index', $this->data);
    }

    public function client()
    {
        $this->data += [
            'title' => 'Klien',
            'pages' => 'pages/v_client',
            'clients' => $this->M_Client->list(),
        ];

        $this->load->view('index', $this->data);
    }

    public function testimonial()
    {
        $this->data += [
            'title' => 'Testimoni',
            'pages' => 'pages/v_testimonial',
            'testimonials' => $this->M_Testimonial->list(),
        ];

        $this->load->view('index', $this->data);
    }

    public function add_testimonial()
    {
        // Atur aturan validasi formulir di sini
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('company', 'Perusahaan', 'required');
        $this->form_validation->set_rules('title', 'Jabatan', 'required');
        $this->form_validation->set_rules('content', 'Pesan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman formulir
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            ' . validation_errors() . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('company/testimonial');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'company' => $this->input->post('company'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
            ];

            if ($this->M_Testimonial->add_new($data)) {
                $from = $data['name'] . ' (' . $data['company'] . ')';
                $subject = $data['subject'];
                $message = 'Nama: ' . $data['name'] . '<br> Company: ' . $data['company'] . '<br> Testimoni: ' . $data['content'];

                if ($this->phpmailer_lib->sendMail($from, $subject, $message)) {
                    $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">Testimoni telah disampaikan ke admin.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('company/testimonial');
                } else {
                    $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">Testimoni telah disampaikan ke admin. Error sending email.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('company/testimonial');
                }
            } else {
                $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Testimoni gagal disampaikan ke admin.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('company/testimonial');
            }
        }
    }
}
