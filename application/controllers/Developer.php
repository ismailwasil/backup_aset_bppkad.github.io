<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Developer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->session->userdata('id_role') != 4) {
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

    public function menu()
    {
        $data['title'] = "Manage";
        $data['title_sub'] = "Menu";
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->db->get('menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/page_header', $data);
            $this->load->view('templates/menu/sidebar-menu', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/pages/menu');
            $this->load->view('templates/page_footer');
        } else {
            $this->db->insert('menu', ['menu' => $this->input->post('menu')]);

            $swal = '<script>
                        window.addEventListener("load", function() {
                            Swal.fire({
                                title: "Success!",
                                text: "Menu baru berhasil ditambahkan",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1300,
                            })
                        });
                    </script>';
            $this->session->set_flashdata('message', $swal);
            redirect('developer/menu');
        }
    }

    public function add_sub_menu()
    {
        $aksesMenu = htmlspecialchars($this->input->post('id_menu'));
        $namaSubMenu = htmlspecialchars($this->input->post('title'));
        $url = htmlspecialchars($this->input->post('url'));
        $icon = htmlspecialchars($this->input->post('icon'));
        $is_active = htmlspecialchars($this->input->post('is_active'));
        $data = [
            'id_menu' => $aksesMenu,
            'title' => $namaSubMenu,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active
        ];
        $this->db->insert('sub_menu', $data);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Sub Menu Baru berhasil ditambahkan",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/menu');
    }

    public function edit_menu($idMenu)
    {
        $NamaMenu = htmlspecialchars($this->input->post('menu'));
        $queryEditMenu = "UPDATE menu
                            SET menu='$NamaMenu'
                            WHERE id=$idMenu
                            ";
        $this->db->query($queryEditMenu);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Menu berhasil diedit",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/menu');
    }
    public function edit_sub_menu($idSubMenu)
    {
        $aksesMenu = htmlspecialchars($this->input->post('id_menu'));
        $namaSubMenu = htmlspecialchars($this->input->post('title'));
        $url = htmlspecialchars($this->input->post('url'));
        $icon = htmlspecialchars($this->input->post('icon'));
        $is_active = htmlspecialchars($this->input->post('is_active'));
        $queryEditMenu = "UPDATE sub_menu
                            SET id_menu='$aksesMenu', title='$namaSubMenu', url='$url',icon='$icon',is_active='$is_active'
                            WHERE id=$idSubMenu
                            ";
        $this->db->query($queryEditMenu);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Sub Menu berhasil diedit",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/menu');
    }

    public function delete($id)
    {
        // $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $verifikator = $user['name'];
        $queryDelete = "DELETE FROM menu
                        WHERE id=$id
                        ";
        $this->db->query($queryDelete);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Menu Berhasil dihapus",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/menu');
    }
    public function delete_sub_menu($idSub)
    {
        $queryDelete = "DELETE FROM sub_menu
                        WHERE id=$idSub
                        ";
        $this->db->query($queryDelete);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Sub Menu Berhasil dihapus",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/menu');
    }

    public function user_manage()
    {
        $data['title'] = "Manage";
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $userMasuk = $user['id'];

        $data['userQuery'] = "SELECT *, data_user.id AS id_user FROM data_user JOIN user_role
                    ON data_user.id_role=user_role.id
                    WHERE data_user.id!=$userMasuk AND data_user.id_role!=? AND user_role.role LIKE ?
                    ";

        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/user_manage');
        $this->load->view('templates/page_footer');
    }

    public function edit_user($id)
    {
        // $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $verifikator = $user['name'];

        $akronim = htmlspecialchars($this->input->post('akronim'));
        $role = htmlspecialchars($this->input->post('user_role'));
        $status = htmlspecialchars($this->input->post('status'));
        $link_bi = htmlspecialchars($this->input->post('link-bi'));
        $link_stock = htmlspecialchars($this->input->post('link-stock'));
        $queryDelete = "UPDATE data_user
                            SET id_role=$role, is_active=$status, akronim='$akronim', link_bi='$link_bi', link_stock='$link_stock'
                            WHERE id=$id
                        ";
        $this->db->query($queryDelete);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "User Berhasil di-update",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/user_manage');
    }

    public function add_user()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('akronim', 'Acronim', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username ini sudah tersedia. Buat username lain!'
        ]);
        $this->form_validation->set_rules('user_role', 'User Role', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);

        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'image' => 'default.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'id_role' => htmlspecialchars($this->input->post('user_role', true)),
            'is_active' => 1,
            'akronim' => htmlspecialchars($this->input->post('akronim', true)),
            'link_bi' => htmlspecialchars($this->input->post('link-bi', true)),
            'link_stock' => htmlspecialchars($this->input->post('link-stock', true)),
        ];
        $this->db->insert('data_user', $data);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "User Baru berhasil ditambahkan",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/user_manage');
    }

    public function delete_user()
    {
        $id_user = htmlspecialchars($this->input->post('id_user', true));
        $queryDelete = "DELETE FROM data_user
                        WHERE id=$id_user
                        ";
        $this->db->query($queryDelete);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "User Berhasil dihapus",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/user_manage');
    }

    public function ubah_password()
    {
        $this->form_validation->set_rules('ubahpassword1', 'Password', 'required|trim|is_unique[user.password]|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('ubahpassword2', 'Password', 'required|trim|matches[password1]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $pass1 = password_hash($this->input->post('ubahpassword1'), PASSWORD_DEFAULT);
        $idUbah = htmlspecialchars($this->input->post('id', true));
        $queryUbahPwd = "UPDATE data_user
                            SET password='$pass1'
                            WHERE id=$idUbah
                        ";
        $this->db->query($queryUbahPwd);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "User Berhasil dihapus",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('developer/user_manage');
    }
}
