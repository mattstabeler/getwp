<?php

header("Content-type: text/plain");

// $dlurl = "https://wordpress.org/latest.zip";
$dlurl = "./latestwp/latest.zip";
$dlfile = "latest.zip";
$destfolder  = realpath("./");

echo "Downloading from " . $dlurl . PHP_EOL;

file_put_contents($dlfile, file_get_contents($dlurl));

if(file_exists($dlfile)){

  echo "Extracting from " . realpath($dlfile) . PHP_EOL;

  $zip = new ZipArchive;
  if ($zip->open($dlfile) === TRUE) {
      $zip->extractTo($destfolder);
      $zip->close();
      echo "Extracted to " . $destfolder . PHP_EOL;
  } else {
      echo "Failed to extract to " . $destfolder . PHP_EOL;
  }
  unlink($dlfile);
  echo "Removed downloaded archive " . $dlfile . PHP_EOL;
}

// Prevent further execution
$thisfile = basename(__FILE__, ".php");
$newfile = $thisfile . ".phps";
rename(__FILE__, $newfile);

echo "Renamed " . basename(__FILE__) . " to " . $newfile . " to prevent further execution"  . PHP_EOL;


// Move to root dir




?>
