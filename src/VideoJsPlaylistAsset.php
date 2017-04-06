<?php

namespace fury93\videojs;

use yii\web\AssetBundle;

class VideoJsPlaylistAsset extends AssetBundle
{
    public $js = [
        'playlist/videojs-playlist.js',
        'playlist-ui/videojs-playlist-ui.js',
    ];

    public $css = [
        'playlist-ui/videojs-playlist-ui.vertical.css',
    ];

    public $depends = [
        'yiidoc\videojs\VideoJsAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/plugins');
        parent::init();
    }

    /**
     * Sets the source path if empty
     * @param string $path the path to be set
     */
    protected function setSourcePath($path)
    {
        if (empty($this->sourcePath)) {
            $this->sourcePath = $path;
        }
    }
}