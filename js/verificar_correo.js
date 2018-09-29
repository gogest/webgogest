$(function(){
    $("#enviar").click(function(){
        var url = "includes/verificar.php"; //Comprueba los datos extraidos de SQL
        $.ajax({
            type: "POST",
            url: url,
            data: $("#formRestablecerClaves").serialize(),
            success: function(data){
                $("#resultado").html(data)}
            });
            return false;
        });     
    });