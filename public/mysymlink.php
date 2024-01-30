<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'klinik/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
symlink($targetFolder,$linkFolder);
echo 'Symlink completed';