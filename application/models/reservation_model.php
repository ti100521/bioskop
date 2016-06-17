<?php

class Reservation_model extends CI_Model {
    function newReservedMesta($idPro){
        $broj = $this->input->post('brojKarata');
        $mesta = str_replace(",", " ", $this->input->post('mesta'));
        $mesta = str_replace(' (', "", $mesta);
        $mesta = str_replace(')', "", $mesta);
        $niz = explode(" ",$mesta);
        $size = sizeOf($niz);
        
        //-- CENA --------------------------------------------------------------
        $q1 = $this->db->query("select s.Cena "
                . "from sala s, projekcija p "
                . "where p.IDProjekcija = '"."$idPro"."' "
                . "and s.IDSala = p.IDSala ");
        $cena = $q1->row();
        
        
        //-- KORISNIK ----------------------------------------------------------
        $q2 = $this->db->query("select IDKorisnik "
                . "from korisnik "
                . "where Username = '".$this->session->userdata('Username')."' ");
        $idKor = $q2->row();
        
        
        //-- REZERVACIJA -------------------------------------------------------
        $brk = $this->input->post('brojKarata');
        $ucena = number_format($brk) * number_format($cena->Cena);
        $q3 = $this->db->query("insert into rezervacija(IDKorisnik, IDProjekcija, DatumVreme, BrojKarata, Cena, Status) "
                . "values('".$idKor->IDKorisnik."', '"."$idPro"."', '".date('Y-m-d H:i:s')."', '".$brk."', '".$ucena."', 't');");
        $lastIDReservacija = $this->db->insert_id();
        
        
        //-- REZERVISANO MESTO -------------------------------------------------
        $query = "select * from rezervisanoMesto where ";
        $data=array();
        for($i=0; $i<$size;) {
            $r = $niz[$i++];
            if($r == "" || $r == " ") {break;}
            $k = $niz[$i++];
            if($i > 2) {
                $query.= " OR ";
            }
            $data[] = array(
                'IDProjekcija' => $idPro,
                'Red' => $r,
                'Kolona' => $k,
                'IDRezervacija' => $lastIDReservacija
            );
            $query.= " '"."$r"."' = Red AND '"."$k"."' = Kolona AND '"."$idPro"."' = IDProjekcija ";
        }
        $query.= ";";
        
        $provera = $this->db->query($query);
        if($provera->num_rows() > 0){
            $this->db->where('IDRezervacija', $lastIDReservacija);
            $this->db->delete('rezervacija');
            return 0;
        }
        $this->db->insert_batch('rezervisanoMesto', $data);        
        return $lastIDReservacija;
    }
    
    function getReservedMesta($idPro){
        $q1 = $this->db->query("select s.BrojRedova, s.BrojKolona "
                . "from sala s, projekcija p "
                . "where p.IDProjekcija = '"."$idPro"."' "
                . "and s.IDSala = p.IDSala ");
        $velicina = $q1->row();
        
        $matrix = array();
        $matrix[] = array();
        for($i=0; $i<$velicina->BrojRedova; $i++) {
            for($j=0; $j<$velicina->BrojKolona; $j++){
                $matrix[$i][$j] = 0;
            }
        }
        
        $q2 = $this->db->query("select Red, Kolona "
                . "from rezervisanoMesto "
                . "where IDProjekcija = '"."$idPro"."' "
                . "order by Red, Kolona ");
        $niz = $q2->result_array();
        
        foreach($niz as $row) {
            $i = $row['Red']-1;
            $j = $row['Kolona']-1;
            $matrix[$i][$j] = 1;
        }        
        return $matrix;
    }

    function requestConformation($idRez){
        // PODESITI GUGL "...less secure app: turn on"
        $config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'igortesla333@gmail.com',
            'smtp_pass' => 'igotes333'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user'], 'Bioskop Igor');
        $this->email->to($this->session->userdata('Email'));
        $this->email->subject("Bioskop Igor");
        $this->email->message(" Izvrsiliste rezervaciju.\n\n Broj vase rezervacije: ".$idRez);
        if($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}