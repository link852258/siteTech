$(document).ready(()=>{
    $('#btnSoumettreDepartement').show();
    $('#btnValiderDepartement').hide();
    $('#btnAnnulerDepartement').hide();

    $("#frmAjouterTechnicienneDep").submit(function(e){
        e.preventDefault();
        var hdnID = $('#hdnIDDep').val();
        var IDTech = $("#slcTechnicienne").val();
        var IDPriorite = $("#slcPriorite").val();
        var ordre = $("#nbrOrdre").val();
        $.ajax({
            type: 'POST',
            data: { 
                methode: "Ajout",
                hdnID: hdnID,
                IDTech: IDTech,
                IDPriorite: IDPriorite,
                ordre: ordre
            },
            success: function(data){
                $("#mainCol").html(data);
                $('#mdlAjoutTechDep').modal('hide');
            },
            error: function(){
                alert("error")
            }
        });
    });

    $("#mainCol").on('click', ".btn-danger", function(){
        var ID = $(this).val();
        $.ajax({
            type: 'POST',
            data: { 
                methode: "Supprimer", 
                ID: ID
            },
            success: function(data){
                $("#mainCol").html(data);
            },
            error: function(){
                alert("error")
            }
        });
    });

    $("#mainCol").on('click', ".btn-primary", function(){
        var ID = $(this).val();
        $.ajax({
            type: 'POST',
            data: { 
                methode: "Modifier",
                ID: ID
            },
            dataType: "json",
            success: function(data){
                $("#hdnIDPrincipal").val(data['ID']);
                $("#hdnIDDep").val(data['IDDep']);
                $("#slcTechnicienne").val(data['IDTech']);
                $("#slcPriorite").val(data['IDPri']);
                $("#nbrOrdre").val(data['ordre']);
            },
            error: function(err){
                alert(err+"allo");
            }
        });
        $('#btnSoumettreDepartement').hide();
        $('#btnValiderDepartement').show();
        $('#btnAnnulerDepartement').show();
    });

    $("#btnValiderDepartement").click(function(){
        var ID = $("#hdnIDPrincipal").val();
        var hdnID = $('#hdnIDDep').val();
        var IDTech = $("#slcTechnicienne").val();
        var IDPriorite = $("#slcPriorite").val();
        var ordre = $("#nbrOrdre").val();
        $.ajax({
            type: 'POST',
            data: { 
                methode: "Valider",
                ID: ID,
                hdnID: hdnID,
                IDTech: IDTech,
                IDPriorite: IDPriorite,
                ordre: ordre
            },
            success: function(data){
                $("#mainCol").html(data);
                $("#hdnIDPrincipal").val("");
                $("#slcTechnicienne").val(1);
                $("#slcPriorite").val(1);
                $("#nbrOrdre").val(1);
                $('#mdlAjoutTechDep').modal('hide');
            },
            error: function(){
                alert("error")
            }
        });
    });

    $("#btnAnnulerDepartement").click(function(){
        $("#hdnIDPrincipal").val("");
        $("#slcTechnicienne").val(1);
        $("#slcPriorite").val(1);
        $("#nbrOrdre").val(1);
        $('#btnSoumettreDepartement').show();
        $('#btnValiderDepartement').hide();
        $('#btnAnnulerDepartement').hide();
        $('#mdlAjoutTechDep').modal('hide');
    });

    $('#mdlAjoutTechDep').on('hidden.bs.modal', function (e) {
        $('#btnSoumettreDepartement').show();
        $('#btnValiderDepartement').hide();
        $('#btnAnnulerDepartement').hide();
    });

});