<?php

class Film_model extends CI_Model {
    function getAll() {
        $this->db->select('IDFilm, Poreklo, Zanr, Naziv, OriginalNaziv, Reziser, Duzina, Poster, Opis, Link, PocetakPrikazivanja, Status, Ocena');
        $query = $this->db->get('film');
        $result = array();
        foreach($query->result() as $row) {
            $result[] = array (
                    'IDFilm' => $row->IDFilm,
                    'Poreklo' => $row->Poreklo,
                    'Zanr' => $row->Zanr,
                    'Naziv' => $row->Naziv,
                    'OriginalNaziv' => $row->OriginalNaziv,
                    'Reziser' => $row->Reziser,
                    'Duzina' => $row->Duzina,
                    'Poster' => $row->Poster,
                    'Opis' => $row->Opis,
                    'Link' => $row->Link,
                    'PocetakPrikazivanja' => $row->PocetakPrikazivanja,
                    'Status' => $row->Status,
                    'Ocena' => $row->Ocena
                );
        }
        return $result;
    }
    
    function getLatest(){
        $this->db->select('IDFilm, Poreklo, Zanr, Naziv, OriginalNaziv, Reziser, Duzina, Poster, Opis, Link, PocetakPrikazivanja, Status, Ocena');
        $this->db->limit(6);
        $query = $this->db->get('film');
        $result = array();
        foreach($query->result() as $row) {
            $result[] = array (
                    'IDFilm' => $row->IDFilm,
                    'Poreklo' => $row->Poreklo,
                    'Zanr' => $row->Zanr,
                    'Naziv' => $row->Naziv,
                    'OriginalNaziv' => $row->OriginalNaziv,
                    'Reziser' => $row->Reziser,
                    'Duzina' => $row->Duzina,
                    'Poster' => $row->Poster,
                    'Opis' => $row->Opis,
                    'Link' => $row->Link,
                    'PocetakPrikazivanja' => $row->PocetakPrikazivanja,
                    'Status' => $row->Status,
                    'Ocena' => $row->Ocena
                );
        }
        return $result;
    }
    
    function getAllNaziv(){
        $naziv = addslashes($this->input->get('pretraga'));
        $this->db->select('IDFilm, Poreklo, Zanr, Naziv, OriginalNaziv, Reziser, Duzina, Poster, Opis, Link, PocetakPrikazivanja, Status, Ocena');
        $this->db->where('Naziv', $naziv);
        $query = $this->db->get('film');
        $result = array();
        foreach($query->result() as $row) {
            $result[] = array (
                    'IDFilm' => $row->IDFilm,
                    'Poreklo' => $row->Poreklo,
                    'Zanr' => $row->Zanr,
                    'Naziv' => $row->Naziv,
                    'OriginalNaziv' => $row->OriginalNaziv,
                    'Reziser' => $row->Reziser,
                    'Duzina' => $row->Duzina,
                    'Poster' => $row->Poster,
                    'Opis' => $row->Opis,
                    'Link' => $row->Link,
                    'PocetakPrikazivanja' => $row->PocetakPrikazivanja,
                    'Status' => $row->Status,
                    'Ocena' => $row->Ocena
                );
        }
        return $result;
    }
    
    function getFilm($idFilm) {
        $this->db->select('IDFilm, Poreklo, Zanr, Naziv, OriginalNaziv, Reziser, Duzina, Poster, Opis, Link, PocetakPrikazivanja, Status, Ocena');
        $this->db->where('IDFilm', $idFilm);
        $query = $this->db->get('film');
        if($query->num_rows() == 1) {
            $row = $query->result_array();
            $result = array (
                    'IDFilm' => $row[0]['IDFilm'],
                    'Poreklo' => $row[0]['Poreklo'],
                    'Zanr' => $row[0]['Zanr'],
                    'Naziv' => $row[0]['Naziv'],
                    'OriginalNaziv' => $row[0]['OriginalNaziv'],
                    'Reziser' => $row[0]['Reziser'],
                    'Duzina' => $row[0]['Duzina'],
                    'Poster' => $row[0]['Poster'],
                    'Opis' => $row[0]['Opis'],
                    'Link' => $row[0]['Link'],
                    'PocetakPrikazivanja' => $row[0]['PocetakPrikazivanja'],
                    'Status' => $row[0]['Status'],
                    'Ocena' => $row[0]['Ocena']
                );
        }
        return $result;
    }
            
