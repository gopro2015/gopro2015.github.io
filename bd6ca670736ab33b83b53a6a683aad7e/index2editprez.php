<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Расписание занятий</title>
     <link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300&display=swap" rel="stylesheet">
   <script src="jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="main.css">
<script>

    $(function() {
        $('#colorselector').change(function(){
            $('.colors').hide();
            $('#' + $(this).val()).show();
        });
    });

    </script>
  <script type="text/javascript">
<!--
/*
originally written by paul sowden <paul@idontsmoke.co.uk> | http://idontsmoke.co.uk
modified and localized by alexander shurkayev <alshur@narod.ru> | http://htmlcoder.visions.ru
last modification 06.12.2009 by KDG http://htmlweb.ru/
*/

initial_sort_id = 0; // номер начального отсортированного столбца, начиная с нуля
initial_sort_up = 0; // 0 - сортировка вниз, 1 - вверх
var sort_case_sensitive = false; // чуствительновть к регистру при сотрировке

function _sort(a, b) {
	var a = a[0];
	var b = b[0];
	var _a = (a + '').replace(/,/, '.');
	var _b = (b + '').replace(/,/, '.');
	if (parseInt(_a) && parseInt(_b)) return sort_numbers(parseInt(_a), parseInt(_b));
	else if (!sort_case_sensitive) return sort_insensitive(a, b);
	else return sort_sensitive(a, b);
}

function sort_numbers(a, b) {
	return a - b;
}

function sort_insensitive(a, b) {
	var anew = a.toLowerCase();
	var bnew = b.toLowerCase();
	if (anew < bnew) return -1;
	if (anew > bnew) return 1;
	return 0;
}

function sort_sensitive(a, b) {
	if (a < b) return -1;
	if (a > b) return 1;
	return 0;
}

function getConcatenedTextContent(node) {
	var _result = "";
	if (node == null) {
		return _result;
	}
	var childrens = node.childNodes;
	var i = 0;
	while (i < childrens.length) {
		var child = childrens.item(i);
		switch (child.nodeType) {
			case 1: // ELEMENT_NODE
			case 5: // ENTITY_REFERENCE_NODE
				_result += getConcatenedTextContent(child);
				break;
			case 3: // TEXT_NODE
			case 2: // ATTRIBUTE_NODE
			case 4: // CDATA_SECTION_NODE
				_result += child.nodeValue;
				break;
			case 6: // ENTITY_NODE
			case 7: // PROCESSING_INSTRUCTION_NODE
			case 8: // COMMENT_NODE
			case 9: // DOCUMENT_NODE
			case 10: // DOCUMENT_TYPE_NODE
			case 11: // DOCUMENT_FRAGMENT_NODE
			case 12: // NOTATION_NODE
			// skip
			break;
		}
		i++;
	}
	return _result;
}

function sort(e) {
	var el = window.event ? window.event.srcElement : e.currentTarget;

	while (el.tagName.toLowerCase() != "td") el = el.parentNode;

	var a = new Array();
	var name = el.lastChild.nodeValue;
	var dad = el.parentNode;
	var table = dad.parentNode.parentNode;
	var up = table.up; // no set/getAttribute!

	var node, arrow, curcol;
	for (var i = 0; (node = dad.getElementsByTagName("td").item(i)); i++) {
		if (node.lastChild.nodeValue == name){
			curcol = i;
			if (node.className == "curcol"){
				arrow = node.firstChild;
				table.up = Number(!up);
			}else{
				node.className = "curcol";
				arrow = node.insertBefore(document.createElement("span"),node.firstChild);
			        arrow.appendChild(document.createTextNode(""));
				table.up = 0;
			}
			arrow.innerHTML=((table.up==0)?"&#8595;":"&#8593;")+"&nbsp;";
		}else{
			if (node.className == "curcol"){
				node.className = "";
				if (node.firstChild) node.removeChild(node.firstChild);
			}
		}
	}

	var tbody = table.getElementsByTagName("tbody").item(0);
	for (var i = 0; (node = tbody.getElementsByTagName("tr").item(i)); i++) {
		a[i] = new Array();
		a[i][0] = getConcatenedTextContent(node.getElementsByTagName("td").item(curcol));
		a[i][1] = getConcatenedTextContent(node.getElementsByTagName("td").item(1));
		a[i][2] = getConcatenedTextContent(node.getElementsByTagName("td").item(0));
		a[i][3] = node;
	}

	a.sort(_sort);

	if (table.up) a.reverse();

	for (var i = 0; i < a.length; i++) {
		tbody.appendChild(a[i][3]);
	}
}

