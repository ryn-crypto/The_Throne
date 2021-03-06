<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

	public function index()
	{
        $data['title'] = 'Profile';
        $email = ['email' =>  $this->session->userdata('email')];
        $this->load->model('registrasi');
        $this->load->model('menu');

        $data['user'] = $this->registrasi->ambil_data($email, 'user');
        $data['role'] = $this->registrasi->join_data($email);
        $data['menu'] = $this->menu->index($data['role']['role_id']);
        $data['sub_menu'] = $this->menu->sub_menu();
        
        $this->load->view('templates2/header', $data);
        $this->load->view('templates2/sidebar', $data);
        $this->load->view('templates2/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates2/footer');
    }


    public function edit()
	{
        $data['title'] = 'Edit Profile';
        $email = ['email' =>  $this->session->userdata('email')];
        $this->load->model('registrasi');
        $this->load->model('menu');

        $data['user'] = $this->registrasi->ambil_data($email, 'user');
        $data['role'] = $this->registrasi->join_data($email);
        $data['menu'] = $this->menu->index($data['role']['role_id']);
        $data['sub_menu'] = $this->menu->sub_menu();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',
        [
			'required' => 'Nama harus diisi!'
		]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
        [
			'required' => 'Alamat harus diisi!'
		]);
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim',
        [
			'required' => 'Nomor hp harus diisi!'
		]);


        if($this->form_validation->run() == false) {
            $this->load->view('templates2/header', $data);
            $this->load->view('templates2/sidebar', $data);
            $this->load->view('templates2/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates2/footer');

        } else {
            $update['nama'] = $this->input->post('nama');
            $update['email'] = $this->input->post('email');
            $update['tempat_tinggal'] = $this->input->post('alamat');
            $update['no_hp'] = $this->input->post('no_hp');
            $update['tentang'] = $this->input->post('catatan');

            // cek gambar yang akan di upload
            $upload_image = $_FILES['gambar']['name'];
            
            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/images/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {

                    $gambar_lama = $data['user']['gambar'];
                    if ($gambar_lama != 'default.png') {
                        unlink(FCPATH . 'assets/images/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $update['gambar'] = $gambar_baru;
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->load->model('profil');
            $this->profil->index($update);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-dark" role="alert">Profil sudah di update</div>');
			redirect('user/edit');
        }
    }

    public function ubahpassword()
	{
        $data['title'] = 'Ubah Password';
        $email = ['email' =>  $this->session->userdata('email')];
        $this->load->model('registrasi');
        $this->load->model('menu');
        $this->load->model('profil');

        $data['user'] = $this->registrasi->ambil_data($email, 'user');
        $data['role'] = $this->registrasi->join_data($email);
        $data['menu'] = $this->menu->index($data['role']['role_id']);
        $data['sub_menu'] = $this->menu->sub_menu();


        $this->form_validation->set_rules('passwordawal', 'Password Awal', 'required|trim', 
        [
			'required' => 'Password harus diisi!'
		]);
        $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required|trim|min_length[3]|matches[konfirmasi]', 
        [
			'required' => 'Password harus diisi!',
            'min_length' => 'password kurang dari 3 karakter!',
            'matches' => 'password harus sama dengan konfirmasi'
		]);
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[passwordbaru]', 
        [
			'required' => 'Password harus diisi!',
            'min_length' => 'password kurang dari 3 karakter!',
            'matches' => 'password harus sama dengan password baru'
		]);


        if ( !$this->form_validation->run()) {
            $this->load->view('templates2/header', $data);
            $this->load->view('templates2/sidebar', $data);
            $this->load->view('templates2/topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('templates2/footer');
        } else {
            $password_awal = $this->input->post('passwordawal');
            $password_baru = $this->input->post('passwordbaru');

            if (!password_verify($password_awal, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-dark" role="alert">Password Salah!</div>');
			    redirect('user/ubahpassword');
            } else {
                if($password_awal == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-dark" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
			        redirect('user/ubahpassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $password_update['password'] = $password_hash;

                    $this->profil->ubahpassword($email, $password_update);

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-dark" role="alert">Password sudah diganti!</div>');
			        redirect('user/ubahpassword');
                }
            }
        }
    }

    public function pekerjaan()
	{
        $data['title'] = 'Daftar Pekerjaan';

        $email = ['email' =>  $this->session->userdata('email')];
        $this->load->model('registrasi');
        $this->load->model('menu');

        $data['user'] = $this->registrasi->ambil_data($email, 'user');
        $data['role'] = $this->registrasi->join_data($email);
        $data['menu'] = $this->menu->index($data['role']['role_id']);
        $data['sub_menu'] = $this->menu->sub_menu();

        // ambil data dari database
        $this->load->model('raid');
        $data['pesanan'] = $this->raid->pesanan();

		$this->load->view('templates2/header', $data);
        $this->load->view('templates2/sidebar', $data);
        $this->load->view('templates2/topbar', $data);
        $this->load->view('user/pekerjaan', $data);
        $this->load->view('templates2/footer');
	}

    public function take()
	{
        // data session
        $email = ['email' =>  $this->session->userdata('email')];
        $this->load->model('registrasi');
        $data['user'] = $this->registrasi->ambil_data($email, 'user');

        if (!$this->uri->segment(3)) {
            redirect('user/pekerjaan');
        } else {
            $uri    = $this->uri->segment(3);

            $cek = [
                'id_horseman' => $data['user']['id'],
                'status'    => 3
            ];

            // ambil data
            $this->load->model('raid');
            $pesanan = $this->raid->cek($cek);

            // cek data
            if (!$pesanan) {
                $update  = [
                    'id_horseman'   => $data['user']['id'],
                    'status'        => 3 
                ];
    
                $this->load->model('raid');
                $this->raid->rider($update, $uri);

                $this->session->set_flashdata('message', '<div class="alert alert-success mb-2" role="alert">Selesaikan pesanan sebelum waktu habis !!</div>');
                redirect('user/raid');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning mb-2" role="alert">Kamu masih memiliki tugas raid yang belum selesai ! selesaikan raidmu untuk mengambil tugas baru !!</div>');
                redirect('user/pekerjaan');
            }
        }   

    }

    public function raid()
    {

        // data menu
        $data['title'] = 'Sedang Raid';
    
        $email = ['email' =>  $this->session->userdata('email')];
        $this->load->model('registrasi');
        $this->load->model('menu');
    
        $data['user'] = $this->registrasi->ambil_data($email, 'user');
        $data['role'] = $this->registrasi->join_data($email);
        $data['menu'] = $this->menu->index($data['role']['role_id']);
        $data['sub_menu'] = $this->menu->sub_menu();

        // menyiapkan data 

        $game  = [
            'id_horseman'   => $data['user']['id'],
            'status'        => 3 
        ];
        $this->load->model('raid');
        $data['game'] = $this->raid->live($game)['0'];

        // view -----

        $this->load->view('templates2/header', $data);
        $this->load->view('templates2/sidebar', $data);
        $this->load->view('templates2/topbar', $data);
        $this->load->view('user/raid', $data);
        $this->load->view('templates2/footer');
    }
}