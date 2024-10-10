<?php
class RegistroParqueo {
    public $cliente;
    public $vehiculo;
    public $horaIngreso;
    public $horaSalida;
    public $tarifa = 2; 

    public function __construct($cliente, $vehiculo, $horaIngreso) {
        $this->cliente = $cliente;
        $this->vehiculo = $vehiculo;
        $this->horaIngreso = $horaIngreso;
    }

    public function registrarSalida($horaSalida) {
        $this->horaSalida = $horaSalida;
    }

    public function calcularValorAPagar() {
        $horas = (strtotime($this->horaSalida) - strtotime($this->horaIngreso)) / 3600; 
        return round($horas * $this->tarifa, 2); 
    }

    public function getInformacion() {
        return [
            'placa' => $this->vehiculo->getPlaca(),
            'marca' => $this->vehiculo->getMarca(),
            'color' => $this->vehiculo->getColor(),
            'nombre_cliente' => $this->cliente->getNombre(),
            'documento_cliente' => $this->cliente->getDocumento(),
            'hora_ingreso' => $this->horaIngreso,
            'hora_salida' => $this->horaSalida,
            'valor_a_pagar' => $this->calcularValorAPagar()
        ];
    }
}
?>