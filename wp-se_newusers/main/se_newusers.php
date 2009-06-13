<?php

// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					JOOMOOD START PLAYING
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

// SHOW LAST SE X NEW USERS

    include(ABSPATH.'wp-content/plugins/giggi_functions/giggi_database.php');
    require_once(ABSPATH.'wp-content/plugins/giggi_functions/giggi_functions.php');



// Check some data...

if ($nametype=="0") {
$show_name="no";
} else {
$show_name="yes";
}

if ($date_format=="0") {
$show_time="no";
} else {
$show_time="yes";
}

if($nametype=="1" OR $nametype=="2" OR $nametype=="3" OR $nametype=="4") {
$nametypez=$nametype;
} else {
$nametypez="2";
}

if ($show_name=="yes" OR $show_name=="Yes" OR $show_name=="YES") {
$shown="si";
} else {
$shown="no";
}

if ($show_time=="yes" OR $show_time=="Yes" OR $show_time=="YES") {
$showt="si";
} else {
$showt="no";
}

		// Check personal width & height...


        if($pic_dim_width=="0" OR $pic_dim_height=="0" OR $pic_dim_width=="" OR $pic_dim_height=="" OR $my_w=="0" OR $my_h=="0") {
        $pic_dimensions="0";
        } else {
        $pic_dimensions="1";
        }

        if($pic_dimensions =="1") {
		
		$mywidth=$pic_dim_width;
		$myheight=$pic_dim_height;
		
		} else {
		$mywidth="60";
		$myheight="60";
		
		}

		// Check max lenght name...
		
		if ($max_lenght_name=="0" OR $max_lenght_name=="") {
		$max_lenght_name="12";
		}


		// Check Num of Users...

		if($numOfUser<0) {
		$numOfUser=1;
		}

		if($how_many_users>$numOfUser) {
		$how_many_users=$numOfUser;
		}

// ---------------------------------------------------------

		// Check Main Box border style
		
		if ($mainbox_border_style=="0" OR $mainbox_border_style=="1" OR $mainbox_border_style=="2") {
		$mainbox_border_res="1";
		} else {
		$mainbox_border_res="0";
		}

		// Check Main Box border color
		
		if ($mainbox_border_color!=='') {
		$mainbox_bordercol_res="1";
		} else {
		$mainbox_bordercol_res="0";
		}

		
		// Substitute empty or wrong fields
		
		if ($mainbox_border_res=="0") {
		$mainboxbord="0px solid";
		} 
		
		if ($mainbox_border_style=="1") {
		$mainboxbord="{$mainbox_border_dim}px dotted";
		} 
		
		if ($mainbox_border_style=="2") {
		$mainboxbord="{$mainbox_border_dim}px solid";
		} 
		

		if ($mainbox_bordercol_res=="0") {
		$mainboxbordcol="#ffffff";
		} else {
		$mainboxbordcol=$mainbox_border_color;
		}
		
		$mainboxbgcol=$mainbox_bg_color;

		
		// Mainbox Width
		
		if ($mainbox_width=="" || $mainbox_width=="0") {
		$mainboxwidth="100";
		$mbox="100%";
		} else {
		$mainboxwidth=$mainbox_width;
		$mbox=$mainboxwidth."%";
		}
		
		if($how_many_users=="1") {
		$mytbl=$mywidth;
		} else {
		$mytbl=floor($mainboxwidth/$how_many_users);
		}

// ---------------------------------------------------------
		
		
		// Check Inner Box border style
		
		if ($box_border_style=="0" OR $box_border_style=="1" OR $box_border_style=="2") {
		$box_border_res="1";
		} else {
		$box_border_res="0";
		}

		// Check box border color
		
		if ($box_border_color!=='') {
		$box_bordercol_res="1";
		} else {
		$box_bordercol_res="0";
		}

		
		// Substitute empty or wrong fields
		
		if ($box_border_res=="0") {
		$boxbord="0px solid";
		} 
		
		if ($box_border_style=="1") {
		$boxbord="{$box_border_dim}px dotted";
		} 
		
		if ($box_border_style=="2") {
		$boxbord="{$box_border_dim}px solid";
		} 
		

		if ($box_bordercol_res=="0") {
		$boxbordcol="#ffffff";
		} else {
		$boxbordcol=$box_border_color;
		}
		
		$boxbgcol=$box_bg_color;
		
		
		// Build Full Style Variable
		
		$mystyle="style=\"border:".$boxbord." ".$boxbordcol."; background-color: ".$boxbgcol.";\"";
		$mymainstyle="style=\"border:".$mainboxbord." ".$mainboxbordcol."; background-color: ".$mainboxbgcol.";\"";
		


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					LET'S START QUERY TO RETRIEVE OUR DATA
// ----------------------------------------------------------------------------------------------------------------------------------------------------------



$query = "SELECT *, FROM_UNIXTIME((user_signupdate), '%d/%m/%y %H:%i') as data,
FROM_UNIXTIME((user_signupdate), '%d/%m/%y') as data1,
FROM_UNIXTIME((user_signupdate), '%H:%i') as data2
FROM se_users ORDER by user_signupdate DESC LIMIT {$numOfUser}";		

