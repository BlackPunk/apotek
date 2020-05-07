<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('M_user');
        $this->load->model('M_obat');
        $this->load->model('M_suplier');
        $this->load->model('M_transaksi');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        if ($this->M_user->getuser($user, $pass)) {
            $this->session->set_userdata('username', $user);
            redirect('main/dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert">Username atau Password salah!</div>');
            redirect('main', 'refresh');
        }
    }

    public function dashboard()
    {
        $this->load->view('part/header');
        $this->load->view('dashboard');
        $this->load->view('part/footer');
    }

    public function dataobat()
    {
        $data['obat'] = $this->M_obat->getObat();
        $this->load->view('part/header');
        $this->load->view('dataobat', $data);
        $this->load->view('part/footer');
    }

    public function tambahobat()
    {
        $this->form_validation->set_rules('suplier', 'Suplier', 'trim|required');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
        $this->form_validation->set_rules('produsen', 'Produsen', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('qty', 'Jumlah Stok', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['suplier'] = $this->M_suplier->getSuplier();
            $this->load->view('part/header');
            $this->load->view('tambahobat', $data);
            $this->load->view('part/footer');
        } else { {
                $data = [
                    'nama' => $this->input->post('nama_obat'),
                    'id_suplier' => $this->input->post('suplier'),
                    'produsen' => $this->input->post('produsen'),
                    'harga' => $this->input->post('harga'),
                    'qty' => $this->input->post('qty')
                ];
                if ($this->M_obat->tambah($data)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Obat berhasil di tambahkan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                    redirect('main/dataobat');
                } else {
                    echo 'query gagal';
                }
            }
        }
    }

    public function editobat($id)
    {
        $this->form_validation->set_rules('suplier', 'Suplier', 'trim|required');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
        $this->form_validation->set_rules('produsen', 'Produsen', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('qty', 'Jumlah Stok', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['suplier'] = $this->M_suplier->getSuplier();
            $data['obat'] = $this->M_obat->getObatId($id);

            $this->load->view('part/header');
            $this->load->view('editobat', $data);
            $this->load->view('part/footer');
        } else { {
                $data = [
                    'kode_obat_obat' => $this->input->post('id'),
                    'nama' => $this->input->post('nama_obat'),
                    'id_suplier' => $this->input->post('suplier'),
                    'produsen' => $this->input->post('produsen'),
                    'harga' => $this->input->post('harga'),
                    'qty' => $this->input->post('qty')
                ];
                if ($this->M_obat->update($data)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Obat berhasil di update.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                    redirect('main/dataobat');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                Tidak ada data yang berubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                    redirect('main/editobat/' . $id, 'refresh');
                }
            }
        }
    }

    public function hapusobat($id)
    {
        if ($this->M_obat->hapus($id)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Obat berhasil di hapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('main/dataobat', 'refresh');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Hapus gagal
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('main/dataobat', 'refresh');
        }
    }

    public function datasuplier()
    {
        $data['suplier'] = $this->M_suplier->getSuplier();

        $this->load->view('part/header');
        $this->load->view('datasuplier', $data);
        $this->load->view('part/footer');
    }

    public function tambahsuplier()
    {
        $this->form_validation->set_rules('name', 'Nama Suplier', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
        $this->form_validation->set_rules('nohp', 'Telepon', 'trim|required|min_length[9]|max_length[20]|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('part/header');
            $this->load->view('tambahsuplier');
            $this->load->view('part/footer');
        } else {
            $data = [
                'nama' => $this->input->post('name'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'nohp' => $this->input->post('nohp')
            ];
            if ($this->M_suplier->tambah($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Suplier berhasil di tambahkan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('main/datasuplier');
            } else {
                echo 'query gagal';
            }
        }
    }

    public function editsuplier($id)
    {
        $this->form_validation->set_rules('name', 'Nama Suplier', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
        $this->form_validation->set_rules('nohp', 'Telepon', 'trim|required|min_length[9]|max_length[20]|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['sup'] = $this->M_suplier->getSuplierId($id);
            $this->load->view('part/header');
            $this->load->view('editsuplier', $data);
            $this->load->view('part/footer');
        } else {
            $data = [
                'id_suplier' => $this->input->post('id'),
                'nama' => $this->input->post('name'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'nohp' => $this->input->post('nohp')
            ];
            if ($this->M_suplier->update($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Suplier berhasil di update.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('main/datasuplier');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                Tidak ada data yang berubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('main/editsuplier/' . $id, 'refresh');
            }
        }
    }

    public function hapussuplier($id)
    {
        if ($this->M_suplier->hapus($id)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Suplier berhasil di hapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('main/datasuplier', 'refresh');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Hapus gagal
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('main/datasuplier', 'refresh');
        }
    }

    public function dataadmin()
    {
        $data['user'] = $this->M_user->getusers();

        $this->load->view('part/header');
        $this->load->view('dataadmin', $data);
        $this->load->view('part/footer');
    }
    public function tambahAdmin()
    {
        $this->form_validation->set_rules('name', 'Nama Admin', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('part/header');
            $this->load->view('tambahAdmin');
            $this->load->view('part/footer');
        } else {
            $data = [
                'nama' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            ];
            if ($this->M_user->tambah($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Admin berhasil di tambahkan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('main/dataadmin');
            } else {
                echo 'query gagal';
            }
        }
    }

    public function editAdmin($id)
    {
        $this->form_validation->set_rules('name', 'Nama Admin', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['admin'] = $this->M_user->getUserId($id);
            $this->load->view('part/header');
            $this->load->view('editadmin', $data);
            $this->load->view('part/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            ];
            if ($this->M_user->update($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Admin berhasil di update.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('main/dataadmin');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                Tidak ada data yang berubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('main/editadmin/' . $id, 'refresh');
            }
        }
    }

    public function hapusadmin($id)
    {
        if ($this->M_user->hapus($id)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Admin berhasil di hapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('main/dataadmin', 'refresh');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Hapus gagal
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('main/dataadmin', 'refresh');
        }
    }

    public function datatransaksi()
    {
        $data['tr'] = $this->M_transaksi->getTransaksi();

        $i = 0;
        foreach ($data['tr'] as $d) {
            $obat = json_decode($d['obat']);
            $j = 0;
            $harga[] = [];
            foreach ($obat as $o) {
                $obat = $this->M_obat->getObatId($o);
                $qty = json_decode($d['jumlah_obat'])[$j];
                $harga[$j] = $obat['harga'] * $qty;
                $j++;
            }
            $data['total'][$i] = array_sum($harga);
            $i++;
        }
        $this->load->view('part/header');
        $this->load->view('datatransaksi', $data);
        $this->load->view('part/footer');
    }

    public function tambahtransaksi()
    {
        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['obat'] = $this->M_obat->getObat();
            $this->load->view('part/header');
            $this->load->view('tambahtransaksi', $data);
            $this->load->view('part/footer');
        } else {
            $data = [
                'tgl' => date('d-m-Y'),
                'nama_pembeli' => $this->input->post('nama_pembeli'),
                'obat' => json_encode($this->input->post('obat[]')),
                'jumlah_obat' => json_encode($this->input->post('jml_obat[]'))
            ];
            $jum_obat = json_decode($data['jumlah_obat']);
            $i = 0;
            foreach (json_decode($data['obat']) as $d) {
                $obat = $this->M_obat->getObatId($d);
                if ($obat['qty'] < $jum_obat[$i]) {
                    $error[$i] = 'Stok Obat ' . $obat['nama'] . ' tidak cukup';
                } else {
                    $this->M_obat->updateqty($d, $obat['qty'] - $jum_obat[$i]);
                }
            }
            if (!$error) {
                foreach (json_decode($data['obat']) as $d) {
                    $obat = $this->M_obat->getObatId($d);
                    $this->M_obat->updateqty($d, $obat['qty'] - $jum_obat[$i]);
                }
            } else {
                $this->session->set_flashdata('error', $error);

                redirect('main/tambahtransaksi', 'refresh');
            }

            if ($this->M_transaksi->tambah($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show col-3 mt-5 text-center" role="alert">
                Data Transaksi berhasil di tambahkan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                // die("berhasil");
                redirect('main/datatransaksi');
            } else {
                echo 'query gagal';
            }
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('main', 'refresh');
    }
}
