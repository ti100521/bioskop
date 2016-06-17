$(document).ready(function(){
    
    var rowID;
    
    $("#deo-tabela").on('click', ".edit-row-komentar", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var _id = "#row-"+id;
        
        rowID = id;
        
        var IDKomentar = $(_id+"-IDKomentar").text();
        var IDFilm = $(_id+"-IDFilm").text();
        var IDKorisnik = $(_id+"-IDKorisnik").text();
        var DatumVreme = $(_id+"-DatumVreme").text();
        var Text = $(_id+"-Text").text();
        
        $("#edit_modal").modal();
        $("#IDKomentar").val(IDKomentar);
        $("#IDFilm").val(IDFilm);
        $("#IDKorisnik").val(IDKorisnik);
        $("#DatumVreme").val(DatumVreme);
        $("#Text").val(Text);
    });
    
    $("#deo-tabela").on('click', ".update-row-komentar", function(event){
        event.preventDefault();
        var href = $("#for_edit").val();
        href = href+"/komentar";
        
        var IDKomentar = $("#IDKomentar").val();
        var IDFilm = $("#IDFilm").val();
        var IDKorisnik = $("#IDKorisnik").val();
        var DatumVreme = $("#DatumVreme").val();
        var Text = $("#Text").val();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDKomentar : IDKomentar,
                IDFilm : IDFilm,
                IDKorisnik : IDKorisnik,
                DatumVreme : DatumVreme,
                Text : Text,
            },
            success: function(data) {
                $("#edit_modal").modal('hide');
                $("#row-"+rowID+"-IDFilm").text(IDFilm);
                $("#row-"+rowID+"-IDKorisnik").text(IDKorisnik);
                $("#row-"+rowID+"-DatumVreme").text(DatumVreme);
                $("#row-"+rowID+"-Text").text(Text);
                alert("update success");
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".edit-row-film", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var _id = "#row-"+id;
        
        rowID = id;
        
        var IDFilm = $(_id+"-IDFilm").text();
        var Poreklo = $(_id+"-Poreklo").text();
        var Zanr = $(_id+"-Zanr").text();
        var Naziv = $(_id+"-Naziv").text();
        var OriginalNaziv = $(_id+"-OriginalNaziv").text();
        var Reziser = $(_id+"-Reziser").text();
        var Duzina = $(_id+"-Duzina").text();
        var Opis = $(_id+"-Opis").text();
        var Link = $(_id+"-Link").text();
        var PocetakPrikazivanja = $(_id+"-PocetakPrikazivanja").text();
        var Status = $(_id+"-Status").text();
        
        $("#edit_modal").modal();
        $("#IDFilm").val(IDFilm);
        $("#Poreklo").val(Poreklo);
        $("#Zanr").val(Zanr);
        $("#Naziv").val(Naziv);
        $("#OriginalNaziv").val(OriginalNaziv);
        $("#Reziser").val(Reziser);
        $("#Duzina").val(Duzina);
        $("#Opis").val(Opis);
        $("#Link").val(Link);
        $("#PocetakPrikazivanja").val(PocetakPrikazivanja);
        $("#Status").val(Status);
    });
    
    $("#deo-tabela").on('click', ".update-row-film", function(event){
        event.preventDefault();
        var href = $("#for_edit").val();
        href = href+"/film";
        
        var IDFilm = $("#IDFilm").val();
        var Poreklo = $("#Poreklo").val();
        var Zanr = $("#Zanr").val();
        var Naziv = $("#Naziv").val();
        var OriginalNaziv = $("#OriginalNaziv").val();
        var Reziser = $("#Reziser").val();
        var Duzina = $("#Duzina").val();
        var Opis = $("#Opis").val();
        var Link = $("#Link").val();
        var PocetakPrikazivanja = $("#PocetakPrikazivanja").val();
        var Status = $("#Status").val();
        var Poster = $("#Poster")[0].files[0];
        
        var fdata = new FormData();
        fdata.append('IDFilm', IDFilm);
        fdata.append("Poreklo", Poreklo);
        fdata.append("Zanr", Zanr);
        fdata.append("Naziv", Naziv);
        fdata.append("OriginalNaziv", OriginalNaziv);
        fdata.append("Reziser", Reziser);
        fdata.append("Duzina", Duzina);
        fdata.append("Opis", Opis);
        fdata.append("Link", Link);
        fdata.append("PocetakPrikazivanja", PocetakPrikazivanja);
        fdata.append("Status", Status);
        fdata.append('Poster', Poster);
        
        $.ajax({
            type: "POST",
            url: href,
            processData: false,
            contentType: false,
            data : fdata,
            success: function(data) {
                $("#edit_modal").modal('hide');
                $("#row-"+rowID+"-Ocena").text(Ocena);
                alert("update success");
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".edit-row-korisnik", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var _id = "#row-"+id;
        
        rowID = id;
        
        var IDKorisnik = $(_id+"-IDKorisnik").text();
        var Username = $(_id+"-Username").text();
        var Password = $(_id+"-Password").text();
        var Email = $(_id+"-Email").text();
        var ZeliObavestenja = $(_id+"-ZeliObavestenja").text();
        
        $("#edit_modal").modal();
        $("#IDKorisnik").val(IDKorisnik);
        $("#Username").val(Username);
        $("#Password").val(Password);
        $("#Email").val(Email);
        if(ZeliObavestenja === "1") $("#ZeliObavestenja").prop('checked', true);
        else $("#ZeliObavestenja").prop('checked', false);
    });
    
    $("#deo-tabela").on('click', ".update-row-korisnik", function(event){
        event.preventDefault();
        var IDKorisnik = $("#IDKorisnik").val();
        var Username = $("#Username").val();
        var Password = $("#Password").val();
        var Email = $("#Email").val();
        var ZeliObavestenja = $("#ZeliObavestenja").prop('checked');
        
        var href = $("#for_edit").val();
        href = href+"/korisnik";
        
        var Slika = $("#Slika")[0].files[0];
        var fdata = new FormData();
        fdata.append('IDKorisnik', IDKorisnik);
        fdata.append("Username", Username);
        fdata.append("Password", Password);
        fdata.append("Email", Email);
        fdata.append("Slika", Slika);
        fdata.append("ZeliObavestenja", ZeliObavestenja);
        
        $.ajax({
            type: "POST",
            url: href,
            processData: false,
            contentType: false,
            data : fdata,
            success: function(data) {
                $("#edit_modal").modal('hide');
                $("#row-"+rowID+"-Username").text(Username);
                $("#row-"+rowID+"-Password").text(Password);
                $("#row-"+rowID+"-Email").text(Email);
//                $("#row-"+rowID+"-Slika").val(Slika);
                if(ZeliObavestenja === true) $("#row-"+rowID+"-ZeliObavestenja").text("1");
                else $("#row-"+rowID+"-ZeliObavestenja").text("0");
                //alert("update success ");
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".edit-row-ocena", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var _id = "#row-"+id;
        
        rowID = id;
        
        var IDFilm = $(_id+"-IDFilm").text();
        var IDKorisnik = $(_id+"-IDKorisnik").text();
        var Ocena = $(_id+"-Ocena").text();
        
        $("#edit_modal").modal();
        $("#IDFilm").val(IDFilm);
        $("#IDKorisnik").val(IDKorisnik);
        $("#Ocena").val(Ocena);
    });
    
    $("#deo-tabela").on('click', ".update-row-ocena", function(event){
        event.preventDefault();
        var href = $("#for_edit").val();
        href = href+"/ocena";
        
        var IDFilm = $("#IDFilm").val();
        var IDKorisnik = $("#IDFilm").val();
        var Ocena = $("#Ocena").val();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDFilm : IDFilm,
                IDKorisnik : IDKorisnik,
                Ocena : Ocena
            },
            success: function(data) {
                $("#edit_modal").modal('hide');
                $("#row-"+rowID+"-Ocena").text(Ocena);
                alert("update success");
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".edit-row-projekcija", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var _id = "#row-"+id;
        
        rowID = id;
        
        var IDProjekcija = $(_id+"-IDProjekcija").text();
        var IDSala = $(_id+"-IDSala").text();
        var IDFilm = $(_id+"-IDFilm").text();
        var Datum = $(_id+"-Datum").text();
        var Vreme = $(_id+"-Vreme").text();
        
        $("#edit_modal").modal();
        $("#IDProjekcija").val(IDProjekcija);
        $("#IDSala").val(IDSala);
        $("#IDFilm").val(IDFilm);
        $("#Datum").val(Datum);
        $("#Vreme").val(Vreme);
    });
    
    $("#deo-tabela").on('click', ".update-row-projekcija", function(event){
        event.preventDefault();
        var href = $("#for_edit").val();
        href = href+"/projekcija";
        
        var IDProjekcija = $("#IDProjekcija").val();
        var IDSala = $("#IDSala").val();
        var IDFilm = $("#IDFilm").val();
        var Datum = $("#Datum").val();
        var Vreme = $("#Vreme").val();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDProjekcija : IDProjekcija,
                IDSala : IDSala,
                IDFilm : IDFilm,
                Datum : Datum,
                Vreme : Vreme
            },
            success: function(data) {
                $("#edit_modal").modal('hide');
                $("#row-"+rowID+"-IDSala").text(IDSala);
                $("#row-"+rowID+"-IDFilm").text(IDFilm);
                $("#row-"+rowID+"-Datum").text(Datum);
                $("#row-"+rowID+"-Vreme").text(Vreme);
                alert("update success");
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".edit-row-rezervacija", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var _id = "#row-"+id;
        
        rowID = id;
        
        var IDRezervacija = $(_id+"-IDRezervacija").text();
        var IDKorisnik = $(_id+"-IDKorisnik").text();
        var IDProjekcija = $(_id+"-IDProjekcija").text();
        var DatumVreme = $(_id+"-DatumVreme").text();
        var BrojKarata = $(_id+"-BrojKarata").text();
        var Cena = $(_id+"-Cena").text();
        var Status = $(_id+"-Status").text();
        
        $("#edit_modal").modal();
        $("#IDRezervacija").val(IDRezervacija);
        $("#IDKorisnik").val(IDKorisnik);
        $("#IDProjekcija").val(IDProjekcija);
        $("#DatumVreme").val(DatumVreme);
        $("#BrojKarata").val(BrojKarata);
        $("#Cena").val(Cena);
        $("#Status").val(Status);
    });

    $("#deo-tabela").on('click', ".update-row-rezervacija", function(event){
        event.preventDefault();
        var href = $("#for_edit").val();
        href = href+"/rezervacija";
        
        var IDRezervacija = $("#IDRezervacija").val();
        var IDKorisnik = $("#IDKorisnik").val();
        var IDProjekcija = $("#IDProjekcija").val();
        var DatumVreme = $("#DatumVreme").val();
        var BrojKarata = $("#BrojKarata").val();
        var Cena = $("#Cena").val();
        var Status = $("#Status").val();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDRezervacija : IDRezervacija,
                IDKorisnik : IDKorisnik,
                IDProjekcija : IDProjekcija,
                DatumVreme : DatumVreme,
                BrojKarata : BrojKarata,
                Cena : Cena,
                Status : Status
            },
            success: function(data) {
                $("#edit_modal").modal('hide');
                $("#row-"+rowID+"-IDKorisnik").text(IDKorisnik);
                $("#row-"+rowID+"-IDProjekcija").text(IDProjekcija);
                $("#row-"+rowID+"-DatumVreme").text(DatumVreme);
                $("#row-"+rowID+"-BrojKarata").text(BrojKarata);
                $("#row-"+rowID+"-Cena").text(Cena);
                $("#row-"+rowID+"-Status").text(Status);
                alert("update success");
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".edit-row-rezervisanomesto", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var _id = "#row-"+id;
        
        rowID = id;
        
        var IDProjekcija = $(_id+"-IDProjekcija").text();
        var Red = $(_id+"-Red").text();
        var Kolona = $(_id+"-Kolona").text();
        var IDRezervacija = $(_id+"-IDRezervacija").text();
        
        $("#edit_modal").modal();
        $("#IDProjekcija").val(IDProjekcija);
        $("#Red").val(Red);
        $("#Kolona").val(Kolona);
        $("#IDRezervacija").val(IDRezervacija);
    });
 
    $("#deo-tabela").on('click', ".update-row-rezervisanomesto", function(event){
        event.preventDefault();
        var href = $("#for_edit").val();
        href = href+"/rezervisanomesto";
        
        var IDProjekcija = $("#IDProjekcija").val();
        var Red = $("#Red").val();
        var Kolona = $("#Kolona").val();
        var IDRezervacija = $("#IDRezervacija").val();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDProjekcija : IDProjekcija,
                Red : Red,
                Kolona : Kolona,
                IDRezervacija : IDRezervacija
            },
            success: function(data) {
                $("#edit_modal").modal('hide');
                $("#row-"+rowID+"-IDProjekcija").text(IDProjekcija);
                $("#row-"+rowID+"-Red").text(Red);
                $("#row-"+rowID+"-Kolona").text(Kolona);
                $("#row-"+rowID+"-IDRezervacija").text(IDRezervacija);
                alert("update success");
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".edit-row-sala", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var _id = "#row-"+id;
        
        rowID = id;
        
        var IDSala = $(_id+"-IDSala").text();
        var BrojRedova = $(_id+"-BrojRedova").text();
        var BrojKolona = $(_id+"-BrojKolona").text();
        var Cena = $(_id+"-Cena").text();
        
        $("#edit_modal").modal();
        $("#IDSala").val(IDSala);
        $("#BrojRedova").val(BrojRedova);
        $("#BrojKolona").val(BrojKolona);
        $("#Cena").val(Cena);
    });
   
    $("#deo-tabela").on('click', ".update-row-sala", function(event){
        event.preventDefault();
        var href = $("#for_edit").val();
        href = href+"/sala";
        
        var IDSala = $("#IDSala").val();
        var BrojRedova = $("#BrojRedova").val();
        var BrojKolona = $("#BrojKolona").val();
        var Cena = $("#Cena").val();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDSala : IDSala,
                BrojRedova : BrojRedova,
                BrojKolona : BrojKolona,
                Cena : Cena
            },
            success: function(data) {
                $("#edit_modal").modal('hide');
                $("#row-"+rowID+"-BrojRedova").text(BrojRedova);
                $("#row-"+rowID+"-BrojKolona").text(BrojKolona);
                $("#row-"+rowID+"-Cena").text(Cena);
                alert("update success");
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
});
