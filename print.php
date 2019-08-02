<html>
  <head>
  <link rel="stylesheet" type="text/css" href="../styles/index.style.css">
    <title>СПИСОК ОТЛИЧНИКОВ</title>
  </head>
  <body>
  <a href="index.php?" class="home">вернуться <img src="../photo/home.png" height=18></a>
  <a href="download.php?" class="download">скачать <img src="../photo/download.png" height=18></a>
  
  <br><br>
  <H1>СПИСОК ОТЛИЧНИКОВ</H1>
  
  <table>
  <tr>
  <th width=4%> № </td>
  <th width=23%> Фамилия </th>
  <th width=23%> Имя </th>
  <th width=23%> Отчество </th>
  <th width=8%> Возраст </th>
  <th> Год рождения </th>
  <th> Год окончания школы </th>
  <th width=4% class="bigTXT"> Необходимость в общажитии </th>
  </tr>
  </table>
<?php
  session_start();
  
  $i = 7;
  $n = 0;
  
  $count = 0;
  
    $file = file("./docs/list.txt");
    $fp=fopen("./docs/list5.txt","w+");
    while($i<sizeof($file)){
      if($i < $n*25+22) {
        if (strpos($file[$i++], "5") !== false) {
          $count++;
        }
      }else {
        if ($count == 15){
          for ($j = $n*25; $j < ($n+1)*25 ; $j++){
            fputs($fp,$file[$j]);
          }
        }
        $n++;
        $i = 7 + $n*25;
        $count = 0;
      }  
    }  
    fclose($fp);
  
  $lesson[0] = "Русский язык";                                  //Отображение всех студентов из списка
  $lesson[1] = "Литература";
  $lesson[2] = "Иностранный язык";
  $lesson[3] = "Математика";
  $lesson[4] = "Информатика";
  $lesson[5] = "История";
  $lesson[6] = "Обществознание";
  $lesson[7] = "География";
  $lesson[8] = "Биология";
  $lesson[9] = "Физика";
  $lesson[10] = "Химия";
  $lesson[11] = "Музыка";
  $lesson[12] = "ИЗО";
  $lesson[13] = "ОБЖ";
  $lesson[14] = "Физическая культура";
  
  $lesson[15] = "Русский язык";
  $lesson[16] = "Математика";
  $lesson[17] = "Информатика";
  
  echo '<img src="../photo/foot-line.png" width=100%>';
  
  $file = file("./docs/list5.txt");
  $sizes = array("24%","24%","24%","8%","8%","8%","6%");
  
  $n = 0;
  $i = 0;
  
  while (($i*$n) < sizeof($file)) {
    echo '<table><tr><td width=4%>',($n+1),'</td>';
    
    $i = 0;
    
    while ($i < 7){
      echo '<td width=',$sizes[$i],'>',$file[$i+25*$n],'</td>';
      
      $i++;
    } 
    echo '</tr></table>';
    
    echo '<details>
      <summary><img src="../photo/strelk.png" width=100%></summary><H1>Аттестат</H1>
        <table align="center">';
        while ($i < 22) {
          echo '<tr>
            <td>',$lesson[$i-7],'</td>
            <td>', $file[$i+25*$n] ,'</td>
          </tr>';
          
          $i++;
        }
        
        echo '</table><br><H1>',"Баллы ЕГЭ",'</H1><table align="center">';
          
        while ($i < 25) {
          $t = $i - 7;
          echo '<tr>
            <td>',$lesson[$t],'</td>
            <td>', $file[$i+25*$n] ,'</td>
          </tr>';
          
          $i++;
        }   
    echo '</table></details><br>';
    $n++;
  }
?>
    
  </body>
</html>

