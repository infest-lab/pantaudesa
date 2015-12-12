<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Pantau Desa';
?>
<div class="site-index">

    <div class="jumbotron well">
        <h1>Open Data Desa</h1>

        <p class="lead">Pusat keterbukaan data desa. <span class="label label-default">#opendata</span></p>

        <div class="btn-group" role="group" aria-label="...">
          <a class="btn btn-lg btn-danger" href="<?php echo Yii::$app->urlManager->createUrl('/pantau');?>"><span class="glyphicon glyphicon-eye-open"></span> Jelajah Data</a>
          <a class="btn btn-lg btn-info" href="<?php echo Yii::$app->urlManager->createUrl('/site/about');?>">Selengkapnya <span class="glyphicon glyphicon-menu-right"></span></a>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h3 class="text-success"><span class="glyphicon glyphicon-random"></span> Crowd Sourcing</h3>

                <p>Kami menyebutnya <strong>data gotong royong</strong>. Data yang terkumpul di sini merupakan hasil gotong royong
                semua pengguna yang mempunyai semangat keterbukaan data untuk mewujudkan pemerintahan yang terbuka, partisipatif dan akuntabel.</p>
                
            </div>
            <div class="col-lg-4">
                <h3 class="text-success"><span class="glyphicon glyphicon-fire"></span> Connect with API</h3>

                <p>Adanya <em>Application Programming Interface</em> (API) semakin mempermudah komunikasi data lintas aplikasi/sistem.
                Kami mencoba menghubungkan data-data yang bertebaran yang belum mempunyai standard protokol komunikasi data yang baku.
                </p>

            </div>
            <div class="col-lg-4">
                <h3 class="text-success"><span class="glyphicon glyphicon-share-alt"></span> Contribute and Visualize</h3>

                <p>Anda dapat berkontribusi dengan mengunggah berkas atau menghubungkan dengan API aplikasi anda. 
                Selanjutnya anda bisa menjelajahi dan menampilkan semua data yang ada Pantau Desa.</p>
                <p>Explore - Upload/Download - Syncronize - Visualize - Integrate</p>

            </div>
        </div>

    </div>
</div>
