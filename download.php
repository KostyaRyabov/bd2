<?php
  $P[0] = "------------\r\nИмя: ";                                 
  $P[1] = "Фамилия: ";
  $P[2] = "Отчестов: ";
  $P[3] = "Возраст: ";
  $P[4] = "Год рождения: ";
  $P[5] = "Год окончания школы: ";
  $P[6] = "Необходимость в общежитии: ";
  
  $P[7] = "---Аттестат---\r\nРусский язык: ";
  $P[8] = "Литература: ";
  $P[9] = "Иностранный язык: ";
  $P[10] = "Математика: ";
  $P[11] = "Информатика: ";
  $P[12] = "История: ";
  $P[13] = "Обществознание: ";
  $P[14] = "География: ";
  $P[15] = "Биология: ";
  $P[16] = "Физика: ";
  $P[17] = "Химия: ";
  $P[18] = "Музыка: ";
  $P[19] = "ИЗО: ";
  $P[20] = "ОБЖ: ";
  $P[21] = "Физическая культура: ";
  
  $P[22] = "---ЕГЭ---\r\nРусский язык: ";
  $P[23] = "Математика: ";
  $P[24] = "Информатика: ";
  
  $fp = fopen("./docs/The_Best.txt","w+");
  $fp1 = file('./docs/list5.txt');
  $len = count($fp1);
  
  $n = 0;
  
  if ($len == 1){
    fputs($fp,"---пусто---");
  }else{
    for ($i = 0; $i < $len; $i++){
      if ($i >= ($n+1)*25) $n++;
      
      if ($i == $n*25){
        $P[0] = "---------------------------[".($n+1)."]\r\nИмя: ";
      }
      
      fputs($fp,($P[$i - $n*25].$fp1[$i])); 
    }
  }
  
  header('Content-type: application/txt');
  header('Content-Disposition: attachment; filename="The_Best.txt"');
  readfile('./docs/The_Best.txt');
?>