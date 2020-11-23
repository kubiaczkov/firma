<?php
/**
 * Dodawanie nowego pracownika:
 * @param imie
 * @param nazwisko
 * @param email
 * @param pesel
 * @param avatar_file
 * 
 * @return true/false
 */

//  pobranie paramatrów POST
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$email = $_POST['email'];
$pesel = $_POST['pesel'];

// podstawowa walidacja danych
if($imie && $nazwisko && $pesel) {  

   if($_FILES['avatar']) {
      // dodanie pliku na serwer www
      $target_dir = "./uploads/";
      $target_file = $target_dir . basename($_FILES['avatar']['name']);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // sprawdzanie czy plik jest faktycznie zdjęciem
      $check = getimagesize($_FILES["avatar"]["tmp_name"]);
      if($check == false) {
         die('Przesyłany plik nie jest zdjęciem!');
         $uploadOk = 0;
      }

      // sprawdzenie czy plik już istnieje
      if(file_exists($target_file)) {
         die('Taki plik już instnieje!');
         $uploadOk = 0;
      }

      // sprawdzenie wielkości pliku
      if($_FILES['avatar']['size'] > 2000000) {
         die('Plik jest za duży!');
         $uploadOk = 0;
      }

      // sprawdzenie poprawnego formatu
      if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png') {
         die('Plik ma nieodpowiedni format!');
         $uploadOk = 0;
      }

      // końcowa faza
      if($uploadOk == 0) {
         die('Przepraszamy, plik nie został wysłany');
      } else {
         if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file))
         {
            echo 'Plik został dodany poprawnie!';
         } else {
            die('Przepraszamy, plik nie został wysłany poprawnie');
         }
      }

      // W TYM MIEJSCU PLIK JEST NA SERWERZE I SCIEZKA DO NIEGO TO $target_file
   } else {
      $target_file = './images/avatar.png';
   }
   
   // Dodanie wpisu do bazy danych
   // otwarcie połączenia z bazą danych
   include_once('polaczenie.php');

   if($email)
      // jeżeli email został podany
      $sql = "INSERT INTO `pracownik` (`imie`, `nazwisko`, `email`, `pesel`, `avatar_path`) \n"
      . "VALUES ('$imie','$nazwisko','$email','$pesel','$target_file')";
   if(!$email)
      // jeżeli email nie został podany
      $sql = "INSERT INTO `pracownik` (`imie`, `nazwisko`, `pesel`, `avatar_path`) \n"
      . "VALUES ('$imie','$nazwisko', '$pesel','$target_file')";

   if(mysqli_query($conn, $sql)) {
      echo 'Dodano nowego pracownika!';
   } else {
      die('Błąd podczas dodawania rekordu do bazy danych!');
   }
   
} else {
   echo 'Nie podano wymaganych parametrów';
}