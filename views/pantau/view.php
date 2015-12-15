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

    <div class="heading-title">
        <h2>Pantau Desa <?= Html::encode($model->desa); ?></h2>
    </div>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <table class="table ">
        <tr>
            <td><strong>Desa</strong></td>
            <td><?= Html::encode($model->desa); ?></td>
        </tr>
        <tr>
            <td width="20%"><strong>Provinsi</strong></td>
            <td><?= Html::encode($model->provinsi); ?></td>
        </tr>
        <tr>
            <td><strong>Kabupaten</strong></td>
            <td><?= Html::encode($model->kabupaten); ?></td>
        </tr>
        <tr>
            <td><strong>Kecamatan</strong></td>
            <td><?= Html::encode($model->kecamatan); ?></td>
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
          <div role="tabpanel" class="tab-pane active text-container" >
            <div class="row">
                <div class="col-sm-4">
                    <div class="heading-title">
                        <h3>Besaran Berdasarkan Bidang</h3>
                    </div>
                    <canvas id="diagram_bd_belanja" width="300" height="300"></canvas>
                    <br>
                    <div id="bd_belanja" class="text-desc"></div>
                </div>
                 <div class="col-sm-4">
                    <div class="heading-title">
                        <h3>Besaran Berdasarkan Jenis Belanja</h3>
                    </div>
                    <canvas id="diagram_jn_belanja" width="300" height="300"></canvas>
                    <br>
                    <div id="jn_belanja" class="text-desc"></div>
                </div>
                 <div class="col-sm-4">
                    <div class="heading-title">
                        <h3>Besaran Berdasarkan Sumber Dana</h3>
                    </div>
                    <canvas id="diagram_sumber_dana" width="300" height="300"></canvas>
                    <br>
                    <div id="sumber_dana" class="text-desc"></div>
                </div>
                <!-- break -->

                <!-- <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="heading-title">
                                <h3>Besaran Berdasarkan Bidang</h3>
                            </div>
                            <div id="bd_belanja" class="text-desc"></div>
                        </div>
                        break
                        <div class="col-sm-4">
                            <div class="heading-title">
                                <h3>Besaran Berdasarkan Jenis Belanja</h3>
                            </div>
                            <div id="jn_belanja" class="text-desc"></div>
                        </div>
                        break
                        <div class="col-sm-4">
                            <div class="heading-title">
                                <h3>Besaran Berdasarkan Sumber Dana</h3>
                            </div>
                            <div id="sumber_dana" class="text-desc"></div>
                        </div>
                        break
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="heading-title">
                                <h3>Besaran Realisasi Berdasarkan Bidang</h3>
                            </div>
                            <div id="r_bd_belanja" class="text-desc"></div>
                        </div>
                        break
                        <div class="col-sm-4">
                            <div class="heading-title">
                                <h3>Besaran Realisasi Berdasarkan Jenis Belanja</h3>
                            </div>
                            <div id="r_js_belanja" class="text-desc"></div>
                        </div>
                        break
                    </div>
                </div> -->
            </div>
            <!-- break -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="heading-title">
                        <h3>Besaran Realisasi Berdasarkan Bidang</h3>
                    </div>
                    <canvas id="diagram_r_bd_belanja" width="300" height="300"></canvas>
                    <br>
                    <div id="r_bd_belanja" class="text-desc"></div>
                </div>
                 <div class="col-sm-6">
                    <div class="heading-title">
                        <h3>Besaran Realisasi Berdasarkan Jenis Belanja</h3>
                    </div>
                    <canvas id="diagram_r_jn_belanja" width="300" height="300"></canvas>
                    <br>
                    <div id="r_jn_belanja" class="text-desc"></div>
                </div>
            </div>
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
                $dl = Html::a('Unduh', ['uploads/'.$file['name']],['class' => 'btn btn-primary btn-sm']);
                if((strpos( $file['type'],'image')) !== false){
                    echo '<div class="col-xs-6 col-md-3">
                            <div class="thumbnail">
                              <img src="'.$uri.'" alt="'.$file['name'].'">
                              <div class="caption">
                                <h3>'.$file['name'].'</h3>
                                <p> ('.number_format($file["size"]/1024,"2").' KB)</p>
                                <p>'.$dl.'</p>
                              </div>
                            </div>
                          </div>';
                }
                else{
                    echo '<div class="col-xs-6 col-md-3">
                            <div class="thumbnail">
                              <div class="preview-file">
                                 <span class="glyphicon glyphicon-list-alt"></span>
                              </div>
                              <div class="caption">
                                <h3>'.$file['name'].'</h3>
                                <p> ('.number_format($file["size"]/1024,"2").' KB)</p>
                                <p>'.$dl.'</p>
                              </div>
                            </div>
                          </div>';
                }

            }
            echo '</div>';
        endif;
      
    endif;
    //print_r($model);
     ?>     

