<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('home/mainpage');
		$this->load->view('templates/footer');
	}
	
	public function daftargame()
	{
		$this->load->model('customer');
		$game['daftar_game'] = $this->customer->index();

		$this->load->view('templates/header2');
		$this->load->view('home/daftargame', $game);
		$this->load->view('templates/footer2');
	}


	public function form()
	{

		if (!$this->uri->segment(3)) 
		{
			redirect('home/daftargame');
		} 
		else 
		{
			// siapkan data
			$game['id'] = $this->uri->segment(3);
			$this->load->model('customer');
			$game['dipilih'] = $this->customer->gamedipilih($game['id']);

			if(!$game['dipilih']) {
				redirect('home/daftargame');
			} else {

				// form validation
				$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', 
				[
					'required' => 'email harus diisi!',
					'valid_email' => 'email tidak valid!'
				]);
				
				$this->form_validation->set_rules('idgame', 'Id Game', 'required|trim', 
				[
					'required' => 'Id Game harus diisi!'
				]);
				
				$this->form_validation->set_rules('idserver', 'Id Server', 'required|trim', 
				[
					'required' => 'Id server harus diisi!'
				]);


				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('templates/header2');
					$this->load->view('home/form', $game);
					$this->load->view('templates/footer2');
				} 
				else 
				{
					// load library
					$this->load->helper('string');
					$this->load->model('customer');
					
					// ambil data dari post
					$game['select'] = $this->input->post();
					
					$que = [
						'game_id' => $game['id'],
						'tier' => $game['select']['tier']
					];
					
					// ambil data dengan library
					$nomor = random_string('alnum', 11);
					$kdbayar = random_string('alpha', 8);
					$select = $this->customer->select($que);

					$total = ($select[0]['harga'])*($game['select']['bintang']);

					$submit = [
						'id_harga' 		=> $select[0]['id'],
						'no_pesanan' 	=> $nomor,
						'pemesan' 		=> $game['select']['email'],
						'id_game' 		=> $game['select']['idgame'],
						'id_server' 	=> $game['select']['idserver'],
						'qty'			=> $game['select']['bintang'],
						'kode_bayar' 	=> $kdbayar,
						'waktu_order'	=> time(),
						'total' 		=> $total,
						'id_horseman' 	=> '0',
						'status' 		=> '1'
					];

					// insert into database with model
					$this->customer->insert($submit);
					$this->session->set_userdata('game', $submit);
					$this->session->set_userdata('dipilih', $select[0]);
					$this->session->set_userdata('post', $game['select']);

					redirect('home/faktur');
				}
			}
		}
	
	}

	public function faktur()
	{

		$game['faktur'] = $this->session->userdata('game');
		$game['select'] = $this->session->userdata('dipilih');
		$game['post'] = $this->session->userdata('post');

		$this->load->view('templates/header3');
		$this->load->view('home/faktur', $game);
		$this->load->view('templates/footer2');

	}

	public function print()
	{

		$game['faktur'] = $this->session->userdata('game');
		$game['select'] = $this->session->userdata('dipilih');
		$game['post'] = $this->session->userdata('post');

		$this->load->view('home/fakturPrint', $game);

	}

	public function process()
	{

		if (!$this->session->userdata('game')) {
			redirect('home');
		} else {
			$this->load->view('home/process');
		}

	}
	
}
