$(document).ready(()=>{
    $("#frmConnexion").submit(function(e){
        e.preventDefault();
        var nomUtilisateur = $("#txtNomUtilisateur").val();
        var MDP = $("#psdMDP").val();
        $.ajax({
            type: 'POST',
            data: { 
                nomUtilisateur: nomUtilisateur,
                MDP: MDP
            },
            success: function(data){
                window.location.href = 'nutrition.php'
            },
            error: function(){
                alert("error")
            }
        });
    });
});