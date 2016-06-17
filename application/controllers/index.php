<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        if($this->session->userdata('admin')){
            $data['main_content'] = 'page_admin/db.php';
            $this->load->view('include/template_admin', $data);
        } else {
            $this->load->model('film_model');
            $data['list'] = $this->film_model->getLatest();
            $data['main_content'] = 'page/home.php';
            $this->load->view('include/template', $data);
        }
    }
    
    function home(){
        $this->load->model('film_model');
        $data['list'] = $this->film_model->getLatest();
        $data['main_content'] = 'page/home.php';
        $this->load->view('include/template', $data);
    }
    
    function repertoar(){
        $this->load->model('projection_model');
        $data['list'] = $this->projection_model->getRepertoars();
        $data['main_content'] = 'page/repertoar.php';
        $this->load->view('include/template', $data);
    }
    
    function filmovi(){
        $this->load->model('film_model');
        $data['list'] = $this->film_model->getAll();
        $data['main_content'] = 'page/filmovi.php';
        $this->load->view('include/template', $data);
    }
    
    function film($idFilm){
        $this->load->model('film_model');
        $this->load->model('projection_model');
        $data['main_content'] = 'page/film.php';
        $data['film'] = $this->film_model->getFilm($idFilm);
        $data['projekcije'] = $this->projection_model->getProjections($idFilm);
        $data['koment'] = $this->film_model->getComments($idFilm);
        $this->load->view('include/template', $data);
    }
    
    function filmNaziv() {
        $this->load->model('film_model');
        $data['list'] = $this->film_model->getAllNaziv();
        $data['main_content'] = 'page/filmovi.php';
        $this->load->view('include/template', $data);
        
    }
        
    function mesta($idPro){
        $this->load->model('projection_model');
        $this->load->model('reservation_model');
        $this->session->set_userdata('last_projekcija', $idPro);
        $data['info'] = $this->projection_model->getProjection($idPro);
        $data['zauzeto'] = $this->reservation_model->getReservedMesta($idPro);
        $data['main_content'] = 'page/mesta.php';
        $this->load->view('include/template', $data);
    }
    
    function rezervisi($idPro){
        $this->load->model('reservation_model');
        $idRez = $this->reservation_model->newReservedMesta($idPro);
        if($idRez == 0){
            $p = $this->session->userdata('last_projekcija');
            $this->session->set_userdata('greska_poruka', "Neka mesta koja ste probali da rezervisete su vec zauzeta, pokusaj ponovo");
            $this->session->set_userdata('greska', TRUE);
            $this->mesta($p);
        } else {
            $this->reservation_model->requestConformation($idRez);
            $this->potvrdi();
        }
    }
    
    function potvrdi(){
        $data['main_content'] = 'page/potvrda.php';
        $this->load->view('include/template', $data);
    }
    
    function register(){
        $data['main_content'] = 'page/register.php';
        $this->load->view('include/template', $data);
    }
    
    function nalog() {
        if($this->session->userdata('logged_in') == FALSE) {
            $this->register();
        } else {
            $data['main_content'] = 'page/nalog.php';
            $this->load->view('include/template', $data);
        }
    }
       
    function nalog_edit(){
        $data['main_content'] = 'page/nalog_edit.php';
        $this->load->view('include/template', $data);
    }
    
    function logoff(){
        $this->load->model('user_model');
        $this->user_model->invalidate_user();
        $this->home();
    }
        
    function login(){
        if($_SERVER['REQUEST_METHOD'] != 'POST') echo "greska nije post";
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        if($this->form_validation->run() == TRUE) {
            $this->load->model('user_model');
            $result = $this->user_model->validate_user();
            if($result) {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('admin', FALSE);
                $this->home();
            } else {
                echo "GRESKA PRILIKOM LOGIN";
                $this->home();
            }
        } else {
            echo "LOSE UNETI PODACI";
            $this->home();
        }
    }
    
    function admin_login(){
        if($_SERVER['REQUEST_METHOD'] != 'POST') echo "greska nije post";
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        if($this->form_validation->run() == TRUE) {
            $this->load->model('admin_model');
            $result = $this->admin_model->validate_admin();
            if($result) {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('admin', TRUE);
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            } else {
                echo "GRESKA PRILIKOM LOGIN";
                $this->home();
            }
        } else {
            echo "LOSE UNETI PODACI";
            $this->home();
        }
    }
    
    function create_user(){
        if($_SERVER['REQUEST_METHOD'] != 'POST') echo "greska nije post";
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirm', 'Password Confirmation', 'trim|required|matches[password]');
        
        if($this->form_validation->run() == FALSE) {
            $this->register();
        } else {
            $this->load->model('user_model');
            if($this->user_model->create_user()) {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('admin', FALSE);
                $this->home();
            }
        }
    }
   
    function update_user(){
        if($_SERVER['REQUEST_METHOD'] != 'POST') echo "greska nije post";
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|min_length[4]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirm', 'Password Confirmation', 'trim|matches[newpassword]');
        if($this->form_validation->run() == FALSE) {
            $this->nalog_edit();
        } else {
            $this->load->model('user_model');
            if($this->user_model->update_user()) {
                $this->nalog();
            }
        }
    }
    
    //--------------------------------------------------------------------------
    function ajaxCheckUsername(){
        $this->load->model('user_model');
        if($this->user_model->check_unique()){
            echo "green";
        } else {
            echo "red";
        }
    }
    
    function ajaxComment(){
        $this->load->model('film_model');
        $idFilm = $this->input->post('film');
        $newcomment = $this->film_model->ajaxComment($idFilm);
        echo $newcomment;
    }
    
    function ajaxDeleteComment($idFilm, $idKom){
        $this->load->model('film_model');
        $this->film_model->ajaxDeleteComment($idKom);
        echo "uspesno obrisano";
    }
    
    function ajaxRate($idFilm){
        $this->load->model('film_model');
        $ukupno_ocena = $this->film_model->ajaxRate($idFilm);
        echo $ukupno_ocena;
    }
    
    function ajaxSearchHint(){
        $this->load->model('film_model');
        $hint = $this->film_model->ajaxHint();
        echo $hint;
    }
   
}

