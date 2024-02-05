<?php
$arUrlRewrite=array (
  11 => 
  array (
    'CONDITION' => '#^/site_bl/information/links/([a-zA-Z0-9_]+)/\\?{0,1}(.*)$#',
    'RULE' => '/site_bl/information/links/index.php?SECTION_CODE=\\1&\\2',
    'ID' => '',
    'PATH' => '',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/site_bl/board/([a-zA-Z0-9_]+)/\\?{0,1}(.*)$#',
    'RULE' => '/site_bl/board/index.php?SECTION_CODE=\\1&\\2',
    'ID' => '',
    'PATH' => '',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/site_bl/nationalnews/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/site_bl/nationalnews/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/site_bl/job/vacancy/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/site_bl/job/vacancy/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/site_bl/job/resume/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/site_bl/job/resume/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/site_bl/themes/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/site_bl/themes/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/site_bl/forum/#',
    'RULE' => '',
    'ID' => 'bitrix:forum',
    'PATH' => '/site_bl/forum/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/site_bl/photo/#',
    'RULE' => '',
    'ID' => 'bitrix:photogallery_user',
    'PATH' => '/site_bl/photo/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/site_bl/blogs/#',
    'RULE' => '',
    'ID' => 'bitrix:blog',
    'PATH' => '/site_bl/blogs/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/site_bl/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/site_bl/news/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
