$(function() {
    $(".delete").click(function(){
        var id = $(this).attr("name");
        var div = $("div[id="+id+"]");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){ 
                if (xhttp.responseText == 1) {
                    $("[id="+id+"]").remove();
                } else {
                    alert("Algo fallo!");
                }
            }
        }
        
        var direccion = "http://localhost:3000/movie/delete/"+id;
        xhttp.open("GET", direccion, true);
        xhttp.send();
        
    });
});

