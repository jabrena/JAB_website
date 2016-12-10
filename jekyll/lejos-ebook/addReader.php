<html>
	<head>
		<script src="r_javascript/esmeta/loader/LoaderClass_c.js" type="text/javascript" language="JavaScript"></script>
		<script language="JavaScript" type="text/javascript">
			<!--
				// LoaderClass esta basado en la tecnologia Dynapi 2.
				LoaderClass.setLibraryPath('r_javascript/');
				LoaderClass.include('esmeta.lejosebook.LeJOSEbookAddReader.js');
				LoaderClass.include('webcuts.misc.Webcuts.js');
			// -->
		</script>
		<script src="r_javascript/jquery/framework/jquery-1.2.6.js" type="text/javascript" language="JavaScript"></script>
		<!-- CARGA DE CLASE QUE MANEJA PAGINA -->
		<script type="text/javascript" language="JavaScript">
			<!--
				//Web Page Controller Object
				WPCObject = new LeJOSEbook();
				window.onload = WPCObject.window_onLoad;
			// -->
		</script>
	</head>
	<body>
		<form action="#" method="post" name="frmDownloads" onsubmit="return WPCObject.frm_onSubmit(this)">
			<table>
				<tr>
					<td><b>Email: </b></td>
					<td><input type="text" name="email" value="" class="inputText" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="button" onclick="WPCObject.getEbook()" value="Add Reader"/>
					</td>
				</tr>
			</table>
		</form>
		<style>
td.geHeader{
	background-color: #D4DAF0;
	font-family: "MS Sans Serif", Geneva, sans-serif;
	font-size: 10px;
	color: #333333;
	padding: 5px 5px 5px 5px;
}

td.geRow{
	background-color: #f7f8fa;
	font-family: "MS Sans Serif", Geneva, sans-serif;
	font-size: 10px;
	color: #333333;
	padding: 5px 5px 5px 5px;
	border-bottom: 1px solid #D4DAF0;
}		
		</style>
<?
function getCustomerManagementTable(){

	require("./dbConnection.inc.php");

	$SQL = "";
	$SQL .= "SELECT * ";
	$SQL .= "FROM  `users` c ";
	// Solo se muestran los activos
	$SQL .= "ORDER BY  creationdate DESC; ";

	$result = mysql_query($SQL,$conn);
	$num_rows = mysql_num_rows($result);

	//Numero de registros
	echo "<p>" . $num_rows . "&nbsp;Registros de titulares</p>";

	echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"400\">\n";

	//Fila 1

	//Fila 2
	echo "<tr>\n";
	echo "<td class='geHeader'>";
	echo "Email&nbsp;&nbsp;";
	echo "</td>\n";
	echo "<td class='geHeader' >";
	echo "Creation Date&nbsp;";
	echo "</td>\n";
	echo "</tr>\n";

	while( $row = mysql_fetch_array($result) ) {
		echo "<tr>\n";
		echo "<td class='geRow'>\n";
		echo $row['email'];
		echo"<br/>";
		echo "</td>\n";
		echo "<td class='geRow'>\n";
		echo $row['creationdate'];
		echo"<br/>";
		echo "</tr>\n";

	}
	echo "</table>\n";
	
	//Numero de registros
	echo "<p>" . $num_rows . "&nbsp;Registros de titulares</p>";

	//Close connection
	mysql_free_result($result);
	mysql_close($conn);
}
getCustomerManagementTable();
?>		
		<script>
		formObj = document.frmDownloads;
		emailObj = formObj.email;
		emailObj.focus();
		</script>
	</body>
</html>
