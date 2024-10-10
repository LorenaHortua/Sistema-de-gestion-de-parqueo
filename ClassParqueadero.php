<?php
class Parqueadero {
    public $pisos;
    public $espaciosPorPiso;
    public $espacios;

    public function __construct($pisos = 4, $espaciosPorPiso = 10) {
        $this->pisos = $pisos;
        $this->espaciosPorPiso = $espaciosPorPiso;
        $this->espacios = [];
    }

    public function agregarRegistro($registro, $piso, $espacio) {
        if (!isset($this->espacios[$piso])) {
            $this->espacios[$piso] = [];
        }

        $this->espacios[$piso][$espacio] = $registro;
    }

    public function buscarVehiculoPorPlaca($placa) {
        foreach ($this->espacios as $piso => $espacios) {
            foreach ($espacios as $espacio => $registro) {
                if ($registro->getInformacion()['placa'] === $placa) {
                    return [
                        'piso' => $piso,
                        'espacio' => $espacio,
                        'informacion' => $registro->getInformacion()
                    ];
                }
            }
        }
        return "Vehículo no encontrado.";
    }
}
?>