<?php
// Base de datos de tarjetas, pin y saldo
$cards = array(
  "Visa" => array(
    "1234-5678-9012-3456" => array("pin" => "1234", "dinero" => 1000000),
    "9876-5432-1098-7654" => array("pin" => "5678", "dinero" => 525000)
  ),
  "Mastercard" => array(
    "1111-2222-3333-4444" => array("pin" => "9012", "dinero" => 200000),
    "5555-6666-7777-8888" => array("pin" => "3456", "dinero" => 150000)
  )
);

// Dinero disponible en el cajero automatico
$cajero_dinero = 2000000;

// Función para verificar la tarjeta y clave- siempre que ingrese el usuario mostrara el saldo de la cuenta
function verificarTarjeta($tipotarjeta, $numerotarjeta, $clave) {
  global $cards;
  if (isset($cards[$tipotarjeta][$numerotarjeta])) {
    if ($cards[$tipotarjeta][$numerotarjeta]["pin"] == $clave) {
      return true;
    }
  }
  echo "Tarjeta o clave incorrecta. Por favor, inténtelo de nuevo.\n";
  return false;
}

// Función para mostrar el saldo disponible
function mostrarSaldo($tipotarjeta, $numerotarjeta) {
  global $cards;
  echo "Tarjeta válida. Saldo disponible: " . $cards[$tipotarjeta][$numerotarjeta]["dinero"] . "\n";
}

// Función para retirar dinero-si pide una cantidad que no tenga el cajero mostrara de nuevo las opciones
function retirarDinero($tipotarjeta, $numerotarjeta, $monto) {
  global $cards;
  global $cajero_dinero;
  if ($cards[$tipotarjeta][$numerotarjeta]["dinero"] >= $monto && $cajero_dinero >= $monto) {
    $cards[$tipotarjeta][$numerotarjeta]["dinero"] -= $monto;
    $cajero_dinero -= $monto;
    echo "Retiro exitoso. Saldo disponible: " . $cards[$tipotarjeta][$numerotarjeta]["dinero"] . "\n";
  } else {
    echo "No hay suficiente dinero en la tarjeta o en el cajero.\n";
  }
}

// Función para depositar dinero
function depositarDinero($tipotarjeta, $numerotarjeta, $monto) {
  global $cards;
  $cards[$tipotarjeta][$numerotarjeta]["dinero"] += $monto;
  echo "Depósito exitoso. Saldo disponible: " . $cards[$tipotarjeta][$numerotarjeta]["dinero"] . "\n";
}

// Inicio de usuario con tipo de tarjeta, número de tarjeta y clave
echo "Bienvenido al cajero automático\n";
$tipotarjeta = readline("Por favor, ingrese el tipo de tarjeta (Visa o Mastercard): ");
$numerotarjeta = readline("Por favor, ingrese el número de tarjeta: ");
$clave = readline("Ingrese clave de tarjeta: ");
//funcion para verificar tarjeta
if (verificarTarjeta($tipotarjeta, $numerotarjeta, $clave)) {
  mostrarSaldo($tipotarjeta, $numerotarjeta);
  //siempre mostrara el saldo de la cuenta-aqui pide seleccionar opciones al usuario
  while (true) {
    echo "¿Qué desea hacer?\n";
    echo "1. Retirar dinero\n";
    echo "2. Depositar dinero\n";
    echo "3. Salir\n";
    $opcion = readline("Ingrese una opción: ");
    //Al ingresar y realizar alguna accion en opciones siempre mostrara el saldo que queda en la cuenta
    switch ($opcion) {
      case 1:
        $monto = readline("Ingrese el monto a retirar: ");
        retirarDinero($tipotarjeta, $numerotarjeta, $monto);
        break;
      case 2:
        $monto = readline("Ingrese el monto a depositar: ");
        depositarDinero($tipotarjeta, $numerotarjeta, $monto);
        break;
      case 3:
        echo "Gracias por utilizar el cajero automático.\n";
        exit;
      default:
        echo "Opción inválida. Por favor, inténtelo de nuevo.\n";
    }
  }
}

?>