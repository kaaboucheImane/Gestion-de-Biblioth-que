
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/md5.js"></script>
<h2>Changer le mot de passe</h2><hr>
<?php
 require 'function_crypt.php';
 session_start();
 $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
 $passwordps = Decrypte($_SESSION['motdepasse1'],$cryptKey);


?>
<br><br>
<div class="col-sm-2"></div>
<div class="col-sm-8">
  <form   id="validateformpassword">
     <div class="form-group">
         <input type="text" class="form-control" placeholder="Code Massar / Code Som *" name="code" id="codemassaretd" data="<?php echo $_SESSION['codemassar']; ?>" required/>
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
         <input type="password" class="form-control" placeholder="Confirmez le mot de passe *" name="confpass" id="cfmotdepasse" required />
         <span class="errcfpass"></span>
     </div>
     <div class=" form-group">
         <button type="submit" class="btn btn-primary" id="btnformvalidatepassword">Changer</button>
     </div>

  </form>
</div>
<div class="col-sm-9" id="resvalidateformpassword">
  
</div>

<script>
  $(document).ready(function(){
     
     $("#codemassaretd").keyup(function(){
        var code=$("#codemassaretd").val();
        var codesess=$(this).attr("data");
        if(code!=""){$("#codemassaretd").css("border-color","black");}

        if(code==codesess){
          $('#codemassaretd').css("border-color","green");
        }else{
          $('#codemassaretd').css("border-color","red");
        }
     })

     $("#cfmotdepasse").keyup(function(){
        var cfps=$("#cfmotdepasse").val();
        var nvpss=$("#nvmotdepasse").val();
        if(cfps!=""){$("#cfmotdepasse").css("border-color","black");}
        if(cfps==nvpss){
          $('#cfmotdepasse').css("border-color","green");
        }else{
          $('#cfmotdepasse').css("border-color","red");
        }
     })
     $("#ancmotdepasse").keyup(function(){
        var anps=$("#ancmotdepasse").val();
        var pssess=$(this).attr("data");
        if(anps!=""){$("#ancmotdepasse").css("border-color","black");}
        if(anps==pssess){
          $('#ancmotdepasse').css("border-color","green");
        }else{
          $('#ancmotdepasse').css("border-color","red");
        }
     })

     $("#nvmotdepasse").keyup(function(){
       var nvpss=$("#nvmotdepasse").val();
       if(nvpss!=""){$("#nvmotdepasse").css("border-color","black");}
     })

     $("#btnformvalidatepassword").click(function(event){
        event.preventDefault();
        var code=$("#codemassaretd").val();
        var codesess=$("#codemassaretd").attr("data");
        var anpass=$("#ancmotdepasse").val();
        var pssess=$("#ancmotdepasse").attr("data");
        var confpass=$("#cfmotdepasse").val();
        var pass=$("#nvmotdepasse").val();

        if (code=="") {$("#codemassaretd").css("border-color","#FF0000");}else{$("#codemassaretd").css("border-color","black");}
        if (anpass=="") {$("#ancmotdepasse").css("border-color","#FF0000");}else{$("#ancmotdepasse").css("border-color","black");}
        if (pass=="") {$("#nvmotdepasse").css("border-color","#FF0000");}else{$("#nvmotdepasse").css("border-color","black");}
        if (confpass=="") {$("#cfmotdepasse").css("border-color","#FF0000");}else{$("#cfmotdepasse").css("border-color","black");}
        
        if($("#codemassaretd").val() !="" && $("#ancmotdepasse").val() !="" && $("#cfmotdepasse").val()!="" && $("#nvmotdepasse").val()!="" && $("#codemassaretd").val()==$("#codemassaretd").attr("data") && anpass==pssess && $("#cfmotdepasse").val()==$("#nvmotdepasse").val()){
           $("#resvalidateformpassword").load("changer_mot_de_passe_form.php",{confpass:confpass,code:code,pass:pass,anpass:anpass});
           $("#validateformpassword")[0].reset();
        }
         
     })
        

  })
</script>