function init(e) {
	if (!document.getElementsByTagName) return;
	
	if (document.createEvent) function click_elem(elem){
		var evt = document.createEvent("MouseEvents");
		evt.initMouseEvent("click", false, false, window, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, elem);
		elem.dispatchEvent(evt);
	}

	for (var j = 0; (thead = document.getElementsByTagName("thead").item(j)); j++) {
		var node;
		for (var i = 0; (node = thead.getElementsByTagName("td").item(i)); i++) {
			if (node.addEventListener) node.addEventListener("click", sort, false);
			else if (node.attachEvent) node.attachEvent("onclick", sort);
			node.title = "Нажмите на заголовок, чтобы отсортировать колонку";
		}
		thead.parentNode.up = 0;
		
		if (typeof(initial_sort_id) != "undefined"){
			td_for_event = thead.getElementsByTagName("td").item(initial_sort_id);
			if (td_for_event.dispatchEvent) click_elem(td_for_event);
			else if (td_for_event.fireEvent) td_for_event.fireEvent("onclick");
			if (typeof(initial_sort_up) != "undefined" && initial_sort_up){
				if (td_for_event.dispatchEvent) click_elem(td_for_event);
				else if (td_for_event.fireEvent) td_for_event.fireEvent("onclick");
			}
		}
	}
}

var root = window.addEventListener || window.attachEvent ? window : document.addEventListener ? document : null;
if (root){
	if (root.addEventListener) root.addEventListener("load", init, false);
	else if (root.attachEvent) root.attachEvent("onload", init);
}
//-->
</script>

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
 // $dateshow= date('Y-m-d'); 
  setlocale(LC_ALL, 'ru_RU.UTF-8');
echo strftime('на %d.%m.%Y', time());
echo '<br>';
echo strftime('%A', time());

 
}

?>
</h3>

   <br>


<?php

     
$host = 'localhost'; // адрес сервера 
$database = 'c953640n_sparepa'; // имя базы данных
$user = 'c953640n_sparepa'; // имя пользователя
$password = '1234567'; // пароль




echo '<form method="POST">';
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

 echo '</div>';
 echo '</fieldset>';
mysqli_close($handle);

  $dateshow= date('Y-m-d');  
  $dateshow = '"'.$dateshow.'"';
//  echo $dateshow;
  ?>

<form action="index2editprez.php" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>Добавление</legend>
<div class="addskip">
    <div class="mar">
        <?php 
        
        
        $gr = 1;
         
        $result=mysqli_query($query); 
        echo'Группа:';
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
        ?>
    </div>
 <div class="mar">
       <label for="one">Первая пара:</label>
       
       <?php
$query="SELECT * FROM predmets"; 
$result=mysql_query($query); 
echo "<select id='one' name='one2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['nazv'].'" >'.$line['nazv'];
} 
echo "</select>\n <br>"; 
        ?>
        
         <label for="one2">Преподаватель:</label>

       <?php
$query="SELECT * FROM preps"; 
$result=mysql_query($query); 
echo "<select id='one2' name='one_prep2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['name'].'" >'.$line['name'];
} 
echo "</select>\n <br>"; 
        ?>
        <label for="kab">Кабинет:</label>

       <?php
$query="SELECT * FROM kabinets"; 
$result=mysql_query($query); 
echo "<select id='one2' name='one_kab2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['nomer'].'" >'.$line['nomer'];
} 
echo "</select>\n <br>"; 
        ?>
        
    </div>
    <div class="mar">
       <label for="one2">Вторая пара:</label>
       <?php
$query="SELECT * FROM predmets"; 
$result=mysql_query($query); 
echo "<select id='one2' name='two2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['nazv'].'" >'.$line['nazv'];
} 
echo "</select>\n <br>"; 
        ?>
            
         <label for="one2">Преподаватель:</label>

       <?php
$query="SELECT * FROM preps"; 
$result=mysql_query($query); 
echo "<select id='one2' name='two_prep2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['name'].'" >'.$line['name'];
} 
echo "</select>\n <br>"; 
        ?>
        
        <label for="kab">Кабинет:</label>

       <?php
$query="SELECT * FROM kabinets"; 
$result=mysql_query($query); 
echo "<select id='one2' name='two_kab2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['nomer'].'" >'.$line['nomer'];
} 
echo "</select>\n <br>"; 
        ?>
        
    </div>
     <div class="mar">
              <label for="one2">Третья пара:</label>
       <?php
$query="SELECT * FROM predmets"; 
$result=mysql_query($query); 
echo "<select id='one2' name='three2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['nazv'].'" >'.$line['nazv'];
} 
echo "</select>\n <br>"; 
        ?>
         <label for="one2">Преподаватель:</label>

       <?php
$query="SELECT * FROM preps"; 
$result=mysql_query($query); 
echo "<select id='one2' name='three_prep2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['name'].'" >'.$line['name'];
} 
echo "</select>\n <br>"; 
        ?>
        <label for="kab">Кабинет:</label>

       <?php
