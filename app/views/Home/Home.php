<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Minified JS library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Compiled and minified Bootstrap JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
  <nav class="navbar navbar-default">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?= FOLDER_PATH . '/Login' ?>">Iniciar sesion</a></li>
      <li><a href="<?= FOLDER_PATH . '/Plato/form' ?>">Registro</a></li>
    </ul>
  </nav>
  <?php 
  for ($i=0; $i<count($info_plato); $i++){
    //echo $info_plato[$i][1]; es el Id del plato
    echo '<blockquote>';
    echo '<p>'.$info_plato[$i][2].'</p>';
    echo '<footer>'.$info_plato[$i][3].'</footer>';
    echo '</blockquote>'

  ?>  
    <div id="myCarousel<?=$i?>" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel<?=$i?>" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel<?=$i?>" data-slide-to="1"></li>
        <li data-target="#myCarousel<?=$i?>" data-slide-to="2"></li>
    </ol>

     <!-- Wrapper for slides -->
     <div class="carousel-inner" >
     <?php
            $contador = 0;
            while ($row = $info_plato[$i][4]->fetch_assoc())
            {
                if($contador == 0){
                    $nameFoto = $row['Foto'];
                    echo"<div class=\"item active\" >
                          <p class=\"text-center\"><img src=\"/uploads/{$nameFoto}\" alt=\"\" class=\"img-thumbnail\"></p>
                        </div>";
                }
                else{
                    $nameFoto = $row['Foto'];
                    echo"<div class=\"item\">
                          <p class=\"text-center\"><img src=\"/uploads/{$nameFoto}\" alt=\"\" class=\"img-thumbnail\">
                        </div>";
                }
                $contador = $contador + 1;
            }
        ?>
     </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel<?=$i?>" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel<?=$i?>" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>

    

</div>
<?php
  }//for
?>


</body>
</html>