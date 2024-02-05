<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Intranet\Invitation;
use Bitrix\Socialnetwork\UserToGroupTable;
use Bitrix\Socialnetwork\Item\UserToGroup;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;
use Bitrix\Disk\Ui;

class ListController extends \Bitrix\Main\Engine\Controller
{

    public function configureActions()
    {
        return [
            'sendMessage' => [
                'prefilters' => [],
            ],
        ];
    }



}