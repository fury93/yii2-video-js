Yii2 widget for VideoJs Player with playlist plugin support
=======================

Plugins
-----
This widget use next plugins:

https://github.com/brightcove/videojs-playlist - v3.1.0 
https://github.com/brightcove/videojs-playlist-ui/tree/2.x - v2.3.1


Once the extension is installed, simply use it in your code by  :


Example
-----
```php
    <section class="player-container">
    <?php
        echo \fury93\videojs\VideoJsWidget::widget([
            'options' => [
                'id'=> 'video-player',
                'class' => 'video-js vjs-default-skin vjs-big-play-centered vjs-fluid',
                'preload' => 'auto',
                'controls' => true,
            ],
            'clientOptions' => [],
            'clientEvents' => [],
            'playlist' => []
        ]);
        ?>


        <ol class="vjs-playlist">
            <!--
              The contents of this element will be filled based on the
              currently loaded playlist
            -->
        </ol>

    </section>
```

Playlist fields example:
https://github.com/videojs/videojs.com/blob/master/_src-js/lib/playlist.js