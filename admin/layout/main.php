<?php
  $content = Helper::input_value('c');
  if(!empty($content))
  {
     switch($content)
     {
         case "addstd":
            include_once("view/student/add.php");
            break;
            case "editstd":
            include_once("view/student/edit.php");
            break;
            case "deletestd":
            include_once("view/student/delete.php");
            break;
         case "liststd":
            include_once("view/student/list.php");

            break;        
     }
  }
  else
      include_once("view/student/list.php");
?>