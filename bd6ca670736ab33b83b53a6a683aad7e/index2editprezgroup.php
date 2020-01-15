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


   <br>

<?php

     
$host = 'localhost'; // адрес сервера 
$database = 'c953640n_sparepa'; // имя базы данных
$user = 'c953640n_sparepa'; // имя пользователя
$password = '1234567'; // пароль

$handle = mysqli_connect($host, $user, $password, $database); 
$dbcon=mysqli_select_db($database); 




 echo '</div>';
 echo '</fieldset>';
mysqli_close($handle);

  $dateshow= date('Y-m-d');  
  $dateshow = '"'.$dateshow.'"';
//  echo $dateshow;
  ?>
<?php
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
</form>

<form action="index2editprez.php">
    <input type="submit" value="Расписание">
</form>
';

 echo '</div>';
 echo '</fieldset>';
?>
<form action="index2editprezgroup.php" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>Добавление</legend>
<div class="addskip">
    <div class="mar">
        <?php 
        
        
        $gr = 1;
         
        $result=mysqli_query($query); 
        echo'Группа: ';
        echo '<input type="text" name=grouppa>';
        ?>
    </div>

     <div class="mar">
        <input type="hidden" name="add" value="1"> 
        <input type="submit" name="submit" value="Добавить"><br>
    </div>
    </div>
    </fieldset>
</form> 


 <table class="sort" align="center">
<thead>
<tr>
<td>Группа</td>
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

   $query = "SELECT * FROM groups";
 
 $result = $handle->query($query);
 $numresult=$result->num_rows;

 for ($i=0;$i<$numresult;$i++)
 {
      $row=$result->fetch_assoc();

   echo '<tr>';
    echo "<form action=index2editprezgroup.php  id='".$i;echo"' method=post><input type=hidden name=save value='".$row['idgroup'];echo"'></input>";
 
    echo '<td><input class="input2" name="one" value="'.$row['group1']; echo'"></td>';

        echo '<td>';
        echo '<input class="input2" type="submit" value="сохранить" ></td></form>';
              echo '<td>';
    echo '<form action=index2editprezgroup.php> <input type=hidden name=del value ='.$row['idgroup'];echo'></input>';
echo '<input class="input2" type=submit value="Удалить" onclick="if(confirm(\'Вы уверены, что хотите удалить эту запись?\'))submit();else return false;"></input>';
echo'</form></td>';
echo'</tr>';


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
 
 $query = "UPDATE groups SET group1 = '$one' WHERE idgroup=$id";
 $result = $handle->query($query);


 if($result){echo'<script>alert("Данные успешно изменены");</script><script type="text/javascript">location.replace("index2editprezgroup.php")</script>';}
}
?>

    <?php
    if(isset($_REQUEST['del']))
{
    $del = $_REQUEST['del'];
   
        
 $handle = mysqli_connect($host, $user, $password, $database) ;
 
 $query = "DELETE FROM groups WHERE idgroup = $del";
 $result = $handle->query($query);
if($result){echo'<script>alert("Данные успешно удалены");</script><script type="text/javascript">location.replace("index2editprezgroup.php")</script>';}
}
 ?>
 
 <?php
 $add = $_REQUEST['add'];
    if($add==1){
    
    $group = $_REQUEST['grouppa'];
 
   
     $handle = mysqli_connect($host, $user, $password, $database) ;
 $query="INSERT INTO groups (group1) VALUES ('$group')"; 
 $result = $handle->query($query);
if($result){echo'<script>alert("Данные успешно сохранены");</script><script type="text/javascript">location.replace("index2editprezgroup.php")</script>';}
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