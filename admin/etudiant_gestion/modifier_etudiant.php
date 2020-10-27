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
    








     $("#btnModifier").on('click',function(event){
          res_nom=false;
          res_prenom=false;
         
          res_codemassar=false;
          res_cin=false;
         
          check_nom();
          check_prenom();
          
          check_codemassar();
          check_cin();
          
      var id=$(this).attr("data-id");
      var nom=$("#nom").val();
      var prenom=$("#prenom").val();
      var code_massar=$("#code_massar").val();
      
      var email=$("#email").val();
      var cin=$("#cin").val();
      

 if( res_nom !== false && res_prenom !== false  && res_codemassar !== false && res_cin !== false  ){

     swal({
       title: "Êtes-vous sûr de Modifier cet étudiant?",
       icon: "warning",
       buttons:["No", "Oui"],
       
     })
     .then((willDelete) => {
       if (willDelete) {
         swal("Cet étudiant est bien  modifié ", {
           icon: "success",
          
         });

         $("#res_modifier").load("../admin/etudiant_gestion/fonction_modifier_etudiant.php",{id:id,prenom:prenom,code_massar:code_massar,email:email,nom:nom,cin:cin});


       }else {
         swal("Cet étudiant n'est pas modifié ");
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
<div id="res_update_etd">
        <div id="res_modifier"></div>
        <div id="res_res"></div>
        <button id="ici" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-arrow-left"></span> Retour
        </button>
         <div class="container login-container">
            <div class="row">
             <form  method="post" id="form_modifier_livre">
                <div class="col-md-6 login1" >
                  
                        <div class="form-group">
                        	<label>Nom :</label>
                            <input type="text" class="form-control"  value="<?php echo $_POST['nom']; ?>"  id="nom"  />
                            <span id="res_nom"></span>
                        </div>
                        <div class="form-group">
                        	<label>Prénom :</label>
                            <input type="text" class="form-control"  value="<?php echo $_POST['prenom']; ?>"  id="prenom"  />
                            <span id="res_prenom"></span>
                        </div>
                        <div class="form-group">
                        	<label>Code de massar :</label>
                            <input type="text" class="form-control" value="<?php echo $_POST['code_massar']; ?>" id="code_massar"  />
                            <span id="res_codemassar"></span>
                            
                        </div>
                        
                    

                    
                </div>
                <div class="col-md-6 login2">
                       <div class="form-group">
                        	<label>CIN :</label>
                            <input type="text" class="form-control" value="<?php echo $_POST['cin']; ?>" id="cin"  />
                            <span id="res_cin"></span>
                        </div>
                        <div class="form-group">
                        	<label>E-mail :</label>
                            <input type="email" class="form-control" value="<?php echo $_POST['email']; ?>" id="email"   />
                        </div>
                        
                        <br>
                        <div class="form-group" style="height: 2.7em;">
                            <input type="submit" button  class="btn btn-primary btn-md" value="Modifier" id="btnModifier" data-id="<?php echo $_POST['id']; ?>"  />
                        </div> 
                    
                        
                    
                </div>
              </form>
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
                box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
                height: 25em;
            }
            
            .login2{
                padding: 5%;
               
                box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
                height: 25em;
            }

            .login-container form{
                padding: 10%;
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