$(document).ready(function(){
    
    $("#insert-button").click(function(event){
        event.preventDefault();
        $("#insert_modal").modal();
    });
    
    $("#deo-tabela").on('click', "#poster_upload", function(event){
        event.preventDefault();
        $(this).parent().find('input[type=file]').click();
    });
    
    $("#deo-tabela").on('change', "#poster_insert", function(event){
        event.preventDefault();
        $(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());
    });
    
    $("#deo-tabela").on('change', "#Poster", function(event){
        event.preventDefault();
        $(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());
    });
    
    $("#deo-tabela").on('click', "#slika_upload", function(event){
        event.preventDefault();
        $(this).parent().find('input[type=file]').click();
    });
    
    $("#deo-tabela").on('change', "#slika_insert", function(event){
        event.preventDefault();
        $(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());
    });
    
    $("#deo-tabela").on('change', "#Slika", function(event){
        event.preventDefault();
        $(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());
    });
    
    $("#Username_register").blur(function(event) {
//        event.preventDefault();
        var un = $(this).val();
        var href = $(this).attr('href');
        var ovaj = $(this);
        $.ajax({
           type:"POST",
           url: href,
           data: { Username : un},
           success: function(data){
                if(data == "red") {
                    $("#Username_register_div").addClass("has-error");
                    $("#Username_register_div").removeClass("has-success");
                } 
                if(data == "green") {
                    $("#Username_register_div").addClass("has-success");
                    $("#Username_register_div").removeClass("has-error");
                }
           },
           error: function (xhr, ajaxOptions, thrownError){
                // error, alert
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
   
    $("#dugme_komentar").click(function(event){
        event.preventDefault();
        var idfilm = $("#id_film").val();
        var text = $("#komentar").val();
        var url = $("#id_url").val();
        $.ajax({
           type: "POST",
           url: url,
           data: {film : idfilm, komentar: text },
           success: function(data, status){
               $("#komentari").prepend(data).hide().fadeIn('slow');
               $("#komentar").val("");
           },
           error: function (xhr, ajaxOptions, thrownError){
                // error, alert
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#komentari").on('click', ".delete_row_class", function(event){
        event.preventDefault();
        var idKom = $(this).attr('id');
        var url = $(this).attr('href');
        var hr = $("#hr-"+idKom);
        var row = $("#row-"+idKom);
        $.ajax({
           type: "POST",
           url: url,
           data: {komentar : idKom},
           success: function(data){
                hr.remove();
                row.remove();
           },
           error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $(".grade-film").click(function(event) {
        event.preventDefault();
        var ocena = $("#ocena").val();
        var href = $(this).attr('href');
        $.ajax({
           type: "GET",
           url: href,
           data: {ocena: ocena},
           success: function(data){
               for(var k=0; k<data; k++){
                   $("#grade-"+k).removeClass("negative-rate");
                   $("#grade-"+k).addClass("positiv-rate");
               }
               for(var k=data; k<10; k++){
                   $("#grade-"+k).removeClass("positiv-rate");
                   $("#grade-"+k).addClass("negative-rate");
               }
           },
           error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#pretraga").keyup(function(event){
        event.preventDefault();
        var href = $(this).attr("href");
        var str = $(this).val();
        $.ajax({
           type: "GET",
           url: href,
           data: {
               search: str
           },
           success: function(data) {
               $('#hints').empty();
               $('#hints').html(data);
           },
           error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
    $("#select_tabela").change(function(event){
        event.preventDefault();
        var option = $(this).val();
        var href = $(this).attr("href");
        $.ajax({
           type: "POST",
           url: href,
           data: {
               option: option
           },
           success: function(data) {
               $('#deo-tabela').html(data);
           },
           error: function (xhr, ajaxOptions, thrownError){
                alert(thrownError+" ;; "+ajaxOptions+" ;; "+xhr);
            }
        });
    });
    
});