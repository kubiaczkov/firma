<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h2>Dodadawnie nowego pracownika</h2>
   <!-- Formularz dla pracowników -->
   <form action="upload.php" method="post" enctype="multipart/form-data">
      <label for="imie">Podaj imie</label>
      <input type="text" name="imie" id="imie" minlength="3" maxlength="30" placeholder="Jan" required>
      <br>
      <label for="nazwisko">Podaj nazwisko</label>
      <input type="text" name="nazwisko" id="nazwisko" minlength="2" maxlength="80" placeholder="Kowalski" required>
      <br>
      <label for="email">Podaj email:</label>
      <input type="email" name="email" id="email" placeholder="example@mail.com">
      <br>
      <label for="pesel">Podaj PESEL:</label>
      <input type="text" name="pesel" id="pesel" minlength="11" maxlength="11" required>
      <br>
      <label for="avatar">Wstaw zdjęcie profilowe:</label>
      <input type="file" name="avatar" id="avatar" accept="image/*">
      <br><br>
      <input type="reset" value="Wyczyść" style="margin-right: 10px;">
      <input type="submit" value="Dodaj">
   </form>
</body>
</html>