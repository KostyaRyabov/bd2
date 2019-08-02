<?php
  session_start();
  
  $_SESSION['F'] = $_POST["F"];
  $_SESSION['N'] = $_POST["N"];
  $_SESSION['O'] = $_POST["O"];
  $_SESSION['Age'] = $_POST["Age"];
  $_SESSION['A1'] = $_POST["A1"];
  $_SESSION['A2'] = $_POST["A2"];
  if (isset($_POST['Obh'])) {
    $_SESSION['Obh'] = "Да";  
  } else {
    $_SESSION['Obh'] = "Нет";
  }
  
  $_SESSION['GetParameters'] = 1;
  
?>

<html>
  <head>
  <link rel="stylesheet" type="text/css" href="../styles/form.style.css">
    <title>Аттестат абитуриента </title>
  </head>
  <body>
    <form action="index.php" method="post">
    
    <div align="center" class="block">
      <h1 align="center"> АТТЕСТАТ АБИТУРИЕНТА</h1>
      
      <p align="center">Русский язык: <input type="number" size="1" name="P1" min="2" max="5" required></p>
      <p align="center">Литература: <input  type="number" size="1" name="P2" min="2" max="5" required></p>
      <p align="center">Иностранный язык: <input  type="number" size="1" name="P3" min="2" max="5" required></p>
      <p align="center">Математика: <input  type="number" size="1" name="P4" min="2" max="5" required></p>
      <p align="center">Информатика: <input  type="number" size="1" name="P5" min="2" max="5" required></p>
      <p align="center">История: <input  type="number" size="1" name="P6" min="2" max="5" required></p>
      <p align="center">Обществознание: <input  type="number" size="1" name="P7" min="2" max="5" required></p>
      <p align="center">География: <input  type="number" size="1" name="P8" min="2" max="5" required></p>
      <p align="center">Биология: <input  type="number" size="1" name="P9" min="2" max="5" required></p>
      <p align="center">Физика: <input  type="number" size="1" name="P10" min="2" max="5" required></p>
      <p align="center">Химия: <input  type="number" size="1" name="P11" min="2" max="5" required></p>
      <p align="center">Музыка: <input  type="number" size="1" name="P12" min="2" max="5" required></p>
      <p align="center">ИЗО: <input  type="number" size="1" name="P13" min="2" max="5" required></p>
      <p align="center">ОБЖ: <input  type="number" size="1" name="P14" min="2" max="5" required></p>
      <p align="center">Физическая культура: <input  type="number" size="1" name="P15" min="2" max="5" required></p>
      
      <br>
      
      <h1 align="center"> БАЛЛЫ ВСТУПИТЕЛЬНЫХ ЭКЗАМЕНОВ</h1>
      
      <p align="center">Русский язык: <input type="number" size="1" name="E1" min="0" max="100" required></p>
      <p align="center">Математика: <input type="number" size="1" name="E2" min="0" max="100" required></p>
      <p align="center">Информатика: <input type="number" size="1" name="E3" min="0" max="100" required></p>
      
      <br>
      
      <p align="center">
      <input type="reset" name="Reset" value="Очистить">
      <input type="submit" name="Submit" value="Отправить">
      </p>
    </div>
    </form>
  
    <a href="index.php"><div class="button">К списку</div></a>
  </body>
</html>
