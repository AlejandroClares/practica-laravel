$(function() {
    $(".delete").click(function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                if (xhttp.responseText == 1) {
                    alert("funciono!" + xhttp.responseText)
                } else {
                    alert("nO FUNCIONO " + xhttp.responseText)
                }
            }
        }
        var id = $(this).attr("id");
        var direccion = "http://localhost:3000/movie/delete/"+id;
        //alert("Direccion: " + direccion);
        
        xhttp.open("GET", direccion, true);
        xhttp.send();
        
    });
});

