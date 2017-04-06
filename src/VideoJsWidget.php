<?php

namespace fury93\videojs;


use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class VideoJsWidget extends Widget
{
    public $options = [];
    public $clientOptions = [];
    public $clientEvents = [];
    public $playlist = null;

    public function init()
    {
        $this->options['id'] = ArrayHelper::remove($this->options, 'id', $this->id . '-video-js');
    }

    public function run()
    {
        $this->registerJs();
        $this->registerPlaylist();
        $this->registerEvents();
        $this->renderPlayer();
    }

    protected function registerAssetBundle()
    {
        VideoJsAsset::register($this->getView());
    }

    protected function registerPlaylistAssetBundle()
    {
        VideoJsPlaylistAsset::register($this->getView());
    }

    protected function registerJs()
    {
        $this->registerAssetBundle();
        $jsOptions = new JsExpression(Json::encode($this->clientOptions));
        $this->getView()->registerJs("var player = videojs('{$this->options['id']}',{$jsOptions});");
    }

    /**
     * Register client script handles
     */
    public function registerEvents()
    {
        if (!empty($this->clientEvents)) {
            $js = [];
            foreach ($this->clientEvents as $event => $handle) {
                $js[] = "jQuery('#{$this->options['id']}').on('{$event}',{$handle});";
            }
            $this->getView()->registerJs(implode(PHP_EOL, $js));
        }
    }

    protected function renderPlayer()
    {
        $sources = ArrayHelper::remove($this->options, 'sources', null);
        echo Html::beginTag('video', $this->options);
        if (is_array($sources)) {
            foreach ($sources as $sourceOptions) {
                echo Html::tag('source', null, $sourceOptions);
            }
        }
        echo Html::endTag('video');
    }

    protected function registerPlaylist()
    {
        if (!empty($this->playlist && is_array($this->playlist))) {
            $this->registerPlaylistAssetBundle();
            $playlistOptions = new JsExpression(Json::encode($this->playlist));
            $this->getView()->registerJs("player.playlist($playlistOptions); ");
            $this->getView()->registerJs("player.playlistUi();");
        }
    }
}