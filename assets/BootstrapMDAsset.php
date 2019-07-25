<?php
namespace app\assets;

use yii\web\AssetBundle;

class BootstrapMDAsset extends AssetBundle
{
    public $sourcePath = '@npm/bootstrap-material-design/dist/';
    public $css = [
        'css/bootstrap-material-design.min.css',
    ];
    public $js = [
        'js/bootstrap-material-design.min.js',
    ];
}
