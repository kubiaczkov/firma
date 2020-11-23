<?php
/**
 * Utworzenie połączenia z bazą danych
 * wykorzystanie bibioteki 'mysqli' proceduralna
 * 
 * @param serwer 
 * @param user
 * @param passwd
 * @param database
 * 
 * @return connection_object
 */

$serwer = 'localhost'; // 127.0.0.1
$user = 'root';
$passwd = 'zaq1@WSX';
$db = 'firma';

// conn - obiekt połączenia z bazą danych
$conn = mysqli_connect($serwer, $user, $passwd, $db);

// sprawdzenie poprawności połączenia
if ($conn->connect_error) {
   die("Połączenie nieudane: " . $conn->connection_erorr);
} else {
   // połączenie udane
}

// obsługa polskich znaków
mysqli_set_charset($conn, 'utf8');