<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Расписание занятий</title>
     <link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="main.css">
</head>
<body class="my-flex-cont">
    <main class="my-flex-box">
        <?php   $_REQUEST['group'] =""; ?>
    <h2>Расписание занятий<br>Костромского энергетического техникума имени Ф.В. Чижова.<br></h2>
    <h3>
    <?php
    if(isset($_POST['dateshow'])){//если данные были переданы
  $test=$_POST['dateshow'];//то берём их
    setlocale(LC_ALL, 'ru_RU.UTF-8');
  echo strftime('на %d.%m.%Y', strtotime($test));
  echo '<br>';
  echo strftime('%A', strtotime($test));
} 
else {
 $dateshow= date('Y-m-d'); 
 $dateshow = '"'.$dateshow.'"';
  setlocale(LC_ALL, 'ru_RU.UTF-8');
echo strftime('на %d.%m.%Y', time());
echo '<br>';
echo strftime('%A', time());

 
}

?>
</h3>

   <br>
       
<?php
/*
    # Если кнопка нажата
    if( isset( $_POST['refreshi'] ) )
    {
        $query = "SELECT * FROM price";
        echo 'Кнопка нажата!';
    }
 # Подключение
 */

     
$host = 'localhost'; // адрес сервера 
$database = 'c953640n_sparepa'; // имя базы данных
$user = 'c953640n_sparepa'; // имя пользователя
$password = '1234567'; // пароль

$handle = mysqli_connect($host, $user, $password, $database); 
$dbcon=mysql_select_db($database); 


echo '<form method="POST" class="nav">';
echo '      <fieldset>';
echo '    <legend>Навигация</legend> ';
echo '    <div class="addskip">';
echo '<div>Группа:';

$handle = mysql_connect($host, $user, $password, $database); 
$dbcon=mysql_select_db($database); 
$query="SELECT * FROM groups"; 
$result=mysql_query($query); 
echo "<select name='group'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['group1'].'" >'.$line['group1'];
} 
echo "</select>\n"; 


echo '</div><div>Дата:';
echo '<input type="date" name="dateshow" required></input>';
echo '</div>';

echo '<input type="hidden" name="nomer" value="1">';
echo '<input type="submit" value="Показать">';

echo '</form>';

echo '<form method="POST" class="nav">';
    echo '<input type="hidden" name="now" value="1">';
    echo '<input type="submit" value="Сегодня">';
echo '</form>';



 echo '</div>';
 echo '</fieldset>';

//sql-запрос на вывод таблицы


/*
if(isset($_POST['button'])) {
//$dateshow = $_REQUEST['dateshow'];
$field = $_REQUEST['group'];
$field = '"'.$field.'"';
$query = "SELECT * FROM price where groupa=$field";
}

if(isset($dateshow) and isset($field)){
     if($dateshow==""){$query = "SELECT * FROM price";}
     */
mysqli_close($handle);

//  echo $dateshow;
  ?>


<!--
<form method="POST">
    <input type="submit" name="refreshi" value="Сброс" />
</form>
-->
<?php 

$handle = mysqli_connect($host, $user, $password, $database) ;
$dbcon=mysql_select_db($database);

$nomer=$_REQUEST['nomer'];
  $query = "SELECT * FROM price WHERE (date=$dateshow)";
if($nomer=="1"){
     $nomer=0;
      $field = $_POST['group'];
   $dateshow = $_REQUEST['dateshow'];
//   if($dateshow==""){
     //  echo' <script>
       //               alert("Выберите дату!"); 
         //     </script>';
    //          $dateshow= date('Y-m-d');  
  //$dateshow = '"'.$dateshow.'"';
                      $field = '"'.$field.'"';
            //          $query = "SELECT * FROM price WHERE (groupa=$field)";
   
  //                      }
    if ($field=='""') {
                       
                        $dateshow = '"'.$dateshow.'"';
                        $query = "SELECT * FROM price WHERE (date=$dateshow)";
    }

    else {
// $field = '"'.$field.'"';
  $dateshow = '"'.$dateshow.'"';
   $query = "SELECT * FROM price WHERE (groupa=$field) and (date=$dateshow)";
    }
   
}

$nav=$_REQUEST['tomorrow'];
if ($nav==1){
            $dateshow = strtotime("+1 day");
            $dateshow = date("Y-m-d", $dateshow);
             $dateshow = '"'.$dateshow.'"';
             $query = "SELECT * FROM price WHERE date=$dateshow";
            }
        
else {
//  $dateshow= date('Y-m-d');  
// $dateshow = '"'.$dateshow.'"';
}

