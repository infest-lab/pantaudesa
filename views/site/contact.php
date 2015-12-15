<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Hubungi Kami';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="heading-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Terimakasih telah menghubungi kami. Kami akan segera meresponnya segera.
        </div>       

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>
        <div class="row">
            <div class="col-sm-5">
                <p>
                    Jika anda mempunyai pertanyaan lain yang berhubungan dengan Pantau Desa, silakan mengisi isian form di bawah ini untuk terhubung dengan kami.
                    Terimakasih.
                </p>

                <div class="row">
                    <div class="col-sm-12">

                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                            <?= $form->field($model, 'name') ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'subject') ?>

                            <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Kirim pesan', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'contact-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
            <!-- break -->

            <div class="col-sm-6 col-sm-offset-1">
                <address>
                  <strong>Pantau Desa.</strong><br>
                  Infest Yogyakarta<br>
                  Jl. Veteran Gg. Janur Kuning No. 11A<br>
                  Umbulharjo, Yogyakarta, DIY, Indonesia
                  <abbr title="Phone">P:</abbr> (0274) 372-378
                </address>

                <address>
                  <strong>INFEST</strong><br>
                  <a href="mailto:#">info@infest.or.id</a>
                </address>
            </div>
        </div>
        
        

    <?php endif; ?>
</div>
