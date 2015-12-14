<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Tentang Pantau Desa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="heading-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>

    <p class="text-center">
    	<?php echo Html::img('@web/images/skema_pantaudesa.png'); ?>
    </p>
    
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

</div>
