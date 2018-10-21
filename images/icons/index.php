<?php
  header('Content-Type: application/json');

  $dir          = "./"; //path

  $list = array(); //main array

  function compareByName($a, $b) {
    return strcmp(strtolower($a["file"]), strtolower($b["file"]));
  }

  if(is_dir($dir)){
      // if($dh = opendir($dir)){
      //     while(($file = readdir($dh)) != false){

              
      //     }
      // }

    foreach (glob("$dir/*") as $file) {
      if($file == "." || $file == ".." || is_dir($file) || basename($file) == "unc0ver.png"){
          //...
      } else { //create object with two fields
          if ($file == "unc0ver.png") {
            
          } else {
            $list3 = array(
              'file' => str_replace("unc0ver", "ignition", str_replace($dir."/", "", $file))//, 
              // 'size' => filesize($file)
            );

            array_push($list, $list3);
          }
      }

      // sort($list);
      usort($list, 'compareByName');
    }

      // natcasesort($list);

      $return_array = array('files'=> $list);

      // natcasesort($return_array);

      echo json_encode($return_array);
  }

?>