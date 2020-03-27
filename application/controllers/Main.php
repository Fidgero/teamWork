<?php

defined('BASEPATH') OR exit('No direc script access allowed');
class Main extends MY_Controller{

	public function __constract(){
		parent::__constract();
	}

	public function index(){
		$this->data['title'] = "Главная страница";

		$this->load->model('Films_model');
		$this->data['movies'] = $this->Films_model->getFilms(False, 8, 1);
		$this->data['serials'] = $this->Films_model->getFilms(False, 8, 2);

		$this->load->model('Posts_model');
		$this->data['posts'] = $this->Posts_model->getPosts(False);

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/index', $this->data);
		$this->load->view('templates/footer');
	}

	public function rating(){

		$this->data['title'] = "Рейтинг фильмов";

		$this->load->library('pagination');
		$offset = (int) $this->uri->segment(2);
		$row_count = 5;
		$count = count($this->Films_model->getMoviesOnPageByRating(0, 0));
		$p_config['base_url'] = '/rating/';
		$this->data['movie'] = $this->Films_model->getMoviesOnPageByRating($row_count, $offset);

		//pagination config
		$p_config['total_rows'] = $count;
		$p_config['per_page'] = $row_count;

		//pagination bootstrap
		$p_config['full_tag_open'] = "<ul class='pagination'>";
		$p_config['full_tag_close'] = "</ul>";
		$p_config['num_tag_open'] = "<li>";
		$p_config['num_tag_close'] = "</li>";
		$p_config['cur_tag_open'] = "<li class='disables'><li class='active'><a href='#'>";
		$p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$p_config['next_tag_open'] = "<li>";
		$p_config['next_tag_close'] = "</li>";
		$p_config['prev_tag_open'] = "<li>";
		$p_config['prev_tag_close'] = "</li>";
		$p_config['first_tag_open'] = "<li>";
		$p_config['first_tag_close'] = "</li>";
		$p_config['last_tag_open'] = "<li>";
		$p_config['last_tag_close'] = "</li>";

		//init pagination
		$this->pagination->initialize($p_config);
		$this->data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/rating', $this->data);
		$this->load->view('templates/footer');
	}

	public function contact(){

		$this->data['title'] = "Контакты";

		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('email');

		//set validation rules
		$this->form_validation->set_rules('name', 'Ваще имя', 'trim|required');
		$this->form_validation->set_rules('email', 'Ваш email', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'тема', 'trim|required');
		$this->form_validation->set_rules('message', 'Ваш отзыв', 'trim|required');

		//rum validation on from input
		if ($this->form_validation-.run() == FALSE){
			//validation fails
			$this->load->view('templates/header', $this->data);
			$this->load->view('main/contact', $this->data);
			$this->load->view('templates/footer');
		} else {
			//get the form data
			$name = $this->input->post('name');
			$from_email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			//set to_email id to which you want to receive mails
			$to_email = 'info@wh-db.com';

			//send mail
			$this->email->from($from_email, $name);
			$this->email->to($to_email);
			$this->email->subject($subject);
			$this->email->message($message);
			if($this->email->send()){
				//mail sent
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Ваше сообщение успешно отправлено!</div>');
				redirect('/contact');
			} else {
				//error
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Произошла ошибка, повторите попытку поже.</div>');
				redirect('/contact');
			}
		}
	}
}