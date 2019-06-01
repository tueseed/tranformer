<?php require('./utils/array_utils.php'); ?>
<?php require('./utils/db_connector.php'); ?>
<?php 
  // check 'action' from get params
  if(!array_key_exists("action", $_GET))
  {
    header("Location: ?action=liff_tr");
    exit(0);
  }
  // get action value from action key in $_GET
  $action = $_GET['action'];
?>
<?php require('./partials/marketplace_header.php'); ?>
<?php 
  // filter only php extension
  $filter_file_name = array_filter(scandir("./"), "filter_php_file");
  $page_php_path = "{$action}.php";
  if(in_array($page_php_path, $filter_file_name, true))
  {
    include($page_php_path);
   /* if(!in_array($action, array("cust_register","checkout","purchase_detail")))
    {
      $keys_arr = array_keys($_GET);
      if(!in_array("purchase_id", $keys_arr))
      {
        require('./partials/circular_menu.php');
      }
    }*/
  } 
  else 
  {
    include("404.php");
  }
  
  // include essentials scripts 
  require("./partials/scripts.php");

  // include script control withit page
  $page_script_path = "scripts/{$action}.js";
  if(file_exists($page_script_path))
  {
    echo "<script>";
    include("scripts/liff_global.js");
    include($page_script_path);
    echo "</script>";
  }
  
?>
<?php require("./partials/marketplace_footer.php"); ?>