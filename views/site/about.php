<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Tentang Pantau Desa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    	<?php echo Html::img('@web/images/skema_pantaudesa.png'); ?>
    </p>

    <h3 class="text-success"><span class="glyphicon glyphicon-random"></span> Crowd Sourcing</h3>

                <p>Kami menyebutnya <strong>data gotong royong</strong>. Data yang terkumpul di sini merupakan hasil gotong royong
                semua pengguna yang mempunyai semangat keterbukaan data untuk mewujudkan pemerintahan yang terbuka, partisipatif dan akuntabel.</p>
	<h3 class="text-success"><span class="glyphicon glyphicon-fire"></span> Connect with API</h3>

                <p>Adanya <em>Application Programming Interface</em> (API) semakin mempermudah komunikasi data lintas aplikasi/sistem.
                Kami mencoba menghubungkan data-data yang bertebaran yang belum mempunyai standard protokol komunikasi data yang baku.
                </p>
<h3 class="text-success"><span class="glyphicon glyphicon-share-alt"></span> Contribute and Visualize</h3>

                <p>Anda dapat berkontribusi dengan mengunggah berkas atau menghubungkan dengan API aplikasi anda. 
                Selanjutnya anda bisa menjelajahi dan menampilkan semua data yang ada Pantau Desa.</p>
                <p>Explore - Upload/Download - Syncronize - Visualize - Integrate</p>
                
</div>
