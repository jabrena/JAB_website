<?
//Know the path to show fileSystem
if (isset($_GET['nuevo_dir']))
  $nuevo_dir=$_GET['nuevo_dir'];
else {
  //$nuevo_dir=getcwd();
  $nuevo_dir = "../../p_uploads";
}

//Execute a EWCCC Javascript Script  
echo "<script>WPCObject.showPath('" . $nuevo_dir . "')</script>";


if (!$df_dir = opendir($nuevo_dir)){
  die("<h3>*** ERROR: no se ha podido entrar en ($nuevo_dir)</h3>");
}else{

	echo("<table cellpadding=\"0\" cellspacing=\"0\">");

	while(($item = readdir($df_dir)) !== false){
		if ($item == ".") continue;
	
		if (es_directorio($nuevo_dir, $item)){
			echo("<tr><td class='t6'>");
	    	pon_url($nuevo_dir, $item);
	    	echo("</td></tr>");
		}else{
		
			echo("<tr><td>");
	  		//Improve this line using type of files with others icons
	  		echo "<img src='r_media/images/icons/file_icon.gif'></td>";
	  		echo "<td class='t6' valign='middle'><a href=" . $nuevo_dir . "/" . $item ." target='_blank'>" . $item . "</a></td>";
	  		echo "<td>&nbsp;<a href=\"javascript:WPCObject.deleteFile('" . $nuevo_dir ."','" . $item ."')\"><img src='r_media/images/icons/b_drop.png' /></a></td>";
	  		echo("</tr>");
		}
	}
	echo("</table>");
}
closedir($df_dir);

function pon_url($un_dir, $un_item)
{
  $ini_etiq="<a href='${_SERVER["PHP_SELF"]}?nuevo_dir";
  $fin_etiq="</a><br>";

if ($un_item == "..") {
	
    if (substr_count($un_dir, "/") >= 1) {
      $un_dir=strtr(dirname($un_dir), "\\", "/"); // Win devuelve '/'
      echo "<img src='r_media/images/icons/back_icon.jpg'>$ini_etiq=$un_dir'><span class='t5'>..</span>$fin_etiq";
    }
  } else {
    if ($un_dir=="/")
      echo "<img src='r_media/images/icons/folder_icon.gif'>$ini_etiq=/$un_item'>$un_item$fin_etiq";
    else
      echo "<img src='r_media/images/icons/folder_icon.gif'>$ini_etiq=$un_dir/$un_item'>$un_item$fin_etiq";
  }
}

function es_directorio($un_dir, $un_item)
{ // en windows no puede haber un nombre de directorio con dos '/': '//' mal
  if ($un_dir == '/')
    $fich_a_preguntar="/$un_item";
  else
    $fich_a_preguntar="$un_dir/$un_item";
  return (is_dir("$fich_a_preguntar"));
}
?>