<h2 class="subtitulo">Quantiles</h2>
<div class="media quantiles <?php if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']!=3 && $_GET['g']!=4))echo 'border' ?>">
    <div>
        <form class="form-quantil" action="?g=<?php if(isset($_GET['g']) && !empty($_GET['g']) &&($_GET['g']==1 || $_GET['g']==3)){echo '3';}else if(isset($_GET['g']) && !empty($_GET['g']) &&($_GET['g']==2 || $_GET['g']==4)){echo '4';} ?>&generar=1" method="POST">
            <div class="quantil">
                <h3 class="subtitulo">Quartiles</h3>        
                <div>
                    <label class="parrafo" for="datos">Quartil N&uacute;mero(1 - 3):</label>
                    <input class="input-quantil" type="number" name="quartil" min="1" max="3" value="<?php if(isset($_POST['quartil']) && !empty($_POST['quartil']))echo $_POST['quartil']?>" required>
                </div>                
            </div>
            <div class="quantil">
                <h3 class="subtitulo">Percentiles</h3>
                <div>
                    <label class="parrafo" for="datos">Decil N&uacute;mero(1 - 9):</label>
                    <input class="input-quantil" type="number" name="decil" min="1" max="9" value="<?php if(isset($_POST['decil']) && !empty($_POST['decil']))echo $_POST['decil']?>" required>
                </div>
            </div>
            <div class="quantil">
                <h3 class="subtitulo">Deciles</h3>
                <div>
                    <label class="parrafo" for="datos">Percentil N&uacute;mero(1 - 99):</label> 
                    <input class="input-quantil" type="number" name="percentil" min="1" max="99" value="<?php if(isset($_POST['percentil']) && !empty($_POST['percentil']))echo $_POST['percentil']?>" required>
                </div>
            </div>
            <div>
                <input class="boton buscar" type="submit" class="boton" id="generar" value="Buscar">
            </div>
        </form>
    </div>
</div>