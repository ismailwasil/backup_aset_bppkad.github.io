<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->session->userdata('id_role') != 1) {
            redirect('auth/');
            // $this->load->view('error403');
        }

        // using helper instead
        // is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = "Dashboard";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/dashboard');
        $this->load->view('templates/page_footer');
    }

    public function admin_sewa()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->select('COUNT(event_acara.id) AS series, event_acara.id_aset, aset_sewa.nm_aset, aset_sewa.color');
        $this->db->from('event_acara');
        $this->db->join('aset_sewa', 'event_acara.id_aset=aset_sewa.id_aset');
        $this->db->group_by('event_acara.id_aset, aset_sewa.nm_aset, aset_sewa.color');
        $this->db->order_by('id_aset', 'ASC');
        $data['acara'] = $this->db->get()->result();

        $data['title'] = "Admin";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/admin_sewa', $data);
        $this->load->view('templates/page_footer', $data);
    }
    public function admin_bpu_spg()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $querySewaAset = "SELECT * FROM aset_sewa JOIN event_acara ON aset_sewa.id_aset=event_acara.id_aset JOIN status_sewa
                            ON event_acara.id_status=status_sewa.id_status
                            WHERE event_acara.id_aset = 1 AND event_acara.id_status=?
                            ORDER BY ? ASC
                        ";
        $data['sewa'] = $this->db->query($querySewaAset, array(1, 'tgl_book'))->result_array();
        $data['sewaPesan'] = $this->db->query($querySewaAset, array(3, 'tgl_awal_acara'))->result_array();
        $data['JumlahSewa'] = $this->db->query($querySewaAset, array(1, 'tgl_book'))->num_rows();
        $data['JumlahPesan'] = $this->db->query($querySewaAset, array(3, 'tgl_awal_acara'))->num_rows();

        $queryAcara = "SELECT COUNT(event_acara.id) AS series, nm_aset, color
                        FROM event_acara JOIN aset_sewa ON event_acara.id_aset=aset_sewa.id_aset
                        GROUP BY aset_sewa.id_aset,aset_sewa.nm_aset, aset_sewa.color
                        ORDER BY aset_sewa.id_aset ASC";
        $data['acara'] = $this->db->query($queryAcara)->result();

        $data['title'] = "Admin Lasada";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/admin_BPU_spg', $data);
        $this->load->view('templates/page_footer', $data);
    }

    public function verifikasi_spm()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = "Admin";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/verifikasi_spm', $data);
        $this->load->view('templates/page_footer');
    }

    public function verif($id)
    {
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $year_verif = date('Y');
        $regQuery = "SELECT * FROM spm_masuk
                    WHERE tgl_verif LIKE '$year_verif%' AND id_status=3
                    ";
        // Mengecek apakah ada verifikasi di tahun ini lalu ditambah 1 untuk dijadikan no. register
        $no_reg = $this->db->query($regQuery)->num_rows() + 1;

        $verifikator = $user['name'];
        $tgl_verif = date('Y-m-d');
        $queryVerif = "UPDATE spm_masuk 
                        SET reg=$no_reg, tgl_verif='$tgl_verif', verifikator='$verifikator', id_status=3
                        WHERE id=$id
                        ";
        $this->db->query($queryVerif);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "SPM berhasil diverifikasi",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('admin/verifikasi_spm');
    }

    public function tolak($id)
    {
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $verifikator = $user['name'];
        $note = htmlspecialchars($this->input->post('catatan'));
        $queryTolak = "UPDATE spm_masuk
                            SET id_status=2, catatan='$note <br> <br> Diperiksa oleh: $verifikator'
                            WHERE id=$id
                            ";
        $this->db->query($queryTolak);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "SPM berhasil ditolak",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('admin/verifikasi_spm');
    }
    public function edit_spm($id)
    {
        $noSPM = htmlspecialchars($this->input->post('no_spm'));
        $jenis = htmlspecialchars($this->input->post('jenis'));
        $queryUpdate = "UPDATE spm_masuk
                            SET no_spm='$noSPM', jenis='$jenis'
                            WHERE id=$id
                            ";
        $this->db->query($queryUpdate);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "SPM berhasil diedit",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('admin/verifikasi_spm');
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

    public function sewa()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Lasada";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/sewa', $data);
        $this->load->view('templates/page_footer');
    }

    public function pengajuan_spm()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Ajukan SPM";


        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/pengajuan_spm', $data);
        $this->load->view('templates/page_footer');
    }

    public function view_edit_pengajuan_spm($id_edit_spm)
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Ajukan SPM";

        $spmQuery = "SELECT *, spm_masuk.id AS id_masuk_spm FROM status_spm JOIN spm_masuk 
                                                            ON status_spm.id = spm_masuk.id_status JOIN data_user
                                                            ON spm_masuk.skpd=data_user.id
                                                            WHERE spm_masuk.id='$id_edit_spm'
                                                            ";
        $data['spm_masuk'] = $this->db->query($spmQuery)->row_array();

        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/view_edit_pengajuan_spm', $data);
        $this->load->view('templates/page_footer');
    }


    public function info()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Info";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/info');
        $this->load->view('templates/page_footer');
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
