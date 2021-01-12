$(document).ready(()=>{
    $("#frmRechercher").submit((e)=>{
        pagination(e)
    });
});

function pagination(e){
    e.preventDefault();
    var dateDebut = $("#dteDebut").val();
    var dateFin = $("#dteFin").val();
    var IDDepartement = $("#slcDepartement").val();
    $.ajax({
        url: 'recherche.php',
        type: 'POST',
        data: { 
            methode: "Recherche",
            dateDebut: dateDebut,
            dateFin: dateFin,
            IDDepartement: IDDepartement
        },
        success: function(succ){
            if(succ == 0)
                window.location = "recherche.php";
            else
                window.location = "recherche.php?page=1";

        },
        error: function(err){
            alert(err)
        }
    });
}