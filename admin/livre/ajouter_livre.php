   <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      var res_numero=false;
      var res_auteur=false;
      var res_titre=false;
      var res_edition=false;
      var res_lieu=false;
      var res_annee=false;
      var res_cote=false
      var res_nombreDeCopie=false;
      $("#auteur").focusout(function(){
        check_auteur();
      })
      $("#titre").focusout(function(){
        check_titre();
      })
      $("#numero").focusout(function(){
        check_numero();
      })
      $("#edition").focusout(function(){
        check_edition();
      })
      $("#lieu").focusout(function(){
        check_lieu();
      })
      $("#annee").focusout(function(){
        check_annee();
      })
      $("#cote").focusout(function(){
        check_cote();
      })
      $("#nombreDeCopie").focusout(function(){
        check_nombreDeCopie();
      })

      function check_nombreDeCopie(){
        var re = /^[0-9]+$/;
        var nb= $("#nombreDeCopie").val();
        var nombreDeCopie=nb.replace(/ /g,'');

        if(nombreDeCopie == ''){
            $("#res_nombreDeCopie").html(" entrer votre nombre de copie !").css("color","red");
            $("#res_nombreDeCopie").show();
            res_nombreDeCopie=false;
        }else if(re.test(nombreDeCopie) && nombreDeCopie !== ''){
            $("#res_nombreDeCopie").hide();
            $("#nombreDeCopie").css("border-color","green");
            res_nombreDeCopie=true;
        }else{
            $("#res_nombreDeCopie").html("Votre nombre de copie n'est pas valide !").css("color","red");
            $("#res_nombreDeCopie").show();
            $("#nombreDeCopie").css("border-color","red");
            res_nombreDeCopie=false;
        }
      }
     
     function check_cote(){
        var re = /^[a-zA-Z0-9-àâçèéêîôùû]+$/;
        var ct= $("#cote").val();
        var cote=ct.replace(/ /g,'');

        if(cote == ''){
            $("#res_cote").html(" entrer votre cote !").css("color","red");
            $("#res_cote").show();
            res_cote=false;
        }else if(re.test(cote) && cote !== ''){
            $("#res_cote").hide();
            $("#cote").css("border-color","green");
            res_cote=true;
        }else{
            $("#res_cote").html("Votre cote n'est pas valide !").css("color","red");
            $("#res_cote").show();
            $("#cote").css("border-color","red");
            res_cote=false;
        }
      }
      function check_annee(){
        var re = /^[0-9-]+$/;
        var an= $("#annee").val();
        var annee=an.replace(/ /g,'');

        if(annee == ''){
            $("#res_annee").html(" entrer votre année !").css("color","red");
            $("#res_annee").show();
            res_annee=false;
        }else if(re.test(annee) && annee !== ''){
            $("#res_annee").hide();
            $("#annee").css("border-color","green");
            res_annee=true;
        }else{
            $("#res_annee").html("Votre année n'est pas valide !").css("color","red");
            $("#res_annee").show();
            $("#annee").css("border-color","red");
            res_annee=false;
        }
      }
      function check_lieu(){
        var re = /^[a-zA-Z'"àâçèéêîôùûا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ف ق ك ل م ن ه و ي ء أ إ آ ة ؤ ئ ى ؟ ؛ ،  ]+$/;
        var l= $("#lieu").val();
        var lieu=l.replace(/ /g,'');

        if(lieu == ''){
            $("#res_lieu").html(" entrer votre lieu !").css("color","red");
            $("#res_lieu").show();
            res_lieu=false;
        }else if(re.test(lieu) && lieu !== ''){
            $("#res_lieu").hide();
            $("#lieu").css("border-color","green");
            res_lieu=true;
        }else{
            $("#res_lieu").html("Votre lieu n'est pas valide !").css("color","red");
            $("#res_lieu").show();
            $("#lieu").css("border-color","red");
            res_lieu=false;
        }
      }
      function check_edition(){
        var re = /^[a-zA-Z'"àâçèéêîôùûا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ف ق ك ل م ن ه و ي ء أ إ آ ة ؤ ئ ى ؟ ؛ ،  ]+$/;
        var ed= $("#edition").val();
        var edition=ed.replace(/ /g,'');

        if(edition == ''){
            $("#res_edition").html(" entrer votre édition !").css("color","red");
            $("#res_edition").show();
            res_edition=false;
        }else if(re.test(edition) && edition !== ''){
            $("#res_edition").hide();
            $("#edition").css("border-color","green");
            res_edition=true;
        }else{
            $("#res_edition").html("Votre édition n'est pas valide !").css("color","red");
            $("#res_edition").show();
            $("#edition").css("border-color","red");
            res_edition=false;
        }
      }
      function check_numero(){
        var re = /^[0-9-]+$/;
        var n= $("#numero").val();
        var numero=n.replace(/ /g,'');

        if(numero == ''){
            $("#res_numero").html(" entrer votre numéro !").css("color","red");
            $("#res_numero").show();
            res_numero=false;
        }else if(re.test(numero) && numero !== ''){
            $("#res_numero").hide();
            $("#numero").css("border-color","green");
            res_numero=true;
        }else{
            $("#res_numero").html("Votre numéro n'est pas valide !").css("color","red");
            $("#res_numero").show();
            $("#numero").css("border-color","red");
            res_numero=false;
        }
      }
      function check_auteur(){
        var re = /^[a-zA-Zàâçèéêîôùû&ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ف ق ك ل م ن ه و ي ء أ إ آ ة ؤ ئ ى ؟ ؛ ،. ]+$/;
        var atr= $("#auteur").val();
        var auteur=atr.replace(/ /g,'');

        if(auteur == ''){
            $("#res_auteur").html(" entrer votre auteur !").css("color","red");
            $("#res_auteur").show();
            res_auteur=false;
        }else if(re.test(auteur) && auteur !== ''){
            $("#res_auteur").hide();
            $("#auteur").css("border-color","green");
            res_auteur=true;
        }else{
            $("#res_auteur").html("Votre auteur n'est pas valide !").css("color","red");
            $("#res_auteur").show();
            $("#auteur").css("border-color","red");
            res_auteur=false;
        }
      }
      function check_titre(){
        var re = /^[a-zA-Z'"àâçèéêîôùû&:,?()ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ف ق ك ل م ن ه و ي ء أ إ آ ة ؤ ئ ى ؟ ؛ ،  ]+$/;
        var tt= $("#titre").val();
        var titre=tt.replace(/ /g,'');

        if(titre == ''){
            $("#res_titre").html(" entrer votre titre !").css("color","red");
            $("#res_titre").show();
            res_titre=false;
        }else if(re.test(titre) && titre !== ''){
            $("#res_titre").hide();
            $("#titre").css("border-color","green");
            res_titre=true;
        }else{
            $("#res_titre").html("Votre titre n'est pas valide !").css("color","red");
            $("#res_titre").show();
            $("#titre").css("border-color","red");
            res_titre=false;
        }
      }




     $("#btnAjouter").on('click',function(event){

       res_numero=false;
       res_auteur=false;
       res_titre=false;
       res_edition=false;
       res_lieu=false;
       res_annee=false;
       res_cote=false
       res_nombreDeCopie=false;

       check_auteur();
       check_titre();
       check_numero();
       check_edition();
       check_lieu();
       check_annee();
       check_cote();
       check_nombreDeCopie();
    
      var numero=$("#numero").val();
      var auteur=$("#auteur").val();
      var titre=$("#titre").val();
      var edition=$("#edition").val();
      var lieu=$("#lieu").val();
      var annee=$("#annee").val();
      var cote=$("#cote").val();
      var matiere=$("#matiere").val();
      var nombreDeCopie=$("#nombreDeCopie").val();
      var niveau=$("#niveau").val();
      var collection=$("#collection").val();
      var n=$("#n").val();
      var mois=$("#mois").val();
      var nb_partie=$("#nb_partie").val();
      var nb_edition=$("#nb_edition").val();
      var numero=$("#numero").val();
      var categorie=$('#categorie_form').val();
      var sous_categorie=$('#sous_categorie_form').val();
     
if( res_numero !== false && res_auteur !== false  && res_titre !== false && res_edition !== false && res_lieu !== false && res_annee !== false && res_cote !== false && res_nombreDeCopie !== false ){
     swal({
       title: "Êtes-vous sûr d'ajouter ce livre?",
       icon: "warning",
       buttons:["No", "Oui"],
       
     })
     .then((willDelete) => {
       if (willDelete) {
         swal("Ce livre est bien ajouté", {
           icon: "success",
          
         });

         $("#res_modifier").load("../admin/livre/fonction_ajouter_livre.php",{auteur:auteur,titre:titre,edition:edition,lieu:lieu,annee:annee,cote:cote,matiere:matiere,nombreDeCopie:nombreDeCopie,niveau:niveau,collection:collection,n:n,mois:mois,nb_partie:nb_partie,nb_edition:nb_edition,numero:numero,categorie:categorie,sous_categorie:sous_categorie});
         
        

       }else {
         swal("Ce livre n'est pas ajouté");
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
        $("#res_res").load("../admin/livre/paginator_livre.php");
        })
    })
</script>

<div id="topaginatorlivre">
        <div id="res_modifier"></div>
        <div id="res_res"></div>
        <button id="ici" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-arrow-left"></span> Retour
        </button>
         <div class="container login-container">
            <div class="row" >
             <form  method="post" id="form_modifier_livre">
                <div class="col-md-6 login1" id="log">
                  
                        <div class="form-group">
                        	<label>Numéro * :</label>
                            <input type="text" class="form-control"    id="numero"  />
                            <span id="res_numero"></span>
                        </div>
                        <div class="form-group">
                        	<label>Auteur * :</label>
                            <input type="text" class="form-control"    id="auteur"  />
                            <span id="res_auteur"></span>
                        </div>
                        <div class="form-group">
                        	<label>Titre * :</label>
                            <input type="text" class="form-control"  id="titre"  />
                            <span id="res_titre"></span>
                            
                        </div>
                        <div class="form-group">
                        	<label>Édition * :</label>
                            <input type="text" class="form-control"  id="edition"   />
                            <span id="res_edition"></span>
                        </div>
                        <div class="form-group">
                        	<label>Lieu * :</label>
                            <input type="text" class="form-control"  id="lieu"   />
                            <span id="res_lieu"></span>
                        </div>
                        <div class="form-group">
                        	<label> Année * :</label>
                            <input type="text" class="form-control"  id="annee"  />
                            <span id="res_annee"></span>
                        </div>
                        <div class="form-group">
                        	<label>Coté * :</label>
                            <input type="text" class="form-control"  id="cote"   />
                            <span id="res_cote"></span>
                        </div>
                        <div class="form-group">
                        	<label>Matiére :</label>
                            <input type="text" class="form-control"  id="matiere" />
                        </div>
                        <div class="form-group">
                        	<label>Nombre de copie * :</label>
                            <input type="text" class="form-control"  id="nombreDeCopie" />
                            <span id="res_nombreDeCopie"></span>
                        </div>
                    

                    
                </div>
                <div class="col-md-6 login2" id="log" >
                       <div class="form-group">
                        	<label>Niveau :</label>
                            <input type="text" class="form-control"  id="niveau"  />
                        </div>
                        <div class="form-group">
                        	<label>Collection :</label>
                            <input type="text" class="form-control"  id="collection"   />
                        </div>
                        <div class="form-group">
                        	<label>N :</label>
                            <input type="text" class="form-control"  id="n"  />
                        </div>
                        <div class="form-group">
                        	<label>Mois :</label>
                            <input type="text" class="form-control"  id="mois"   />
                        </div>
                        <div class="form-group">
                        	<label>Nombre de partie :</label>
                            <input type="text" class="form-control"  id="nb_partie"  />
                        </div>
                        <div class="form-group">
                        	<label>Nombre d'édition :</label>
                            <input type="text" class="form-control"  id="nb_edition" />
                        </div>
                        <div class="form-group">
                        	<label>Catégorie *:</label>
                        	<?php
                        	  
                               $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
                               $r=$bdd->query("SELECT * FROM categories "); 
                        	?>
                            <select class="form-control" name="categorie_form" id="categorie_form" >
                            
                            	<?php 
                                    while($rows=$r->fetch()){
                            	?>
                            	<option value="<?php echo $rows['id'] ;?>"><?php echo $rows['categorie']; ?></option>
                            	<?php 
                                   }
                            	 ?>
                            	
                            </select>
                        </div>
                        <div class="form-group">
                        	<label>Sous Catégorie * :</label>
                           
                        	<?php
                        	   
                               $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
                               $req=$bdd->query("SELECT * FROM sous_categories  "); 
                        	?>
                            <select class="form-control" name="sous_categorie_form" id="sous_categorie_form">
                            	
                            	<?php 
                                    while($rows=$req->fetch()){
                            	?>
                            	<option value="<?php echo $rows['id'] ;?>"><?php echo $rows['sous_categorie']; ?></option>
                            	<?php 
                                   }
                            	 ?>
                            	
                            </select>
                        </div>
                        <br>
                        <div class="form-group" style="height: 2.7em;">
                            <input type="submit" button  class="btn btn-primary btn-lg" value="Ajouter" id="btnAjouter" />
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
                height: 64em; 
            }
            
            .login2{
                padding: 5%;
                height: 64em;
                box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
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