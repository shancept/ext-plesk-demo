<?php
$dir = __DIR__.'/../var';
$dirIterator = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);

$files = new RecursiveIteratorIterator($dirIterator, RecursiveIteratorIterator::CHILD_FIRST);

$fileManager = new \pm_ServerFileManager();

foreach ($files as $file) {

    $fileManager->chmod($file->getRealPath(), 777);

}