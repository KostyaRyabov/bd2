<html>
  <head>
  <link rel="stylesheet" type="text/css" href="../styles/index.style.css">
    <title>СПИСОК СТУДЕНТОВ</title>
  </head>
  <body>
  <a href="index.php?del" class="remove">удалить <img src="../photo/remove.png" height=18></a>
  <a href="print.php?" class="print">"печать" <img src="../photo/print.png" height=18></a>
  <div class="poster">задание <img src="../photo/info.png" height=18>
    <div class="descr">
    Вариант I. 1) Из внешнего файла, содержащего исходные данные, удалить записи абитуриентов, получивших хотя бы одну оценку 2.
    2) Используя внешний файл, содержащий исходные данные, добавить 2 записи и распечатать список абитуриентов, имеющих в аттестате оценки только 5.
    </div>
  </div>
  <br><br>
  <H1>СПИСОК СТУДЕНТОВ</H1>
  
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
  
  $txt = "./docs/list.txt";
  
  $i = 7;
  $n = 0;
  
  if(isset($_GET['del'])){
    $check = 0;
    $file = file($txt);
    while($i<sizeof($file)){
      if($i < $n*25+22) {
        if (strpos($file[$i++], "2") !== false) {
          for ($j = $n*25; $j < ($n+1)*25 ; $j++){
            $file[$j] = "";
          }
          $n++;
          $check = $n;          
          $i = 7 + $n*25;
        }
      }else {
        $n++;
        $i = 7 + $n*25;
      }  
    }
     
    $fp=fopen($txt,"w+"); 
    fputs($fp,implode("",$file));
    if ($check == $n){
      fputs($fp,"\r\n---");
      $file = file($txt);  
      unset($file[sizeof($file)-1]);
      file_put_contents($txt, trim(implode($file)));
      unset($txt, $file);
    }      
    fclose($fp);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['GetParameters'] == 1) {         //Запись в файл нового студента
    
    $input[0] = $_SESSION['F'];
    $input[1] = $_SESSION['N'];
    $input[2] = $_SESSION['O'];
    $input[3] = $_SESSION['Age'];
    $input[4] = $_SESSION['A1'];
    $input[5] = $_SESSION['A2'];
    $input[6] = $_SESSION['Obh'];
        
    $input[7] = $_POST["P1"];
    $input[8] = $_POST["P2"];
    $input[9] = $_POST["P3"];
    $input[10] = $_POST["P4"];
    $input[11] = $_POST["P5"];
    $input[12] = $_POST["P6"];
    $input[13] = $_POST["P7"];
    $input[14] = $_POST["P8"];
    $input[15] = $_POST["P9"];
    $input[16] = $_POST["P10"];
    $input[17] = $_POST["P11"];
    $input[18] = $_POST["P12"];
    $input[19] = $_POST["P13"];
    $input[20] = $_POST["P14"];
    $input[21] = $_POST["P15"];
      
    $input[22] = $_POST["E1"];
    $input[23] = $_POST["E2"];
    $input[24] = $_POST["E3"];
    
    $type = "a+";
    $skip = "\r\n";
    if (count(file($txt)) < 5){
      $type = "w+";
      $skip = "";
    }
    
    $file = fopen($txt,$type);
    
    foreach ($input as $value){
       fputs($file,$skip.$value);
       $skip = "\r\n";
    }
    
    $_SESSION['GetParameters'] = 0;
    fclose($file);
  }
  
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
  
  echo '<a href="form1.php"><div width=100% class="button">ДОБАВИТЬ</div></a><img src="../photo/foot-line.png" width=100%>';
  
  $file = file("./docs/list.txt");
  $sizes = array("24%","24%","24%","8%","8%","8%","6%");
  
  $n = 0;
  $i = 0;
  
  while (($i*$n+1) < sizeof($file)) {
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

