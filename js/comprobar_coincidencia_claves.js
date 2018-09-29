$(document).ready(function () {
  $("#pass2").keyup(function () {
    var pass1 = $("#pass1").val();
    var pass2 = $("#pass2").val();
    if (pass1 == "" || pass2 == "") {
      $("#msg").text("¡No se pueden dejar los campos vacíos!").css("color", "red");
    } else if (pass1.length < 8 || pass2.length < 8) {
      $("#msg").text("Su clave debe tener mínimo 8 caracteres").css("color", "red");
    } else if (pass1 == pass2) {
      $("#msg").text("¡Coindicen!").css("color", "green");
    } else {
      $("#msg").text("No coinciden...").css("color", "red");
    }
  });
});