<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
	public function login()
	{
		$data['title'] = 'Login Pages';
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('src/header', $data);
			$this->load->view('auth/login');
			$this->load->view('src/footer');
		} else {
			$this->auth();
		}
	}

	private function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		// jika user data 
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username']
				];
				$this->session->set_userdata($data);
				$id = $this->m_general->gDataW('user', array('username' => $username))->row();
				$this->session->set_userdata('id_user', $id->id_user);
				$this->session->set_userdata('level', $id->level);
				redirect(base_url());
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password </div>');
				redirect('account/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username not registered </div>');
			redirect('account/login');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('nama', 'Name', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[5]|matches[password2]',
			[
				'matches' => 'password do not match',
				'min_length' => 'password to short'
			]
		);
		$this->form_validation->set_rules(
			'password2',
			'Password',
			'required|trim|matches[password1]'
		);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Registration pages';
			$this->load->view('src/header', $data);
			$this->load->view('auth/register');
			$this->load->view('src/footer');
		} else {
			// untuk menampilkan jika login sudah benar
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash(
					$this->input->post('password1'),
					PASSWORD_DEFAULT
				),
				'level' => 2,
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat account anda telah berhasil terdaftar. Silahkan Login!</div>');
			redirect('account/login');
		}
	}

	public function changePassword()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('password1', 'New Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration pages';
			$this->load->view('src/header', $data);
			$this->load->view('auth/change_password');
			$this->load->view('src/footer');
		} else {
			$current_pass = $this->input->post('current_password');
			$new_pass = $this->input->post('password1');
			if (!password_verify($current_pass, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
				redirect('account/changepassword');
			} else {
				if ($current_pass == $new_pass) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The new password cannot be the same as the current password</div>');
					redirect('account/changepassword');
				} else {
					$pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);

					$this->db->set('password', $pass_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Change</div>');
					redirect('account/changepassword');
				}
			}
		}
	}

	public function profile()
	{
		$id_user = $this->session->userdata('id_user');
		if (!empty($this->input->post())) {
			$update = $this->input->post();

			$up = $this->m_general->uData('user', $update, array('id_user' => $id_user));
			if ($up) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil diupdate</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan</div>');
			}
		}
		$data['detail'] = $this->m_general->gDataW('user', array('id_user' => $id_user))->row();
		$data['title'] = 'Update Profile';
		$this->load->view('src/header', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('src/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('level');
		redirect('account/login');
	}
}
