<?php

class User_model extends CI_Model {
    function check_unique(){
        $this->db->where('Username', $this->input->post('Username'));
        $rez = $this->db->get('korisnik');
        if($rez->num_rows() > 0){
            return false;
        } else {
            return true;
        }
    }
    
    function create_user() {
        if(isset($_POST['notice']) && $_POST['notice'] == 'on') $notice = 1; else $notice = 0;
        $udata = array (
            'Username' => $this->input->post('username'),
            'Password' => $this->input->post('password'),
            'Email' => $this->input->post('email'),
            'Slika' => '',      // $path
            'SlikaIme' => '',   // $name
            'ZeliObavestenja' => $notice
        );
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
            $udata['SlikaIme'] = addslashes($_FILES['image']['name']);
            //-----------------------------------------------------------
            $config['upload_path'] = APPPATH.'../resource/user/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $udata['Username'];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return false;
            } else {
                $file_data = $this->upload->data();
                $udata['Slika']=  base_url().'resource/user/'.$file_data['file_name'];
            }
        }
        $insert = $this->db->insert('korisnik', $udata);
        $udata['IDKorisnik'] = $this->db->insert_id();
        $this->session->set_userdata($udata);
        return $insert;
    }
    
    function update_user() {
        if(!empty($_POST['username']))  {
            $udata['Username'] = $this->input->post('username');
        } else{
            $udata['Username'] = $this->session->userdata('Username');
        }
        if(!empty($_POST['email']))     $udata['Email'] = $this->input->post('email');
        if(isset($_POST['notice']) && $_POST['notice'] == 'on') $udata['ZeliObavestenja'] = 1; else $udata['ZeliObavestenja'] = 0;
        if(!empty($_POST['newpassword']))  {
            if($this->input->post('password') == $this->session->userdata('Password')){
                $udata['Password'] = $this->input->post('newpassword');
            } else {
                echo "PASS not corect";
                die();
            }
        }
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
            // delete old file
            $this->load->helper('file');
            $old = $this->session->userdata('Slika');
            $first = strpos($old, "resource");
            $old = substr($old, $first);
            if(file_exists($old)){
                unlink($old);
            }
            $udata['SlikaIme'] = addslashes($_FILES['image']['name']);
            $config['upload_path'] = APPPATH.'../resource/user/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $udata['Username'];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return false;
            } else {
                $file_data = $this->upload->data();
                $udata['Slika'] = base_url().'resource/user/'.$file_data['file_name'];
            }
        }
        $this->session->set_userdata($udata);
        $where = "IDKorisnik = '".$this->session->userdata['IDKorisnik']."'";
        $insert = $this->db->update('korisnik', $udata, $where);
        return $insert;
    }
    
    function validate_user(){
        $this->db->select('IDKorisnik, Username, Password, Email, Slika, SlikaIme, ZeliObavestenja');
        $this->db->where('Username', $this->input->post('username'));
        $this->db->where('Password', $this->input->post('password'));
        $query = $this->db->get('korisnik');
        if($query->num_rows() == 1) {
            $row = $query->result_array();
            $udata['IDKorisnik'] = $row[0]['IDKorisnik'];
            $udata['Username'] = $row[0]['Username'];
            $udata['Password'] = $row[0]['Password'];
            $udata['Email'] = $row[0]['Email'];
            $udata['Slika'] = $row[0]['Slika'];
            $udata['SlikaIme'] = $row[0]['SlikaIme'];
            $udata['ZeliObavestenja'] = $row[0]['ZeliObavestenja'];
            $this->session->set_userdata($udata);
            return $query;
        } else {
            return false;
        }
    }
    
    function invalidate_user(){
        $this->session->set_userdata('logged_in', FALSE);
        $this->session->set_userdata('admin', FALSE);
        $this->session->unset_userdata('IDKorisnik');
        $this->session->unset_userdata('Username');
        $this->session->unset_userdata('Password');
        $this->session->unset_userdata('Email');
        $this->session->unset_userdata('Slika');
        $this->session->unset_userdata('SlikaIme');
        $this->session->unset_userdata('ZeliObavestenja');
    }
}