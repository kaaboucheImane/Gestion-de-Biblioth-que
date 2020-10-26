  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      var res_nom=false;
      var res_prenom=false;
      var res_codemassar=false;
      var res_cin=false;
     
     
      $("#nom").focusout(function(){
        check_nom();
      })
      $("#prenom").focusout(function(){
        check_prenom();
      })
     
      $("#code_massar").focusout(function(){
        check_codemassar();
      })
      $("#cin").focusout(function(){
        check_cin();
      })

      function check_cin(){
        var letters = /^[a-zA-Z0-9]+$/;
        var cin=$("#cin").val();
        if(cin == ''){
             $("#cin").css("border-color","red");
             $("#res_cin").html(" entrer votre cin !").css("color","red");
             $("#res_cin").show();
             res_cin=false;
        }else if(letters.test(cin) && cin !== ''){
            $("#res_cin").hide();
            $("#cin").css("border-color","green");
            res_cin=true;
        }else{
            $("#cin").css("border-color","red");
            $("#res_cin").html("Votre cin n'est pas valide !").css("color","red");
            $("#res_cin").show();
            
            res_cin=false;
        }
      }
      function check_codemassar(){
        var letters = /^[a-zA-Z0-9]+$/;
        var code=$("#code_massar").val();
        if(code == ''){
             $("#code_massar").css("border-color","red");
             $("#res_codemassar").html(" entrer votre code !").css("color","red");
             $("#res_codemassar").show();
            res_codemassar=false;
        }else if(letters.test(code) && code !== ''){
            $("#res_codemassar").hide();
            $("#code_massar").css("border-color","green");
            res_codemassar=true;
        }else{
            $("#code_massar").css("border-color","red");
            $("#res_codemassar").html("Votre code n'est pas valide !").css("color","red");
            $("#res_codemassar").show();
            
            res_codemassar=false;
        }
      }
     
      function check_nom(){
        var re = /^[a-zA-Z]+$/;
        var n= $("#nom").val();
        var nom=n.replace(/ /g,'');
        if(nom == ''){
            $("#nom").css("border-color","red");
            $("#res_nom").html(" entrer votre nom !").css("color","red");
            $("#res_nom").show();
            res_nom=false;
        }else if(re.test(nom) && nom !== ''){
            $("#res_nom").hide();
            $("#nom").css("border-color","green");
            res_nom=true;
        }else{
            $("#nom").css("border-color","red");
            $("#res_nom").html("Votre nom n'est pas valide !").css("color","red");
            $("#res_nom").show();
            
            res_nom=false;
        }
      }
      function check_prenom(){
        var re = /^[a-zA-Z]+$/;
        var p= $("#prenom").val();
        var prenom=p.replace(/ /g,'')
        if(prenom == ''){
            $("#prenom").css("border-color","red");
            $("#res_prenom").html(" entrer votre prénom !").css("color","red");
            $("#res_prenom").show();
            res_prenom=false;
        }else if(re.test(prenom) && prenom !== " "){
            $("#res_prenom").hide();
            $("#prenom").css("border-color","green");
            res_prenom=true;
        }else{
            $("#prenom").css("border-color","red");
            $("#res_prenom").html("Votre prénom n'est pas valide !").css("color","red");
            $("#res_prenom").show();
            
            res_prenom=false;
        }
      }
    

     $("#btnAjouter").on('click',function(event){
          res_nom=false;
          res_prenom=false;
         
          res_codemassar=false;
          res_cin=false;
         
          check_nom();
          check_prenom();
          
          check_codemassar();
          check_cin();
    
      var nom=$("#nom").val();
      var prenom=$("#prenom").val();
      var code_massar=$("#code_massar").val();
      
      var cin=$("#cin").val();
      
  if( res_nom !== false && res_prenom !== false  && res_codemassar !== false && res_cin !== false  ){
     swal({
       title: "Êtes-vous sûr d'ajouter cet étudiant?",
       icon: "warning",
       buttons:["No", "Oui"],
       
     })
     .then((willDelete) => {
       if (willDelete) {
         swal("Cet étudiant est bien ajouté", {
           icon: "success",
          
         });

         $("#res_modifier").load("../admin/etudiant_gestion/fonction_ajouter_etudiant.php",{prenom:prenom,code_massar:code_massar,cin:cin,nom:nom});
         
        

       }else {
         swal("Cet étudiant n'est pas ajouté");
       }
     })
       
       event.preventDefault();
   }else{
    
            
            
            return false;
   }

    })
  })
</script>
 <script type="text/javascript">
    $(document).ready(function(){
      $("#ici").click(function(event){
        $("#res_res").load("../admin/etudiant_gestion/paginator_etudiants.php");
        })
    })
</script>

<div id="res_modifier"></div>
        <div id="res_res"></div>
        <button id="ici" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-arrow-left"></span> Retour
        </button>
<div id="res_ajout_etd">
	<br><br>
	     <div class="col-md-3"></div>
         <div class="container login-container">
            <div class="row">
                
                <div class="col-md-6 login1" >
                    <form  method="post" id="form_modifier_livre">
                        <div class="form-group">
                        	<label>Nom :</label>
                            <input type="text" class="form-control"    id="nom"  />
                            <span id="res_nom"></span>
                        </div>
                        <div class="form-group">
                        	<label>Prénom :</label>
                            <input type="text" class="form-control"    id="prenom"  />
                            <span id="res_prenom"></span>
                        </div>
                        <div class="form-group">
                        	<label>Code de Massar :</label>
                            <input type="text" class="form-control"  id="code_massar"  />
                            <span id="res_codemassar"></span>
                            
                        </div>
                        <div class="form-group">
                        	<label>CIN :</label>
                            <input type="text" class="form-control"  id="cin"  />
                            <span id="res_cin"></span>
                        </div>
                        
                        <div class="form-group" style="height: 2.7em;">
                            <input type="submit" button  class="btn btn-primary btn-md" value="Ajouter" id="btnAjouter" />
                        </div> 
                    </form>    
                    
                </div>
                
             
            </div>
        </div>

 
</div>


<style type="text/css">

             
            .login-container{
                
               margin-top: -5%;
               margin-bottom: 5%;
   
            }
            .login1{
                padding: 5%;
                height: auto;
                box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            }
            
            .login2{
                padding: 5%;
                height: 31.5em;
                box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            }

            .login-container form{
               
            }
           
            
            .login2 {
                color: #0062cc;
                font-weight: 600;
                text-decoration: none;
            }            
            .login1 {
                color: #0062cc;
                font-weight: 600;
                text-decoration: none;
            }

</style>
