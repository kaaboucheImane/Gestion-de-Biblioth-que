 $(document).ready(function(){
   $('#s').keyup(function(){
                
                var s=$(this).val();
                s=$.trim(s);
                if (s!=="") {
                $('#res_search_livre_first_page_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').show();
                $.post('../admin/livres_reserve_etape1/paginator_livre_search_first_page.php',{s:s},function(data){
                  $('#res_search_livre_first_page_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').hide();
                   $('#res_search_livre_first_page').html(data);

                   
                });
               }else{
                $('#res_search_livre_first_page_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').show();
                 $.post('../Etudiant_CadreAdministratif_Enseignants/paginator_reservation_livre.php',function(data){
                  $('#res_search_livre_first_page_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').hide();
                   $('#res_search_livre_first_page').html(data);


                   
                });
               }
              });
 });
