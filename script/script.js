jQuery(document).ready(function(){

   $("#formularz").submit(function(e){
       e.preventDefault();
       var imputs = $(this).serialize()
       $.post("../script/wpisz_kg.php", imputs, function(){
          $('.content2').load('../script/odswiez.php');
            swal("Dziękujemy za wpis do księgi gości!", "Twój wpis oczekuje teraz na akceptację przez administratora", "success");
       });
   });
});

