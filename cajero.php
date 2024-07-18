<?php
//cajero automatico

// Base de datos de tarjetas,pin y pin 
$cards = array(
  "Visa" => array(
    "1234-5678-9012-3456" => array("pin" => "1234", "dinero" => 100000),
    "9876-5432-1098-7654" => array("pin" => "5678", "dinero" => 500000)
  ),
  "Mastercard" => array(
    "1111-2222-3333-4444" => array("pin" => "9012", "dinero" => 2000000),
    "5555-6666-7777-8888" => array("pin" => "3456", "dinero" => 1500000)
  )
);
  $cajero = 2000000; // Dinero disponible en el cajero automático 

 // Inicio de usuario con tipo de tarjeta y clave
 echo "Bienvenido al cajero automático\n";
 $tipotarjeta = readline("Por favor, ingrese el tipo de tarjeta (Visa o Mastercard): ");

 $numerotarjeta = readline ("Por favor, ingrese el número de tarjeta: ");
 
 $clave = readline ("Ingrese clave de tarjeta: "); 
 // Verificar si la tarjeta existe en la base de datos
if (isset($cards[strtolower($tipotarjeta)][$numerotarjeta])) {
    if ($cards[strtolower($tipotarjeta)][$numerotarjeta]["pin"] == $clave) {
      echo "Tarjeta válida. Saldo disponible: " . $cards[strtolower($tipotarjeta)][$numerotarjeta]["dinero"] . "\n";
      // Continuar con la interacción con el usuario (retirar dinero, depositar, etc.)
    } else {
      echo "Clave incorrecta. Por favor, inténtelo de nuevo.\n";
    }
  } else {
    echo "Tarjeta no válida. Por favor, inténtelo de nuevo.\n";
  }