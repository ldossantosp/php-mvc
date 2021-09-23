<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

     <!-- Wrapper for slides -->
     <div class="carousel-inner" >
     <?php
            $contador = 0;
            while ($row = $fotos->fetch_assoc())
            {
                if($contador == 0){
                    $nameFoto = $row['Foto'];
                    echo"<div class=\"item active\" >
                                <img src=\"/uploads/{$nameFoto}\" alt=\"\" class=\"img-thumbnail\">
                        </div>";
                }
                else{
                    $nameFoto = $row['Foto'];
                    echo"<div class=\"item\">
                            <img src=\"/uploads/{$nameFoto}\" alt=\"\" class=\"img-thumbnail\">
                        </div>";
                }
                $contador = $contador + 1;
            }
        ?>
     </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>

    

</div>

<a class="btn btn-primary" href="<?= FOLDER_PATH . '/MainCliente/RealizarPedido' ?>" role="button">Cancel</a>

<div class="container">
        <?php !empty($show_pedido_form) ? require 'app/views/MainCliente/pedido_form.php' : '' ?>
</div>