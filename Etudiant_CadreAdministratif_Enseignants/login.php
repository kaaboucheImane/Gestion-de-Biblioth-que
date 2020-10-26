<haed>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer></script>
  
<!------ Include the above in your HEAD tag ---------->

    <script type="text/javascript">
      
      var widgetId1;
      var onloadCallback = function() {
        

       widgetId1= grecaptcha.render('example3', {
          'sitekey' : '6LfM3aQUAAAAAKbCNh2C0_tAkgVRCTj_HOVCJRjT',         
          'theme' : 'light'
        });
       
      };

    </script>
<script type="text/javascript">
    $(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});

</script>
<script>
    $(function(){
     
      

      var error_mail=false;
      var error_code=false;
      $("#mailform").focus();
      $("#mailform").focusout(function(){
        check_mail();
      })
      $("#codeform").focusout(function(){
        check_code();
      })
      function check_mail(){
        var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var mail= $("#mailform").val();
        if(mail == ''){
            $("#resmailformpss").html(" entrer votre email !").css("color","red");
            $("#resmailformpss").show();
            error_mail=false;
        }else if(re.test(mail) && mail !== ''){
            $("#resmailformpss").hide();
            $("#mailform").css("border-color","green");
            error_mail=true;
        }else{
            $("#resmailformpss").html("Votre email n'est pas valide !").css("color","red");
            $("#resmailformpss").show();
            $("#mailform").css("border-color","red");
            error_mail=false;
        }
      }
      function check_code(){
        var letters = /^[a-zA-Z0-9]+$/;
        var code=$("#codeform").val();
        if(code == ''){
             $("#rescodeformpss").html(" entrer votre code !").css("color","red");
            $("#rescodeformpss").show();
            error_code=false;
        }else if(letters.test(code) && code !== ''){
            $("#rescodeformpss").hide();
            $("#codeform").css("border-color","green");
            error_code=true;
        }else{
            $("#rescodeformpss").html("Votre code n'est pas valide !").css("color","red");
            $("#rescodeformpss").show();
            $("#codeform").css("border-color","red");
            error_code=false;
        }
      }
      $("#btnforgetpasse").click(function(event){
         event.preventDefault();
         error_mail=false;
         error_code=false;
         check_mail();
         check_code();
         var mail= $("#mailform").val();
         var code=$("#codeform").val();
         if(error_mail !== false && error_code !== false){
            $("#resmail").load("login_mot_de_passe_oublie.php",{mail:mail,code:code});
            $("#formforgetpass")[0].reset();
            $("#mailform").css("border-color","grey");
            $("#codeform").css("border-color","grey");


         }else{
            $("#resmail").load("login_mot_de_passe_oublie.php",{mail:mail,code:code});
            
            
            
         }
      })

    })
   
