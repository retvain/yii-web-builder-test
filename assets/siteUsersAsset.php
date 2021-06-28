<?php

namespace app\assets;

use yii\web\AssetBundle;

class siteUsersAsset extends AssetBundle
{
    public $sourcePath = '@app/components';

    public $js = [
        'js/siteUsers.js',
    ];
}