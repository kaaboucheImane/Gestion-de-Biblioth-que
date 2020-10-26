
 <script>
    $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    

     
  });
  </script>
   <script type="text/javascript">
    $(document).ready(function(){
      $("#import").click(function(event){

        event.preventDefault();
        var excel=$("#excel").val();

        $.post('../admin/etudiant_cadre_importer/resulta_importe_cadre.php',{excel:excel},function(data){

            $('#res_import_etd').html(data);
            $("#import_form_reset")[0].reset();

                   
         });

      });
    })
  </script>
 
   
<!------ Include the above in your HEAD tag ---------->

        <div class="container">
        
        <div class="col-md-10 col-md-offset-1 main" >
        <div class="col-md-6 left-side" >
        <h3>Ajouter Enseignant - Cadre Administratif  </h3>
        <br><br>
        <center>
        <img src="../Etudiant_CadreAdministratif_Enseignants/img/xlsx.png" id="img" alt=""  />
        <img src="../Etudiant_CadreAdministratif_Enseignants/img/xls.png" id="img" alt=""  />
        <img src="../Etudiant_CadreAdministratif_Enseignants/img/csv.png" id="img" alt=""  />
        </center>
        <br><br><br>
        <center><img src="../Etudiant_CadreAdministratif_Enseignants/img/one.png"  alt=""  /></center>
        <center><p>Les Extensions Valables</p></center>

       

        </div><!--col-sm-6-->
        
        <div class="col-md-6 right-side">
         <h3>Importer votre fichier ici</h3>
         
        <br>
        
        
<!--Form with header-->
<div class="form">
        

    

         <form  id="import_form_reset" class="form-inline"   >    
             <div class="form-group">          
             
                   <div class="input-group">
                       <span class="input-group-btn">
                           <span class="btn btn-default btn-file">
                               Parcourir… <input type="file" id="excel" />
                           </span>
                       </span>
                       <input type="text" class="form-control" readonly>

                   </div>
             </div>
             <input type="submit" id="import" class="btn btn-info" value="Importer" />
         </form>
         <div id="res_import_etd">
           
         </div>

</div>
<!--/Form with header-->

        </div><!--col-sm-6-->
        
        
        </div><!--col-sm-8-->
        
        </div><!--container-->
        <br><br><br><br>
<style>
 #img{
    margin-top: 5em;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
  .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

</style>
<style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext');


#playground-container {
    height: 500px;
    overflow: hidden !important;
    
}
.main{margin-top:70px; 
-webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
-moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
padding:0px;
background:#2196f3;
}

.left-side{
    padding:0px 0px 0px;
    
    background-size:cover;
}
.left-side h3{
    font-size: 30px;
    font-weight: 900;
    color:#FFF;
    padding: 50px 10px 00px 26px;
    }
    
    .left-side p{
    font-weight:600;
    color:#FFF;
    padding:10px 10px 10px 26px;
    }

    
    
    .right-side{
    padding:0px 0px 0px;
    background:#FFF;
    background-size:cover;
    min-height:514px;
}
    .right-side h3{
    font-size: 30px;
    font-weight: 700;
    color:#000;
    padding: 50px 10px 00px 50px;
    }
    .right-side p{
    font-weight:600;
    color:#000;
    padding:10px 50px 10px 50px;
    }
    .form{padding:10px 50px 10px 50px;}
   

</style>