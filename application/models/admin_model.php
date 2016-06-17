<?php

class Admin_model extends CI_Model {
    function validate_admin() {
        $this->db->select('IDAdmin, Username, Password, Email');
        $this->db->where('Username', $this->input->post('username'));
        $this->db->where('Password', $this->input->post('password'));
        $query = $this->db->get('admin');
        if($query->num_rows() == 1) {
            $row = $query->result_array();
            $udata['IDAdmin'] = $row[0]['IDAdmin'];
            $udata['Username'] = $row[0]['Username'];
            $udata['Password'] = $row[0]['Password'];
            $udata['Email'] = $row[0]['Email'];
            $udata['Privilegija'] = 'a';
            $this->session->set_userdata($udata);
            return $query;
        } else {
            $this->db->select('IDModerator, IDAdmin, Username, Password, Email, Privilegija');
            $this->db->where('Username', $this->input->post('username'));
            $this->db->where('Password', $this->input->post('password'));
            $query = $this->db->get('moderator');
            
            if($query->num_rows() != 1) return false;
            
            $row = $query->result_array();
            $udata['IDModerator'] = $row[0]['IDModerator'];
            $udata['IDAdmin'] = $row[0]['IDAdmin'];
            $udata['Username'] = $row[0]['Username'];
            $udata['Password'] = $row[0]['Password'];
            $udata['Email'] = $row[0]['Email'];
            $udata['Privilegija'] = $row[0]['Privilegija'];
            $this->session->set_userdata($udata);
            return $query;
        }
        return false;
    }
    
    function update_admin(){
        $where = "Username = '".$this->session->userdata['Username']."'";
        if(!empty($_POST['username']))  {
            $udata['Username'] = $this->input->post('username');
        } else{
            $udata['Username'] = $this->session->userdata('Username');
        }
        if(!empty($_POST['email']))     $udata['Email'] = $this->input->post('email');
        if(!empty($_POST['newpassword']))  {
            if($this->input->post('password') == $this->session->userdata('Password')){
                $udata['Password'] = $this->input->post('newpassword');
            } else {
                return false;
            }
        }
        $this->session->set_userdata($udata);
        $insert = $this->db->update('admin', $udata, $where);
        return $insert;
    }
    
    function getColumns() {
        $table_name = $this->input->post('table');
        $query =" SELECT `COLUMN_NAME` "
                . "FROM `INFORMATION_SCHEMA`.`COLUMNS` "
                . "WHERE `TABLE_SCHEMA` = 'bioskop' "
                . "AND `TABLE_NAME` = '"."$table_name"."' ;";
        $q = $this->db->query($query);
        return $q->result_array();
    }
    
    function getRows() {
        $table_name = $this->input->post('table');
        $q = $this->db->get($table_name);
        return $q->result_array();
    }
    
    function getAjaxColumns(){
        $table_name = $this->input->post('option');
        $query =" SELECT `COLUMN_NAME` "
                . "FROM `INFORMATION_SCHEMA`.`COLUMNS` "
                . "WHERE `TABLE_SCHEMA` = 'bioskop' "
                . "AND `TABLE_NAME` = '"."$table_name"."' ;";
        $q = $this->db->query($query);
        return $q->result_array();
    }
    
    function getAjaxRows(){
        $table_name = $this->input->post('option');
        $q = $this->db->get($table_name);
        return $q->result_array();
    }
    
    function getTable(){
        $table_name = $this->input->post('option');
        switch($table_name) {
            case 'komentar':{
                return 'page_admin/tabele/komentar_tabela';
            }
            case 'film':{
                return 'page_admin/tabele/film_tabela';
            }
            case 'korisnik':{
                return 'page_admin/tabele/korisnik_tabela';
            }
            case 'ocena':{
                return 'page_admin/tabele/ocena_tabela';
            }
            case 'projekcija':{
                return 'page_admin/tabele/projekcija_tabela';
            }
            case 'rezervacija':{
                return 'page_admin/tabele/rezervacija_tabela';
            }
            case 'rezervisanoMesto':{
                return 'page_admin/tabele/rezervisanomesto_tabela';
            }
            case 'moderator':{
                return 'page_admin/tabele/moderator_tabela';
            }
            case 'sala':{
                return 'page_admin/tabele/sala_tabela';
            }
        }
    }
    
