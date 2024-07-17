<?php
//cajero automatico

// Base de datos de tarjetas y saldos
$cards = array(
    "Visa" => array(
      "1234-5678-9012-3456" => 200000,
      "9876-5432-1098-7654" => 500000
    ),
    "Mastercard" => array(
      "1111-2222-3333-4444" => 350000,
      "5555-6666-7777-8888" => 150000
    )
  );
  $cajero = 2000000; // Dinero disponible en el cajero automático 