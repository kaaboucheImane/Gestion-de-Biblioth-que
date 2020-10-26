 $(document).ready(function(){
   $('#search').keyup(function(){
                
                var search=$(this).val();
                search=$.trim(search);
                if (search!=="") {
                $('#res_search_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').show();
                $.post('../admin/livre/paginator_livre_search.php',{search:search},function(data){
                   $('#res_search_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').hide();
                   $('#res_search_livre').html(data);

                   
                });
               }else{
                $('#res_search_livre').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').show();
                 $.post('../admin/livre/paginator_livre.php',function(data){
                  $('#res_search_loading').html('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width=100em />').hide();
                   $('#res_search_livre').html(data);


                   
                });
                 
               }
              });

 });