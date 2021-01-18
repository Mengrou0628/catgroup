<?php
/**
* function：使用PHPWord方式读doc文件
* author：王梦柔
* date：2020.01.16
**/

//require_once('../../../modules/config.php');
//session_start();

require_once '../../../../Resources/PhpWord/IOFactory.php';
require_once '../../../../Resources/PhpWord/PhpWord.php';
require_once '../../../../vendor/autoload.php';
//$source = '../../../Resources/transfiles/'.$_FILES["fileup"]["name"];
//$info = '../../../Resources/transfiles/'.$_FILES["fileup"]["name"];
$info="test.docx";
$sections = IOFactory::load($info);
//$elements=array();
//array_push($elements, $section->getElements());
foreach($sections->getSections() as $section){
     foreach($section->getElements() as $element){
          echo $element->getElements()[0]->gettext()."\n";
     }
}
?>
