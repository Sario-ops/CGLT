<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php if (isset(Yii::$app->logopedista->identity->username)):?>
        <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => ['/logopedista/index'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
           ['label' => 'Profilo', 'url' => ['/logopedista/view', 'username' => Yii::$app->logopedista->identity->username]],
           (
                '<li>'
                . Html::beginForm(['/logopedista/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->logopedista->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <?php endif;?>
    <?php if (isset(Yii::$app->caregiver->identity->username)):?>
        <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => ['/caregiver/index'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
           ['label' => 'Profilo', 'url' => ['/caregiver/view', 'username' => Yii::$app->caregiver->identity->username]],
           (
                '<li>'
                . Html::beginForm(['/caregiver/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->caregiver->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <?php endif;?>
    <?php if (isset(Yii::$app->utente->identity->username)):?>
        <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => ['/utente/index'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
           ['label' => 'Profilo', 'url' => ['/utente/view', 'username' => Yii::$app->utente->identity->username]],
           (
                '<li>'
                . Html::beginForm(['/utente/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->utente->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <?php endif;?>
    <?php if (isset(Yii::$app->caregiver->identity->username) == null && isset(Yii::$app->utente->identity->username) == null && isset(Yii::$app->logopedista->identity->username) == null):?>
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Guest'],
            ],
        ]);
        NavBar::end();
        ?>
    <?php endif;?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
