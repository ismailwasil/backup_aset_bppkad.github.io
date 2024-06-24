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
        $pengunjung = $this->db->get_where('data_user', ['id_role' => 3])->row_array();

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => $pengunjung['username'],
                'id_role' => $pengunjung['id_role'],
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

    public function lasada()
    {
        $id_role = $this->session->userdata('id_role');
        $pengunjung = $this->db->get_where('data_user', ['id_role' => 3])->row_array();

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => $pengunjung['username'],
                'id_role' => $pengunjung['id_role'],
            ];
            $this->session->set_userdata($data);

            redirect('umum/lasada');
        } elseif ($id_role == 1) {
            redirect('admin/lasada');
        } elseif ($id_role == 4) {
            redirect('developer/lasada');
        } elseif ($id_role == 2) {
            redirect('user/lasada');
        } elseif ($id_role == 3) {
            redirect('umum/lasada');
        }
    }

    public function pengajuan_spm()
    {
        $id_role = $this->session->userdata('id_role');
        $pengunjung = $this->db->get_where('data_user', ['id_role' => 3])->row_array();

        if (!$this->session->userdata('username')) {
            $data = [
                'username' => $pengunjung['username'],
                'id_role' => $pengunjung['id_role'],
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
                                        Toastify({
                                            text: "' . $akronim . ' Berhasil Login",
                                            duration: 3000,
                                            close: true,
                                            gravity: "center",
                                            position: "center",
                                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                        }).showToast();
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
        $swaldash = '<script>
                        window.addEventListener("load", function() {
                            Swal.fire({
                                title: "Success!",
                                text: "Anda Berhasil Logout",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1300,
                            })
                        });
                    </script>';
        $this->session->set_flashdata('message', $swaldash);
        redirect('umum/index');
    }

    public function error()
    {
        $this->load->view('templates/error403');
    }

    public function darurat()
    {
        $id_role = $this->session->userdata('id_role');
        $query_darurat = "UPDATE spm_masuk SET id_status_periksa=NULL WHERE id=36
                        ";
        $this->db->query($query_darurat);
        //$data['aset_sewa'] = $this->db->get_where('aset_sewa', ['nm_aset' => 'Bus Pemda'])->row_array();
        //var_dump($data['aset_sewa']);
        //die();
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Swal.fire({
                            title: "Success!",
                            text: "data berhasil di ubah",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500,
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
        }
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
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
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
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
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
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
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

    public function kirim_cronjob()
    {
        $id_role = $this->session->userdata('id_role');

        $this->form_validation->set_rules('pengirim', 'Nama', 'required|trim');
        $this->form_validation->set_rules('wa', 'No. Wa', 'required|trim');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        $token = "6267092313:AAFIE6Xbxh25IFiAWxDynqjQPSyhlVlQZa0";
        $chatID = "-856503743";
        // Path to store the uploaded file temporarily
        $uploadDir = './assets/temp_tele/';

        // $nama = htmlspecialchars($this->input->post('pengirim'));
        // $wa = htmlspecialchars($this->input->post('wa'));
        // $pesan = htmlspecialchars($this->input->post('pesan'));

        // $wa = preg_replace('/(\W*)/', '', $wa); //only digits allowed

        $nama = 'Ismail';
        $wa = '81913333320';
        $pesan = 'Ini Coba crownjob';

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
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
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
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
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
                                Toastify({
                                    text: "Pesan Berhasil Dikirim",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
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
                $QuerySKPDName = $this->db->get_where('data_user', ['id' => $skpd])->row_array();
                $skpdName = $QuerySKPDName['akronim'];

                $botTokenSPM = '6549922145:AAFnKxXdsR29DrsqJ-MZTrKV69FqRXpIyao';
                $chatIdSPM = '-856503743';
                $message = "*SPM Masuk* \n\n";
                $message .= "SKPD : _" . $skpdName . "_\n\n";
                $message .= "No. SPM : _" . $no_spm . "_\n\n";
                $message .= "Jenis : _" . $jenis . "_\n";

                $data = [
                    'text' => $message,
                    'chat_id' => $chatIdSPM,
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Periksa SPM',
                                    'url' => 'https://aset.sampangkab.go.id/admin/verifikasi_spm'
                                )
                            )
                        )
                    ))
                ];
                file_get_contents("https://api.telegram.org/bot$botTokenSPM/sendMessage?" . http_build_query($data));

                // Response
                $swal = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Data SPM berhasil ditambahkan",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
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

            if ($this->upload->do_upload('dokumenEdit')) {
                // hapus file dokumen lama
                $uploadDirUpdate = './assets/doc/SPMDOC/';
                $hasilrecordUpdate = $this->db->get_where('spm_masuk', ['id' => $idEditSPM])->row_array();
                $filenameLama = $hasilrecordUpdate['dokumen'];
                // Delete the temporary uploaded file
                unlink($uploadDirUpdate . $filenameLama);

                $dok = $this->upload->data('file_name');
                $queryEditSPM = "UPDATE spm_masuk SET no_spm='$no_spm', jenis='$jenis', dokumen='$dok', id_status=1
                                WHERE id='$idEditSPM'
                            ";
                $this->db->query($queryEditSPM);

                // Kirim data ke Telegram
                $queryRoot = "SELECT * FROM spm_masuk JOIN data_user ON spm_masuk.skpd=data_user.id WHERE spm_masuk.id='$idEditSPM'";
                $QuerySKPDNameUlang = $this->db->query($queryRoot)->row_array();
                $skpdNameUlang = $QuerySKPDNameUlang['akronim'];

                $botTokenSPM = '6549922145:AAFnKxXdsR29DrsqJ-MZTrKV69FqRXpIyao';
                $chatIdSPM = '-856503743';
                $message = "*Pengajuan Ulang SPM* \n\n";
                $message .= "SKPD : _" . $skpdNameUlang . "_\n\n";
                $message .= "No. SPM : _" . $QuerySKPDNameUlang['no_spm'] . "_\n\n";
                $message .= "Jenis : _" . $QuerySKPDNameUlang['jenis'] . "_\n";

                $data = [
                    'text' => $message,
                    'chat_id' => $chatIdSPM,
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode(array(
                        'inline_keyboard' => array(
                            array(
                                array(
                                    'text' => 'Periksa SPM',
                                    'url' => 'https://aset.sampangkab.go.id/admin/verifikasi_spm'
                                )
                            )
                        )
                    ))
                ];
                file_get_contents("https://api.telegram.org/bot$botTokenSPM/sendMessage?" . http_build_query($data));

                // Response
                $swal = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "SPM berhasil diedit dan Diajukan Ulang",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
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
            $queryEditSPM = "UPDATE spm_masuk SET no_spm='$no_spm', jenis='$jenis', id_status=1
                                WHERE id='$idEditSPM'
                            ";
            $this->db->query($queryEditSPM);

            // Kirim data ke Telegram
            $queryRoot = "SELECT * FROM spm_masuk JOIN data_user ON spm_masuk.skpd=data_user.id WHERE spm_masuk.id='$idEditSPM'";
            $QuerySKPDNameUlang = $this->db->query($queryRoot)->row_array();
            $skpdNameUlang = $QuerySKPDNameUlang['akronim'];

            $botTokenSPM = '6549922145:AAFnKxXdsR29DrsqJ-MZTrKV69FqRXpIyao';
            $chatIdSPM = '-856503743';
            $message = "*Pengajuan Ulang SPM* \n\n";
            $message .= "SKPD : _" . $skpdNameUlang . "_\n\n";
            $message .= "No. SPM : _" . $QuerySKPDNameUlang['no_spm'] . "_\n\n";
            $message .= "Jenis : _" . $QuerySKPDNameUlang['jenis'] . "_\n";

            $data = [
                'text' => $message,
                'chat_id' => $chatIdSPM,
                'parse_mode' => 'Markdown',
                'reply_markup' => json_encode(array(
                    'inline_keyboard' => array(
                        array(
                            array(
                                'text' => 'Periksa SPM',
                                'url' => 'https://aset.sampangkab.go.id/admin/verifikasi_spm'
                            )
                        )
                    )
                ))
            ];
            file_get_contents("https://api.telegram.org/bot$botTokenSPM/sendMessage?" . http_build_query($data));

            // Response
            $swal = '<script>
                        window.addEventListener("load", function() {
                            Toastify({
                                text: "SPM berhasil diedit dan Diajukan Ulang",
                                duration: 3000,
                                close: true,
                                gravity: "center",
                                position: "center",
                                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                            }).showToast();
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

    public function ajukan_ulang($idSPM)
    {
        $id_role = $this->session->userdata('id_role');
        $query_aju_ulang = "UPDATE spm_masuk 
                        SET id_status=1
                        WHERE id=$idSPM
                        ";
        $this->db->query($query_aju_ulang);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Toastify({
                            text: "SPM berhasil diajukan ulang",
                            duration: 3000,
                            close: true,
                            gravity: "center",
                            position: "center",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/verifikasi_spm');
        } elseif ($id_role == 4) {
            redirect('developer/verifikasi_spm');
        } elseif ($id_role == 2) {
            redirect('user/pengajuan_spm');
        }
    }

    public function hapus_SPM($idSPM)
    {
        $id_role = $this->session->userdata('id_role');
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $uploadDir = './assets/doc/SPMDOC/';
        $hasilrecord = $this->db->get_where('spm_masuk', ['id' => $idSPM])->row_array();
        $filename = $hasilrecord['dokumen'];
        // Delete the temporary uploaded file
        unlink($uploadDir . $filename);

        $queryHapus = "DELETE FROM spm_masuk 
                        WHERE id=$idSPM
                        ";
        $this->db->query($queryHapus);
        $swal = '<script>
                    window.addEventListener("load", function() {
                        Toastify({
                            text: "SPM berhasil dihapus",
                            duration: 3000,
                            close: true,
                            gravity: "center",
                            position: "center",
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    });
                </script>';
        $this->session->set_flashdata('message', $swal);
        if ($id_role == 1) {
            redirect('admin/verifikasi_spm');
        } elseif ($id_role == 4) {
            redirect('developer/verifikasi_spm');
        } elseif ($id_role == 2) {
            redirect('user/pengajuan_spm');
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

    // tampilan sesuai tahun Pilihan versi live
    public function tampilkanDataByYearLive()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $tahun = $this->input->get('tahun');
        $data['tahunIdent'] = $tahun;

        $queryJumlahSPMmasuk = "SELECT * FROM spm_masuk WHERE id_status=? AND tgl_aju LIKE '$tahun%'";

        $data['proses'] = $this->db->query($queryJumlahSPMmasuk, array(1))->num_rows();
        $data['tolak'] = $this->db->query($queryJumlahSPMmasuk, array(2))->num_rows();
        $data['verified'] = $this->db->query($queryJumlahSPMmasuk, array(3))->num_rows();

        $query = "SELECT spm_masuk.id AS id_masuk_spm, spm_masuk.tgl_verif, spm_masuk.reg, data_user.name, spm_masuk.no_spm, spm_masuk.jenis,spm_masuk.dokumen, spm_masuk.verifikator FROM status_spm JOIN spm_masuk 
                    ON status_spm.id = spm_masuk.id_status JOIN data_user ON spm_masuk.skpd=data_user.id
                    WHERE spm_masuk.id_status=3 AND spm_masuk.tgl_verif LIKE '$tahun%'
                    ORDER BY spm_masuk.reg DESC";
        $result = $this->db->query($query)->result_array();

        $data['spm_masuk'] = $result;
        $data['title'] = "Admin";
        $this->load->view('templates/pages/verifikasi_spm_ajax', $data);
    }
    // tampilan sesuai tahun Pilihan versi live

    // tampilan sesuai tahun Pilihan versi live
    public function tampilkanDataAjuByYearLive()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $tahun = $this->input->get('tahun');
        $data['tahunIdent'] = $tahun;

        $data['title'] = "Versi Barada-E";
        $this->load->view('templates/pages/pengajuan_spm_ajax', $data);
    }
    // tampilan sesuai tahun Pilihan versi live
    // Notif Ajax
    public function notif()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $tahunSkr = date("Y");
        $queryRootNotif = "SELECT * FROM spm_masuk WHERE id_status=? AND tgl_aju LIKE '$tahunSkr%'";
        $datajumlahproses = $this->db->query($queryRootNotif, array(1))->num_rows();
        $datajumlahtolak = $this->db->query($queryRootNotif, array(2))->num_rows();
        $datajumlahverif = $this->db->query($queryRootNotif, array(3))->num_rows();
        $dataAdmin = array('jmlproses' => $datajumlahproses, 'jmltolak' => $datajumlahtolak, 'jmlverif' => $datajumlahverif);
        echo json_encode($dataAdmin);

        // $this->load->view('templates/navbar_ajax', $data);
    }

    public function notif_user()
    {
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $tahunSkr = date("Y");
        $IdUser = $user['id'];
        $queryRootNotif = "SELECT * FROM spm_masuk WHERE id_status=? AND skpd=$IdUser AND tgl_aju LIKE '$tahunSkr%'";
        $jumlahproses = $this->db->query($queryRootNotif, array(1))->num_rows();
        $jumlahtolak = $this->db->query($queryRootNotif, array(2))->num_rows();
        $jumlahverif = $this->db->query($queryRootNotif, array(3))->num_rows();
        $data = array('proses' => $jumlahproses, 'tolak' => $jumlahtolak, 'verified' => $jumlahverif);
        echo json_encode($data);

        // $this->load->view('templates/navbar_ajax', $data);
    }
    public function jumlah_SPM()
    {
        $user = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $tahunSkr = date("Y");
        $idRole = $user['id_role'];
        $IdUser = $user['id'];
        if ($idRole == 2) {
            $queryRootNotif = "SELECT * FROM spm_masuk WHERE id_status=? AND skpd=$IdUser AND tgl_aju LIKE '$tahunSkr%'";
        } else {
            $queryRootNotif = "SELECT * FROM spm_masuk WHERE id_status=? AND tgl_aju LIKE '$tahunSkr%'";
        }
        $jumlahproses = $this->db->query($queryRootNotif, array(1))->num_rows();
        $jumlahtolak = $this->db->query($queryRootNotif, array(2))->num_rows();
        $jumlahverif = $this->db->query($queryRootNotif, array(3))->num_rows();
        $data = array('proses' => $jumlahproses, 'tolak' => $jumlahtolak, 'verified' => $jumlahverif);
        echo json_encode($data);

        // $this->load->view('templates/navbar_ajax', $data);
    }

    public function data_SPM_berubah_ajax()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();
        $tahun = date("Y");
        $data['tahunIdent'] = $tahun;

        // $data['title'] = "Versi Barada-E";
        $this->load->view('templates/pages/data_spm_berubah_ajax', $data);
    }
    // Notif Ajax

    // Cek Password ke Drive
    public function cek_password_drive()
    {
        $idUserDrive = htmlspecialchars($this->input->post('id_user'));
        $jenisLayananDrive = htmlspecialchars($this->input->post('jenis_layanan'));
        $passwordDrivebefore = htmlspecialchars($this->input->post('pwdDrive'));
        $passwordDrive = hash('sha256', $passwordDrivebefore);

        $data_user = $this->db->get_where('data_user', ['id' => $idUserDrive])->row_array();

        // Cek password SKPD mana
        if ($idUserDrive = 11) {
            $password_benar = '47fd02a773ea72b880ef6607cd48c681c3bf405650fba2145d0b84febc915843'; //id = 11 adalah disdik
        } else {
            // nothing
        }

        if ($passwordDrive === $password_benar) {
            // Jika password benar, arahkan ke halaman tujuan
            if ($jenisLayananDrive == 1) {
                $link_drive = $data_user['link_bi'];
                $jenis_layanan = "Buku Inventaris";
            } elseif ($jenisLayananDrive == 2) {
                $link_drive = $data_user['link_stock'];
                $jenis_layanan = "Persediaan";
            }
            //$open_new = '<script>
            //                window.open("' . $link_drive . '", "_blank");
            //                window.location.reload();
            //            </script>';
            $open_new = '<div class="modal fade text-left" id="small" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true" data-bs-backdrop="static">';
            $open_new .= '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">';
            $open_new .= '<div class="modal-content bg-white w3-animate-zoom">';
            $open_new .= '<div class="modal-header">';
            $open_new .= '<h4 class="modal-title" id="myModalLabel19">Konfirmasi?</h4>';
            $open_new .= '<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">';
            $open_new .= '<i class="fa fa-fw fa-times"></i>';
            $open_new .= '</button>';
            $open_new .= '</div>';
            $open_new .= '<div class="modal-body">';
            $open_new .= 'Klik tombol <strong><i class="fa fa-fw fa-folder-open"></i> OK</strong> di bawah untuk buka ' . $jenis_layanan;
            $open_new .= '</div>';
            $open_new .= '<div class="modal-footer">';
            $open_new .= '<button id="link_ke" class="btn btn-primary ml-1 btn-sm denyut">';
            $open_new .= '<span class="d-sm-block d-none"><i class="fa fa-fw fa-folder-open"></i> OK</span>';
            $open_new .= '</button>';
            $open_new .= '</div>';
            $open_new .= '</div>';
            $open_new .= '</div>';
            $open_new .= '</div>';
            $open_new .= '<script>
                                document.getElementById("link_ke").addEventListener("click", function() {
                                    window.open("' . $link_drive . '", "_blank");
                                    window.location.reload();
                                })
                            </script>';
            $this->session->set_flashdata('message', $open_new);
            if ($jenisLayananDrive == 1) {
                redirect('user/inventaris');
            } elseif ($jenisLayananDrive == 2) {
                redirect('user/stock');
            }
            // redirect($link_drive);
        } else {
            // Jika password salah, tampilkan pesan kesalahan
            $swal = '<script>
                        window.addEventListener("load", function() {
                            Swal.fire({
                                title: "Password Salah!",
                                text: "Password tidak sesuai.",
                                icon: "error",
                                showConfirmButton: false,
                                timer: 1300,
                            })
                        });
                    </script>';
            $this->session->set_flashdata('message', $swal);
            if ($jenisLayananDrive == 1) {
                redirect('user/inventaris');
            } elseif ($jenisLayananDrive == 2) {
                redirect('user/stock');
            }
        }
    }
    // / Cek Password ke Drive
}
