jQuery(document).ready(function(){

   $("#formularz").submit(function(e){
       e.preventDefault();
       var imputs = $(this).serialize()
       $.post("../script/wpisz_kg.php", imputs, function(){
          $('.content2').load('../script/odswiez.php');
       });
   });
       /*
       $("#idwyslij").click(function(e){
           e.preventDefault();
           var inputs=$('#formularz').serialize();
           $.ajax({
              tupe: "POST",
               url: "wpisz_kg.php",
               success: function(){
                   $('.content2').load('odswiez.php');
               }
           });*/

});
