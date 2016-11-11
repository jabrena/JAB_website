<?
require("../../../config.php");

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());


//Create user data table.
mysql_query("CREATE TABLE `ewccc_users` (
  `IDUSER` int(11) NOT NULL auto_increment,
  `USER` char(20) NOT NULL,
  `FIRST_NAME` char(50) NOT NULL,
  `LAST_NAME` char(50) NOT NULL,
  `PASSWORD` char(20) NOT NULL,
  `EMAIL` char(50) NOT NULL,
  `IDUSER_LEVEL` int(11) NOT NULL,
  PRIMARY KEY  (`IDUSER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_users`(IDUSER,USER,PASSWORD,IDUSER_LEVEL,FIRST_NAME,LAST_NAME,EMAIL) VALUES (1, 'esmetaman', 'esmeta', 1, 'Juan Antonio', 'Breña Moral', 'bren@juanantonio.info');") or die(mysql_error());


//Create user security level data table.
mysql_query("CREATE TABLE `ewccc_user_levels` (
  `IDUSER_LEVEL` int(11) NOT NULL,
  `USER_LEVEL` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());


mysql_query("INSERT INTO `ewccc_user_levels` VALUES (1, 'Master');") or die(mysql_error());
mysql_query("INSERT INTO `ewccc_user_levels` VALUES (2, 'Editor');") or die(mysql_error());
mysql_query("INSERT INTO `ewccc_user_levels` VALUES (3, 'Extranet');") or die(mysql_error());

/*
mysql_query("CREATE TABLE `ewccc_metadata` (
  `TITLE` text NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `KEYWORDS` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;") or die(mysql_error());
*/

mysql_query("CREATE TABLE `ewccc_documents` (
`IDDOCUMENT` INT NOT NULL AUTO_INCREMENT ,
`IDCREATOR` INT NOT NULL ,
`CONTENT` TEXT NOT NULL ,
`METADATA_TITLE` TEXT NOT NULL ,
`METADATA_DESCRIPTION` TEXT NOT NULL ,
`METADATA_KEYWORDS` TEXT NOT NULL ,
`TITLE` VARCHAR( 100 ) NOT NULL ,
`IDPARENT` INT NOT NULL ,
`ISPART` BOOL NOT NULL,
PRIMARY KEY  (`IDDOCUMENT`)
) TYPE = MYISAM;") or die(mysql_error());


mysql_query("INSERT INTO `ewccc_documents` (IDDOCUMENT,TITLE) VALUES (1,'ROOT');") or die(mysql_error());
mysql_query("INSERT INTO `ewccc_documents` (IDDOCUMENT,TITLE) VALUES (2,'EXTRANET');") or die(mysql_error());


mysql_query("CREATE TABLE `ewccc_metadata` (
`METADATA_TITLE` TEXT NOT NULL ,
`METADATA_DESCRIPTION` TEXT NOT NULL ,
`METADATA_KEYWORDS` TEXT NOT NULL ,
`METADATA_OTHERS` TEXT NOT NULL ,
`METADATA_ROBOTS` TEXT NOT NULL
) ENGINE = MYISAM ;") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_metadata` VALUES (
'TITLE: Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
',
'
DESCRIPTION: Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
',
'
KEYWORDS: Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
',
'<!-- OTHERS METATADA -->
<meta name=\"VW96.objecttype\" content=\"Document\">
<meta name=\"DC.Language\" scheme=\"RFC1766\" content=\"Spanish\">
<meta name=\"distribution\" content=\"global\">
<meta name=\"resource-type\" content=\"document\">

<!-- CACHE -->
<meta http-equiv=\"cache-control\" content=\"no-cache\" />
<meta http-equiv=\"pragma\" content=\"no-cache\" />
<meta http-equiv=\"expires\" content=\"0\" />
',
'<meta name=\"robots\" content=\"all\">');") or die(mysql_error());

/*

"<meta name=\"VW96.objecttype\" content=\"Document\">" .
		"<meta name=\"DC.Language\" scheme=\"RFC1766\" content=\"Spanish\">" .
		"<meta name=\"distribution\" content=\"global\">" .
		"<meta name=\"resource-type\" content=\"document\">" .

		"<!-- CACHE -->" .
		"<meta http-equiv=\"cache-control\" content=\"no-cache\" />" .
		"<meta http-equiv=\"pragma\" content=\"no-cache\" />" .
		"<meta http-equiv=\"expires\" content=\"0\" />'," .
		"'<meta name=\"robots\" content=\"all\">
*/

mysql_query("CREATE TABLE `ewccc_extranet_users_documents` (
`IDUSER` INT NOT NULL ,
`IDDOCUMENT` INT NOT NULL
) ENGINE = MYISAM ;") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (3,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 1','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 1',1,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (4,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 2','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 2',1,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (5,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 3','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 3',1,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (6,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 4','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 4',1,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (7,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 5','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 5',1,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (8,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 6','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 6',2,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (9,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 7','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 7',2,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (10,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 8','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 8',3,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (11,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 9','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 9',8,0);") or die(mysql_error());

mysql_query("INSERT INTO `ewccc_documents` VALUES (12,1,'<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue. Pellentesque luctus pretium arcu. Fusce eu arcu at augue condimentum lobortis. Nam pellentesque blandit mi. Vivamus tellus massa, volutpat at, rutrum quis, sagittis ac, nulla. Curabitur non nunc in odio laoreet lobortis. Nunc eros neque, tempor sit amet, blandit ac, iaculis nec, mi. Sed erat. Proin elit enim, lobortis non, blandit eu, fringilla sit amet, quam. Nunc sit amet metus. Proin nonummy placerat urna. Aliquam eu ipsum. Morbi consectetuer pharetra mauris. Donec suscipit auctor mi.
</p>
<p>
Cras consectetuer magna id sapien. In volutpat sem in tortor. Sed ultrices elit eu velit. Pellentesque fringilla mattis odio. Proin in ante eget velit ultricies tincidunt. Praesent est. Curabitur viverra ipsum eget odio dignissim dignissim. Pellentesque eu libero id leo porttitor vulputate. In non orci nec eros auctor posuere. Nam diam. Mauris sed pede quis augue sagittis adipiscing. Phasellus ut mauris ut dui gravida pretium. Pellentesque posuere pretium eros.
</p>','Lorem ipsum 10','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In posuere dui in augue.'
,'Lorem ipsum','Lorem ipsum 10',3,0);") or die(mysql_error());


header("Content-type: application/xhtml+xml");

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "	<message>" .
		"+ User data table created<br/>" .
		"+ Master user created<br />" .
		"+ User levels data table created<br />" .
		"+ User level types created<br />" .
		"+ Documents data table created<br />" .
		"+ Metadata data table created<br />" .
		"+ Metadata Example added<br />" .		
		"+ Extranet data table created<br />" .
		"+ Root Document Created<br />" .
		"+ Extranet Document Created<br />" .
		"+ Document Example1 added<br />" .
		"+ Document Example2 added<br />" .
		"+ Document Example3 added<br />" .
		"+ Document Example4 added<br />" .
		"+ Document Example5 added<br />" .
		"+ Document Example6 added<br />" .
		"+ Document Example7 added<br />" .
		"+ Document Example8 added<br />" .
		"+ Document Example9 added<br />" .
		"+ Document Example10 added<br />" .
		"</message>\n";
echo "</esmeta>";
?>
