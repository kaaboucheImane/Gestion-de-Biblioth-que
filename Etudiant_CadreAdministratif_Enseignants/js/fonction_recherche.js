 $(document).ready(function(){
   $('#search').keyup(function(){
                
                var search=$(this).val();
                search=$.trim(search);
                if (search=="") {$('#resultat ul').hide();}
                if (search!=="") {
                 $('#resultat ul').show();
                $.post('resultat_du_recherche.php',{search:search},function(data){

                   $('#resultat ul').html(data);

                   
                });
               }
              });
 });