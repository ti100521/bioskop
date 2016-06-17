
// Izberi mesto za rezervaciju
function changeImage(id, i, j) {
    var sediste = document.getElementById(id);
    if(sediste.classList.contains("rezervisano_sediste")){ return; }
    if(sediste.classList.contains("neaktivno_sediste")) {
        sediste.classList.remove("neaktivno_sediste");
        sediste.classList.add("aktivno_sediste");
        //--------------------------------------------
        var karte = document.getElementById("brojKarata2");
        karte.innerHTML = Number(karte.innerHTML) + 1;
        document.getElementById("brojKarata1").value = Number(karte.innerHTML);
        var cena_karte = document.getElementById("cena1");
        var cena = document.getElementById("cena2");
        cena.innerHTML = Number(cena.innerHTML) + Number(cena_karte.value);
        
        var mesta = document.getElementById("mesta2");
        mesta.innerHTML = mesta.innerHTML + " ("+i+","+j+") ";
        document.getElementById("mesta1").value = document.getElementById("mesta1").value + " ("+i+","+j+") ";
    } else {
        sediste.classList.remove("aktivno_sediste");
        sediste.classList.add("neaktivno_sediste");
        //----------------------------------------------
        var karte = document.getElementById("brojKarata2");
        karte.innerHTML = Number(karte.innerHTML) - 1;
        document.getElementById("brojKarata1").value = Number(karte.innerHTML);
        var cena_karte = document.getElementById("cena1");
        var cena = document.getElementById("cena2");
        cena.innerHTML = Number(cena.innerHTML) - Number(cena_karte.value);
        
        var part = " ("+i+","+j+") ";
        var mesta2 = document.getElementById("mesta2");
        var str = mesta2.innerHTML;
        var ptr = str.indexOf(part);
        str = str.substr(0, ptr) + str.substring(ptr+part.length);
        mesta2.innerHTML = str;
        
        document.getElementById("mesta1").value = str;
    }
}

// Oceni film
function rateFilm(cnt) {
    for(var i=1; i<=10; i++){
        if(i <= cnt)
            document.getElementById(i).style.color = 'gold';
        else
            document.getElementById(i).style.color = 'gray';
    }
    var hidden = document.getElementById("ocena");
    hidden.value=cnt;
}