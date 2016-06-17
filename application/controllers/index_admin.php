<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_admin extends CI_Controller {
    
    function db(){
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
        
    function select_table(){
        $this->load->model('admin_model');
        $data['option'] = $this->input->post('option');
        $data['column'] = $this->admin_model->getAjaxColumns();
        $data['row'] = $this->admin_model->getAjaxRows();
        $path = $this->admin_model->getTable();
        $this->load->view($path, $data);
    }
    
    function edit_row($tabela){
        $this->load->model('admin_model');
        switch($tabela) {
            case 'komentar':{
                $this->admin_model->updateKomentar();
            }
            break;
            case 'film':{
                $this->admin_model->updateFilm();
            }
            break;
            case 'korisnik':{
                $this->admin_model->updateKorisnik();
            }
            break;
            case 'ocena':{
                $this->admin_model->updateOcena();
            }
            break;
            case 'projekcija':{
                $this->admin_model->updateProjekcija();
            }
            break;
            case 'rezervacija':{
                $this->admin_model->updateRezervacija();
            }
            break;
            case 'rezervisanomesto':{
                $this->admin_model->updateRezervisanoMesto();
            }
            break;
            case 'sala':{
                $this->admin_model->updateSala();
            }
        }
    }
    
    function delete_row($tabela) {
        $this->load->model('admin_model');
        switch($tabela) {
            case 'moderator':{
                $this->admin_model->deleteModerator();
            }
            break;
            case 'komentar':{
                $this->admin_model->deleteKomentar();
            }
            break;
            case 'film':{
                $this->admin_model->deleteFilm();
            }
            break;
            case 'korisnik':{
                $this->admin_model->deleteKorisnik();
            }
            break;
            case 'ocena':{
                $this->admin_model->deleteOcena();
            }
            break;
            case 'projekcija':{
                $this->admin_model->deleteProjekcija();
            }
            break;
            case 'rezervacija':{
                $this->admin_model->deleteRezervacija();
            }
            break;
            case 'rezervisanomesto':{
                $this->admin_model->deleteRezervisanoMesto();
            }
            break;
            case 'sala':{
                $this->admin_model->deleteSala();
            }
        }
    }
    
    function insert_row($tabela) {
        $this->load->model('admin_model');
        switch($tabela) {
            case 'moderator':{
                $this->admin_model->insertModerator();
                $data['option'] = $tabela;
                $data['column'] = $this->admin_model->getAjaxColumns();
                $data['row'] = $this->admin_model->getAjaxRows();
                $data['path'] = $this->admin_model->getTable();
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            }
            break;
            case 'komentar':{
                $this->admin_model->insertKomentar();
                $data['option'] = $tabela;
                $data['column'] = $this->admin_model->getAjaxColumns();
                $data['row'] = $this->admin_model->getAjaxRows();
                $data['path'] = $this->admin_model->getTable();
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            }
            break;
            case 'film':{
                if($this->admin_model->insertFilm()){
                    $data['option'] = $tabela;
                    $data['column'] = $this->admin_model->getAjaxColumns();
                    $data['row'] = $this->admin_model->getAjaxRows();
                    $data['path'] = $this->admin_model->getTable();
                    $data['main_content'] = 'page_admin/db.php';
                    $this->load->view('include/template_admin', $data);
                }
            }
            break;
            case 'korisnik':{
                $this->admin_model->insertKorisnik();
                $data['option'] = $tabela;
                $data['column'] = $this->admin_model->getAjaxColumns();
                $data['row'] = $this->admin_model->getAjaxRows();
                $data['path'] = $this->admin_model->getTable();
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            }
            break;
            case 'ocena':{
                $this->admin_model->insertOcena();
                $data['option'] = $tabela;
                $data['column'] = $this->admin_model->getAjaxColumns();
                $data['row'] = $this->admin_model->getAjaxRows();
                $data['path'] = $this->admin_model->getTable();
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            }
            break;
            case 'projekcija':{
                $this->admin_model->insertProjekcija();
                $data['option'] = $tabela;
                $data['column'] = $this->admin_model->getAjaxColumns();
                $data['row'] = $this->admin_model->getAjaxRows();
                $data['path'] = $this->admin_model->getTable();
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            }
            break;
            case 'rezervacija':{
                $this->admin_model->insertRezervacija();
                $data['option'] = $tabela;
                $data['column'] = $this->admin_model->getAjaxColumns();
                $data['row'] = $this->admin_model->getAjaxRows();
                $data['path'] = $this->admin_model->getTable();
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            }
            break;
            case 'rezervisanomesto':{
                $this->admin_model->insertRezervisanoMesto();
                $data['option'] = $tabela;
                $data['column'] = $this->admin_model->getAjaxColumns();
                $data['row'] = $this->admin_model->getAjaxRows();
                $data['path'] = $this->admin_model->getTable();
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            }
            break;
            case 'sala':{
                $this->admin_model->insertSala();
                $data['option'] = $tabela;
                $data['column'] = $this->admin_model->getAjaxColumns();
                $data['row'] = $this->admin_model->getAjaxRows();
                $data['path'] = $this->admin_model->getTable();
                $data['main_content'] = 'page_admin/db.php';
                $this->load->view('include/template_admin', $data);
            }
            break;
        }
    }
    
    function nalog(){
        $data['main_content'] = 'page_admin/nalog_admin.php';
        $this->load->view('include/template_admin', $data);
    }
    
    function nalog_edit(){
        $data['main_content'] = 'page_admin/nalog_edit_admin.php';
        $this->load->view('include/template_admin', $data);
    }
    
    function update_admin(){
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
            $this->load->model('admin_model');
            if($this->admin_model->update_admin()) {
                $this->nalog();
            }
        }
    }
    
    function logoff(){
        $this->load->model('user_model');
        $this->load->model('film_model');
        $this->user_model->invalidate_user();
        $data['list'] = $this->film_model->getLatest();
        $data['main_content'] = 'page/home.php';
        $this->load->view('include/template', $data);
    }
    
}