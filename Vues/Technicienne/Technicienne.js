$(document).ready(()=>{
    $('#btnSoumettre').show();
    $('#btnValider').hide();
    $('#btnAnnuler').hide();

    $("#frmAjouterTechnicienne").submit(function(e){
        e.preventDefault();
        var matricule = $("#nbrMatricule").val();
        var prenom = $("#txtPrenom").val();
        var nom = $("#txtNom").val();
        var dateEmbauche = $("#dteEmbauche").val();
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
                dateEmbauche: dateEmbauche,
                anciennete: anciennete,
                telephone: telephone
            },
            success: function(data){
                $("#hdnID").val("");
                $("#nbrMatricule").val("");
                $("#txtPrenom").val("");
                $("#txtNom").val("");
                $("#dteEmbauche").val("");
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

    $("#tableTech").on('click', ".btn-danger", function(){
        var matricule = $(this).val();
        $.ajax({
            url: 'technicienne.php',
            type: 'POST',
            data: { 
                methode: "Supprimer", 
                matricule: matricule
            },
            success: function(data){
                $("#tableTech").html(data);
            },
            error: function(){
                alert("error")
            }
        });
    });

    $("#tableTech").on('click', ".btn-primary", function(){
        var ID = $(this).val();
        $.ajax({
            url: 'technicienne.php',
            type: 'POST',
            data: { 
                methode: "Modifier",
                ID: ID
            },
            dataType: "json",
            success: function(data){
                $("#hdnID").val(data['ID']);
                $("#nbrMatricule").val(data['matricule']);
                $("#txtPrenom").val(data['prenom']);
                $("#txtNom").val(data['nom']);
                $("#dteEmbauche").val(data['DATEEMBAUCHE']);
                $("#nbrAnciennete").val(data['anciennete']);
                $("#txtTel").val(data['tel']);
            },
            error: function(){
                alert("error")
            }
        });
        $('#btnSoumettre').hide();
        $('#btnValider').show();
        $('#btnAnnuler').show();
    });

    $("#btnValider").click(function(){
        var ID = $("#hdnID").val();
        var matricule = $("#nbrMatricule").val();
        var prenom = $("#txtPrenom").val();
        var nom = $("#txtNom").val();
        var dateEmbauche = $("#dteEmbauche").val();
        var anciennete = $("#nbrAnciennete").val();
        var telephone = $("#txtTel").val();
        $.ajax({
            url: 'technicienne.php',
            type: 'POST',
            data: { 
                methode: "Valider",
                ID: ID,
                matricule: matricule,
                prenom: prenom,
                nom: nom,
                dateEmbauche: dateEmbauche,
                anciennete: anciennete,
                telephone: telephone
            },
            success: function(data){
                $("#tableTech").html(data);
                $("#hdnID").val("");
                $("#nbrMatricule").val("");
                $("#txtPrenom").val("");
                $("#txtNom").val("");
                $("#dteEmbauche").val("");
                $("#nbrAnciennete").val("");
                $("#txtTel").val("");
                $('#mdlAjoutTech').modal('hide');
            },
            error: function(){
                alert("error")
            }
        });
    });

    $("#btnAnnuler").click(function(){
        $("#hdnID").val("");
        $("#nbrMatricule").val("");
        $("#txtPrenom").val("");
        $("#txtNom").val("");
        $("#dteEmbauche").val("");
        $("#nbrAnciennete").val("");
        $("#txtTel").val("");
        $('#btnSoumettre').show();
        $('#btnValider').hide();
        $('#btnAnnuler').hide();
        $('#mdlAjoutTech').modal('hide');
    });

    $('#mdlAjoutTech').on('hidden.bs.modal', function (e) {
        $('#btnSoumettre').show();
        $('#btnValider').hide();
        $('#btnAnnuler').hide();
    });

});