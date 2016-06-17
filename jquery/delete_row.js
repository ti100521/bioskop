$(document).ready(function(){
    
    $("#deo-tabela").on('click', ".delete-row-moderator", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/moderator";
        var _id = "#row-"+id;
        
        var IDModerator = $(_id+"-IDModerator").text();
        var IDAdmin = $(_id+"-IDAdmin").text();
        var Username = $(_id+"-Username").text();
        var Password = $(_id+"-Password").text();
        var Email = $(_id+"-Email").text();
        var Privilegija = $(_id+"-Privilegija").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDModerator : IDModerator
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".delete-row-komentar", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/komentar";
        
        var _id = "#row-"+id;
        
        var IDKomentar = $(_id+"-IDKomentar").text();
        var IDFilm = $(_id+"-IDFilm").text();
        var IDKorisnik = $(_id+"-IDKorisnik").text();
        var DatumVreme = $(_id+"-DatumVreme").text();
        var Text = $(_id+"-Text").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDKomentar : IDKomentar
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".delete-row-film", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/film";
        
        var _id = "#row-"+id;
        
        var IDFilm = $(_id+"-IDFilm").text();
        var Poreklo = $(_id+"-Poreklo").text();
        var Zanr = $(_id+"-Zanr").text();
        var Naziv = $(_id+"-Naziv").text();
        var OriginalNaziv = $(_id+"-OriginalNaziv").text();
        var Reziser = $(_id+"-Reziser").text();
        var Duzina = $(_id+"-Duzina").text();
        var Poster = $(_id+"-Poster").text();
        var Opis = $(_id+"-Opis").text();
        var Link = $(_id+"-Link").text();
        var PocetakPrikazivanja = $(_id+"-PocetakPrikazivanja").text();
        var Status = $(_id+"-Status").text();
        var Ocena = $(_id+"-Ocena").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDFilm : IDFilm
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".delete-row-korisnik", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/korisnik";
        var _id = "#row-"+id;
        
        var IDKorisnik = $(_id+"-IDKorisnik").text();
        var Username = $(_id+"-Username").text();
        var Password = $(_id+"-Password").text();
        var Email = $(_id+"-Email").text();
        var Slika = $(_id+"-Slika").text();
        var SlikaIme = $(_id+"-SlikaIme").text();
        var ZeliObavestenja = $(_id+"-ZeliObavestenja").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDKorisnik : IDKorisnik
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".delete-row-ocena", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/ocena";
        var _id = "#row-"+id;
        
        var IDFilm = $(_id+"-IDFilm").text();
        var IDKorisnik = $(_id+"-IDKorisnik").text();
        var Ocena = $(_id+"-Ocena").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDKorisnik : IDKorisnik,
                IDFilm : IDFilm
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".delete-row-projekcija", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/projekcija";
        var _id = "#row-"+id;
        
        var IDProjekcija = $(_id+"-IDProjekcija").text();
        var IDFilm = $(_id+"-IDFilm").text();
        var IDSala = $(_id+"-IDSala").text();
        var Datum = $(_id+"-Datum").text();
        var Vreme = $(_id+"-Vreme").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDProjekcija : IDProjekcija
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".delete-row-rezervacija", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/rezervacija";
        var _id = "#row-"+id;
        
        var IDRezervacija = $(_id+"-IDRezervacija").text();
        var IDKorisnik = $(_id+"-IDKorisnik").text();
        var IDProjekcija = $(_id+"-IDProjekcija").text();
        var DatumVreme = $(_id+"-DatumVreme").text();
        var BrojKarata = $(_id+"-BrojKarata").text();
        var Cena = $(_id+"-Cena").text();
        var Status = $(_id+"-Status").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDRezervacija : IDRezervacija
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
   
    $("#deo-tabela").on('click', ".delete-row-rezervisanomesto", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/rezervisanomesto";
        var _id = "#row-"+id;
        
        var IDProjekcija = $(_id+"-IDProjekcija").text();
        var Red = $(_id+"-Red").text();
        var Kolona = $(_id+"-Kolona").text();
        var IDRezervacija = $(_id+"-IDRezervacija").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDProjekcija : IDProjekcija,
                Red : Red,
                Kolona : Kolona
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#deo-tabela").on('click', ".delete-row-sala", function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var row = $("#row-"+id);
        var href = $("#for_delete").val();
        href = href+"/sala";
        var _id = "#row-"+id;
        
        var IDSala = $(_id+"-IDSala").text();
        var BrojRedova = $(_id+"-BrojRedova").text();
        var BrojKolona = $(_id+"-BrojKolona").text();
        var Cena = $(_id+"-Cena").text();
        
        $.ajax({
            type: "POST",
            url: href,
            data: {
                IDSala : IDSala
            },
            success: function(data) {
                row.remove();
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
});