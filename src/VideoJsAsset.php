<?php

namespace fury93\videojs;
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