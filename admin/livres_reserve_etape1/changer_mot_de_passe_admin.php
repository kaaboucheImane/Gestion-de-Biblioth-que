
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/md5.js"></script>

<?php

 session_start();
 require 'function_crypt.php';
 $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
 $passwordps = Decrypte($_SESSION['motdepasse'],$cryptKey);


?>
<div class="login-container">
<center>
<img src="../Etudiant_CadreAdministratif_Enseignants/img/user1.png">
</center>
<br><br>



  <form   id="validateformpassword_admin">

    <div class="form-group">
         <input type="email" class="form-control" placeholder=" Nouveau E-mail*" name="email" id="email"   required/>
         <span class="errcode"></span>                  
     </div>
     <div class="form-group">
         <input type="password" class="form-control" placeholder="Votre mot de passe de gmail *" name="passMail" id="pass_mail" required />
         <span class=""></span>
     </div>
     <div class="form-group">
         <input type="text" class="form-control" placeholder=" Nouveau Code Som *" name="code" id="codesom"  required/>
         <span class="errcode"></span>                  
     </div>
     <div class="form-group">
         <input type="password" class="form-control" placeholder="Ancien mot de passe *" name="anpass" id="ancmotdepasse" data="<?php echo $passwordps ; ?>" required />
         <span class="erranpass"></span>
     </div>
     <div class="form-group">
         <input type="password" class="form-control" placeholder="Nouveau mot de passe *" name="pass" id="nvmotdepasse" required />
         <span class=""></span>
     </div>
     <div class="form-group">
         <input type="password" class="form-control" placeholder="Confrimez le mot de passe *" name="confpass" id="cfmotdepasse" required />
         <span class="errcfpass"></span>
     </div>
     <div class=" form-group">
         <button type="submit" class="btn btn-default" id="btnformvalidatepassword_admin">Changer</button>
     </div>

  </form>


</div>

<div class="col-sm-12">
    <br>
</div>
<div class="col-sm-12" id="resvalidateformpassword">
    
</div>


<script>
  $(document).ready(function(){

     var error_mail=false;
   
     $("#email").focusout(function(){
        var email=$("#email").val();
        var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        
        if(re.test(email) && email !== ''){
          $('#email').css("border-color","green");
          error_mail=true;
        }else{
          $('#email').css("border-color","red");
          error_mail=false;
        }
     })
     $("#cfmotdepasse").keyup(function(){
        var cfps=$("#cfmotdepasse").val();
        var nvpss=$("#nvmotdepasse").val();
        if(cfps!=""){$("#cfmotdepasse").css("border-color","green");}else{$("#cfmotdepasse").css("border-color","red");}
        if(cfps==nvpss){
          $('#cfmotdepasse').css("border-color","green");
        }else{
          $('#cfmotdepasse').css("border-color","red");
        }
     })
     $("#ancmotdepasse").keyup(function(){
        var anps=$("#ancmotdepasse").val();
        var pssess=$(this).attr("data");
        
        if(anps==pssess){
          $('#ancmotdepasse').css("border-color","green");
        }else{
          $('#ancmotdepasse').css("border-color","red");
        }
     })
     $("#nvmotdepasse").focusout(function(){
       var nvpss=$("#nvmotdepasse").val();
       if(nvpss!=""){$("#nvmotdepasse").css("border-color","green");}else{$("#nvmotdepasse").css("border-color","red");}
     })

     $("#codesom").focusout(function(){
       var code=$("#codesom").val();
       if(code!=""){$("#codesom").css("border-color","green");}else{$("#codesom").css("border-color","red");}
     })
     $("#pass_mail").focusout(function(){
       var pass_mail=$("#pass_mail").val();
       if(pass_mail!=""){$("#pass_mail").css("border-color","green");}else{$("#pass_mail").css("border-color","red");}
     })
     $("#btnformvalidatepassword_admin").click(function(event){
        event.preventDefault();
        var email=$("#email").val();
        var code=$("#codesom").val();
        var anpass=$("#ancmotdepasse").val();
        var pssess=$("#ancmotdepasse").attr("data");
        var confpass=$("#cfmotdepasse").val();
        var pass=$("#nvmotdepasse").val();
        var pass_mail=$("#pass_mail").val();

        if (code=="") {$("#codesom").css("border-color","#FF0000");}
        if (anpass=="") {$("#ancmotdepasse").css("border-color","#FF0000");}
        if (pass=="") {$("#nvmotdepasse").css("border-color","#FF0000");}
        if (confpass=="") {$("#cfmotdepasse").css("border-color","#FF0000");}
        if (email=="") {$("#email").css("border-color","#FF0000");}
        if (pass_mail=="") {$("#pass_mail").css("border-color","#FF0000");}
        
        if(  $("#email").val() !="" && $("#pass_mail").val() !="" && $("#codesom").val() !=""  && $("#ancmotdepasse").val() !="" && $("#cfmotdepasse").val()!="" && $("#nvmotdepasse").val()!="" &&  anpass==pssess && $("#cfmotdepasse").val()==$("#nvmotdepasse").val()){
           $("#resvalidateformpassword").load("../admin/livres_reserve_etape1/changer_mot_de_passe_form_admin.php",{email:email,confpass:confpass,code:code,pass:pass,anpass:anpass,pass_mail:pass_mail});
           $("#validateformpassword_admin")[0].reset();
           $("#email").css("border-color","grey");
           $("#codesom").css("border-color","grey");
           $("#ancmotdepasse").css("border-color","grey");
           $("#cfmotdepasse").css("border-color","grey");
           $("#nvmotdepasse").css("border-color","grey");
           $("#pass_mail").css("border-color","grey");
        }
         
     })
        

  })
</script>

<style>
    .login-container{
   position: relative;
    width: 500px;
    margin: 80px auto;
    padding: 20px 40px 40px;
    text-align: center;
    background: #fff;
    border: 1px solid #ccc;
}



.login-container::before,.login-container::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 3.5px;left: 0;
    background: #fff;
    z-index: -1;
    -webkit-transform: rotateZ(4deg);
    -moz-transform: rotateZ(4deg);
    -ms-transform: rotateZ(4deg);
    border: 1px solid #ccc;

}

.login-container::after{
    top: 5px;
    z-index: -2;
    -webkit-transform: rotateZ(-2deg);
     -moz-transform: rotateZ(-2deg);
      -ms-transform: rotateZ(-2deg);

}


.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    -ms-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}
</style>