    //--------------------------------------------------------------------------
    function deleteModerator(){
        $IDModerator = $this->input->post('IDModerator');
        $this->db->where('IDModerator', $IDModerator);
        $this->db->delete('moderator');
    }
    
    function deleteKomentar(){
        $idKom = $this->input->post('IDKomentar');
        $this->db->where('IDKomentar', $idKom);
        $this->db->delete('komentar');
    }
    
    function deleteFilm(){
        $idFilm = $this->input->post('IDFilm');
        $this->db->where('IDFilm', $idFilm);
        $this->db->delete('film');
    }
    
    function deleteKorisnik(){
        $idKorisnik = $this->input->post('IDKorisnik');
        $this->db->where('IDKorisnik', $idKorisnik);
        $this->db->delete('korisnik');
    }
    
    function deleteOcena(){
        $idKorisnik = $this->input->post('IDKorisnik');
        $idFilm = $this->input->post('IDFilm');
        $this->db->where('IDFilm', $idFilm);
        $this->db->where('IDKorisnik', $idKorisnik);
        $this->db->delete('ocena');
    }
    
    function deleteProjekcija(){
        $idProjekcija = $this->input->post('IDProjekcija');
        $this->db->where('IDProjekcija', $idProjekcija);
        $this->db->delete('projekcija');
    }
    
    function deleteRezervacija(){
        $idRezervacija = $this->input->post('IDRezervacija');
        $this->db->where('IDRezervacija', $idRezervacija);
        $this->db->delete('rezervacija');
    }
    
    function deleteRezervisanoMesto(){
        $idPro = $this->input->post('IDProjekcija');
        $red = $this->input->post('Red');
        $kol = $this->input->post('Kolona');
        $this->db->where('IDProjekcija', $idPro);
        $this->db->where('Red', $red);
        $this->db->where('Kolona', $kol);
        $this->db->delete('rezervisanoMesto');
    }
    
    function deleteSala(){
        $idSala = $this->input->post('IDSala');
        $this->db->where('IDSala', $idSala);
        $this->db->delete('sala');
    }
    
    //--------------------------------------------------------------------------
    function updateKomentar(){
        $IDKomentar = $this->input->post("IDKomentar");
        $IDFilm = $this->input->post("IDFilm");
        $IDKorisnik = $this->input->post("IDKorisnik");
        $DatumVreme = $this->input->post("DatumVreme");
        $Text = $this->input->post("Text");
        
        $udata = Array(
            'IDFilm' => $IDFilm,
            'IDKorisnik' => $IDKorisnik,
            'DatumVreme' => $DatumVreme,
            'Text' => $Text,
        );
        
        $where = "IDKomentar = '".$IDKomentar."'";
        $insert = $this->db->update('komentar', $udata, $where);
        return $insert;
    }
    
