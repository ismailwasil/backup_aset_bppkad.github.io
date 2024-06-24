<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lasada extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // if (!$this->session->userdata('username')) {
        //     redirect('auth');
        // }
    }
    public function bpu_spg()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $querySewaAset = "SELECT * FROM event_acara JOIN status_sewa
                            ON event_acara.id_status=status_sewa.id_status
                            WHERE id_aset = 1
                            ORDER BY tgl_awal_acara ASC
                        ";
        $data['sewa'] = $this->db->query($querySewaAset)->result_array();

        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/bpu_spg', $data);
        $this->load->view('templates/page_footer');
    }

    public function get_events($id_aset)
    {
        $events = $this->db->get_where('event_acara', ['id_aset' => $id_aset])->result();

        $result = array();
        foreach ($events as $event) {
            $result[] = array(
                'title' => $event->keperluan,
                'start' => $event->tgl_awal_acara,
                'end' => $event->tgl_akhir_acara
            );
        }

        echo json_encode($result);
    }

    public function get_events_BPU_spg()
    {
        $events = $this->db->get_where('event_acara', ['id_aset' => 1])->result();

        $result = array();
        foreach ($events as $event) {
            $result[] = array(
                'title' => $event->keperluan,
                'start' => $event->tgl_awal_acara,
                'end' => $event->tgl_akhir_acara
            );
        }

        echo json_encode($result);
    }

    public function mess_sby()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $querySewaAset = "SELECT * FROM event_acara JOIN status_sewa
                            ON event_acara.id_status=status_sewa.id_status
                            WHERE id_aset = 2
                            ORDER BY tgl_awal_acara ASC
                        ";
        $data['sewa'] = $this->db->query($querySewaAset)->result_array();

        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/mess_sby', $data);
        $this->load->view('templates/page_footer');
    }
    public function get_events_mess_sby()
    {
        $events = $this->db->get_where('event_acara', ['id_aset' => 2])->result();

        $result = array();
        foreach ($events as $event) {
            $result[] = array(
                'title' => $event->keperluan,
                'start' => $event->tgl_awal_acara,
                'end' => $event->tgl_akhir_acara
            );
        }

        echo json_encode($result);
    }
    public function bpu_ktp()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $querySewaAset = "SELECT * FROM event_acara JOIN status_sewa
                            ON event_acara.id_status=status_sewa.id_status
                            WHERE id_aset = 3
                            ORDER BY tgl_awal_acara ASC
                        ";
        $data['sewa'] = $this->db->query($querySewaAset)->result_array();

        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/bpu_ktp', $data);
        $this->load->view('templates/page_footer');
    }
    public function get_events_BPU_ktp()
    {
        $events = $this->db->get_where('event_acara', ['id_aset' => 3])->result();

        $result = array();
        foreach ($events as $event) {
            $result[] = array(
                'title' => $event->keperluan,
                'start' => $event->tgl_awal_acara,
                'end' => $event->tgl_akhir_acara
            );
        }

        echo json_encode($result);
    }
    public function pesanggerahan()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $querySewaAset = "SELECT * FROM event_acara JOIN status_sewa
                            ON event_acara.id_status=status_sewa.id_status
                            WHERE id_aset = 4
                            ORDER BY tgl_awal_acara ASC
                        ";
        $data['sewa'] = $this->db->query($querySewaAset)->result_array();

        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/pesanggerahan', $data);
        $this->load->view('templates/page_footer');
    }
    public function get_events_pesanggerahan_ktp()
    {
        $events = $this->db->get_where('event_acara', ['id_aset' => 4])->result();

        $result = array();
        foreach ($events as $event) {
            $result[] = array(
                'title' => $event->keperluan,
                'start' => $event->tgl_awal_acara,
                'end' => $event->tgl_akhir_acara
            );
        }

        echo json_encode($result);
    }
    public function bus_pemda()
    {
        $data['user'] = $this->db->get_where('data_user', ['username' => $this->session->userdata('username')])->row_array();

        $querySewaAset = "SELECT * FROM event_acara JOIN status_sewa
                            ON event_acara.id_status=status_sewa.id_status
                            WHERE id_aset = 5
                            ORDER BY tgl_awal_acara ASC
                        ";
        $data['sewa'] = $this->db->query($querySewaAset)->result_array();

        $data['title'] = "Aset";
        $this->load->view('templates/page_header', $data);
        $this->load->view('templates/menu/sidebar-menu');
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/pages/lasada/bus_pemda', $data);
        $this->load->view('templates/page_footer');
    }
    public function get_events_bus_pemda()
    {
        $events = $this->db->get_where('event_acara', ['id_aset' => 5])->result();

        $result = array();
        foreach ($events as $event) {
            $result[] = array(
                'title' => $event->keperluan,
                'start' => $event->tgl_awal_acara,
                'end' => $event->tgl_akhir_acara
            );
        }

        echo json_encode($result);
    }

    public function buat_booking()
    {
        $this->load->library('telegram');
        // Generate kode kombinasi unik
        $code = substr(md5(uniqid(mt_rand(), true)), 0, 10);
        $tanggal_sekarang = date('Ymd');
        $kode_byr = $tanggal_sekarang . $code;

        $nama = htmlspecialchars($this->input->post('nama'));
        $no_hp = htmlspecialchars($this->input->post('telepon'));

        $no_hp = preg_replace('/(\W*)/', '', $no_hp); //only digits allowed

        if (substr($no_hp, 0, 1) == 0) {
            $number = "62" . substr($no_hp, 1);
        } elseif (substr($no_hp, 0, 2) == 62) {
            if (substr($no_hp, 0, 3) == 620) {
                $number = "62" . substr($no_hp, 3);
            } else {
                $number = $no_hp;
            }
        }

        $alamat = htmlspecialchars($this->input->post('alamat'));
        $id_aset = htmlspecialchars($this->input->post('aset'));
        $keperluan = htmlspecialchars($this->input->post('acara'));
        $tgl_book = date('Y-m-d');
        $tgl_awal_acara = htmlspecialchars($this->input->post('tanggal-awal')) . ' ' . htmlspecialchars($this->input->post('waktu-awal'));
        $tgl_akhir_acara = htmlspecialchars($this->input->post('tanggal-akhir'))  . ' ' . htmlspecialchars($this->input->post('waktu-akhir'));

        $no_pengenal = htmlspecialchars($this->input->post('no-pengenal'));
        $bukti_byr = '';
        $id_status = 1;
        $tgl_byr = '';
        $total = '';

        // Query Nama aset Sewa
        $QueryNamaAset = $this->db->get_where('aset_sewa', ['id_aset' => $id_aset])->row_array();
        $namaAset = $QueryNamaAset['nm_aset'];

        // cek jika ada gambar diupload
        $bukti_pengenal = $_FILES['bukti-ID']['name'];
        // var_dump($bukti_pengenal);
        // die();
        if ($bukti_pengenal) {
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size'] = '1024000';
            $config['upload_path'] = './assets/doc/LASADA';

            $this->load->library('upload', $config);
            $this->upload->initialize($config); //mengatasi error upload_path

            if ($this->upload->do_upload('bukti-ID')) {
                $dok = $this->upload->data('file_name');
                // echo '$dok';
                // die();
                $queryBooking = "INSERT INTO event_acara (nama, no_hp, alamat, id_aset, keperluan, tgl_book, tgl_awal_acara, tgl_akhir_acara, no_pengenal, bukti_pengenal, kode_byr, bukti_byr, id_status, tgl_byr, total)
                            VALUES ('$nama', '$number', '$alamat', '$id_aset', '$keperluan', '$tgl_book', '$tgl_awal_acara', '$tgl_akhir_acara', '$no_pengenal', '$dok', '$kode_byr', '$bukti_byr', '$id_status','$tgl_byr', '$total')
                        ";
                // Kirim data ke database
                $this->db->query($queryBooking);

                // Kirim data ke Telegram
                $a = substr($tgl_awal_acara, 0, 10);
                $b = substr($tgl_akhir_acara, 0, 10);
                if ($a == $b) {
                    $hariH = $tgl_awal_acara . " - " . htmlspecialchars($this->input->post('waktu-akhir'));
                } else {
                    $hariH = $tgl_awal_acara . " sampai " . $tgl_akhir_acara;
                }
                $botToken = '6004321041:AAEOCiRHrWrjRCGYmprns7-Vc9UBQaC4_kA';
                $chatId = '-856503743';
                $message = "Pengajuan Sewa/Pinjam " . $namaAset . "\n\n";
                $message .= "Nama : " . $nama . "\n";
                $message .= "No. HP : " . $no_hp . "\n";
                $message .= "Alamat : " . $alamat . "\n";
                $message .= "Acara : " . $keperluan . "\n";
                $message .= "Tgl Booking : " . $tgl_book . "\n";
                $message .= "Tgl Acara : " . $hariH . "\n";
                $message .= "No Pengenal : " . $no_pengenal . "\n";
                $buttonText = "Kirim Detail";
                if ($id_aset == 5) {
                    $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . $nama . "%0A%0AAnda%20menyewa%20*" . $namaAset . "*%0AUntuk%20tanggal%20*" . $tgl_awal_acara . "*%0AUntuk%20keperluan%20*" . $keperluan . "*%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
                } else {
                    $buttonURL = "https://api.whatsapp.com/send/?phone=" . $number . "&text=Salam%2C%20" . $nama . "%0A%0AAnda%20menyewa%20*" . $namaAset . "*%0AUntuk%20tanggal%20*" . $tgl_awal_acara . "*%0AUntuk%20keperluan%20*" . $keperluan . "*%0A%0ASilakan%20cek%20tagihan%20pembayaran%20Anda%20dengan%20kode%20pembayaran%20" . $kode_byr . "%0A%0ADan%20lakukan%20pembayaran%20segera.%0A%0ATerima%20Kasih%0A%0A-Admin%20Aset-";
                }

                $this->telegram->sendMessage($message, $buttonText, $buttonURL, $botToken, $chatId);

                // Response
                $swal = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "Data booking berhasil ditambahkan",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swal);

                $id_role = $this->session->userdata('id_role');
                if ($id_role == 1) {
                    redirect('admin/lasada');
                } elseif ($id_role == 4) {
                    redirect('developer/lasada');
                } elseif ($id_role == 2) {
                    redirect('user/lasada');
                } elseif ($id_role == 3) {
                    redirect('umum/lasada');
                }
            } else {
                $pesanError = $this->upload->display_errors();
                $swal = '<script>
                            window.addEventListener("load", function() {
                                Toastify({
                                    text: "' . $pesanError . '",
                                    duration: 3000,
                                    close: true,
                                    gravity: "center",
                                    position: "center",
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            });
                        </script>';
                $this->session->set_flashdata('message', $swal);

                $id_role = $this->session->userdata('id_role');
                if ($id_role == 1) {
                    redirect('admin/lasada');
                } elseif ($id_role == 4) {
                    redirect('developer/lasada');
                } elseif ($id_role == 2) {
                    redirect('user/lasada');
                } elseif ($id_role == 3) {
                    redirect('umum/lasada');
                }
            }
        }
    }

    public function cek_tagihan()
    {
        $hasilInput = htmlspecialchars($this->input->post('kode_bayar'));
        $kode_byr_input = preg_replace("/[^a-zA-Z0-9]/", "", $hasilInput);

        $queryTagihan = "SELECT * FROM aset_sewa JOIN event_acara
                        ON aset_sewa.id_aset=event_acara.id_aset
                        JOIN status_sewa
                        ON event_acara.id_status=status_sewa.id_status
                        WHERE event_acara.kode_byr='$kode_byr_input'
                        ";

        $tagihan = $this->db->query($queryTagihan)->row_array();

        // $tagihan = $this->db->get_where('event_acara', ['kode_byr' => $kode_byr_input])->row_array();

        if ($tagihan) {
            if ($tagihan['id_status'] == 3) {
                // $swal = '<script>
                //             window.addEventListener("load", function() {
                //                     Swal.fire({
                //                     title: "Success",
                //                     text: "Data dengan kode bayar ' . $kode_byr_input . ' sudah lunas",
                //                     icon: "success",
                //                     showConfirmButton: true,
                //                 })
                //             });
                //         </script>';
                $swal = '<script  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
                $swal .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>';
                $swal .= '<script>';
                $swal .= 'function tampilkanModal(){';
                $swal .= 'document.getElementById("nama_penyewa").innerHTML ="';
                $swal .= $tagihan['nama'];
                $swal .= '";';
                $swal .= 'document.getElementById("aset_sewa").innerHTML ="';
                $swal .= $tagihan['nm_aset'];
                $swal .= '";';
                $swal .= 'document.getElementById("tgl_book").innerHTML ="';
                $swal .= $tagihan['tgl_book'];
                $swal .= '";';
                $swal .= '$("#info_pemesanan").modal("show");';
                $swal .= '}</script>';
                $swal .= '<script>
                $(document).ready(function() {
                    tampilkanModal();
                });
                </script>';
                $this->session->set_flashdata('message', $swal);
            } else {

                $swal = '<script>
                window.addEventListener("load", function() {
                    var inputKdByr = document.getElementById(\'kode_bayar_input\');
                    const input_bayar = document.querySelector(\'#input-bayar\');
                    
                    inputKdByr.value="' . $kode_byr_input . '";
                    input_bayar.classList.toggle(\'d-none\');
                    window.location.hash = "input-bayar";
                });
                </script>';

                $this->session->set_flashdata('message', $swal);
            }
        } else {
            $swal = '<script>
            window.addEventListener("load", function() {
                Swal.fire({
                title: "Gagal!",
                text: "Data dengan kode bayar ' . $kode_byr_input . ' tidak ditemukan",
                icon: "error",
                showConfirmButton: true,
                allowHtml: true
            })
            });
            </script>';
            $this->session->set_flashdata('message', $swal);
        }
        $id_role = $this->session->userdata('id_role');

        if ($id_role == 1) {
            redirect('admin/lasada');
        } elseif ($id_role == 4) {
            redirect('developer/lasada');
        } elseif ($id_role == 2) {
            redirect('user/lasada');
        } elseif ($id_role == 3) {
            redirect('umum/lasada');
        }
    }
}
