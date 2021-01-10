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
            window.location.reload();
        },
        error: function(err){
            alert(err)
        }
    });
}