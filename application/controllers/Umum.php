<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->session->userdata('id_role') != 3) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Lasada";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/lasada2', $data);
        $this->load->view('templates/page_footer');
      
      
      
    }
    public function lasada()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Lasada";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/lasada2', $data);
        $this->load->view('templates/page_footer');
    }

    public function ajukan()
    {
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('spm', 'No. SPM', 'required|trim|is_unique[data_spm.no_spm]');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        // $this->form_validation->set_rules('dokument', 'Dokumen', 'required');

        $dateAju = date('Y-m-d');
        $dateVerif = date('Y-m-d');
        $tgl_aju = $dateAju;
        $tgl_verif = $dateVerif;
        $skpd = $user['name'];
        $no_spm = htmlspecialchars($this->input->post('no_spm'));
        $jenis = htmlspecialchars($this->input->post('jenis'));
        $dokumen = $_FILES['dokumen'];
        if ($dokumen = '') {
            // no action
        } else {
            $config['upload_path'] = './assets/doc/SPM_DOC';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('dokumen')) {
                $data['error'] = $this->upload->display_errors();
                die();
            } else {
                $dokumen = $this->upload->data('file_name');
            }
        }
        $verifikator = '';
        $id_status = 1;
        $catatan = '';

        $queryAjukanSPM = "INSERT INTO spm_masuk (id, tgl_aju, tgl_verif, skpd, no_spm, jenis, dokumen, verifikator, id_status, catatan)
                            VALUES (NULL, '$tgl_aju', '$tgl_verif', '$skpd', '$no_spm', '$jenis', '$dokumen', '$verifikator', $id_status, '$catatan')
                        ";
        $this->db->query($queryAjukanSPM);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Data SPM berhasil ditambahkan",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('user/pengajuan_spm');
    }

    public function contact()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Kontak";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/contact', $data);
        $this->load->view('templates/page_footer');
    }
}
