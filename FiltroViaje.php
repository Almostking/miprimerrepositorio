<?php
class FiltroViaje {
    public $nombreHotel;
    public $ciudad;
    public $pais;
    public $fechaViaje;
    public $duracion;

    public function __construct($nombreHotel, $ciudad, $pais, $fechaViaje, $duracion) {
        $this->nombreHotel = $nombreHotel;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->fechaViaje = $fechaViaje;
        $this->duracion = $duracion;
    }

    public function mostrarFiltro() {
        return "
            <div class='filtro'>
                <h3>{$this->nombreHotel}</h3>
                <p>Ciudad: {$this->ciudad}</p>
                <p>País: {$this->pais}</p>
                <p>Fecha de Viaje: {$this->fechaViaje}</p>
                <p>Duración: {$this->duracion} días</p>
            </div>
        ";
    }
}
?>
