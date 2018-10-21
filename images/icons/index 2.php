<?php
    header('Content-Type: application/json');

    $dir = "./"; //path

    $list = array();

    function compareByName($a, $b) {
        return strcmp(strtolower($a["name"]), strtolower($b["name"]));
    }

    if(is_dir($dir)){
        if($dh = opendir($dir)){
            while(($file = readdir($dh)) != false){

                if($file == "." or $file == ".." or $file == "index.php"){
                    
                } else { //create object with two fields
                    $list3 = array(
                    'file' => $file, 
                    'size' => filesize($file)
                );
                    array_push($list, $list3);
                }
            }
        }

        $list = usort($a, 'compareByName');

        $return_array = array('files'=> $list);

        echo json_encode($return_array);
    }

?>
