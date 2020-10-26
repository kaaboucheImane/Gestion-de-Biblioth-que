<?php

  $bdd = new PDO('mysql:host=localhost;dbname=ouvrages', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));  
  $con=mysqli_connect("localhost","root","","ouvrages");


  if (isset($_POST['search']) && !empty($_POST['search'])) {
  	 $search=mysqli_real_escape_string($con,$_POST['search']);
     
  	 $req=$bdd->query("SELECT * FROM livre WHERE auteur like \"$search%\"or titre like \"$search%\"or annee like \"$search%\"or numero like \"$search%\"or edition like \"$search%\" " );

  	 while($rows=$req->fetch()){
      $id=mysqli_real_escape_string($con,$rows['id']);
      $titre=$rows['titre'];
?>
  <li class="list-group-item"><a href="" id="<?php echo $id; ?>" class="gg" style="overflow: hidden;">
   <img  src="https://envytheme.com/tf-demo/edusplash/assets/img/publication/1.jpg" alt="Publication Image" style="width:2em; height:3em; margin-left:0.3em; margin-top:5px;">
     <?php
      echo $titre;

     ?>

  </a></li>

<?php
  	 }
  }

?>

<script>
	$(document).ready(function(){
		$(".gg").click(function(event){
      event.preventDefault();
      $('#resultat ul').hide();
			      $(".changerps").css("background-color","#fff");
            $(".ia2").css("background-color","#fff");
            var id= $(this).attr("id");
           
            $.post('afficher_livres.php',{id:id},function(data){
            	$("#listOuv").html(data);
            })
            $("#formsearch")[0].reset();
		})
	})
</script>