</script>
<script>
     
    $(function(){
     
      

      var res_nom=false;
      var res_prenom=false;
      var res_mail=false;
      var res_codemassar=false;
      var res_cin=false;
      var res_password=false;
      var res_cfpassword=false
      var res_captcha=false;
     
      $("#nom").focusout(function(){
        check_nom();
      })
      $("#prenom").focusout(function(){
        check_prenom();
      })
      $("#email").focusout(function(){
        check_mail();
      })
      $("#codemassar").focusout(function(){
        check_codemassar();
      })
      $("#cin").focusout(function(){
        check_cin();
      })
      $("#password").focusout(function(){
        check_password();
      })
      $("#cfpassword").focusout(function(){
        check_cfpassword();
      })
      $("#example3").focusout(function(){
        check_captcha();
      })

      function check_captcha(){
         var te=grecaptcha.getResponse(widgetId1);
         if(te.length == 0){
             $("#res_captcha").html(" cliquez sur votre captcha! !").css("color","red");
             $("#res_captcha").show();
             res_captcha=false;
          }else{
             $("#res_captcha").hide();
             res_captcha=true;
          }
      }
      function check_password(){
        var letters = /^[a-zA-Z0-9]+$/;
        var password=$("#password").val();
        var passwordd=$("#password").val().length;
        if(password == ''){
             $("#res_password").html(" entrer votre password !").css("color","red");
            $("#res_password").show();
            res_password=false;
        }else if(passwordd > 8){
           $("#res_password").html("Votre password est dépassé 8 characters!").css("color","red");
            $("#res_password").show();
            $("#password").css("border-color","red");
            res_password=false;
            
        }else if(letters.test(password) && password !== ''){
            $("#res_password").hide();
            $("#password").css("border-color","green");
            res_password=true;
        }else{
            $("#res_password").html("Votre password n'est pas valide !").css("color","red");
            $("#res_password").show();
            $("#password").css("border-color","red");
            res_password=false;
        }

      }
       
    function check_cfpassword(){
        var password=$("#password").val();
        var cfpasswor=$("#cfpassword").val();
        if(password !== cfpasswor){
            $("#res_cfpassword").html("password did not matched").css("color","red");;
            $("#res_cfpassword").show();
            $("#cfpassword").css("border-color","red");
            res_cfpassword=false;
        }else{
            $("#res_cfpassword").hide();
            $("#cfpassword").css("border-color","green");
            res_cfpassword=true;
        }
    }

      function check_cin(){
        var letters = /^[a-zA-Z0-9]+$/;
        var cin=$("#cin").val();
        if(cin == ''){
             $("#res_cin").html(" entrer votre cin !").css("color","red");
             $("#res_cin").show();
             res_cin=false;
        }else if(letters.test(cin) && cin !== ''){
            $("#res_cin").hide();
            $("#cin").css("border-color","green");
            res_cin=true;
        }else{
            $("#res_cin").html("Votre cin n'est pas valide !").css("color","red");
            $("#res_cin").show();
            $("#cin").css("border-color","red");
            res_cin=false;
        }
      }
      function check_codemassar(){
        var letters = /^[a-zA-Z0-9]+$/;
        var code=$("#codemassar").val();
        if(code == ''){
             $("#res_codemassar").html(" entrer votre code !").css("color","red");
             $("#res_codemassar").show();
            res_codemassar=false;
        }else if(letters.test(code) && code !== ''){
            $("#res_codemassar").hide();
            $("#codemassar").css("border-color","green");
            res_codemassar=true;
        }else{
            $("#res_codemassar").html("Votre code n'est pas valide !").css("color","red");
            $("#res_codemassar").show();
            $("#codemassar").css("border-color","red");
            res_codemassar=false;
        }
      }
      function check_mail(){
        var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var mail= $("#email").val();
        if(mail == ''){
            $("#res_mail").html(" entrer votre email !").css("color","red");
            $("#res_mail").show();
            res_mail=false;
        }else if(re.test(mail) && mail !== ''){
            $("#res_mail").hide();
            $("#email").css("border-color","green");
            res_mail=true;
        }else{
            $("#res_mail").html("Votre email n'est pas valide !").css("color","red");
            $("#res_mail").show();
            $("#email").css("border-color","red");
            res_mail=false;
        }
      }

      function check_nom(){
        var re = /^[a-zA-Z]+$/;
        var n= $("#nom").val();
        var nom=n.replace(/ /g,'');

        if(nom == ''){
            $("#res_nom").html(" entrer votre nom !").css("color","red");
            $("#res_nom").show();
            res_nom=false;
        }else if(re.test(nom) && nom !== ''){
            $("#res_nom").hide();
            $("#nom").css("border-color","green");
            res_nom=true;
        }else{
            $("#res_nom").html("Votre nom n'est pas valide !").css("color","red");
            $("#res_nom").show();
            $("#nom").css("border-color","red");
            res_nom=false;
        }
      }
      function check_prenom(){
        var re = /^[a-zA-Z]+$/;
        var p= $("#prenom").val();
        var prenom=p.replace(/ /g,'');

        if(prenom == ''){
            $("#res_prenom").html(" entrer votre prenom !").css("color","red");
            $("#res_prenom").show();
            res_prenom=false;
        }else if(re.test(prenom) && prenom !== ''){
            $("#res_prenom").hide();
            $("#prenom").css("border-color","green");
            res_prenom=true;
        }else{
            $("#res_prenom").html("Votre prenom n'est pas valide !").css("color","red");
            $("#res_prenom").show();
            $("#prenom").css("border-color","red");
            res_prenom=false;
        }
      }

     
      $("#btninscrire").click(function(event){
         event.preventDefault();
          res_nom=false;
          res_prenom=false;
          res_mail=false;
          res_codemassar=false;
          res_cin=false;
          res_password=false;
          res_cfpassword=false;
          res_captcha=false;
          check_nom();
          check_prenom();
          check_mail();
          check_codemassar();
          check_cin();
          check_password();
          check_cfpassword();
          check_captcha();
          var te=grecaptcha.getResponse(widgetId1);
          var pass=$("#password").val();
          var cfpass=$("#cfpassword").val();
          var cin=$("#cin").val();
          var codemassar=$("#codemassar").val();
          var mail= $("#email").val();
          var nom= $("#nom").val();
          var prenom= $("#prenom").val();
         

         if( res_nom !== false && res_prenom !== false && res_mail !== false && res_codemassar !== false && res_cin !== false && res_password !== false && res_cfpassword !== false && res_captcha !== false ){
            $("#resforminscrire").load("login_inscrire_validation.php",{pass:pass,cfpass:cfpass,mail:mail,cin:cin,codemassar:codemassar,prenom:prenom,nom:nom,te:te});
            $("#forminscrire")[0].reset();
            grecaptcha.reset(widgetId1);
            $("#password").css("border-color","grey");
            $("#cfpassword").css("border-color","grey");
            $("#cin").css("border-color","grey");
            $("#codemassar").css("border-color","grey");
            $("#email").css("border-color","grey");
            $("#nom").css("border-color","grey");
            $("#prenom").css("border-color","grey");

         }else{
            $("#resforminscrire").load("login_inscrire_validation.php",{pass:pass,cfpass:cfpass,mail:mail,cin:cin,codemassar:codemassar,prenom:prenom,nom:nom,te:te});
            
            
            return false;
         }
      })

    })
   