$query="SELECT * FROM kabinets"; 
$result=mysql_query($query); 
echo "<select id='one2' name='three_kab2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['nomer'].'" >'.$line['nomer'];
} 
echo "</select>\n <br>"; 
        ?>
        
    </div>
     <div class="mar">
              <label for="one2">Четвертая пара:</label>
       <?php
$query="SELECT * FROM predmets"; 
$result=mysql_query($query); 
echo "<select id='one2' name='four2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['nazv'].'" >'.$line['nazv'];
} 
echo "</select>\n <br>"; 
        ?>
         <label for="one2">Преподаватель:</label>

       <?php
$query="SELECT * FROM preps"; 
$result=mysql_query($query); 
echo "<select id='one2' name='four_prep2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['name'].'" >'.$line['name'];
} 
echo "</select>\n <br>"; 
        ?>
        
        <label for="kab">Кабинет:</label>

       <?php
$query="SELECT * FROM kabinets"; 
$result=mysql_query($query); 
echo "<select id='one2' name='four_kab2'>"; 
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
echo '<option value="'.$line['nomer'].'" >'.$line['nomer'];
} 
echo "</select>\n <br>"; 
        ?>
    </div>
    
      <div class="mar">Дата:<br>
        <input type="date" name="date2" >
    </div>

     <div class="mar">
        <input type="hidden" name="add" value="1"> 
        <input type="submit" name="submit" value="Добавить"><br>
    </div>
    </div>
    </fieldset>
</form> 
<?php 

$handle = mysqli_connect($host, $user, $password, $database) ;
$dbcon=mysqli_select_db($database);

$nomer=$_REQUEST['nomer'];
  $query = "SELECT * FROM price WHERE (date=$dateshow)";
if($nomer=="1"){
     $nomer=0;
      $field = $_POST['group'];
      $dateshow = $_REQUEST['dateshow'];

                      $field = '"'.$field.'"';

   
    if ($field=='""') {
                       
                        $dateshow = '"'.$dateshow.'"';
                        $query = "SELECT * FROM price WHERE (date=$dateshow)";
    }

    else {

  $dateshow = '"'.$dateshow.'"';
   $query = "SELECT * FROM price WHERE (groupa=$field) and (date=$dateshow)";
    }
   
}
if ($dateshow=='""'){ $query = "SELECT * FROM price WHERE date=$dateshow";}


echo '      <fieldset>';
echo '    <legend>Навигация</legend> ';
echo '    <div class="addskip">
<form action="index2editprezgroup.php">
    <input type="submit" value="Группы">
</form>

<form action="index2editprezkabinet.php">
    <input type="submit" value="Кабинеты">
</form>

<form action="index2editprezpredmets.php">
    <input type="submit" value="Предметы">
</form>

<form action="index2editprezprep.php">
    <input type="submit" value="Преподаватели">
</form>';

 echo '</div>';
 echo '</fieldset>';

/*
 echo 'Дата '.$dateshow;
 echo '<br>';
 echo 'Группа '.$field;
  echo '<br>';
 echo 'Запрос '.$query;
  */
 ?>

 <table class="sort" align="center">
<thead>
<tr>
<td>Группа</td>
<td>Первая пара</td>
<td>Преп.</td>
<td>Каб.</td>
<td>Вторая пара</td>
<td>Преп.</td>
<td>Каб.</td>
<td>Третья пара</td>
<td>Преп.</td>
<td>Каб.</td>
<td>Четвертая пара</td>
<td>Преп.</td>
<td>Каб.</td>
<td>Сохранение</td>
<td>Удаление</td>


</tr>
</thead>

<tbody>
<?php 
$host = 'localhost'; // адрес сервера 
$database = 'c953640n_sparepa'; // имя базы данных
$user = 'c953640n_sparepa'; // имя пользователя
$password = '1234567'; // пароль

