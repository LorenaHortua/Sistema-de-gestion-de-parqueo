<?php
require_once ("ClassVehiculo.php");
require_once ("ClassCliente.php");
require_once ("ClassRegistroParqueo.php");
require_once ("ClassParqueadero.php");
require_once ("ClassAuto.php");

$cliente1 = new Cliente("Lorena Hortua", "987654321");
$vehiculo1 = new Auto("ABC222", "Toyota", "Azul");

$registro1 = new RegistroParqueo($cliente1, $vehiculo1, "2024-09-19 08:00:00");

$parqueadero = new Parqueadero();

$parqueadero->agregarRegistro($registro1, 2, 3); 

$registro1->registrarSalida("2024-09-19 11:00:00");

$resultado = $parqueadero->buscarVehiculoPorPlaca("ABC222");

print_r($resultado);