<?php

$homeDir = dirname(__FILE__);
print_r($homeDir . "\n");


function listing($homeDir)
{
    if(!preg_match('/^\.{1,2}?\/$/', $homeDir) || !preg_match('/\.{1,2}$/', $homeDir)) {
        if (is_dir($homeDir)) {
            $cd = scandir($homeDir);
            foreach ($cd as $item) {
                if(!preg_match('/^\.{1,2}$/', $item)){
                    listing($homeDir. "/" . $item);
                }
            }
        } else {
            return $homeDir;
        }
    }
}


echo listing($homeDir);