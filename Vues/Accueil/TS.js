$(document).ready(()=>{
    $('#btnSoumettreTS').show();
    $('#btnValiderTS').hide();
    $('#btnAnnulerTS').hide();

    $('.slcPriorite').change(function(){
        var auDessousDeOui = false;
        var tests = $('.slcPriorite');
        
        for(i in tests){
            if(auDessousDeOui){
                tests[i].value = 2;
            }
            if($(this).val() == 4 && tests[i].value == 4){
                auDessousDeOui = true
            }
        }
    });


    function obtenirListe(){
        var liste = [];
        var reponses = $('.slcPriorite').map(function(){
            return $(this).val();
        }).toArray();
        var TS = $('.hdnID').map(function(){
            return $(this).val();
        }).toArray();
        var priorites = $('.hdnIDPri').map(function(){
            return $(this).val();
        }).toArray();
        for(i in reponses){
            var techTS = {"ID":0,"reponse":0,"priorite":0};
            techTS.ID = TS[i];
            techTS.reponse = reponses[i];
            techTS.priorite = priorites[i];
            liste.push(techTS);
        }
        return liste;
    }

    $("#frmAjouterTS").submit(function(e){
        e.preventDefault();
        var liste = obtenirListe();
        var date = $('#dteDate').val();
        var poste = $('#slcPoste').val();

        $.ajax({
            type: 'POST',
            data: { 
                methode: "Ajout",
                liste: liste,
                date: date,
                poste: poste

            },
            success: function(){
                $(".slcPriorite").val(1);
                $('#mdlAjoutTS').modal('hide');
                window.location.reload();
            },
            error: function(err){
                alert(err)
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
        $('#btnSoumettreTS').hide();
        $('#btnValiderTS').show();
        $('#btnAnnulerTS').show();
    });

    $("#btnValiderTS").click(function(){
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
                $('#mdlAjoutTS').modal('hide');
            },
            error: function(){
                alert("error")
            }
        });
    });



    $("#btnSupprimerTS").click(function(){
        var IDTS = $("#btnSupprimerTS").val();
        var hdnIDDepartement = $('#hdnIDDep').val();
        $.ajax({
            type: 'POST',
            data: { 
                methode: "Supprimer",
                IDTS: IDTS,
                hdnID: hdnIDDepartement
            },
            success: function(data){
                window.location.reload();
            },
            error: function(){
                alert("error")
            }
        });
    });

    $("#btnAnnulerTS").click(function(){
        $("#hdnIDPrincipal").val("");
        $("#slcTechnicienne").val(1);
        $("#nbrOrdre").val(1);
        $('#btnSoumettreTS').show();
        $('#btnValiderTS').hide();
        $('#btnAnnulerTS').hide();
        $('#mdlAjoutTS').modal('hide');
    });

    $('#mdlAjoutTS').on('hidden.bs.modal', function (e) {
        $(".slcPriorite").val(1);
        $('#btnSoumettreTS').show();
        $('#btnValiderTS').hide();
        $('#btnAnnulerTS').hide();
    });

});