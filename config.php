<?php

$path_root = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);
$path_thisfile = str_replace('\\','/',__FILE__);
$parent_folder = str_replace($path_root,'',$path_thisfile);
$path = rtrim(dirname($parent_folder), '/\\');
define('SITEURL', 'http://'.$_SERVER['HTTP_HOST'].$path);

$config['maxSecond'] = 9; // (int) 1-9 seconds. Time process bar run
