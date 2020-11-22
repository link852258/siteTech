$(document).ready(()=>{
    $("#btnDeco").click(function(){
        $.ajax({
            type: 'POST',
            data: { 
                methode: "Deco"
            },
            success: function(data){
                window.location.href = '/'
            }
        });
    });
});