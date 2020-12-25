<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}

	public function index()
	{
		//load session library
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if ($this->session->userdata('user')) {
			redirect('home');
		} else {
			$this->load->view('login_page');
		}
	}

	public function login()
	{
		//load session library
		$this->load->library('session');

		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = $this->users_model->login($email, $password);

		if ($data) {
			$this->session->set_userdata('user', $data);
			redirect('home');
		} else {
			header('location:' . base_url() . $this->index());
			$this->session->set_flashdata('error', 'Invalid login. User not found');
		}
	}

	public function home()
	{
		//load session library
		$this->load->library('session');

		//restrict users to go to home if not logged in
		if ($this->session->userdata('user')) {
			$this->load->view('home');
		} else {
			redirect('/');
		}
	}

	public function logout()
	{
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}


	public function signup()
	{
		//load session library
		$this->load->library('session');

		if ($this->session->userdata('user')) {

			redirect('home');
		} else {
			$this->load->view('signup');
		}
		//load session library

	}


	public function registration()
	{
		$data = array(
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$this->users_model->save_user($data);
		$this->load->view('success');
	}

	public function cod()
	{
		//load session library
		$this->load->library('session');

		//restrict users to go to home if not logged in
		if ($this->session->userdata('user')) {
			$this->load->view('cod');
		} else {
			redirect('/');
		}
	}

	public function cod_data()
	{
		$userid = $this->input->post('userid');
		$data = [
            'tracking_no' => $this->input->post('tracking_no'),
			'status' => "Shipped",
        ];
        $this->db->where('id', $userid);
		$this->db->update('users', $data);
		echo '<script>
		alert("COD has successfully been updated");
		window.location.href="http://localhost/login/index.php/home";
		</script>';
		
	}

	public function api()
	{
		//load session library
		$this->load->library('session');

		//restrict users to go to home if not logged in
		if ($this->session->userdata('user')) {
			$this->load->view('api');
		} else {
			redirect('/');
		}
	}


	public function get_weather()
	{
		//load session library
		$this->load->library('session');

		$get = json_decode(file_get_contents('http://ip-api.com/json/'), true);


		date_default_timezone_set($get['timezone']);
		$city = $_GET['city'];
		$string = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&appid=27c9193ebc037c4ee9acd2c3c1d2816f";
		$data_fetch = json_decode(file_get_contents($string), true);

		$temp = $data_fetch['main']['temp'];

		$icon = $data_fetch['weather'][0]['icon'];

		$visibility = $data_fetch['visibility'];
		$visibilitykm = $visibility / 1000;
		$country =  "<h1 class='w3-xxxlarge w3-animate-zoom'><b>" . $data_fetch['name'] . "," . $data_fetch['sys']['country'] . "</h1></b>";

		$logo = "<center><img src='http://openweathermap.org/img/w/" . $icon . ".png'></center>";
		$desc = "<b><p>" . $data_fetch['weather'][0]['description'] . "</p></b>";

		$temperature =  "<b>Temp:" . $temp . "°C</b><br>";
		$clouds = "<b>Clouds:" . $data_fetch['clouds']['all'] . "%</b><br>";
		$humidity = "<b>Humidity:" . $data_fetch['main']['humidity'] . "%</b><br>";
		$windspeed = "<b>Wind Speed:" . $data_fetch['wind']['speed'] . "m/s</b><br>";
		$pressure = "<b>Pressure:" . $data_fetch['main']['pressure'] . "hpa</b><br>";
		$visibility =  "<b>Visibility:" . $visibilitykm . "Km</b><br>";
		$sunrise = "<b>Sunrise:" . date('h:i A', $data_fetch['sys']['sunrise']) . "</b><br>";
		$sunset = "<b>Sunset:" . date('h:i A', $data_fetch['sys']['sunset']) . "</b>";

		
		$data['response'] = array(
			'temperature' => "$temperature",
			'city' => "$city",
			'temp' => "$temp",
		);
		$this->load->view('api',$data);

	}
}
