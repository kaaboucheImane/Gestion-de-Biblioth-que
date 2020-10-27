<?php  
    
     session_start();
     $con=mysqli_connect("localhost","root","","ouvrages");

      $user=$_SESSION['codemassar'];
      $titre=$_SESSION['titre'];
      $numero=$_SESSION['numero'];
      $email=$_SESSION['email'];
      $idl=$_SESSION['id_livre'];
      $fullname=$_SESSION['nom']." ".$_SESSION['prenom'];
            
     
      $nbb=$_POST['nb'];

      $idd=$_POST['id'];
      $today = date("Y-m-d H:i");
      $jr=date("d");
      $heure=date("H");
      //Print("Nous sommes le $today ");
      //echo " ".$nbb." ".$user." ".$titre." ".$numero;
      $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));    
      $req=$bdd->query("UPDATE livre SET nombreDeCopie='$nbb' where id='$idd' "); 
      while($row=$req->fetch()){
        //echo $row['nombreDeCopie'];
      }
     

     
   	 
     
?>

<?php 

      
      $req2=$bdd->prepare("INSERT INTO resevation (codemassar,titre,numero,date_heur,jour,fullname,email,heure,id_livre) VALUES(:codem,:titre,:num,:dt,:d,:fn,:em,:h,:idl)");
   	  $req2->execute(array(':codem'=>$user,':titre'=>$titre,':num'=>$numero,':dt'=>$today,':d'=>$jr,':fn'=>$fullname,':em'=>$email,':h'=>$heure,':idl'=>$idl));  
 ?>

<?php    
         $id=$_SESSION['idd'];
         $req=$bdd->query("SELECT * FROM livre WHERE id='$id'" );
         while($rows=$req->fetch()){
          $nb=mysqli_real_escape_string($con,$rows['nombreDeCopie']);
          $cote=mysqli_real_escape_string($con,$rows['cote']);
          $id=mysqli_real_escape_string($con,$rows['id']);
          $_SESSION['id_livre']=$id;
          $_SESSION['titre']=mysqli_real_escape_string($con,$rows['titre']);
          $_SESSION['numero']=$cote;
          echo "<h3 style=' color: rgb(0,0,128);'><strong>"."Titre :</strong></h3><h4>".$rows['titre']."</h4><h3 style=' color: rgb(0,0,128);'><strong>"."Auteur :</strong></h3><h4>".$rows['auteur']."</h4><h3 style=' color: rgb(0,0,128);'><strong>"."Édition :</strong></h3><h4>".$rows['edition']."</h4><h3 style=' color: rgb(0,0,128);'><strong>"."Année :</strong></h3><h4>".$rows['annee']."</h4><h3 style=' color: rgb(0,0,128);'><strong>"."coté :</strong></h3><h4>".$cote."</h4>";
            if ($nb==0) {
             echo ' <button type="button" class="btn  btn-lg btn-block"  disabled="true" >Réserver</button><br><br>';
            }else echo ' <button type="'.$id.'" class="btn btn-primary btn-lg btn-block" style="'.$nb.'" id="btnReserver">Réserver</button><br><br>';
      
          }
        ?>


    
<script>


    $(document).ready(function(){
    $("#btnReserver").on('click',function(event){
     
      var nb=$(this).attr("style");
      var id=$(this).attr("type");
      event.preventDefault();
     swal({
       title: "Êtes-vous sûr de réserver ce livre?",
       icon: "warning",
       buttons:["No", "Oui"],
       
     })
     .then((willDelete) => {
       if (willDelete) {
         swal("Votre livre est réserver", {
           icon: "success",
          
         });
         
          --nb;
         if(nb==0){
          $(this).prop("disabled",true);
          $("#ok").load("reserver.php",{nb:nb,id:id});
          //alert(nb);
         }else{
         $("#ok").load("reserver.php",{nb:nb,id:id});
           //alert(nb);
         }
       }else {
         swal("Ce livre n'est pas réserver");
       }
     })
    })
  })
</script>