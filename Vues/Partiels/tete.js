$(document).ready(()=>{
    $("#frmAjouterTechnicienne").submit(function(e){
        e.preventDefault();
        var matricule = $("#nbrMatricule").val();
        var prenom = $("#txtPrenom").val();
        var nom = $("#txtNom").val();
        var anciennete = $("#nbrAnciennete").val();
        var telephone = $("#txtTel").val();
        $.ajax({
            url: 'technicienne.php',
            type: 'POST',
            data: { 
                methode: "Ajout",
                matricule: matricule,
                prenom: prenom,
                nom: nom,
                anciennete: anciennete,
                telephone: telephone
            },
            success: function(data){
                $("#hdnID").val("");
                $("#nbrMatricule").val("");
                $("#txtPrenom").val("");
                $("#txtNom").val("");
                $("#nbrAnciennete").val("");
                $("#txtTel").val("");
                $("#tableTech").html(data);
                $('#mdlAjoutTech').modal('hide');
            },
            error: function(){
                alert("error")
            }
        });
    });

});