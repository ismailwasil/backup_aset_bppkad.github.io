<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id_role = $this->session->userdata('id_role');

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => 'pengunjung',
                'id_role' => 3
            ];
            $this->session->set_userdata($data);

            redirect('umum');
        } elseif ($id_role == 1) {
            redirect('admin');
        } elseif ($id_role == 4) {
            redirect('developer');
        } elseif ($id_role == 2) {
            redirect('user');
        } elseif ($id_role == 3) {
            redirect('umum');
        }
    }

    public function sewa()
    {
        $id_role = $this->session->userdata('id_role');

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => 'pengunjung',
                'id_role' => 3
            ];
            $this->session->set_userdata($data);

            redirect('umum/sewa');
        } elseif ($id_role == 1) {
            redirect('admin/sewa');
        } elseif ($id_role == 4) {
            redirect('developer/sewa');
        } elseif ($id_role == 2) {
            redirect('user/sewa');
        } elseif ($id_role == 3) {
            redirect('umum/sewa');
        }
    }

    public function pengajuan_spm()
    {
        $id_role = $this->session->userdata('id_role');

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => 'pengunjung',
                'id_role' => 3
            ];
            $this->session->set_userdata($data);

            redirect('auth/error');
        } elseif ($id_role == 1) {
            redirect('admin/pengajuan_spm');
        } elseif ($id_role == 4) {
            redirect('developer/pengajuan_spm');
        } elseif ($id_role == 2) {
            redirect('user/pengajuan_spm');
        } elseif ($id_role == 3) {
            redirect('auth/error');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('id_role') == 4) {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('akronim', 'Acronim', 'required|trim');
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[data_user.username]', [
                'is_unique' => 'Username ini sudah tersedia. Buat username lain!'
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                'matches' => 'Password tidak sama!',
                'min_length' => 'Password terlalu pendek!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
                'matches' => 'Password tidak sama!',
                'min_length' => 'Password terlalu pendek!'
            ]);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Register";
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/regist');
                $this->load->view('templates/auth_footer');
            } else {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'image' => 'default.png',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'id_role' => 2,
                    'is_active' => 1,
                    'akronim' => htmlspecialchars($this->input->post('akronim', true)),
                    'link_bi' => '',
                    'link_stock' => '',
                ];
                $this->db->insert('data_user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-light-success alert-dismissible show fade">
                                            <i class="bi bi-check-circle"></i> Akun berhasil dibuat. Silakan Login!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>');
                redirect('auth/login');
            }
        } else {
            // redirect('auth/error');
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('akronim', 'Acronim', 'required|trim');
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[data_user.username]', [
                'is_unique' => 'Username ini sudah tersedia. Buat username lain!'
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                'matches' => 'Password tidak sama!',
                'min_length' => 'Password terlalu pendek!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
                'matches' => 'Password tidak sama!',
                'min_length' => 'Password terlalu pendek!'
            ]);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Register";
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/regist');
                $this->load->view('templates/auth_footer');
            } else {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'image' => 'default.png',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'id_role' => 2,
                    'is_active' => 1,
                    'akronim' => htmlspecialchars($this->input->post('akronim', true))
                ];
                $this->db->insert('data_user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-light-success alert-dismissible show fade">
                                            <i class="bi bi-check-circle"></i> Akun berhasil dibuat. Silakan Login!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>');
                redirect('auth/login');
            }
        }
    }

    public function login()
    {
        if (!$this->session->userdata('username')) {
            // ###################
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Login";
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');
            } else {
                $this->_login();
            }
        } else {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');

            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Login";
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');
            } else {
                $this->_login();
            }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('data_user', ['username' => $username])->row_array();

        if ($user) {
            // username ada
            // dan jika username  aktiv
            if ($user['is_active'] == 1) {
                // cek passwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    $akronim = $user['akronim'];
                    $swaldash = '<script>
                                    window.addEventListener("load", function() {
                                        Swal.fire({
                                            title: "Success!",
                                            text: "' . $akronim . ' Berhasil Login",
                                            icon: "success",
                                            showConfirmButton: false,
                                            timer: 1500,
                                        })
                                    });
                                </script>';
                    $this->session->set_flashdata('message', $swaldash);
                    if ($user['id_role'] == 1) {
                        redirect('admin/admin_sewa');
                    } elseif ($user['id_role'] == 4) {
                        redirect('developer');
                    } else {
                        redirect('user');
                    }
                } else {
                    $swalLog = '<script>
                                    window.addEventListener("load", function() {
                                        Swal.fire({
                                            title: "Salah!",
                                            text: "Password Salah",
                                            icon: "error",
                                            confirmButtonText: "Coba Lagi",
                                        })
                                    });
                                </script>';
                    $this->session->set_flashdata('message', $swalLog);
                    redirect('auth/login');
                }
            } else {
                $swalLog = '<script>
                             window.addEventListener("load", function() {
                                Swal.fire({
                                     title: "Tidak Aktif!",
                                     text: "Username Tidak Aktif, minta aktivasi ke developer",
                                     icon: "error",
                                     confirmButtonText: "Coba Lagi",
                                 })
                             });
                          </script>';
                $this->session->set_flashdata('message', $swalLog);
                redirect('auth/login');
            }
        } else {
            $swalLog = '<script>
                                    window.addEventListener("load", function() {
                                        Swal.fire({
                                            title: "Tidak Terdaftar!",
                                        text: "Username Tidak Terdaftar, coba username lain",
                                        icon: "error",
                                        confirmButtonText: "Coba Lagi",
                                        })
                                    });
                                </script>';
            $this->session->set_flashdata('message', $swalLog);
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        // $swaldash = 'Swal.fire({
        //                                 title: "Success!",
        //                                 text: "Anda Berhasil Login Lagi Doooongggg",
        //                                 icon: "success",
        //                                 showConfirmButton: false,
        //                                 timer: 1500,
        //                             })';
        // $this->session->set_flashdata('message', $swaldash);
        redirect('auth');
    }

    public function error()
    {
        $this->load->view('templates/error403');
    }

    public function kirim()
    {
        $id_role = $this->session->userdata('id_role');

        $this->form_validation->set_rules('pengirim', 'Nama', 'required|trim');
        $this->form_validation->set_rules('wa', 'No. Wa', 'required|trim');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        $token = "6267092313:AAFIE6Xbxh25IFiAWxDynqjQPSyhlVlQZa0";
        $chatID = "-856503743";
        // Path to store the uploaded file temporarily
        $uploadDir = './assets/temp_tele/';

        $nama = htmlspecialchars($this->input->post('pengirim'));
        $wa = htmlspecialchars($this->input->post('wa'));
        $pesan = htmlspecialchars($this->input->post('pesan'));

        $wa = preg_replace('/(\W*)/', '', $wa); //only digits allowed

        if (substr($wa, 0, 1) == 0) {
            $number = "62" . substr($wa, 1);
        } elseif (substr($wa, 0, 2) == 62) {
            if (substr($wa, 0, 3) == 620) {
                $number = "62" . substr($wa, 3);
            } else {
                $number = $wa;
            }
        }


        $chat = "Nama : " . $nama . "\n";
        $chat .= "Pesan : " . $pesan . "\n";

        $file = $_FILES['file'];
        // var_dump($file);
        // echo $file;
        // die();

        // cek apa ada gambar diupload?
        if ($file) {
            // jika ada file yg diinput
            // Check if a file was uploaded successfully
            if ($file['error'] === UPLOAD_ERR_OK) {
                // Generate a unique filename for the uploaded file
                $filename = uniqid() . '_' . $file['name'];

                // Move the uploaded file to the desired directory
                move_uploaded_file($file['tmp_name'], $uploadDir . $filename);

                // Send the file to Telegram using cURL
                $apiUrl = "https://api.telegram.org/bot{$token}/sendPhoto";
                $postData = array(
                    'chat_id' => $chatID,
                    'photo' => new CURLFile(realpath($uploadDir . $filename)),
                    'caption' => $chat,
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Chat WA',
                                    'url' => 'https://wa.me/' . $number
                                )
                            )
                        )
                    ))
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $apiUrl);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Delete the temporary uploaded file
                unlink($uploadDir . $filename);

                // Display the response from the Telegram API
                $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Swal.fire({
                                    title: "Success!",
                                    text: "Pesan Berhasil Dikirim",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500,
                                })
                            });
                        </script>';
                $this->session->set_flashdata('message', $swalChat);

                if ($id_role == 1) {
                    redirect('admin/contact');
                } elseif ($id_role == 4) {
                    redirect('developer/contact');
                } elseif ($id_role == 2) {
                    redirect('user/contact');
                } elseif ($id_role == 3) {
                    redirect('umum/contact');
                }
                // echo $response;
            } else {
                // echo 'Error uploading file.';
                $data = [
                    'text' => $chat,
                    'chat_id' => $chatID,
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Chat WA',
                                    'url' => 'https://wa.me/' . $number
                                )
                            )
                        )
                    ))
                ];
                file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

                $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Swal.fire({
                                    title: "Success!",
                                    text: "Pesan Berhasil Dikirim",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500,
                                })
                            });
                        </script>';
                $this->session->set_flashdata('message', $swalChat);

                if ($id_role == 1) {
                    redirect('admin/contact');
                } elseif ($id_role == 4) {
                    redirect('developer/contact');
                } elseif ($id_role == 2) {
                    redirect('user/contact');
                } elseif ($id_role == 3) {
                    redirect('umum/contact');
                }
                // 
            }
        } else {
            $data = [
                'text' => $chat,
                'chat_id' => $chatID,
                'reply_markup' => json_encode(array(
                    'inline_keyboard' => array(
                        array(
                            array(
                                'text' => 'Chat WA',
                                'url' => 'https://wa.me/' . $number
                            )
                        )
                    )
                ))
            ];
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));

            $swalChat = '<script>
                            window.addEventListener("load", function() {
                                Swal.fire({
                                    title: "Success!",
                                    text: "Pesan Berhasil Dikirim",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500,
                                })
                            });
                        </script>';
            $this->session->set_flashdata('message', $swalChat);

            if ($id_role == 1) {
                redirect('admin/contact');
            } elseif ($id_role == 4) {
                redirect('developer/contact');
            } elseif ($id_role == 2) {
                redirect('user/contact');
            } elseif ($id_role == 3) {
                redirect('umum/contact');
            }
            // 
        }
    }

    // Ajukan SPM
    public function ajukanSPM()
    {
        $id_role = $this->session->userdata('id_role');
        $this->load->library('telegram'); //load library telegram

        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('spm', 'No. SPM', 'required|trim|is_unique[data_spm.no_spm]');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        // $this->form_validation->set_rules('dokument', 'Dokumen', 'required');

        $reg = '';
        $dateAju = date('Y-m-d');
        $dateVerif = '';
        $tgl_aju = $dateAju;
        $tgl_verif = $dateVerif;
        $skpd = htmlspecialchars($this->input->post('skpd'));
        $no_spm = htmlspecialchars($this->input->post('no_spm'));
        $jenis = htmlspecialchars($this->input->post('jenis'));
        $verifikator = '';
        $id_status = 1;
        $catatan = '';

        // cek jika ada gambar diupload
        $dokumen = $_FILES['dokumen']['name'];
        // var_dump($dokumen);
        // die();
        if ($dokumen) {
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size'] = '10024';
            $config['upload_path'] = './assets/doc/SPMDOC';

            $this->load->library('upload', $config);
            $this->upload->initialize($config); //mengatasi error upload_path

            if ($this->upload->do_upload('dokumen')) {
                $dok = $this->upload->data('file_name');
                // echo '$dok';
                // die();
                $queryAjukanSPM = "INSERT INTO spm_masuk (reg, tgl_aju, tgl_verif, skpd, no_spm, jenis, dokumen, verifikator, id_status, catatan)
                            VALUES ('$reg', '$tgl_aju', '$tgl_verif', '$skpd', '$no_spm', '$jenis', '$dok', '$verifikator', $id_status, '$catatan')
                        ";
                $this->db->query($queryAjukanSPM);

                // Kirim data ke Telegram
                $botToken = '6549922145:AAFnKxXdsR29DrsqJ-MZTrKV69FqRXpIyao';
                $chatId = '-856503743';
                $message = "SPM Masuk \n\n";
                $message .= "SKPD : " . $skpd . "\n";
                $message .= "No. SPM : " . $no_spm . "\n";
                $message .= "Jenis : " . $jenis . "\n";
                $buttonText = "Silakan Cek SPM";
                $buttonURL = "http://localhost/aset-apps/";

                $this->telegram->sendMessage($message, $buttonText, $buttonURL, $botToken, $chatId);

                // Response
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
                if ($id_role == 1) {
                    redirect('admin/pengajuan_spm');
                } elseif ($id_role == 4) {
                    redirect('developer/pengajuan_spm');
                } elseif ($id_role == 2) {
                    redirect('user/pengajuan_spm');
                } elseif ($id_role == 3) {
                    redirect('umum/pengajuan_spm');
                }
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function view_edit_pengajuan_spm()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Ajukan SPM";


        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/view_edit_pengajuan_spm', $data);
        $this->load->view('templates/page_footer');
    }

    // EditSPM setelah diajukan karena ditolak
    public function edit_spm_aju($idEditSPM)
    {
        $id_role = $this->session->userdata('id_role');
        $no_spm = htmlspecialchars($this->input->post('no_spm'));
        $jenis = htmlspecialchars($this->input->post('jenis'));

        // cek jika ada gambar diupload
        $dokumen = $_FILES['dokumenEdit']['name'];
        // var_dump($dokumen);
        // die();
        if ($dokumen) {
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size'] = '10024';
            $config['upload_path'] = './assets/doc/SPMDOC';

            $this->load->library('upload', $config);
            $this->upload->initialize($config); //mengatasi error upload_path

            if ($this->upload->do_upload('dokumen')) {
                $dok = $this->upload->data('file_name');
                // echo '$dok';
                // die();
                $queryEditSPM = "UPDATE spm_masuk SET no_spm='$no_spm', jenis='$jenis', dokumen='$dok'
                                WHERE id='$idEditSPM'
                            ";
                $this->db->query($queryEditSPM);

                // Response
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
                if ($id_role == 1) {
                    redirect('admin/pengajuan_spm');
                } elseif ($id_role == 4) {
                    redirect('developer/pengajuan_spm');
                } elseif ($id_role == 2) {
                    redirect('user/pengajuan_spm');
                } elseif ($id_role == 3) {
                    redirect('umum/pengajuan_spm');
                }
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $queryEditSPM = "UPDATE spm_masuk SET no_spm='$no_spm', jenis='$jenis'
                                WHERE id='$idEditSPM'
                            ";
            $this->db->query($queryEditSPM);
            // Response
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
            if ($id_role == 1) {
                redirect('admin/pengajuan_spm');
            } elseif ($id_role == 4) {
                redirect('developer/pengajuan_spm');
            } elseif ($id_role == 2) {
                redirect('user/pengajuan_spm');
            } elseif ($id_role == 3) {
                redirect('umum/pengajuan_spm');
            }
        }
    }

    public function ubah_username_profile($id_user_for_input)
    {
        $input_username = htmlspecialchars($this->input->post('input_username'));
        $queryInputUsername = "UPDATE data_user SET username='$input_username'
                            WHERE id='$id_user_for_input'
                            ";
        $this->db->query($queryInputUsername);

        // Response
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Username berhasil diedit",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1300,
                        })
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        redirect('auth/logout');
    }
}
