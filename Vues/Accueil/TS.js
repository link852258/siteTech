$(document).ready(()=>{
    $('#btnSoumettre').show();
    $('#btnValider').hide();
    $('#btnAnnuler').hide();

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

        $.ajax({
            type: 'POST',
            data: { 
                methode: "Ajout",
                liste: liste,
                date: date

            },
            success: function(data){
                $(".slcPriorite").val(1);
                $("#main").html(data);
                $('#mdlAjoutTS').modal('hide');

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
        $('#btnSoumettre').hide();
        $('#btnValider').show();
        $('#btnAnnuler').show();
    });

    $("#btnValider").click(function(){
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

    $("#btnAnnuler").click(function(){
        $("#hdnIDPrincipal").val("");
        $("#slcTechnicienne").val(1);
        $("#nbrOrdre").val(1);
        $('#btnSoumettre').show();
        $('#btnValider').hide();
        $('#btnAnnuler').hide();
        $('#mdlAjoutTS').modal('hide');
    });

    $('#mdlAjoutTS').on('hidden.bs.modal', function (e) {
        $(".slcPriorite").val(1);
        $('#btnSoumettre').show();
        $('#btnValider').hide();
        $('#btnAnnuler').hide();
    });

});