$(function() {
    $(".delete").click(function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            alert(this.status);
            if(this.readyState == 4 && this.status == 200){
                alert("hola");
            }
        }
        var id = $(this).attr("id");
        var direccion = "localhost:3000/movie/delete/"+id;
        xhttp.open("GET", direccion, true);
        xhttp.send();
        

    });
});

