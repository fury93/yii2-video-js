<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 01/03/2017
 * Time: 00:59
 */

namespace yiidoc\videojs;
use yii\web\AssetBundle;

class VideoJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/video.js/dist';

    public $css = [
        'video-js.min.css',
    ];

    public $js = [
        'video.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}