<?php
class Fila{
    public $datos = array();
    public $n = 0;
    public $li  = 0;
    public $ls  = 0;
    public $f  = 0;
    public $mc  = 0;
    public $lri  = 0;
    public $lrs  = 0;
    public $fr  = 0;
    public $frp  = 0;
    public $fa  = 0;
    public $fra  = 0;
    public $frap  = 0;
    public $fc  = 0;
    public $frc  = 0;
    public $frcp  = 0;
    public $fmc = 0;
    public $grd  = 0;
    public $mcm = 0;
    public $mcm2 = 0;
    
    function __construct($n, $li, $ls, $datos, $f = 0, $lsa="", $lria="", $diferencia=1){
        $this->n = $n;
        $this->li = $li;
        $this->ls = $ls;
        $this->datos = $datos;
        if($f>0){
            $this->f = $f;
        }else{
            $this->f = $this->contarFrecuencia();
        }
        $this->mc = ($this->li + $this->ls)/2;
        $this->lri = $this->li - ($diferencia/2);
        $this->lrs = $this->ls + ($diferencia/2);
        $this->fr = soloDosDecimales($this->f / $this->n);
        $this->frp = $this->fr * 100;
        $this->grd = soloDosDecimales(($this->f * 360) / $this->n);
        $this->fmc = $this->f * $this->mc;
    }

    private function contarFrecuencia(){
        $f = 0;
        foreach($this->datos as $dato){
            if($dato > $this->ls){
                return $f;
            }else if($dato >= $this->li){
                $f++;
            }
        }
        return $f;
    }

    public function sumarFrecuencias($fa){
        return $fa+$this->f;
    }

    public function restarFrecuencias($fc){
        return $fc-$this->f;
    }
}
?>