    function updateFilm(){
        $IDFilm = $this->input->post("IDFilm");
        $Poreklo = $this->input->post("Poreklo");
        $Zanr = $this->input->post("Zanr");
        $Naziv = $this->input->post("Naziv");
        $OriginalNaziv = $this->input->post("OriginalNaziv");
        $Reziser = $this->input->post("Reziser");
        $Duzina = $this->input->post("Duzina");
        $Opis = $this->input->post("Opis");
        $Link = $this->input->post("Link");
        $PocetakPrikazivanja = $this->input->post("PocetakPrikazivanja");
        $Status = $this->input->post("Status");
        //$Ocena = $this->input->post("Ocena");
        
        $udata = Array(
            'Poreklo' => $Poreklo,
            'Zanr' => $Zanr,
            'Naziv' => $Naziv,
            'OriginalNaziv' => $OriginalNaziv,
            'Reziser' => $Reziser,
            'Duzina' => $Duzina,
            'Opis' => $Opis,
            'Link' => $Link,
            'PocetakPrikazivanja' => $PocetakPrikazivanja,
            'Status' => $Status,
        );

        if(isset($_FILES['Poster']) && is_uploaded_file($_FILES['Poster']['tmp_name'])) {
            // delete old file
            $this->load->helper('file');
            $old = 'resource/film/'.$udata['Naziv'].".".pathinfo($_FILES['Poster']['name'], PATHINFO_EXTENSION);
            if(file_exists($old)){
                unlink($old);
            }
            // create new file
            $config['upload_path'] = APPPATH.'../resource/film/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $udata['Naziv'];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('Poster')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return false;
            } else {
                $file_data = $this->upload->data();
                $udata['Poster']=  base_url().'resource/film/'.$file_data['file_name'];
            }
        }
        