</script>

</haed>
<?php

@
 session_start();
 if (isset($_SESSION['msg'])) {

   echo $_SESSION['msg'];
  
 }
?>
           <div id="test" ></div>
           <div class="container register " >
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="img/x.png" alt=""  />
                        <h3>Bienvenue</h3>
                        <p>Inscription ouverte pour les étudiants , Cadres Administratifs et Enseignants de l'ENS</p>
                        <input type="submit" name="" value="S'inscrire" data-toggle="modal" data-target="#myModal2"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" class="active" id="login-form-link">Utilisateur</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="register-form-link" >Admin</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login-form" role="tabpanel" aria-labelledby="home-tab">
                                <br>
                                <h3 class="register-heading">Etudiant /Cadre Administratif /Enseignant</h3>
                                <div class="row register-form">
                                    <div class="col-sm-2"></div>
                                    <div class="col-md-8 ">
                                      <form action="login_form_validation.php" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Votre Email *" id="email_user" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];}?>" required />
                                            <span class="error_form" id="res_mail_user"></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="motdepasse"  class="form-control" placeholder="Mot de passe *" id="motdepasse_user" value="<?php if(isset($_COOKIE['motdepasse'])){ echo $_COOKIE['motdepasse'];}?>" required />
                                            <span class="error_form" id="res_password_user"></span>
                                        </div>
                                        <div class="form-group">
                                          <input type="checkbox" name="remember" <?php if(isset($_COOKIE['email'])){?> checked <?php } ?>   />
                                          <label>Se souvenir de moi</label>
                                        </div>

                                        <div class="form-group">
                                         
                                         <input id="btnblog_user" name="btnlog" type="submit" class="btnRegister"  value="Se Connecter"  />
                                         
                                        </div><br><br>

                                        
                                     </form>

                                       <a href="" style="text-decoration: none;" data-toggle="modal" data-target="#myModal">Mot de passe oublié ?</a>

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade show" id="register-form" role="tabpanel" aria-labelledby="profile-tab">
                                <br>
                                <h3 class="register-heading">Responsable de Bibliothèque</h3>
                                <div class="row register-form">
                                    <div class="col-sm-2"></div>
                                    <div class="col-md-8 ">
                                      <form action="login_form_admin_validation.php" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Votre  Email *" value="" name="email"  required  />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Mot de passe *" value="" name="motdepasse" required />
                                        </div>
                                        
                                        
                                        <input type="submit" class="btnRegister"  value="Se Connecter" name="btnlogadmin"  />
                                     </form>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>



                    <div id="myModal" class="modal" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                              <img src="img/forgot.png"> Mot de passe oublié
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                             <center><img src="https://i.ibb.co/rshckyB/car-key.png" alt="car-key" border="0" width="100" height="100"></center>
                             <h3><center>Mot de passe oublié?</center></h3>
                             <h4 style="color:grey"><center> Vous pouvez récuperer votre mot de passe dans votre courrier.</center></h4>

                             <form id="formforgetpass">
                                     <div class="form-group">
                                         <input type="email" class="form-control" placeholder="Votre Email *" value="" id="mailform"  required/>
                                         <span class="error_form" id="resmailformpss"></span>
                                     </div>
                                     <div class="form-group">
                                         <input type="text" class="form-control" placeholder="Code Massar / Code Som*" value="" id="codeform" required />
                                         <span class="error_form" id="rescodeformpss"></span>
                                     </div>
                        
                             </form>
           
                             <div id="resmail">

                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" id="btnforgetpasse" >Envoyer</button>
                           </div>
                         </div>

                       </div>
                     </div>

                     <div id="myModal2" class="modal" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">

                           <div class="modal-header">
                            <img src="img/man.png"> 
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                                
                                <br>
                             <form id="forminscrire">
                                <div class="form-content">
                                  <div class="row">
                                   <div class="col-md-6">
                                     <div class="form-group">
                                         <input type="text" class="form-control" placeholder="Nom *" value="" id="nom"  required/>
                                         <span id="res_nom"></span>
                                     </div>
                                     
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                         <input type="text" class="form-control" placeholder="Prénom *" value="" id="prenom" required />
                                         <span id="res_prenom"></span>
                                     </div>
                                     
                                    
                                   </div>
                                   <div class="col-sm-12">
                                    <div class="form-group">
                                         <input type="text" class="form-control" placeholder=" Email *" value="" id="email"  required/>
                                         <span id="res_mail"></span>
                                     </div>
                                    </div>
                                    <div class="col-md-6">
                                     <div class="form-group">
                                         <input type="text" class="form-control" placeholder="Code Massar / Code Som *" value="" id="codemassar"  required/>
                                         <span id="res_codemassar"></span>
                                     </div>
                                    </div>
                                    <div class="col-md-6">
                                     <div class="form-group">
                                         <input type="text" class="form-control" placeholder="CIN *" value="" id="cin"  required/>
                                         <span id="res_cin"></span>
                                     </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <input type="password" class="form-control" placeholder="Mot de passe *" value="" id="password"  required/>
                                         <span id="res_password"></span>
                                     </div>
                                   </div>
                                   <div class="col-md-6">
                                     <div class="form-group">
                                         <input type="password" class="form-control" placeholder="Confirmez votre mot de passe *" value="" id="cfpassword"  required/>
                                         <span id="res_cfpassword"></span>
                                     </div>
                                   </div>
                                   <div class="col-sm-12">
                                     <div class="form-group">
                                       <div id="example3"></div>
                                       <div id="res_captcha">
                                         
                                       </div>
                                    </div>
                                     </div>
                                     <div id="resforminscrire"></div>
                                   
                                     <div class="col-sm-12">
                                      <button type="submit" class="btn btn-primary" id="btninscrire" >S'inscrire</button>
                                     </div>
                             </form>
                             
                           </div>
                           
                         </div>

                       </div>
                     </div>








                </div>

            </div>

<style type="text/css">
    .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
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
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: left;
    margin-top: 3%;
    border: none;
    border-radius: 0.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 60%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>