<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">body{font-family:Microsoft YaHei;} .navbar-nav > li:hover{background-color:#FD4E4E}</style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => '博客', 'url' => ['/sites/extra/add']],
            ['label' => '学院', 'url' => ['/sites/extra/hot']],
            ['label' => '下载', 'url' => ['/sites/monitor']],
            ['label' => '论坛', 'url' => ['/sites/extra/hour']],
            ['label' => '问答', 'url' => ['/sites/extra/rival']],
            ['label' => '直播', 'url' => ['/sites/extra/app']],
            ['label' => '↓',  'items' => [
                ['label' => '招聘', 'url' => ['/sites/extra']],
                ['label' => 'VIP会员', 'url' => ['/sites/keyword']],
            ]
            ],


        ]
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //['label' => 'Home', 'url' => ['/site/index']],
            //['label' => 'About', 'url' => ['/site/about']],
            Yii::$app->user->isGuest ?
                ['label' => '登录', 'url' => ['/site/login']] :
                [
                    'label' =>  Yii::$app->user->identity->realname .'(退出)',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
            ['label'=>'权限管理', 'url' => ['/site/manage']],


        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