$result = mysql_query($query);

$i=0;

while($row = mysql_fetch_array($result, MYSQL_ASSOC))

{

if($date_format=="4") {
$miovalore= giggitime($row['user_signupdate'], $num_times=1).' ago';
} else if ($date_format=="1") {
$miovalore=$row['data'];
} else if ($date_format=="2") {
$miovalore=$row['data1'];
} else if ($date_format=="3") {
$miovalore=$row['data2'];
}


// Cut the name a little bit...

if ($nametypez=="2") {
$mynome=$row['user_displayname'];
$myn=$row['user_displayname'];
} else if ($nametypez=="1"){
$mynome=$row['user_username'];
$myn=$row['user_username'];
} else if ($nametypez=="3"){
$mynome=$row['user_fname'];
$myn=$row['user_fname'];
} else {
$mynome=$row['user_lname'];
$myn=$row['user_lname'];
}

if(strlen($mynome)>$max_lenght_name){
$mynome = substr($mynome,0,$max_lenght_name)."_";
}

if ($shown=="no"AND $showt=="no") {
$my_string="";
}

if ($shown=="si"AND $showt=="no") {
$my_string="<tr><td align=\"center\" scope=\"row\"><font color=\"{$name_color}\">{$mynome}</font></td></tr>";
}

if ($shown=="no"AND $showt=="si") {
$my_string="<tr><td align=\"center\" scope=\"row\"><small>{$miovalore}</small></td></tr>";
}

if ($shown=="si"AND $showt=="si") {
$my_string="<tr><td align=\"center\" scope=\"row\"><font color=\"{$name_color}\">{$mynome}</font><br /><small>{$miovalore}</small></td></tr>";
}




$mydir=$wpdir."/wp-content/plugins/wp-se_newusers";
$subdir = $row['user_id']+999-(($row['user_id']-1)%1000);

if($use_resize !=="no") { // RESIZING SCRIPT

if ($row['user_photo']!='') {
// Creates a thumbnail based on your personal dims (width/height), without stretching the original pic
$mypic="<img src=\"{$mydir}/image.php/{$row['user_photo']}?width={$mywidth}&amp;height={$myheight}&amp;cropratio=1:1&amp;quality=100&amp;image={$socialdir}/uploads_user/{$subdir}/{$row['user_id']}/{$row['user_photo']}\" style=\"border:".$image_border."px solid ".$image_bordercolor."\" alt=\"".$myn."\" />";
} else {
$mypic="<img src=\"{$mydir}/image.php/nophoto.gif?width={$mywidth}&amp;height={$myheight}&amp;cropratio=1:1&amp;quality=100&amp;image={$socialdir}/{$empty_image_url}\" style=\"border:".$image_border."px ".$image_bordercolor." solid\" alt=\"".$myn."\" />";
}

} else { // NO RESIZING SCRIPT

if ($row['user_photo']!='') {
// Creates a thumbnail based on your personal dims (width/height)
$myp=str_replace(".", "_thumb.", $row['user_photo']);
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$myp}";

if (@fopen($mypfile, "r")) {
$myps=str_replace(".", "_thumb.", $row['user_photo']);
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$myps}";
} else {
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$row['user_photo']}";
}

$mypic="<img src=\"{$mypfile}\" width=\"{$mywidth}\" height=\"{$myheight}\" style=\"border:".$image_border."px solid ".$image_bordercolor."\" alt=\"".$myn."\" />";
} else {
$mypic="<img src=\"{$socialdir}/{$empty_image_url}\" width=\"{$mywidth}\" height=\"{$myheight}\" style=\"border:".$image_border."px ".$image_bordercolor." solid\" alt=\"".$myn."\" />";
}

}


if($i<$how_many_users) {
$rows .= "
<td valign=\"top\" align=\"left\">
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td width=\"".$mytbl."%\" align=\"center\" valign=\"top\" scope=\"row\"><a href='".$socialdir."/profile.php?user_id=".$row['user_id']."' title='{$go_profile_text} ".$myn."'>".$mypic."</a></td>
</tr>
{$my_string}
</table>
</td>
";

} else {
$rows .= "
</tr><tr><td valign=\"top\" align=\"left\">
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td width=\"".$mytbl."%\" align=\"center\" valign=\"top\" scope=\"row\"><a href='".$socialdir."/profile.php?user_id=".$row['user_id']."' title='{$go_profile_text} ".$myn."'>".$mypic."</a></td>
</tr>
{$my_string}
</table>
</td>
";

$i=0;
}

$i++;

}

$content .="<table width=\"{$mbox}\" cellspacing=\"{$outer_cellspacing}\" cellpadding=\"{$outer_cellpadding}\" {$mymainstyle}><tr>";
$content .="{$rows}";
$content .="</tr></table>";

echo $content;


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					END OF JOOMOOD FUNNY TOY
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

?>