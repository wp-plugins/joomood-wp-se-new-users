<?php
/*
Plugin Name: Social Engine New Users 
Plugin URI: http://2cq.it/
Description: This plugin/widget retrieves the Last X SE New Users and display them in your Wordpress Sidebar. To show your SE new users in the other pages of your wp, simply put the code <code>&lt;?php joomood_newusers(); ?&gt;</code> where you want in your template.
Author: JooMood
Version: 1.0
Author URI: http://2cq.it/

	Copyright 2009, JooMOod
	-----------------------

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
*/

function joomood_newusers_install() {

	$newoptions = get_option('joomood_newusers_options');
	
    $newoptions['title']					='JooMood SE New Users';
    $newoptions['numOfUser']				='6';
    $newoptions['how_many_users']			='1';
    $newoptions['date_format']				='2';
    $newoptions['image_border']				='0';
    $newoptions['image_bordercolor']		='#333333';
    $newoptions['go_profile_text']			='See the profile of';
    $newoptions['empty_image_url']			='images/nophoto.gif';
    $newoptions['pic_dim_width']			='50';
    $newoptions['pic_dim_height']			='50';
    $newoptions['nametype']					='2';
	$newoptions['mainbox_border_style']		='0';
	$newoptions['mainbox_border_color']		='#333333';
	$newoptions['mainbox_border_dim']		='1';
	$newoptions['mainbox_bg_color']			='#ededed';
	$newoptions['box_border_style']			='0';
	$newoptions['box_border_color']			='#333333';
	$newoptions['box_border_dim']			='1';
	$newoptions['box_bg_color']				='#f7f7f7';
	$newoptions['outer_cellspacing']		='4';
	$newoptions['outer_cellpadding']		='2';
	$newoptions['inner_cellspacing']		='4';
	$newoptions['inner_cellpadding']		='2';

	add_option('joomood_newusers_options', $newoptions);

}


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

// add the admin page
function joomood_newusers_add_pages() {
	add_options_page('SE New Users', 'SE New Users', 8, __FILE__, 'joomood_newusers_options');
}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function joomood_newusers() {

  $newoptions = get_option("joomood_newusers_options");

  	echo $before_widget;
    echo $before_title;
    echo "<h3>";

    echo $newoptions['title'];
    
    $title		 				= $newoptions['title'];
    $numOfUser 					= $newoptions['numOfUser'];
    $how_many_users 			= $newoptions['how_many_users'];
    $date_format 				= $newoptions['date_format'];
    $image_border 				= $newoptions['image_border'];
    $image_bordercolor 			= $newoptions['image_bordercolor'];
    $go_profile_text 			= $newoptions['go_profile_text'];
    $empty_image_url 			= $newoptions['empty_image_url'];
    $pic_dim_width 				= $newoptions['pic_dim_width'];
    $pic_dim_height 			= $newoptions['pic_dim_height'];
    $nametype 					= $newoptions['nametype'];
	$mainbox_border_style		= $newoptions['mainbox_border_style'];
	$mainbox_border_color		= $newoptions['mainbox_border_color'];
	$mainbox_border_dim			= $newoptions['mainbox_border_dim'];
	$mainbox_bg_color			= $newoptions['mainbox_bg_color'];
	$box_border_style			= $newoptions['box_border_style'];
	$box_border_color			= $newoptions['box_border_color'];
	$box_border_dim				= $newoptions['box_border_dim'];
	$box_bg_color				= $newoptions['box_bg_color'];
	$outer_cellspacing			= $newoptions['outer_cellspacing'];
	$outer_cellpadding			= $newoptions['outer_cellpadding'];
	$inner_cellspacing			= $newoptions['inner_cellspacing'];
	$inner_cellpadding			= $newoptions['inner_cellpadding'];	    
    
    echo $after_title;
    echo"</h3><br />";

	
	// Load main file
	
    include(ABSPATH.'wp-content/plugins/wp-se_newusers/main/se_newusers.php');

    echo $after_widget;
    echo "<br /><br />";

} // End of se_groups function



// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


	function joomood_newusers_options() {

	$options = $newoptions = get_option('joomood_newusers_options');

	if ( $_POST["mynewusers_submit"] ) {

    $newoptions['title'] =htmlspecialchars($_POST['title']);
    $newoptions['numOfUser'] = $_POST['numOfUser'];
    $newoptions['how_many_users'] = $_POST['how_many_users'];
    $newoptions['date_format'] = $_POST['date_format'];
    $newoptions['image_border'] = $_POST['image_border'];
    $newoptions['image_bordercolor'] = $_POST['image_bordercolor'];
    $newoptions['go_profile_text'] = htmlspecialchars($_POST['go_profile_text']);
    $newoptions['empty_image_url'] = $_POST['empty_image_url'];
    $newoptions['pic_dim_width'] = $_POST['pic_dim_width'];
    $newoptions['pic_dim_height'] = $_POST['pic_dim_height'];
    $newoptions['nametype'] = $_POST['nametype'];
	$newoptions['mainbox_border_style'] = $_POST['mainbox_border_style'];
	$newoptions['mainbox_border_color'] = $_POST['mainbox_border_color'];
	$newoptions['mainbox_border_dim'] = $_POST['mainbox_border_dim'];
	$newoptions['mainbox_bg_color'] = $_POST['mainbox_bg_color'];
	$newoptions['box_border_style'] = $_POST['box_border_style'];
	$newoptions['box_border_color'] = $_POST['box_border_color'];
	$newoptions['box_border_dim'] = $_POST['box_border_dim'];
	$newoptions['box_bg_color'] = $_POST['box_bg_color'];
	$newoptions['outer_cellspacing'] = $_POST['outer_cellspacing'];
	$newoptions['outer_cellpadding'] = $_POST['outer_cellpadding'];
	$newoptions['inner_cellspacing'] = $_POST['inner_cellspacing'];
	$newoptions['inner_cellpadding'] = $_POST['inner_cellpadding'];

	}
	
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('joomood_newusers_options', $options);
	}


	echo '<form method="post">';
	echo "<div class=\"wrap\"><h2>JooMood Social Engine New Users - Display Options</h2>";
	echo '<table class="form-table">';

	echo '<tr valign="top">';
	echo '<th scope="row">Title of the block</th><td><input name="title" type="text" value="'.$options['title'].'" /></td></tr>';

	echo '<tr valign="top">';
	echo '<th scope="row">How many Users you want to display?</th><td><input name="numOfUser" type="text" value="'.$options['numOfUser'].'" /></td></tr>';

	echo '<tr valign="top">';
	echo '<th scope="row">How many Users in every line?</th><td><input name="how_many_users" type="text" value="'.$options['how_many_users'].'" /></td></tr>';

	echo '<tr valign="top">';
	echo '<th scope="row">Type of Date</th><td><select name="date_format" id="date_format">
      <option ';
      if($options['date_format'] == "0"){ echo ' selected '; } echo 'value="0">No Date</option>
      <option ';
      if($options['date_format'] == "1"){ echo ' selected '; } echo 'value="1">Full Date (d/m/y H:i)</option>
      <option ';
      if($options['date_format'] == "2"){ echo ' selected '; } echo 'value="2">Partial Date (d/m/y)</option>
      <option ';
      if($options['date_format'] == "3"){ echo ' selected '; } echo 'value="3">Time (H:i)</option>
      <option ';
      if($options['date_format'] == "4"){ echo ' selected '; } echo 'value="4">Relative Date (2hrs ago)</option>
	  </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Image Width</th><td><input name="pic_dim_width" type="text" value="'.$options['pic_dim_width'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Image Height</th><td><input name="pic_dim_height" type="text" value="'.$options['pic_dim_height'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Image Border (in pixel)</th><td><input name="image_border" type="text" value="'.$options['image_border'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Image Border Color</th><td><input name="image_bordercolor" type="text" value="'.$options['image_bordercolor'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">User Link Title</th><td><input name="go_profile_text" type="text" value="'.$options['go_profile_text'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">SE Empty Image</th><td><input name="empty_image_url" type="text" value="'.$options['empty_image_url'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Type of Name</th><td>
    <select name="nametype" id="nametype">
      <option ';
      if($options['nametype'] == "0"){ echo ' selected '; } echo 'value="0">No Name</option>
      <option ';
      if($options['nametype'] == "1"){ echo ' selected '; } echo 'value="1">Username</option>
      <option ';
      if($options['nametype'] == "2"){ echo ' selected '; } echo 'value="2">Full Name</option>
      <option ';
      if($options['nametype'] == "3"){ echo ' selected '; } echo 'value="3">Name</option>
      <option ';
      if($options['nametype'] == "4"){ echo ' selected '; } echo 'value="4">Surname</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Style</th><td>
    <select name="mainbox_border_style" id="mainbox_border_style">
      <option ';
      if($options['mainbox_border_style'] == "0"){ echo ' selected '; } echo 'value="0">No Border</option>
      <option ';
      if($options['mainbox_border_style'] == "1"){ echo ' selected '; } echo 'value="1">Dotted Border</option>
      <option ';
      if($options['mainbox_border_style'] == "2"){ echo ' selected '; } echo 'value="2">Solid Border</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Color</th><td><input name="mainbox_border_color" type="text" value="'.$options['mainbox_border_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Thickness</th><td><input name="mainbox_border_dim" type="text" value="'.$options['mainbox_border_dim'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Background Color</th><td><input name="mainbox_bg_color" type="text" value="'.$options['mainbox_bg_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Style</th><td>
    <select name="box_border_style" id="box_border_style">
      <option ';
      if($options['box_border_style'] == "0"){ echo ' selected '; } echo 'value="0">No Border</option>
      <option ';
      if($options['box_border_style'] == "1"){ echo ' selected '; } echo 'value="1">Dotted Border</option>
      <option ';
      if($options['box_border_style'] == "2"){ echo ' selected '; } echo 'value="2">Solid Border</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Color</th><td><input name="box_border_color" type="text" value="'.$options['box_border_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Thickness</th><td><input name="box_border_dim" type="text" value="'.$options['box_border_dim'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Background Color</th><td><input name="box_bg_color" type="text" value="'.$options['box_bg_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Cellspacing</th><td><input name="outer_cellspacing" type="text" value="'.$options['outer_cellspacing'].'" /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">Mainbox Cellpadding</th><td><input name="outer_cellpadding" type="text" value="'.$options['outer_cellpadding'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Cellspacing</th><td><input name="inner_cellspacing" type="text" value="'.$options['inner_cellspacing'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner Cellpadding</th><td><input name="inner_cellpadding" type="text" value="'.$options['inner_cellpadding'].'" /></td>
	</tr>

	<input type="hidden" name="mynewusers_submit" value="true">

	</table>

	<p class="submit"><input type="submit" value="Update Options &raquo;"></input></p>

	</div>

	</form>';


	} // End of se_groups_options function


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function widget_SeUsers($args) {
  extract($args);

  $options = get_option("widget_SeUsers");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'JooMood SE New Users',
      'numOfUser' => '3',
      'how_many_users'=>'1',
      'date_format'=>'1',
      'image_border'=>'0',
      'image_bordercolor'=>'#333333',
      'go_profile_text'=>'See the profile of',
      'empty_image_url'=>'images/nophoto.gif',
      'pic_dim_width'=>'30',
      'pic_dim_height'=>'30',
      'nametype'=>'2',
      'mainbox_border_style'=>'0',
      'mainbox_border_color'=>'#333333',
      'mainbox_border_dim'=>'1',
      'mainbox_bg_color'=>'#ededed',
      'box_border_style'=>'0',
      'box_border_color'=>'#333333',
      'box_border_dim'=>'1',
      'box_bg_color'=>'#f7f7f7',
      'outer_cellspacing'=>'4',
      'outer_cellpadding'=>'2',
      'inner_cellspacing'=>'4',
      'inner_cellpadding'=>'2'
      );
  }      

  	echo $before_widget;
    echo $before_title;

    echo $options['title'];
    
    $title		 				= $options['title'];
    $numOfUser 					= $options['numOfUser'];
    $how_many_users 			= $options['how_many_users'];
    $date_format 				= $options['date_format'];
    $image_border 				= $options['image_border'];
    $image_bordercolor 			= $options['image_bordercolor'];
    $go_profile_text 			= $options['go_profile_text'];
    $empty_image_url 			= $options['empty_image_url'];
    $pic_dim_width 				= $options['pic_dim_width'];
    $pic_dim_height 			= $options['pic_dim_height'];
    $nametype 					= $options['nametype'];
	$mainbox_border_style		= $options['mainbox_border_style'];
	$mainbox_border_color		= $options['mainbox_border_color'];
	$mainbox_border_dim			= $options['mainbox_border_dim'];
	$mainbox_bg_color			= $options['mainbox_bg_color'];
	$box_border_style			= $options['box_border_style'];
	$box_border_color			= $options['box_border_color'];
	$box_border_dim				= $options['box_border_dim'];
	$box_bg_color				= $options['box_bg_color'];
	$outer_cellspacing			= $options['outer_cellspacing'];
	$outer_cellpadding			= $options['outer_cellpadding'];
	$inner_cellspacing			= $options['inner_cellspacing'];
	$inner_cellpadding			= $options['inner_cellpadding'];
    
    echo $after_title;

	
	// Load main file
	
    include(ABSPATH.'wp-content/plugins/wp-se_newusers/main/se_newusers.php');

    echo $after_widget;

} // End of widget_SeUsers function


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function SeUsers_control()
{
  $options = get_option("widget_SeUsers");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'JooMood SE New Users',
      'numOfUser' => '3',
      'how_many_users'=>'1',
      'date_format'=>'1',
      'image_border'=>'0',
      'image_bordercolor'=>'#333333',
      'go_profile_text'=>'See the profile of',
      'empty_image_url'=>'images/nophoto.gif',
      'pic_dim_width'=>'30',
      'pic_dim_height'=>'30',
      'nametype'=>'2',
      'mainbox_border_style'=>'0',
      'mainbox_border_color'=>'#333333',
      'mainbox_border_dim'=>'1',
      'mainbox_bg_color'=>'#ededed',
      'box_border_style'=>'0',
      'box_border_color'=>'#333333',
      'box_border_dim'=>'1',
      'box_bg_color'=>'#f7f7f7',
      'outer_cellspacing'=>'4',
      'outer_cellpadding'=>'2',
      'inner_cellspacing'=>'4',
      'inner_cellpadding'=>'2'
      );
  }    

  if ($_POST['SeUsers-Submit'])
  {
    	
    $options['numOfUser'] = $_POST['SeUsers-numOfUser'];
    if($options['numOfUser']=="") {
    $options['numOfUser']="3";
    }

    $options['title'] = htmlspecialchars($_POST['SeUsers-WidgetTitle']);
    if($options['title']=="") {
    $options['title']="Last ".$options['numOfUser']." SE New Users";
    }
 
    $options['how_many_users'] = $_POST['SeUsers-how_many_users'];
    if($options['how_many_users']=="") {
    $options['how_many_users']="1";
    }
 
    $options['date_format'] = $_POST['SeUsers-date_format'];
    if ($options['date_format']=="") {
    $options['date_format']="2";
    }
 
    $options['image_border'] = $_POST['SeUsers-image_border'];
    if($options['image_border']=="") {
    $options['image_border']="0";
    }
 
    $options['image_bordercolor'] = $_POST['SeUsers-image_bordercolor'];
     if($options['image_bordercolor']=="") {
    $options['image_bordercolor']="#333333";
    }

    $options['go_profile_text'] = htmlspecialchars($_POST['SeUsers-go_profile_text']);
    if($options['go_profile_text']=="") {
    $options['go_profile_text']="";
    }
 
    $options['empty_image_url'] = $_POST['SeUsers-empty_image_url'];
    if($options['empty_image_url']=="") {
    $options['empty_image_url']="images/nophoto.gif";
    }
    
    $options['pic_dim_width'] = $_POST['SeUsers-pic_dim_width'];
    if($options['pic_dim_width']=="") {
    $options['pic_dim_width']="30";
    }

    $options['pic_dim_height'] = $_POST['SeUsers-pic_dim_height'];
    if($options['pic_dim_height']=="") {
    $options['pic_dim_height']="30";
    }

    $options['nametype'] = $_POST['SeUsers-nametype'];
    if ($options['nametype']=="") {
    $options['nametype']="2";
    }

	$options['mainbox_border_style'] = $_POST['SeUsers-mainbox_border_style'];
    if ($options['mainbox_border_style']=="") {
    $options['mainbox_border_style']="0";
    }

	$options['mainbox_border_color'] = $_POST['SeUsers-mainbox_border_color'];
    if ($options['mainbox_border_color']=="") {
    $options['mainbox_border_color']="#333333";
    }

	$options['mainbox_border_dim'] = $_POST['SeUsers-mainbox_border_dim'];
    if ($options['mainbox_border_dim']=="") {
    $options['mainbox_border_dim']="1";
    }
    
	$options['mainbox_bg_color'] = $_POST['SeUsers-mainbox_bg_color'];
    if ($options['mainbox_bgcolor']=="") {
    $options['mainbox_bgcolor']="#ededed";
    }

	$options['box_border_style'] = $_POST['SeUsers-box_border_style'];
    if ($options['box_border_style']=="") {
    $options['box_border_style']="0";
    }

	$options['box_border_color'] = $_POST['SeUsers-box_border_color'];
    if ($options['box_border_color']=="") {
    $options['box_border_color']="#333333";
    }

	$options['box_border_dim'] = $_POST['SeUsers-box_border_dim'];
    if ($options['box_border_dim']=="") {
    $options['box_border_dim']="1";
    }
    
	$options['box_bg_color'] = $_POST['SeUsers-box_bg_color'];
    if ($options['box_bg_color']=="") {
    $options['box_bg_color']="#f7f7f7";
    }

	$options['outer_cellspacing'] = $_POST['SeUsers-outer_cellspacing'];
    if ($options['outer_cellspacing']=="") {
    $options['outer_cellspacing']="4";
    }

	$options['outer_cellpadding'] = $_POST['SeUsers-outer_cellpadding'];
    if ($options['outer_cellpadding']=="") {
    $options['outer_cellpadding']="2";
    }

	$options['inner_cellspacing'] = $_POST['SeUsers-inner_cellspacing'];
    if ($options['inner_cellspacing']=="") {
    $options['inner_cellspacing']="4";
    }

	$options['inner_cellpadding'] = $_POST['SeUsers-inner_cellpadding'];
    if ($options['inner_cellpadding']=="") {
    $options['inner_cellpadding']="2";
    }


    update_option("widget_SeUsers", $options);
  }

?>
    <p><label for="SeUsers-WidgetTitle">Widget Title: </label>
    <input class="widefat"  type="text" id="SeUsers-WidgetTitle" name="SeUsers-WidgetTitle" value="<?php echo $options['title'];?>" /></p>
    <p><label for="SeUsers-numOfUser">Total Users: </label>
    <input class="widefat"  type="text" id="SeUsers-numOfUser" name="SeUsers-numOfUser" value="<?php echo $options['numOfUser'];?>" /></p>
    <p><label for="SeUsers-how_many_users">Users per Line: </label>
    <input class="widefat"  type="text" id="SeUsers-how_many_users" name="SeUsers-how_many_users" value="<?php echo $options['how_many_users'];?>" /></p>
    <p><label for="SeUsers-date_format">Date Type: </label>
  	<select name="SeUsers-date_format" id="SeUsers-date_format">
    <option <?php if($options['date_format'] == "0"){ echo ' selected '; } ?>value="0">No date</option>
    <option <?php if($options['date_format'] == "1"){ echo ' selected '; } ?>value="1">Full Date (d/m/y H:i)</option>
    <option <?php if($options['date_format'] == "2"){ echo ' selected '; } ?>value="2">Partial Date (d/m/y)</option>
    <option <?php if($options['date_format'] == "3"){ echo ' selected '; } ?>value="3">Time (H:i)</option>
    <option <?php if($options['date_format'] == "4"){ echo ' selected '; } ?>value="4">Relative date (2hrs ago)</option>
      </select>  </p>
    <p><label for="SeUsers-image_border">Image Border: </label>
    <input class="widefat"  type="text" id="SeUsers-image_border" name="SeUsers-image_border" value="<?php echo $options['image_border'];?>" /></p>
    <p><label for="SeUsers-image_bordercolor">Image Border Color: </label>
    <input class="widefat"  type="text" id="SeUsers-image_bordercolor" name="SeUsers-image_bordercolor" value="<?php echo $options['image_bordercolor'];?>" /></p>
    <p><label for="SeUsers-go_profile_text1">User Link Title: </label>
    <input class="widefat"  type="text" id="SeUsers-go_profile_text" name="SeUsers-go_profile_text" value="<?php echo $options['go_profile_text'];?>" /></p>
    <p><label for="SeUsers-empty_image_url">SE Empty Image: </label>
    <input class="widefat"  type="text" id="SeUsers-empty_image_url" name="SeUsers-empty_image_url" value="<?php echo $options['empty_image_url'];?>" /></p>
    <p><label for="SeUsers-pic_dim_width">Pic Width (in pixel): </label>
    <input class="widefat"  type="text" id="SeUsers-pic_dim_width" name="SeUsers-pic_dim_width" value="<?php echo $options['pic_dim_width'];?>" /></p>
    <p><label for="SeUsers-pic_dim_height">Pic Width (in pixel): </label>
    <input class="widefat"  type="text" id="SeUsers-pic_dim_height" name="SeUsers-pic_dim_height" value="<?php echo $options['pic_dim_height'];?>" /></p>
    <p><label for="SeUsers-nametype">Preferred Names: </label>
    <select name="SeUsers-nametype" id="SeUsers-nametype">
    <option <?php if($options['nametype'] == "0"){ echo ' selected '; } ?>value="0">No Name</option>
    <option <?php if($options['nametype'] == "1"){ echo ' selected '; } ?>value="1">Username</option>
    <option <?php if($options['nametype'] == "2"){ echo ' selected '; } ?>value="2">Full Name</option>
    <option <?php if($options['nametype'] == "3"){ echo ' selected '; } ?>value="3">Name</option>
    <option <?php if($options['nametype'] == "4"){ echo ' selected '; } ?>value="4">Surname</option>
      </select>  </p>
    <p><label for="SeUsers-mainbox_border_style">Mainbox Border Style: </label>
    <select name="SeUsers-mainbox_border_style" id="SeUsers-mainbox_border_style">
    <option <?php if($options['mainbox_border_style'] == "0"){ echo ' selected '; } ?>value="0">No Border</option>
    <option <?php if($options['mainbox_border_style'] == "1"){ echo ' selected '; } ?>value="1">Dotted Border</option>
    <option <?php if($options['mainbox_border_style'] == "2"){ echo ' selected '; } ?>value="2">Solid Border</option>
      </select>  </p>
    <p><label for="SeUsers-mainbox_border_color">Mainbox Border Color: </label>
    <input class="widefat"  type="text" id="SeUsers-mainbox_border_color" name="SeUsers-mainbox_border_color" value="<?php echo $options['mainbox_border_color'];?>" /></p>
    <p><label for="SeUsers-mainbox_border_dim">Mainbox Border Thickness (in px): </label>
    <input class="widefat"  type="text" id="SeUsers-mainbox_border_dim" name="SeUsers-mainbox_border_dim" value="<?php echo $options['mainbox_border_dim'];?>" /></p>
    <p><label for="SeUsers-mainbox_bg_color">Mainbox Background Color: </label>
    <input class="widefat"  type="text" id="SeUsers-mainbox_bg_color" name="SeUsers-mainbox_bg_color" value="<?php echo $options['mainbox_bg_color'];?>" /></p>
    <p><label for="SeUsers-box_border_style">Inner box Border Style: </label>
    <select name="SeUsers-box_border_style" id="SeUsers-box_border_style">
    <option <?php if($options['box_border_style'] == "0"){ echo ' selected '; } ?>value="0">No Border</option>
    <option <?php if($options['box_border_style'] == "1"){ echo ' selected '; } ?>value="1">Dotted Border</option>
    <option <?php if($options['box_border_style'] == "2"){ echo ' selected '; } ?>value="2">Solid Border</option>
      </select>  </p>
    <p><label for="SeUsers-box_border_color">Inner box Border Color: </label>
    <input class="widefat"  type="text" id="SeUsers-box_border_color" name="SeUsers-box_border_color" value="<?php echo $options['box_border_color'];?>" /></p>
    <p><label for="SeUsers-box_border_dim">Inner box Border Thickness (in px): </label>
    <input class="widefat"  type="text" id="SeUsers-box_border_dim" name="SeUsers-box_border_dim" value="<?php echo $options['box_border_dim'];?>" /></p>
    <p><label for="SeUsers-box_bg_color">Inner box Background Color: </label>
    <input class="widefat"  type="text" id="SeUsers-box_bg_color" name="SeUsers-box_bg_color" value="<?php echo $options['box_bg_color'];?>" /></p>
    <p><label for="SeUsers-outer_cellspacing">Mainbox Cellspacing: </label>
    <input class="widefat"  type="text" id="SeUsers-outer_cellspacing" name="SeUsers-outer_cellspacing" value="<?php echo $options['outer_cellspacing'];?>" /></p>
    <p><label for="SeUsers-outer_cellpadding">Mainbox Cellpadding: </label>
    <input class="widefat"  type="text" id="SeUsers-outer_cellpadding" name="SeUsers-outer_cellpadding" value="<?php echo $options['outer_cellpadding'];?>" /></p>
    <p><label for="SeUsers-inner_cellspacing">Inner box Cellspacing: </label>
    <input class="widefat"  type="text" id="SeUsers-inner_cellspacing" name="SeUsers-inner_cellspacing" value="<?php echo $options['inner_cellspacing'];?>" /></p>
    <p><label for="SeUsers-inner_cellpadding">Inner box Cellpadding: </label>
    <input class="widefat"  type="text" id="SeUsers-inner_cellpadding" name="SeUsers-inner_cellpadding" value="<?php echo $options['inner_cellpadding'];?>" /></p>
    
    <input type="hidden" id="SeUsers-Submit" name="SeUsers-Submit" value="1" />
<?php
}


//-----------------------------------------------------------------------------
//			ACTIONS
//-----------------------------------------------------------------------------


//uninstall all options
function SeUsers_uninstall () {
	delete_option('widget_SeUsers');
}

function joomood_newusers_uninstall () {
	delete_option('joomood_newusers_options');
}

function SeUsers_init()
{
  register_sidebar_widget(__('JooMood SE New Users'), 'widget_SeUsers');
  register_widget_control(   'JooMood SE New Users', 'SeUsers_control', 300, 200 );    
}

add_action("plugins_loaded", "SeUsers_init");
add_action('admin_menu', 'joomood_newusers_add_pages');

register_activation_hook( __FILE__, 'joomood_newusers_install' );
register_deactivation_hook( __FILE__, 'joomood_newusers_uninstall' );


?>