if ($dateshow=='""'){ $query = "SELECT * FROM price WHERE date=$dateshow";}
/*
 echo 'Дата '.$dateshow;
// echo '<br>';
// echo 'Группа '.$field;
//  echo '<br>';


 echo 'Запрос '.$query;
*/
 $result = $handle->query($query);

 $numresult=$result->num_rows;
 $count = mysqli_num_rows($result); //узнаем количетво строк в sql-запросе
// echo 'Дата '.$dateshow;
if(mysqli_num_rows($result) == 0)
{
     echo '<div class="boxnet"><div class="net"></div><br><h2>скоро!</h2></div>';
}
else {
echo '<div class="flexbox">';
$row=$result->fetch_assoc();

//if ($row['groupa']=="1-1" or $row['groupa']=="1-2" or $row['groupa']=="1-3" or $row['groupa']=="1-4" or $row['groupa']=="1-5" or $row['groupa']=="1-6"){
    echo '<div class="otdel"> <h2>Первые курсы</h2>';
    $gr1="1-1";
    $gr1='"'.$gr1.'"';
    $gr2="1-2";
    $gr2='"'.$gr2.'"';
    $gr3="1-3";
    $gr3='"'.$gr3.'"';
    $gr4="1-4";
    $gr4='"'.$gr4.'"';
    $gr5="1-5";
    $gr5='"'.$gr5.'"';
    $gr5="1-5";
    $gr5='"'.$gr5.'"';
    $gr6="1-6";
    $gr6='"'.$gr6.'"';
    $queryadd=" and ((groupa=$gr1) or (groupa=$gr2) or (groupa=$gr3) or (groupa=$gr4) or (groupa=$gr5) or (groupa=$gr6))";
    $queryone=$query.$queryadd;
    $resultone = $handle->query($queryone);
    $count = mysqli_num_rows($resultone); //узнаем количетво строк в sql-запросе

                                                                                                                                                         $numresult=$resultone->num_rows;
                                                                                                                                                         for ($i=0;$i<$count;$i++){
                                                                                                                                                                                      $rowone=$resultone->fetch_assoc();
                                                                                                                                                                                      echo' <div class="block-group">';
                                                                                                                                                                                          echo'<div class="groupa">'.$rowone['groupa'].'</div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'<div class="para-spec">';
                                                                                                                                                                                          echo'    <div class="left-stolb">№</div><div class="spec">специальность</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">1</div>';
                                                                                                                                                                                          echo'<div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowone['one'].'</div>';
                                                                                                                                                                         
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowone['one_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'  <div class="prepod">'.$rowone['one_prep'].'</div>';
                                                                                                                                                                                          echo'        </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">2</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowone['two'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowone['two_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowone['two_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">3</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowone['three'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowone['three_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowone['three_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">4</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowone['four'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowone['four_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowone['four_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                      echo' </div>';
                                                                                                                                                                                    }
                                                                                                                                                        echo '</div>';
                                                                                                                                                        
                                                                                                                                                       
//}
//if ($row['groupa']=="2-1ЭТО" or $row['groupa']=="3-1ХАО" or $row['groupa']=="4-1ХАО" or $row['groupa']=="2-1ЭКО" or $row['groupa']=="3-1ЭКО" or $row['groupa']=="4-1ЭКО"){
    echo '<div class="otdel"> <h2>ХАО, ЭКО</h2>';  
    $gr1="2-1ЭТО";
    $gr1='"'.$gr1.'"';
    $gr2="3-1ХАО";
    $gr2='"'.$gr2.'"';
    $gr3="4-1ХАО";
    $gr3='"'.$gr3.'"';
    $gr4="2-1ЭКО";
    $gr4='"'.$gr4.'"';
    $gr5="3-1ЭКО";
    $gr5='"'.$gr5.'"';
    $gr6="4-1ЭКО";
    $gr6='"'.$gr6.'"';

    $queryadd=" and ((groupa=$gr1) or (groupa=$gr2) or (groupa=$gr3) or (groupa=$gr4) or (groupa=$gr5) or (groupa=$gr6))";
    $querytwo=$query.$queryadd;

   $resulttwo = $handle->query($querytwo);
    $count = mysqli_num_rows($resulttwo); //узнаем количетво строк в sql-запросе

                                                                                                                                                         $numresult=$resulttwo->num_rows;
                                                                                                                                                         for ($i=0;$i<$count;$i++){
                                                                                                                                                                                      $rowtwo=$resulttwo->fetch_assoc();
                                                                                                                                                                                      echo' <div class="block-group">';
                                                                                                                                                                                          echo'<div class="groupa">'.$rowtwo['groupa'].'</div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'<div class="para-spec">';
                                                                                                                                                                                          echo'    <div class="left-stolb">№</div><div class="spec">специальность</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">1</div>';
                                                                                                                                                                                          echo'<div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowtwo['one'].'</div>';
                                                                                                                                                                         
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowtwo['one_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'  <div class="prepod">'.$rowtwo['one_prep'].'</div>';
                                                                                                                                                                                          echo'        </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">2</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowtwo['two'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowtwo['two_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowtwo['two_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">3</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowtwo['three'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowtwo['three_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowtwo['three_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">4</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowtwo['four'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowtwo['four_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowtwo['four_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                      echo' </div>';
                                                                                                                                                                                    }
                                                                                                                                                        echo '</div>';
    //                                                                                                                                                    }  
    
    //if ($row['groupa']=="2-1ЭТО" or $row['groupa']=="3-1ХАО" or $row['groupa']=="4-1ХАО" or $row['groupa']=="2-1ЭКО" or $row['groupa']=="3-1ЭКО" or $row['groupa']=="4-1ЭКО"){
    echo '<div class="otdel"> <h2>АСОИ</h2>';  
    $gr1="2-1ИС";
    $gr1='"'.$gr1.'"';
    $gr2="3-1ИС";
    $gr2='"'.$gr2.'"';
    $gr3="3-2ИС";
    $gr3='"'.$gr3.'"';
    $gr4="4-1ИС";
    $gr4='"'.$gr4.'"';

    $queryadd=" and ((groupa=$gr1) or (groupa=$gr2) or (groupa=$gr3) or (groupa=$gr4))";
    $querythree=$query.$queryadd;

   $resultthree = $handle->query($querythree);
    $count = mysqli_num_rows($resultthree); //узнаем количетво строк в sql-запросе

                                                                                                                                                         $numresult=$resultthree->num_rows;
                                                                                                                                                         for ($i=0;$i<$count;$i++){
                                                                                                                                                                                      $rowthree=$resultthree->fetch_assoc();
                                                                                                                                                                                      echo' <div class="block-group">';
                                                                                                                                                                                          echo'<div class="groupa">'.$rowthree['groupa'].'</div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'<div class="para-spec">';
                                                                                                                                                                                          echo'    <div class="left-stolb">№</div><div class="spec">специальность</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">1</div>';
                                                                                                                                                                                          echo'<div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowthree['one'].'</div>';
                                                                                                                                                                         
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowthree['one_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'  <div class="prepod">'.$rowthree['one_prep'].'</div>';
                                                                                                                                                                                          echo'        </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">2</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowthree['two'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowthree['two_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowthree['two_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">3</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowthree['three'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowthree['three_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowthree['three_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">4</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowthree['four'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowthree['four_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowthree['four_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                      echo' </div>';
                                                                                                                                                                                    }
                                                                                                                                                        echo '</div>';
    //                                                                                                                                                    }  
    
        //if ($row['groupa']=="2-1ЭТО" or $row['groupa']=="3-1ХАО" or $row['groupa']=="4-1ХАО" or $row['groupa']=="2-1ЭКО" or $row['groupa']=="3-1ЭКО" or $row['groupa']=="4-1ЭКО"){
    echo '<div class="otdel"> <h2>ТТО</h2>';  
    $gr1="2-1ТТО";
    $gr1='"'.$gr1.'"';
    $gr2="3-1ТТО";
    $gr2='"'.$gr2.'"';
    $gr3="4-1ТТО";
    $gr3='"'.$gr3.'"';
    $gr4="2-1ГАЗ";
    $gr4='"'.$gr4.'"';
    $gr5="3-1ГАЗ";
    $gr5='"'.$gr5.'"';
    $gr6="4-1ГАЗ";
    $gr6='"'.$gr6.'"';
    $queryadd=" and ((groupa=$gr1) or (groupa=$gr2) or (groupa=$gr3) or (groupa=$gr4) or (groupa=$gr5) or (groupa=$gr6))";
    $queryfour=$query.$queryadd;

   $resultfour = $handle->query($queryfour);
    $count = mysqli_num_rows($resultfour); //узнаем количетво строк в sql-запросе

                                                                                                                                                         $numresult=$resultfour->num_rows;
                                                                                                                                                         for ($i=0;$i<$count;$i++){
                                                                                                                                                                                      $rowfour=$resultfour->fetch_assoc();
                                                                                                                                                                                      echo' <div class="block-group">';
                                                                                                                                                                                          echo'<div class="groupa">'.$rowfour['groupa'].'</div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'<div class="para-spec">';
                                                                                                                                                                                          echo'    <div class="left-stolb">№</div><div class="spec">специальность</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">1</div>';
                                                                                                                                                                                          echo'<div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowfour['one'].'</div>';
                                                                                                                                                                         
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowfour['one_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'  <div class="prepod">'.$rowfour['one_prep'].'</div>';
                                                                                                                                                                                          echo'        </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">2</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowfour['two'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowfour['two_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowfour['two_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">3</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowfour['three'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowfour['three_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowfour['three_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">4</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowfour['four'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowfour['four_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowfour['four_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                      echo' </div>';
                                                                                                                                                                                    }
                                                                                                                                                        echo '</div>';
    //                                                                                                                                                    } 
    
          //if ($row['groupa']=="2-1ЭТО" or $row['groupa']=="3-1ХАО" or $row['groupa']=="4-1ХАО" or $row['groupa']=="2-1ЭКО" or $row['groupa']=="3-1ЭКО" or $row['groupa']=="4-1ЭКО"){
    echo '<div class="otdel"> <h2>ЭТО</h2>';  
    $gr1="2-1ЭТО";
    $gr1='"'.$gr1.'"';
    $gr2="3-1ТТО";
    $gr2='"'.$gr2.'"';
    $gr3="3-1ЭТО";
    $gr3='"'.$gr3.'"';
    $gr4="4-1ЭТО";
    $gr4='"'.$gr4.'"';
    $gr5="3-2ЭТО";
    $gr5='"'.$gr5.'"';
    $gr6="4-2ЭТО";
    $gr6='"'.$gr6.'"';
    $queryadd=" and ((groupa=$gr1) or (groupa=$gr2) or (groupa=$gr3) or (groupa=$gr4) or (groupa=$gr5) or (groupa=$gr6))";
    $queryfive=$query.$queryadd;

   $resultfive = $handle->query($queryfive);
    $count = mysqli_num_rows($resultfive); //узнаем количетво строк в sql-запросе

                                                                                                                                                         $numresult=$resultfive->num_rows;
                                                                                                                                                         for ($i=0;$i<$count;$i++){
                                                                                                                                                                                      $rowfive=$resultfive->fetch_assoc();
                                                                                                                                                                                      echo' <div class="block-group">';
                                                                                                                                                                                          echo'<div class="groupa">'.$rowfive['groupa'].'</div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'<div class="para-spec">';
                                                                                                                                                                                          echo'    <div class="left-stolb">№</div><div class="spec">специальность</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">1</div>';
                                                                                                                                                                                          echo'<div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowfive['one'].'</div>';
                                                                                                                                                                         
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowfive['one_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'  <div class="prepod">'.$rowfive['one_prep'].'</div>';
                                                                                                                                                                                          echo'        </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">2</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowfive['two'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowfive['two_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowfive['two_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">3</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowfive['three'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowfive['three_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowfive['three_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                            
                                                                                                                                                                                          echo'    <div class="para-spec">';
                                                                                                                                                                                          echo'   <div class="left-stolb">4</div>';
                                                                                                                                                                                          echo'    <div class="predmet-prepod">';
                                                                                                                                                                                          echo'<div class="predmetkab">';
                                                                                                                                                                                          echo'    <div class="predmet">'.$rowfive['four'].'</div>';
                                                                                                                                                                                          echo'    <div class="kab">, '.$rowfive['four_kab'].'</div>';
                                                                                                                                                                                          echo'</div>';
                                                                                                                                                                                          echo'        <div class="prepod">'.$rowfive['four_prep'].'</div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                          echo'    </div>';
                                                                                                                                                                                      echo' </div>';
                                                                                                                                                                                    }
                                                                                                                                                        echo '</div>';
    //                                                                                                                                                    } 
}

?>
</div>
    </main>
 
<footer class="my-flex-box">Сайт создан студентом группы 4-1 ИС <br> <a target="_blank" href="https://vk.com/tyapkowladislav"><div class="vktext"><div class="vk"></div>Тяпков Владислав</div></a></footer>
    
    
   <!--эталон запроса
   <?php
    
    $nomer2=$_REQUEST['nomer2'];
if($nomer2=="1"){
$nomer2=0;
$query2 = "SELECT COUNT(*) as count FROM price";
$result2 = $handle->query($query2);
  $row2=$result2->fetch_assoc();
  echo $row2['count'];
}
?>
-->


</body>
</html>