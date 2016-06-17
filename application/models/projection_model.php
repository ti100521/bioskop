<?php   

class Projection_model extends CI_Model {
    function getRepertoars(){
        $today = strtotime("today");
        $prvi = date("Y-m-d",strtotime("+0 days", $today));
        $poslednji = date("Y-m-d",strtotime("+7 days", $today));
        $query = "select IDFilm, Poreklo, Zanr, Naziv, OriginalNaziv, Reziser, Duzina, Poster, Opis, Link, PocetakPrikazivanja, Status, Ocena "
                . "from film "
                . "where IDFilm in ( select distinct IDFilm "
                                    . "from projekcija "
                                    . "where Datum >= '"."$prvi"."'"
                                    . "and Datum < '"."$poslednji"."' )";
        $q = $this->db->query($query);
        $result = array();
        foreach($q->result() as $row) {
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
    
    function getProjections($idFilm){
        $dan = array();        
        $today = strtotime("today");
        for($i=0; $i<7; $i++) {
            $off = strtotime("+".$i." days", $today);
            $danas = date("Y-m-d",$off);
            $this->db->select('IDProjekcija, IDSala, Vreme');
            $this->db->where('IDFilm', $idFilm);
            $this->db->where('Datum', $danas);
            $this->db->order_by('Vreme asc');
            $rez1 = $this->db->get('projekcija');
            
            $dan[$i] = array();
            foreach($rez1->result() as $row) {
                $dan[$i][] = array(
                    'Vreme' => $row->Vreme,
                    'IDSala' => $row->IDSala,
                    'IDProjekcija' => $row->IDProjekcija,
                );
            }
        }
        return $dan;
    }
    
    function getProjection($idPro){
        $this->db->select('IDProjekcija, IDSala, IDFilm, Datum, Vreme');
        $this->db->where('IDProjekcija', $idPro);
        $q1 = $this->db->get('projekcija');
        if($q1->num_rows() > 0){
            $row1 = $q1->row();
            
            $this->db->select('IDSala, BrojRedova, BrojKolona, Cena');
            $this->db->where('IDSala', $row1->IDSala);
            $q2 = $this->db->get('sala');
            if($q2->num_rows() > 0) {
                $row2 = $q2->row();

                $this->db->select('Naziv');
                $this->db->where('IDFilm', $row1->IDFilm);
                $q3 = $this->db->get('film');
                $row3 = $q3->row();
            
                $info = array(
                    'IDProjekcija' => $row1->IDProjekcija,
                    'IDSala' => $row1->IDSala,
                    'IDFilm' => $row1->IDFilm,
                    'Naziv' => $row3->Naziv,
                    'Datum' => $row1->Datum,
                    'Vreme' => $row1->Vreme,
                    'BrojRedova' => $row2->BrojRedova,
                    'BrojKolona' => $row2->BrojKolona,
                    'Cena' => $row2->Cena,
                );
                return $info;
            }
        }
        return false;
    }
}