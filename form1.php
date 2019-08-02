<html>
  <head>
  <link rel="stylesheet" type="text/css" href="../styles/form.style.css">
    <title>Анкета абитуриента </title>
  </head>
  <body>
    <form action="form2.php" method="post">
    
    <div align="center" class="block">
      <h1> АНКЕТА АБИТУРИЕНТА</h1>
      
      Фамилия:<input type="text" name="F" size="20" required>
      Имя:<input type="text" name="N" size="20" required>
      Отчество:<input type="text" name="O" size="20" required>
      Возраст:<input type="number" name="Age" min="0" max="100" size="1" required>
       
      <p>Год Рождения: <input type="number" name="A1" min="1950" max="2000" size="20" required>
      Год окончания школы: <input type="number" name="A2" min="1950" max="2017" size="20" required>
      </p>
    
      <p>
      Нуждаюcь в общажитии:<input type="checkbox" name="Obh">
      </p>
       
      <p align="center">
      <input type="reset" name="Reset" value="Очистить">
      <input type="submit" name="Submit" value="Продолжить">
      </p>
    </div>
    </form>
    
    <a href="index.php"><div class="button">К списку</div></a>
  </body>
</html>
