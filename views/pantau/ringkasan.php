 <?php 

  ?>
 <div id="tab-panel"  ng-controller="Ringkasan">
        <ul class="nav nav-tabs" role="tablist">
          <?php foreach($tahun->tahun as $key => $th):  ?>
            <li role="presentation" ng-click="selectTahun(<?php echo $th ?>)" class="<?php echo $key == 0 ? "active" : ""; ?>"><a href="#<?php $key ?>" aria-controls="<?php echo $key ?>" role="tab" data-toggle="tab"><?php echo $th ?></a></li>
          <?php endforeach; ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" >
              {{tahun}}
          </div>
        </div>
  </div>