    function ajaxRate($idFilm) {
        $IDK = $this->session->userdata('IDKorisnik');
        $this->db->select('IDKorisnik, IDFilm');
        $this->db->where('IDKorisnik', $IDK);
        $this->db->where('IDFilm', $idFilm);
        $query2 = $this->db->get('ocena');
        if($query2->num_rows() == 1){
            $ocena = $this->input->get('ocena');
            $row = array( 'Ocena' => $ocena );
            $where = "IDFilm = '"."$idFilm"."' AND IDKorisnik = '"."$IDK"."'";
            $this->db->update('ocena', $row, $where);
        } elseif($query2->num_rows() == 0) {
            $ocena = $this->input->get('ocena');
            $row = array(
                'IDFilm' => $idFilm,
                'IDKorisnik' => $IDK,
                'Ocena' => $ocena
            );
            $this->db->insert('ocena', $row);
        }
        
        $query = "select count(*) as br, sum(Ocena) as vred "
                . "from ocena "
                . "where IDFilm = '"."$idFilm"."' ";
        $rez = $this->db->query($query);
        $r = $rez->row();
        $rate = $r->vred/$r->br;
        $data = array(
            'Ocena' => $rate
        );
        $this->db->where('IDFilm', $idFilm);
        $this->db->update('film',$data);
        
        return $rate;
    }
    
    function ajaxComment($idFilm) {
        $this->db->select('IDKorisnik');
        $this->db->where('Username', $this->session->userdata('Username'));
        $query1 = $this->db->get('korisnik');
        if($query1->num_rows() == 1) {
            $row = $query1->result_array();
            $IDK = $row[0]['IDKorisnik'];
        }
        $date = date("Y-m-d H:i:s");
        $text = addslashes($this->input->post('komentar'));
        $data = array (
            'IDFilm' => $idFilm,
            'IDKorisnik' => $IDK,
            'DatumVreme' => $date,
            'Text' => $text
        );
        
        $this->db->insert('komentar', $data);
        $idKom = $this->db->insert_id();
        $dlink = site_url("index/ajaxDeleteComment/$idFilm/$idKom");
        $slika = $this->session->userdata('Slika');
        $name = $this->session->userdata('Username');
        $newcomment = "<hr id='hr-"."$idKom"."' />"
                . "<div class='row' id='row-"."$idKom"."'>"
                    . "<div class='col-sm-2 text-center'>"
                        . "<img src='".$slika."' class='img-circle' height='65' width='65' alt='Avatar'>"
                    . "</div>"
                    . "<div class='col-sm-10'>"
                        . "<h4>".$name."<small>&nbsp $date</small></h4>"
                        . "<p>$text</p>"
                        . "<button id='"."$idKom"."' href='"."$dlink"."' class='btn btn-danger btn-xs delete_row_class'> delete </button>"
                        . "<br>"
                    . "</div>"
                . "</div>";
        return $newcomment;
    }
    
    function ajaxDeleteComment($idKom) {
        $this->db->where('IDKomentar', $idKom);
        $this->db->delete('komentar');
    }
    
    function getComments($idFilm){
        $query = "select Kom.IDKomentar, Kor.Username, Kor.Slika, Kom.DatumVreme, Kom.Text "
                . "from komentar Kom, korisnik Kor "
                . "where Kom.IDFilm = '"."$idFilm"."' "
                . "and Kom.IDKorisnik = Kor.IDKorisnik "
                . "order by Kom.DatumVreme desc";
        $result = $this->db->query($query);
        $list=array();
        foreach($result->result() as $row) {
            $list[] = array(
                'IDKomentar' => $row->IDKomentar,
                'Username' => $row->Username,
                'Slika' => $row->Slika,
                'DatumVreme' => $row->DatumVreme,
                'Text' => $row->Text
            );
        }
        return $list;
    }
    
    function ajaxHint(){
        $in = $this->input->get("search");
        if(strlen($in)==0) return "";
        $hint = "";
        
        $this->db->select("Naziv");
        $rez = $this->db->get('film');
        $niz = $rez->result_array();
        
        $len = strlen($in);
        foreach($niz as $row) {
            if(stristr($in, substr($row['Naziv'], 0, $len))){
                if($hint === "") {
                    $hint = "<option value='".$row['Naziv']."'>";
                } else {
                    $hint .= " <option value='".$row['Naziv']."'>";
                }
            }
        }
        return $hint;
    }
    
}