</div>

<?php 
 if($model->method === 'url'):
$this->registerJs("
    var color = [
        {
            color: '#ea6153',
            highlight: '#c0392b'
        },
        {
            color: '#3498db',
            highlight: '#2980b9'
        },
        {
            color: '#2ecc71',
            highlight: '#2cc36b'
        },
        {
            color: '#e67e22',
            highlight: '#d35400'
        },
        {
            color: '#9b59b6',
            highlight: '#8e44ad'
        },
    ];
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
                       
                        var cc = '';
                        if(i === 0){
                           cc = 'active';
                        }
                          var html = '<li class=\"'+cc+'\"><a href=\"#\" data-id=\"'+row+'\">'+row+'</a></li>';  
                          $('#tabTahun').append(html);
                    })
                    $('#tabTahun').find('.active').children('a').click();
                }
            }
        })
    }

    function ringkasan(tahun){
        $('#bd_belanja').html('')
        $('#jn_belanja').html('')
        $('#r_bd_belanja').html('')
        $('#r_jn_belanja').html('')
        $('#sumber_dana').html('')
        $.ajax({
            url: '".$url."/ringkasan/tahun/'+tahun,
            method :'GET',
            success: function(data){
                console.log(data);
                /*RENCANA*/
                if(data.bidang_belanja){
                    var htm = '';
                    var arr = [];
                    var ic = 0;
                    $.each(data.bidang_belanja,function(i,row){
                        htm += row.bidang + '<span>' + row.text + '</span>';                      
                        arr.push(
                            {   
                                value: row.total,
                                color: color[ic]['color'],
                                highlight: color[ic]['highlight'],
                                label: row.bidang
                            }
                            );
                        ic++;
                    });    

                    $('#bd_belanja').html(htm);
                    var ctx = $('#diagram_bd_belanja').get(0).getContext('2d');
                    var myPieChart = new Chart(ctx).Pie(arr);
                }
              

                if(data.jenis_belanja){
                    var htm = '';
                    var arr = [] ;
                    var ic = 0;
                    $.each(data.jenis_belanja,function(i,row){
                        htm += row.jenis + '<span>' + row.text + '</span>';
                        arr.push(
                            {   
                                value: row.total,
                                color: color[ic]['color'],
                                highlight: color[ic]['highlight'],
                                label: row.jenis
                            }
                            );
                        ic++;
                    });    
                     $('#jn_belanja').html(htm);
                    var ctx = $('#diagram_jn_belanja').get(0).getContext('2d');
                    var myPieChart = new Chart(ctx).Pie(arr);
                }
               
                
                /*realisasi*/
                 if(data.r_bidang_belanja){
                    var htm = '';
                    var arr = [];
                    var ic = 0;
                    $.each(data.r_bidang_belanja,function(i,row){
                        htm += row.bidang + '<span>' + row.text + '</span>';
                        arr.push(
                            {   
                                value: row.total,
                                color: color[ic]['color'],
                                highlight: color[ic]['highlight'],
                                label: row.bidang
                            }
                            );
                        ic++;
                    });    
                    $('#r_bd_belanja').html(htm);
                    var ctx = $('#diagram_r_bd_belanja').get(0).getContext('2d');
                    var myPieChart = new Chart(ctx).Pie(arr);
                }
                

                if(data.r_jenis_belanja){
                    var htm = '';
                    var arr = [];
                    var ic = 0;
                    $.each(data.r_jenis_belanja,function(i,row){
                        htm += row.jenis + '<span>' + row.text + '</span>';
                        arr.push(
                            {   
                                value: row.total,
                                color: color[ic]['color'],
                                highlight: color[ic]['highlight'],
                                label: row.jenis
                            }
                            );
                        ic++;
                    });    
                    $('#r_jn_belanja').html(htm);  
                     var ctx = $('#diagram_r_jn_belanja').get(0).getContext('2d');
                    var myPieChart = new Chart(ctx).Pie(arr);

                }
               
                /*sumberdana*/
                 if(data.sumber_dana){
                    var htm = '';
                    var arr = [];
                    var ic = 0;
                    $.each(data.sumber_dana,function(i,row){
                        htm += row.dana + '<span>' + row.text + '</span>';
                        arr.push(
                            {   
                                value: row.total,
                                color: color[i]['color'],
                                highlight: color[i]['highlight'],
                                label: row.dana
                            }
                            );
                        ic++;
                    });

                    $('#sumber_dana').html(htm);
                     var ctx = $('#diagram_sumber_dana').get(0).getContext('2d');
                    var myPieChart = new Chart(ctx).Pie(arr);
                }
              
                
               

            }
        })
    }

        

    ");

endif; ?>
