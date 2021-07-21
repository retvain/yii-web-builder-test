<?php

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= \yii\helpers\Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script type='text/javascript'>
            (function() {
                function init() {var scr = document.createElement('script'); scr.type = 'text/javascript'; scr.defer = 'defer'; scr.src = '//cdn.qform.io/forms.js?v=' + parseInt(new Date().getTime()/1000); var scrInsert = document.getElementsByTagName('script')[0]; scrInsert.parentNode.insertBefore(scr, scrInsert); }
                var d = document; var w = window;
                if (d.readyState == 'complete') {init(); } else {if (w.attachEvent) {w.attachEvent('onload', init); } else {w.addEventListener('load', init, false); } } })();
        </script>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="container">

        <div class="row">
            <?= $content ?>
        </div>
    </div>


    <?php $this->endBody() ?>
    </body>
    </html>

<?php $this->endPage() ?>