$handle = mysqli_connect($host, $user, $password, $database); 
$dbcon=mysqli_select_db($database); 
 
 
 $result = $handle->query($query);
 $numresult=$result->num_rows;

 for ($i=0;$i<$numresult;$i++)
 {
      $row=$result->fetch_assoc();

    echo '<tr><td>'.$row['groupa'].'</td>';
    echo "<form action=index2editprez.php  id='".$i;echo"' method=post><input type=hidden name=save value='".$row['id'];echo"'></input>";
    echo '<td><input class="input2" name="one" value="'.$row['one']; echo'"></td>';
    echo '<td><input class="input2" name="one_prep" value="'.$row['one_prep']; echo'"></td>';
    echo '<td><input class="input2" name="one_kab" value="'.$row['one_kab']; echo'"></td>';
    echo '<td><input class="input2" name="two" value="'.$row['two']; echo'"></td>';
    echo '<td><input class="input2" name="two_prep" value="'.$row['two_prep']; echo'"></td>';
    echo '<td><input class="input2" name="two_kab" value="'.$row['two_kab']; echo'"></td>';
    echo '<td><input class="input2" name="three" value="'.$row['three']; echo'"></td>';
    echo '<td><input class="input2" name="three_prep" value="'.$row['three_prep']; echo'"></td>';
    echo '<td><input class="input2" name="three_kab" value="'.$row['three_kab']; echo'"></td>';
    echo '<td><input class="input2" name="four" value="'.$row['four']; echo'"></td>';
    echo '<td><input class="input2" name="four_prep" value="'.$row['four_prep']; echo'"></td>';
    echo '<td><input class="input2" name="four_kab" value="'.$row['four_kab']; echo'"></td>';
        echo '<td>';
        echo '<input class="input2" type="submit" value="сохранить" ></td></form>';
              echo '<td>';
    echo '<form action=index2editprez.php> <input type=hidden name=del value ='.$row['id'];echo'></input>';
echo '<input class="input2" type=submit value="Удалить" onclick="if(confirm(\'Вы уверены, что хотите удалить эту запись?\'))submit();else return false;"></input>';
echo'</form></td>';


 }
  echo '</tbody>';
echo '</table>';
     ?>
</div>
    </main>
 
<footer class="my-flex-box">Сайт создан студентом группы 4-1 ИС <br> <a target="_blank" href="https://vk.com/tyapkowladislav"><div class="vktext"><div class="vk"></div>Тяпков Владислав</div></a></footer>

 <?php
   if(isset($_REQUEST['save']))
{
    $id = $_REQUEST['save'];
    $one = $_REQUEST['one'];
    $one_prep = $_REQUEST['one_prep'];
    $one_kab = $_REQUEST['one_kab'];
    $two = $_REQUEST['two'];
    $two_prep = $_REQUEST['two_prep'];
    $two_kab = $_REQUEST['two_kab'];
    $three = $_REQUEST['three'];
    $three_prep = $_REQUEST['three_prep'];
    $three_kab = $_REQUEST['three_kab'];
    $four = $_REQUEST['four'];
    $four_prep = $_REQUEST['four_prep'];
    $four_kab = $_REQUEST['four_kab'];   
 $query = "UPDATE price SET one = '$one', one_prep = '$one_prep',one_kab = '$one_kab', two = '$two',two_prep = '$two_prep',two_kab = '$two_kab', three = '$three',three_prep = '$three_prep',three_kab = '$three_kab', four = '$four',four_prep = '$four_prep',four_kab = '$four_kab' WHERE id=$id";
 $result = $handle->query($query);


 if($result){echo'<script>alert("Данные успешно изменены");</script><script type="text/javascript">location.replace("index2editprez.php")</script>';}
}
?>

    <?php
    if(isset($_REQUEST['del']))
{
    $del = $_REQUEST['del'];
   
        
 $handle = mysqli_connect($host, $user, $password, $database) ;
 
 $query = "DELETE FROM price WHERE id = $del";
 $result = $handle->query($query);
if($result){echo'<script>alert("Данные успешно удалены");</script><script type="text/javascript">location.replace("index2editprez.php")</script>';}
}
 ?>
 
 <?php
 $add = $_REQUEST['add'];
    if($add==1){
    
    $group2 = $_REQUEST['group2'];
    
    $one2 = $_REQUEST['one2'];
    $one_prep2 = $_REQUEST['one_prep2'];
    $one_kab2 = $_REQUEST['one_kab2'];
    
    $two2 = $_REQUEST['two2'];
    $two_prep2 = $_REQUEST['two_prep2'];
    $two_kab2 = $_REQUEST['two_kab2'];
    
    $three2 = $_REQUEST['three2'];
    $three_prep2 = $_REQUEST['three_prep2'];
    $three_kab2 = $_REQUEST['three_kab2'];
    
    $four2 = $_REQUEST['four2'];
    $four_prep2 = $_REQUEST['four_prep2'];
    $four_kab2 = $_REQUEST['four_kab2'];    
    
   $date2 =  $_REQUEST['date2'];
   
     $handle = mysqli_connect($host, $user, $password, $database) ;
 $query="INSERT INTO price (groupa, one, one_prep, one_kab, two,two_prep,two_kab, three,three_prep, three_kab, four,four_prep,four_kab, date) VALUES ('$group2', '$one2','$one_prep2','$one_kab2', '$two2','$two_prep2','$two_kab2','$three2','$three_prep2','$three_kab2','$four2','$four_prep2','$four_kab2','$date2')"; 
 $result = $handle->query($query);
if($result){echo'<script>alert("Данные успешно сохранены");</script><script type="text/javascript">location.replace("index2editprez.php")</script>';}
}
?>
    
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