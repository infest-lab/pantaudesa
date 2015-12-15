<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Pantau Desa';
?>
<div id="header">
    <div class="container">
        <h1>Open Data Desa</h1>
        <p>Pusat keterbukaan data desa. <strong>#opendata</strong></p>
        
        <div class="call-to-action">
            <a class="btn btn-lg btn-action btn-danger" href="<?php echo Yii::$app->urlManager->createUrl('/pantau');?>"><span class="glyphicon glyphicon-repeat"></span> Jelajah Data</a>
          <a class="btn btn-lg btn-secondary" href="<?php echo Yii::$app->urlManager->createUrl('/site/about');?>"><span class="glyphicon glyphicon-send"></span> Selengkapnya</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="featured-container">
                <h3><span class="circle-icon"><i class="glyphicon glyphicon-random"></i></span> Crowd Sourcing</h3>
                <p>Kami menyebutnya <strong>data gotong royong</strong>. Data yang terkumpul di sini merupakan hasil gotong royong
                semua pengguna yang mempunyai semangat keterbukaan data untuk mewujudkan pemerintahan yang terbuka, partisipatif dan akuntabel.</p>
            </div>
        </div>
        <!-- break -->
        <div class="col-sm-4">
            <div class="featured-container">
                <h3><span class="circle-icon"><i class="glyphicon glyphicon-fire"></i></span> Connect with API</h3>
                <p>Adanya <em>Application Programming Interface</em> (API) semakin mempermudah komunikasi data lintas aplikasi/sistem.
                Kami mencoba menghubungkan data-data yang bertebaran yang belum mempunyai standard protokol komunikasi data yang baku.
                </p>
            </div>
        </div>
        <!-- break -->
        <div class="col-sm-4">
            <div class="featured-container">
                <h3><span class="circle-icon"><i class="glyphicon glyphicon-share-alt"></i></span> Contribute and Visualize</h3>
                <p>Anda dapat berkontribusi dengan mengunggah berkas atau menghubungkan dengan API aplikasi anda. 
                Selanjutnya anda bisa menjelajahi dan menampilkan semua data yang ada Pantau Desa.
                <strong>Explore - Upload/Download - Syncronize - Visualize - Integrate</strong></p>
            </div>
        </div>
    </div>
</div>
