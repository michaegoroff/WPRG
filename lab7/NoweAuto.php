<?php
class NoweAuto{

    function __construct($model,$cena,$kurs){
        $this->model = $model;
        $this->cena = $cena;
        $this->kurs = $kurs;
    }
    public string $model;
    public float $cena;
    public float $kurs;

    public function ObliczCene(){
        return $this->cena * $this->kurs;
    }
}


class AutoZDodatkami extends NoweAuto {

    public function __construct($model, $cena, $kurs,$alarm,$radio,$klimatyzacja)
    {
        parent::__construct($model, $cena, $kurs);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public float $alarm;
    public float $radio;
    public float $klimatyzacja;

    public function ObliczCene()
    {
        return parent::ObliczCene() + ($this->alarm * $this->kurs) + ($this->radio * $this->kurs) + ($this->klimatyzacja * $this->kurs);
    }
}

class Ubiezpieczenie extends AutoZDodatkami {

    public function __construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja,$lata,$wartosc)
    {
        parent::__construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja);
        $this->lata = $lata;
        $this->wartosc = $wartosc;
    }

    public int $lata;
    public float $wartosc;

    public function ObliczCene()
    {
        return ($this->wartosc * parent::ObliczCene() * ((100 - $this->lata)/100.0));
    }
}
?>
