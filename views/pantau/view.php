<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

app\assets\ChartJsAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Pantau */

$this->title = $model->desa;
$this->params['breadcrumbs'][] = ['label' => 'Pantau', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pantau-view">

    <h1>Desa <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table class="table ">
        <tr>
            <td>Desa</td>
            <td><?= Html::encode($model->desa); ?></td>
        </tr>
        
        <tr>
            <td>Kecamatan</td>
            <td><?= Html::encode($model->kecamatan); ?></td>
        </tr>

        <tr>
            <td>Kabupaten </td>
            <td><?= Html::encode($model->kabupaten); ?></td>
        </tr>

        <tr>
            <td>Provinsi</td>
            <td><?= Html::encode($model->provinsi); ?></td>
        </tr>
                
    </table>

    <?php 
    $url = null;
    if($model->method === 'url'):
        if(isset($model->content['url'])): 
            $url = $model->content['url'];
    ?>

        <ul class="nav nav-tabs" role="tablist" id="tabTahun">
         
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" >
              {{tahun}}
          </div>
        </div>
    <?php
        endif;

    elseif($model->method === 'upload'):
        if(isset($model->content['files']) && count($model->content['files'] > 0 )):
          
            echo '<div class="row">';             
            
            foreach ($model->content['files'] as $key => $file) {
                //print_r($file);
                $uri = Url::to('/uploads/'.$file['name']);
                $uri = Url::base(true).$uri;
                $dl = Html::a('Unduh', ['uploads/'.$file['name']],['class' => 'btn btn-primary']);
                if((strpos( $file['type'],'image')) !== false){
                    echo '<div class="col-xs-6 col-md-3">
                            <div class="thumbnail">
                              <img src="'.$uri.'" alt="'.$file['name'].'">
                              <div class="caption">
                                <h3>'.$file['name'].'</h3>
                                <p> ('.number_format($file["size"]/1024,"2").' KB ).</p>
                                <p>'.$dl.'</p>
                              </div>
                            </div>
                          </div>';
                }
                elseif((strpos( $file['type'],'image')) !== false){
                    
                }

            }
            echo '</div>';
        endif;
      
    endif;
     ?>

     

     
    <canvas id="diagram" width="300" height="300"></canvas>

</div>

<?php 
 if($model->method === 'url'):
$this->registerJs("
    tahun();
    $('#tabTahun').on('click','a',function(){
        var tahun = $(this).attr('data-id');
        $('#tabTahun').find('.active').removeClass('active');
        $(this).parent().addClass('active');
        
        ringkasan(tahun);
        return false;
    });
    function tahun(){
        $.ajax({
            url: '".$url."/tahun',
            method :'GET',
            success: function(data){
                console.log(data.tahun);
                if(data.tahun){
                    $.each(data.tahun,function(i,row){
                        console.log(row);
                        var cc = '';
                        if(i === 0){
                           // cc = 'active';
                        }
                          var html = '<li class=\"'+cc+'\"><a href=\"#\" data-id=\"'+row+'\">'+row+'</a></li>';  
                          $('#tabTahun').append(html);
                    })
                }
            }
        })
    }

    function ringkasan(tahun){
        $.ajax({
            url: '".$url."/ringkasan/tahun/'+tahun,
            method :'GET',
            success: function(data){
                console.log(data);
                /*RENCANA*/
                if(data.bidang_belanja){
                    $.each(data.bidang_belanja,function(i,row){
                        console.log(row);
                    });    
                }
                
                if(data.jenis_belanja){
                    $.each(data.jenis_belanja,function(i,row){
                        console.log(row);
                    });    
                }
                
                /*realisasi*/
                 if(data.r_bidang_belanja){
                    $.each(data.r_bidang_belanja,function(i,row){
                        console.log(row);
                    });    
                }
                
                if(data.r_jenis_belanja){
                    $.each(data.r_jenis_belanja,function(i,row){
                        console.log(row);
                    });    
                }

                /*sumberdana*/
                 if(data.sumber_dana){
                    $.each(data.sumber_dana,function(i,row){
                        console.log(row);
                    });    
                }
                
               

            }
        })
    }

    var data = [
        {
            value: 300,
            color: '#F7464A',
            highlight: '#FF5A5E',
            label: 'Red'
        },
        {
            value: 50,
            color: '#46BFBD',
            highlight: '#5AD3D1',
            label: 'Green'
        },
        {
            value: 100,
            color: '#FDB45C',
            highlight: '#FFC870',
            label: 'Yellow'
        }
    ]

    var ctx = $('#diagram').get(0).getContext('2d');
    var myPieChart = new Chart(ctx).Pie(data);

    ");

endif; ?>