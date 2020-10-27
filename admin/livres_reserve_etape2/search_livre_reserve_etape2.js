 $(document).ready(function(){
   $('#s').keyup(function(){
                
                var s=$(this).val();
                s=$.trim(s);
                if (s!=="") {
                $('#res_livre_search_reserve_etape2_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').show();
                $.post('../admin/livres_reserve_etape2/paginator_livre_search_reserve_etape2.php',{s:s},function(data){
                   $('#res_livre_search_reserve_etape2_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').hide();
                   $('#res_search_livre_reserve_etape2').html(data);

                   
                });
               }else{
                $('#res_livre_search_reserve_etape2_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').show();
                 $.post('../admin/livres_reserve_etape2/paginator_reservation_livre_eatpe2.php',function(data){
                   $('#res_livre_search_reserve_etape2_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').hide();
                   $('#res_search_livre_reserve_etape2').html(data);


                   
                });
               }
              });
 });