        $where = "IDFilm = '".$IDFilm."'";
        $insert = $this->db->update('film', $udata, $where);
        return $insert;
    }
    
    function updateKorisnik(){
        $IDKorisnik = $this->input->post("IDKorisnik");
        $Username = $this->input->post("Username");
        $Password = $this->input->post("Password");
        $Email = $this->input->post("Email");
        if(isset($_POST['ZeliObavestenja']) && $_POST['ZeliObavestenja'] == 'on') $ZeliObavestenja = 1; else $ZeliObavestenja = 0;
        
        $udata = Array(
            'Username' => $Username,
            'Password' => $Password,
            'Email' => $Email,
            'ZeliObavestenja' => $ZeliObavestenja,
        );
        
        if(isset($_FILES['Slika']) && is_uploaded_file($_FILES['Slika']['tmp_name'])) {
            // delete old file
            $this->load->helper('file');
            $old = 'resource/user/'.$udata['Username'].".".pathinfo($_FILES['Slika']['name'], PATHINFO_EXTENSION);
            if(file_exists($old)){
                unlink($old);
            }
            // create new file
            $config['upload_path'] = APPPATH.'../resource/user/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $udata['Username'];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('Slika')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return false;
            } else {
                $file_data = $this->upload->data();
                $udata['Slika']=  base_url().'resource/user/'.$file_data['file_name'];
            }
        }
        
        $where = "IDKorisnik = '".$IDKorisnik."'";
        $insert = $this->db->update('korisnik', $udata, $where);
        return $insert;
    }
    
    function updateOcena(){
        $IDFilm = $this->input->post("IDFilm");
        $IDKorisnik = $this->input->post("IDKorisnik");
        $Ocena = $this->input->post("Ocena");
        
        $udata = Array(
            'Ocena' => $Ocena
        );
        
        $where = "IDFilm = '".$IDFilm."' AND IDKorisnik = '".$IDKorisnik."'";
        $insert = $this->db->update('ocena', $udata, $where);
        return $insert;
    }
    
    function updateProjekcija(){
        $IDProjekcija = $this->input->post("IDProjekcija");
        $IDSala = $this->input->post("IDSala");
        $IDFilm = $this->input->post("IDFilm");
        $Datum = $this->input->post("Datum");
        $Vreme = $this->input->post("Vreme");
        
        $udata = Array(
            'IDSala' => $IDSala,
            'IDFilm' => $IDFilm,
            'Datum' => $Datum,
            'Vreme' => $Vreme,
        );
        
        $where = "IDProjekcija = '".$IDProjekcija."'";
        $insert = $this->db->update('projekcija', $udata, $where);
        return $insert;
    }
    
    function updateRezervacija(){
        $IDRezervacija = $this->input->post("IDRezervacija");
        $IDKorisnik = $this->input->post("IDKorisnik");
        $IDProjekcija = $this->input->post("IDProjekcija");
        $DatumVreme = $this->input->post("DatumVreme");
        $BrojKarata = $this->input->post("BrojKarata");
        $Cena = $this->input->post("Cena");
        $Status = $this->input->post("Status");
        
        $udata = Array(
            'IDKorisnik' => $IDKorisnik,
            'IDProjekcija' => $IDProjekcija,
            'DatumVreme' => $DatumVreme,
            'BrojKarata' => $BrojKarata,
            'Cena' => $Cena,
            'Status' => $Status
        );
        
        $where = "IDRezervacija = '".$IDRezervacija."'";
        $insert = $this->db->update('rezervacija', $udata, $where);
        return $insert;
    }
    
    function updateRezervisanoMesto(){
        $IDProjekcija = $this->input->post("IDProjekcija");
        $Red = $this->input->post("Red");
        $Kolona= $this->input->post("Kolona");
        $IDRezervacija = $this->input->post("IDRezervacija");
        
        $udata = Array(
            'IDProjekcija' => $IDProjekcija,
            'Red' => $Red,
            'Kolona' => $Kolona,
            'IDRezervacija' => $IDRezervacija,
        );
        
        $where = "IDProjekcija = '".$IDProjekcija."' AND Red = '".$Red."' AND Kolona = '".$Kolona."' ";
        $insert = $this->db->update('rezervisanomesto', $udata, $where);
        return $insert;
    }
    
    function updateSala(){
        $IDSala = $this->input->post("IDSala");
        $BrojRedova = $this->input->post("BrojRedova");
        $BrojKolona = $this->input->post("BrojKolona");
        $Cena= $this->input->post("Cena");
        
        $udata = Array(
            'BrojRedova' => $BrojRedova,
            'BrojKolona' => $BrojKolona,
            'Cena' => $Cena
        );
        
        $where = "IDSala = '".$IDSala."'";
        $insert = $this->db->update('sala', $udata, $where);
        return $insert;
    }
    
    //--------------------------------------------------------------------------
    function insertModerator(){
        $udata = Array(
            'IDAdmin' => $this->session->userdata('IDAdmin'),
            'Username' => $this->input->post("Username"),
            'Password' => $this->input->post("Password"),
            'Email' => $this->input->post("Email"),
            'Privilegija' => $this->input->post("Privilegija")
        );
        $this->db->insert('moderator',$udata);
        $udata['IDModerator'] = $this->db->insert_id();
        return true;
    }
    
    function insertKomentar(){
        $IDFilm = $this->input->post("IDFilm");
        $IDKorisnik = $this->input->post("IDKorisnik");
        $DatumVreme = date("Y-m-d H:i:s");
        $Text = $this->input->post("Text");
        
        $udata = Array(
            'IDFilm' => $IDFilm,
            'IDKorisnik' => $IDKorisnik,
            'DatumVreme' => $DatumVreme,
            'Text' => $Text,
        );
        $this->db->insert('komentar',$udata);
        $udata['IDKomentar'] = $this->db->insert_id();
        return true;
    }
    
    function insertFilm(){
        $udata = Array(
            'Poreklo' => $this->input->post("Poreklo"),
            'Zanr' => $this->input->post("Zanr"),
            'Naziv' => $this->input->post("Naziv"),
            'OriginalNaziv' => $this->input->post("OriginalNaziv"),
            'Reziser' => $this->input->post("Reziser"),
            'Duzina' => $this->input->post("Duzina"),
            'Opis' => $this->input->post("Opis"),
            'Link' => $this->input->post("Link"),
            'PocetakPrikazivanja' => $this->input->post("PocetakPrikazivanja"),
            'Status' => $this->input->post("Status"),
            'Ocena' => 0,
        );
        
        if(isset($_FILES['Poster']) && is_uploaded_file($_FILES['Poster']['tmp_name'])) {
            $config['upload_path'] = APPPATH.'../resource/film/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $udata['Naziv'];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('Poster')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return false;
            } else {
                $file_data = $this->upload->data();
                $udata['Poster']=  base_url().'resource/film/'.$file_data['file_name'];
            }
        }
        
        $this->db->insert('film',$udata);
        $udata['IDFilm'] = $this->db->insert_id();
        return true;
    }
    
    function insertKorisnik(){
        if(isset($_POST['ZeliObavestenja']) && $_POST['ZeliObavestenja'] == 'on') $notice = 1; else $notice = 0;
        $udata = Array(
            'Username' => $this->input->post("Username"),
            'Password' => $this->input->post("Password"),
            'Email' => $this->input->post("Email"),
            'ZeliObavestenja' => $notice,
        );
        
        if(isset($_FILES['Slika']) && is_uploaded_file($_FILES['Slika']['tmp_name'])) {
            $udata['SlikaIme'] = addslashes($_FILES['Slika']['name']);
            $config['upload_path'] = APPPATH.'../resource/user/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $udata['Username'];
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('Slika')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return false;
            } else {
                $file_data = $this->upload->data();
                $udata['Slika']=  base_url().'resource/user/'.$file_data['file_name'];
            }
        }
        
        $this->db->insert('korisnik',$udata);
        $udata['IDKorisnik'] = $this->db->insert_id();
        
        return true;
    }
    
    function insertOcena(){
        $udata = Array(
            'IDFilm' => $this->input->post("IDFilm"),
            'IDKorisnik' => $this->input->post("IDKorisnik"),
            'Ocena' => $this->input->post("Ocena")
        );
        $this->db->insert('ocena',$udata);
        return true;
    }
    
    function insertProjekcija(){
        $IDSala = $this->input->post("IDSala");
        $IDFilm = $this->input->post("IDFilm");
        $Datum = $this->input->post("Datum");
        $Vreme = $this->input->post("Vreme");
        
        $udata = Array(
            'IDSala' => $IDSala,
            'IDFilm' => $IDFilm,
            'Datum' => $Datum,
            'Vreme' => $Vreme,
        );
        
        $this->db->insert('projekcija',$udata);
        $udata['IDProjekcija'] = $this->db->insert_id();
        return true;
    }
    
    function insertRezervacija(){
        $IDKorisnik = $this->input->post("IDKorisnik");
        $IDProjekcija = $this->input->post("IDProjekcija");
        $DatumVreme = date("Y-m-d H:i:s");  // $this->input->post("DatumVreme");
        $BrojKarata = 0;                    // $this->input->post("BrojKarata");
        $Cena = 0;                          // $this->input->post("Cena");
        $Status = $this->input->post("Status");
        
        $udata = Array(
            'IDKorisnik' => $IDKorisnik,
            'IDProjekcija' => $IDProjekcija,
            'DatumVreme' => $DatumVreme,
            'BrojKarata' => $BrojKarata,
            'Cena' => $Cena,
            'Status' => $Status
        );
        
        $this->db->insert('rezervacija',$udata);
        $udata['IDRezervacija'] = $this->db->insert_id();
        return true;
    }
    
    function insertRezervisanoMesto(){
        $IDProjekcija = $this->input->post("IDProjekcija");
        $Red = $this->input->post("Red");
        $Kolona= $this->input->post("Kolona");
        $IDRezervacija = $this->input->post("IDRezervacija");
        
        $udata = Array(
            'IDProjekcija' => $IDProjekcija,
            'Red' => $Red,
            'Kolona' => $Kolona,
            'IDRezervacija' => $IDRezervacija
        );
        
        $this->db->insert('rezervisanomesto',$udata);
        return true;
    }
    
    function insertSala(){
        $BrojRedova = $this->input->post("BrojRedova");
        $BrojKolona = $this->input->post("BrojKolona");
        $Cena= $this->input->post("Cena");
        
        $udata = Array(
            'BrojRedova' => $BrojRedova,
            'BrojKolona' => $BrojKolona,
            'Cena' => $Cena
        );
        
        $this->db->insert('sala',$udata);
        $udata['IDSala'] = $this->db->insert_id();
        return true;
    }
}

