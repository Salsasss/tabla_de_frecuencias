<div class="contenedor-checks">
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="fa" type="checkbox" checked>
        <label for="fa">F</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="fra" type="checkbox">
        <label for="fra">fra</label>
    </div>  
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="lri" type="checkbox">
        <label for="lri">LRI</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="lrs" type="checkbox">
        <label for="lrs">LRS</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="fr" type="checkbox" <?php if(isset($_GET['g']) && $_GET['g']==1) echo "checked" ?> >
        <label for="fr">fr</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="frp" type="checkbox" <?php if(isset($_GET['g']) && $_GET['g']==1) echo "checked" ?> >
        <label for="frp">fr(%)</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="frap" type="checkbox">
        <label for="frap">fra(%)</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="fc" type="checkbox">
        <label for="fc">Fc</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="frc" type="checkbox">
        <label for="frc">frc</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="frcp" type="checkbox">
        <label for="frcp">frc(%)	</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="mc" type="checkbox" checked>
        <label for="mc">MC</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="grd" type="checkbox">
        <label for="grd">Grados°</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="fmc" type="checkbox" <?php if(isset($_GET['g']) && $_GET['g']==2) echo "checked" ?> >
        <label for="fmc">fX</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="mcm" type="checkbox" <?php if(isset($_GET['g']) && $_GET['g']==2) echo "checked" ?> >
        <label for="mcm">F|X-X̅|</label>
    </div>
    <div class="contenedor-check" for="check-ver">
        <input class="check-ver" id="mcm2" type="checkbox" <?php if(isset($_GET['g']) && $_GET['g']==2) echo "checked" ?> >
        <label for="mcm2">F(X-X̅)²</label>
    </div>
</div>   