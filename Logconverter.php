<?php
/**
 * Created by PhpStorm.
 * User: Kabbali
 * Date: 30/04/2018
 * Time: 4:45 PM
 */

include "Assets/Regex.php";
include "Assets/CommandOptions.php";

// GET THE WORKING DIRECTORY, SO THIS COMMAND MUST BE EXECUTE IN THE DIRECTORY WHERE LOGS ARE PLACED
//$logs_dir = getcwd();
//$logs_dir = 'logs/';
$logs_dir = '/usr/local/ezproxy/docs/loggedin/';

// GET THE LOGS FORMAT, IF BY DEFAULT IT WILL BE .log BUT THERE ARE SOME CASES WHERE ARE NOT
$logs_format = '*.log';

if (posix_getuid() != 0){
    echo "ERROR: You must run this script as super user";
    exit(1);
}

echo "Running LogConverter \n";

if (in_array($HELP, $argv)){
    echo "Log Converter Options: \n";
    echo "\t --directory: to specify the directory where the logs are placed. Default value: $logs_dir";
    echo "\t --format: to specify the logs format. Default value: $logs_format";
    exit(0);
}

if ($argc == 0){
    echo "with default values \n";
    echo "LOG DIR --> $logs_dir \n";
    echo "LOG FORMAT --> $$logs_format \n";
}

if (in_array($DIR, $argv)){
    $logs_dir = $argv[array_search($DIR, $argv)+1];
    echo "LOGS DIRECTORY --> $logs_dir \n";
}

if (in_array($FORMAT, $argv)){
    $logs_format = $argv[array_search($FORMAT, $argv)+1];
    echo "LOGS FORMAT --> $logs_format \n";
}

// GET ALL THE FILE THAT MATCH WITH DIR AND LOGS FORMAT
foreach (glob($logs_dir.$logs_format) as $file){

    // CHECK IT THEY ARE READEBLES
    if(is_readable($file)){
        // OPEN EACH FILE
        $logs = fopen($file, "r") or die("Unable to open file");
        // THIS VAR CONTAINS THE STRING OF EACH LOG LINE FILE
        $new_line ="";
        // WE GET EACH LINE TO REPLACE WITH REGEX MATCHS WHILE IT EXISTS
        while($line = fgets($logs)){
            print($line);
            echo "<br>";
            // CONCATENATE LINE BY LINE THE WHOLE NEW FILE WITH THE REPLACES ALREADY APPLIED
            $new_line = $new_line . preg_replace(Regex::$PATTERNS, Regex::$REPLACES, $line) . "\n";
            echo "<br>";
        }

        // CREATE THE NEW LOG FILE WITH ITS ORIGINAL NAME WITH
        $new_log = fopen($file.".bak", "w");
        // WE WRITE IT WITH THE WHOLE CONCATENATED STRING
        fwrite($new_log, $new_line);
        fclose($logs);
    }

}


