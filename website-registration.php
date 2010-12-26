<?php
/**
 * @package Website Registration
 * @version 0.1
 */
/*
Plugin Name: Website Registration
Plugin URI: http://wordpress.org/#
Description: This plugin collects the meta data of any desired sites. These metadata includes URL, IP Address, Title, Author(s), Keywords, and Description.
Author: Freelynx
Version: 0.1
Author URI: http://codeindesign.com/id/about/
*/

/*  

Copyright 2010  Freelynx (email : frelynx@codindesign.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

define('WEBREG_VERSION', '0.1');

if(is_admin()) {
  $webregurl = get_bloginfo('url').'/wp-admin/options-general.php?page=website-registration/website-registration.php';
} else {
  $dummy = explode('?',curPageURL());
  $webregurl = $dummy[0].'?dum=dum';
}

define('WEBREG_URL',$webregurl);

include_once(dirname(__FILE__).'/validation.php');

/* Plugin activation */
register_activation_hook(__FILE__,'wr_install');
function wr_install() {
  global $wpdb;
  
  add_option("webreg_version",WEBREG_VERSION);
  
  $sql = "
    CREATE TABLE IF NOT EXISTS `webreg` (
      `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
      `url` VARCHAR( 255 ) NOT NULL ,
      `ip` VARCHAR( 15 ) NOT NULL ,
      `title` VARCHAR( 255 ) NOT NULL ,
      `author` VARCHAR( 255 ) NOT NULL ,
      `keywords` VARCHAR( 255 ) NOT NULL ,
      `description` TEXT NOT NULL,
      `date` TIMESTAMP NOT NULL default CURRENT_TIMESTAMP
    ) ENGINE = MYISAM DEFAULT CHARSET=latin1;
  ";
  $results = $wpdb->query( $sql );
}

add_action("admin_menu","wr_add_option_pages");

function wr_add_option_pages() {
	if (function_exists('wr_option_page')) {
		add_options_page('Web Reg Setting', 'Website Registration', 8, __FILE__, 'wr_option_page');
	}		
}

/* Display form backend */

function wr_option_page() {
  if($_GET['del']) $status = wr_delete_url($_GET['id']);
  else $status = wr_submitting();
?>

  <div class="wrap" >
    <h2><?php _e('Website Registration Setting Page'); ?></h2>
    <div class="metabox-holder">
      <div style="float: right;">
        <div class="postbox">
          <h3 class="hndle">Like The Plugin? You'll Know What To Do</h3>
          <div class="inside" style="text-align: center; padding: 10px 0px;">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="LTUB9HAHBXTHJ">
              <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>
        </div>
        <div class="postbox" style="max-width: 330px;">
          <h3 class="hndle">FAQ</h3>
          <div class="inside" style="max-height: 240px; overflow: auto;">
            <ul style="margin: 10px 15px; list-style-type: square; padding: 0px 10px;">
              <li><p><b>What does this plugin do?</b></p>
                  <p>In a simple term: Records IP Address, Title, Authors, Keywords, and Description of a website</p></li>
              <li><p><b>How can I use it?</b></p>
                  <p>Just type a domain or website, i.e. <code>http://yahoo.com</code> in the form next to this <b>faq</b> then press Submit. You'll find what this plugin actually do.</p></li>
              <li><p><b>Can I use this form on my frontend page?</b></p>
                  <p>Yes you can. See the left widget next to Donate widget.</p></li>
              <li><p><b>Is it same between</b> <code>http://example.com</code><b> and </b><code>http://example.com/abc</code><b>?</b></p>
                  <p>Yes. The plugin will only record the domain name which is <code>http://example.com</code></p></li>  
              <li><p><b>How about URL written in IP address, such as</b> <code>http://74.125.235.16</code> <b>?</b></p>
                  <p>The plugin will treat them differently. So if you insert <code>http://74.125.235.16</code> and <code>http://google.com</code> (both are the same host for Google Search Engine) to the form then the plugin will consider it as a different domain. It's not a bug. Just a limitation of the current version.</p></li>
              <li><p><b>How can I insert styles for the list?</b></p>
                  <p>Simply put, the listing table by default has embeded classes <code>widefat</code> and <code>wr_display_list</code>, so you can add your css as you like in references to those classes, accordingly, and include them in your css file.</p></li>
              <li><p><b>Do I always need to write the protocol like</b> <code>http://</code><b>?</b></p>
                  <p>Absolutely! it's part of the valid URL.</p></li> 
              <li><p><b>In that case what kind of protocol that is allowed?</b></p>
                  <p><code>http</code>, <code>https</code>, and <code>ftp</code></p></li> 
              <li><p><b>I got a strange behaviour when I use this plugin on my frontend page. What's wrong?</b></p>
                  <p>It depends. But first thing you need to check is that the permalinks should not be set as a 'Default'. If this does not fix the issues then please <a href="http://codeindesign.com/id/about/">email</a> and let me know.</p></li> 
              <li><p><b>How about port number like</b> <code>http://example.com:8080</code><b>?</b></p>
                  <p>Forgive this plugin but it's not allowed. If you specified the port number then it will mark as invalid URL.</p></li> 
              <li><p><b>Can I choose which metadata to be display?</b></p>
                  <p>Sorry, you cannot do that in this version.</p></li> 
              <li><p><b>Can I edit the url and its metadata?</b></p>
                  <p>Sorry, no.</p></li>
              <li><p><b>Can I filter or search the result?</b></p>
                  <p>No. But if you passion enough to wait for future release then soon will be yes.</p></li>
              <li><p><b>Is this plugin a crawler?</b></p>
                  <p>Nope. Not even remotely.</p></li>
              <li><p><b>Can I export the result as an XML or JSon?</b></p>
                  <p>No. But soon in the next release.</p></li>
              <li><p><b>Can I edit the entry?</b></p>
                  <p>Definitely not, for now.</p></li>
              <li><p><b>Is there any definite 'Yes' answer?</b></p>
                  <p>Yes. there I said it.</p></li>
              <li><p><b>This plugin is so lame!</b></p>
                  <p>Thank you and so are you, so please <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LTUB9HAHBXTHJ">donate</a>.</p></li>
              <li><p><b>I'm kidding. This plugin is awesome!</b></p>
                  <p>You know, you've just brighten up my day. Thanx You!</p></li>
            </ul>
          </div>
        </div>
      </div>
      <div style="margin-right: 350px;">
        <div class="postbox">
          <h3 class="hndle">Setting for Frontend Page</h3>
          <div class="inside" style="margin: 10px;">
              <p style="line-height: 1.5em;">If you wish to use this <b>URL Submitted form</b> and <b>Listing Submitted URL</b> table to be visible to public users then use the following shortcodes in your page/post:</p>
              <ul style="list-style-type: square; padding: 10px;">
                <li><code>[website_registration]</code> for displaying the form.</li>
                <li><code>[website_registration_submission]</code> for processing the submitted URL and inserting to database.</li>
                <li><code>[website_registration_the_list]</code> for displaying the submitted website/URL.</li>
              </ul>
            </form>
          </div>
        </div>
        <div class="postbox">
          <h3 class="hndle">Submit url</h3>
          <div class="inside">
            <div style="text-align: center; margin-top: 20px;"><b><?=$status;?></b></div>
            <form action="options-general.php" method="GET">
            <?php wr_get_form();?>
            <input type="hidden" name="page" value="<?=$_GET["page"]?>" />
            </form>
          </div>
        </div>
      </div>
    </div>
  
<?php wr_display_list(); ?>
  
  </div>
<?}

function wr_get_form() {?>
  <div style="margin: 0px 10px; 0px 0px;">
    <p style="text-align: center;"><b>URL Address:</b></p>
    <p style="text-align: center;"><input type="text" name="u" value="<?=$GET['u'];?>" style="width: 100%; padding: 5px; text-align: center;" /></p>
    <p class="submit" style="text-align: center;"><input type="submit" name="submit" id="submit_comment" value="Submit &rsaquo;&rsaquo;" /></p>
  </div>
<?}

/* Display for front page */

function wr_get_fp_form() {
?>
  <form action=<?php get_bloginfo('url'); ?>"register-web" method="GET">
    <?php wr_get_form();?>
  </form>
<?}

add_shortcode('website_registration','wr_get_fp_form');

function wr_submitting() {
  global $wpdb;
  
  $url = $_GET["u"];
  if($url == '') return '';
  else {
    $arrurl = explode('//',$url);
    $arrurl2 = explode('/',$arrurl[1]);
    $cleanurl = $arrurl[0].'//'.$arrurl2[0];
    $valid = new validation();
    $valid->setValue($cleanurl);
    if($valid->url()) {
      $ip = gethostbyname($arrurl2[0]);
      $valid->setValue($ip);
      if(!$valid->ip4()) return "<span style='color: red;'>Domain or URL <b><span style='color: black;'>".$cleanurl."</span></b> might not active or you are working offline</span>";
      else {
        $select = "SELECT COUNT(*) FROM `webreg` WHERE `url` LIKE '".$cleanurl."%';";
        $exists = $wpdb->get_var($select);
        if($exists >= 1) return "<span style='color: red;'>URL or domain <b><span style='color: black;'>".$cleanurl."</span></b> exsits!</span>";
        else {
          $page = @file_get_contents($url);
          $arrtitle = explode("<title>",$page);
          $arrtitle2 = explode('</title>',$arrtitle[1]);
          $metapage = @get_meta_tags($url);
          $insert = "INSERT INTO `webreg` (id, url, ip, title, author, keywords, description) " .
                    "VALUES (NULL, '".$cleanurl."','".$ip."','".htmlspecialchars($arrtitle2[0])."','".htmlspecialchars($metapage['author'])."','".htmlspecialchars($metapage['keywords'])."','".htmlspecialchars($metapage['description'])."');";
    
          $results = $wpdb->query( $insert );
          return "<span style='color: blue;'>Submitting URL <b><span style='color: black;'>".$cleanurl."</span></b> Successfull</span>";
        }
      }
    } else {
      return "<span style='color: red;'>Invalid URL!</span>";
    }
  }
}

add_shortcode('website_registration_submission', 'wr_submitting');

function wr_display_list() {
  global $wpdb;
  $therow = '';
  
  /* Get Content */
  $seq = $_GET['seq'];
  if($seq != '') {
    if(($_GET['sort'] == '') || ($_GET['sort'] == 'asc')) $sort = 'ASC';
    else $sort = 'DESC';
    $order = 'ORDER BY `'.$seq.'` '.$sort;
    $sort = ($sort == 'ASC')? 'desc' : 'asc';
  } else $order = '';
  
  $page = $_GET['wrp'];
  $fpage = $page*10 - 10;
  switch($page) {
    case '':
    case '1':
      $limit = 'LIMIT 0,10';
    break;
    default:
      $limit = 'LIMIT '.$fpage.',10';
    break;
  }
  
  $select = "SELECT * FROM `webreg` ".$order." ".$limit.";";
  $result = $wpdb->get_results($select,ARRAY_A);
  $i = ($fpage <= 0) ? 1 : ($fpage + 1);
  foreach ($result as $row) {
    $therow .= '<tr>';
    $therow .= '<td style="text-align: center;">'.$i.'</td>';
    $therow .= '<td><a href="'.$row['url'].'">'.$row['url'].'</a></td>';
    $therow .= '<td>'.htmlspecialchars_decode($row['title']).'</td>';
    if(is_admin()) {
      $therow .= '<td>'.$row['ip'].'</td>';
      $therow .= '<td>'.htmlspecialchars_decode($row['author']).'</td>';
      $therow .= '<td>'.htmlspecialchars_decode($row['keywords']).'</td>';
      $therow .= '<td>'.htmlspecialchars_decode($row['description']).'</td>';
      //$therow .= '<td>Edit</td>';
      $therow .= "<td>".$row['date']."</td>";
      $therow .= '<td style="text-align: center;"><a href="javascript: if(confirm(\'Are you sure?\')) window.location = \''.WEBREG_URL.'&id='.$row['id'].'&del=true\'; else void(0);" style="color: red;">Remove</a></td>';
    }
    $therow .= '</tr>';
    $i++;
  }
  
  $thetable .= '<table class="widefat wr_display_list" id="all-plugins-table">';
  $thetable .= '<thead>';
  $thetable .= '<tr><th><a href="'.WEBREG_URL.'&seq=id&sort='.$sort.'">ID</a></th>';
  $thetable .= '<th><a href="'.WEBREG_URL.'&seq=url&sort='.$sort.'">URL</a></th>';
  $thetable .= '<th><a href="'.WEBREG_URL.'&seq=Title&sort='.$sort.'">Title</a></th>';
  if(is_admin()) {    
    $thetable .= '<th><a href="'.WEBREG_URL.'&seq=ip&sort='.$sort.'">IP</a></th>';
    $thetable .= '<th><a href="'.WEBREG_URL.'&seq=author&sort='.$sort.'">Author</a></th>';
    $thetable .= '<th><a href="'.WEBREG_URL.'&seq=keywords&sort='.$sort.'">Keywords</a></th>';
    $thetable .= '<th><a href="'.WEBREG_URL.'&seq=description&sort='.$sort.'">Description</a></th>';
    $thetable .= '<th><a href="'.WEBREG_URL.'&seq=date&sort='.$sort.'">Submission Date</a></th>';
    $thetable .= '<th style="text-align: center;">Action</th>';
  }
  $thetable .= '</tr>';
  $thetable .= '</thead>';
  $thetable .= '<tbody>'.$therow.'</tbody>';
  $thetable .= '</table>';
  
  echo wr_pagination();
  echo $thetable;
  echo wr_pagination();
}

add_shortcode('website_registration_the_list','wr_display_list');

function wr_pagination() {
  global $wpdb;
  $select = "SELECT COUNT(*) FROM `webreg`;";
  $result = $wpdb->get_var($select);
  if(($result <= 10) || ($result == '')) $page = 1;
  else $page = $result/10;
  
  $pages = 'Total URL: <b>'.$result.'</b>&nbsp;|&nbsp;';
  $pages .= 'Page: ';
  
  $totalpage = ceil($page);
  for($i=1;$i<=$totalpage;$i++) {
    if($_GET['wrp'] == '') {
      if($i == 1) $pages .= '&nbsp;<b>1</b>&nbsp;';
      else $pages .= '&nbsp;<a href="'.WEBREG_URL.'&wrp='.$i.'">'.$i.'</a>&nbsp;';
    }
    else {   
      if($i == $_GET['wrp']) {
        $pages .= '&nbsp;<b>'.$i.'</b>&nbsp;';
      }
      else {
        $pages .= '&nbsp;<a href="'.WEBREG_URL.'&wrp='.$i.'">'.$i.'</a>&nbsp;';
      }
    }
  }
  
  return $pages;
}

function wr_delete_url() {
  global $wpdb;
  $id = htmlspecialchars($_GET['id']);
  $delete = "DELETE FROM `webreg` WHERE id='".$id."'";
  $result = $wpdb->query($delete);
  if(!$result) return "<span style='color: red;'>Deleting URL Failed!</span>";
  else return "<span style='color: blue;'>Deleting URL Success!</span>";
}

/* Deactivate Plugin */
register_deactivation_hook(__FILE__, 'wr_uninstall' );
function wr_uninstall() {
  global $wpdb;
  
  $delete = "DROP TABLE `webreg` ;";
  $results = $wpdb->query( $delete );

  delete_option("webreg_version");
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>