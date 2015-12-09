<div class="raw">
	<div class="col-md-6">
		<h3>Rencana Anggaran. 2015</h3>
		<hr>
		<h4>BESARAN BERDASARKAN BIDANG</h4>
		<hr>
		<div class="raw">
			<?php foreach($ringkasan->bidang_belanja as $key => $value): ?>
				<div class="col-md-6">
				<h1><?php echo $value->text ?></h1>
				<p><?php echo $value->bidang ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<h4>BESARAN BERDASARKAN SUMBER DANA</h4>
		<hr>
		<div class="raw">
			<?php foreach($ringkasan->sumber_dana as $key => $value): ?>
			 <div class="col-md-6">
				<h1><?php echo $value->text ?></h1>
				<p><?php echo $value->dana ?></p>
				</div> 
			<?php endforeach; ?>
		</div>
		<h4> BESARAN BERDASARKAN JENIS BELANJA</h4>
		<hr>
		<div class="raw">
			<?php foreach($ringkasan->jenis_belanja as $key => $value): ?>
			 <div class="col-md-6">
				<h1><?php echo $value->text ?></h1>
				<p><?php echo $value->jenis ?></p>
				</div> 
			<?php endforeach; ?>
		</div>
	
	</div>
	<div class="col-md-6">
		<h3>Realisasi Anggaran. 2015</h3>
		<hr>
		<h4>  BESARAN BERDASARKAN BIDANG</h4>
		<hr>
		<div class="raw">
			<?php foreach($ringkasan->r_bidang_belanja as $key => $value): ?>
			 <div class="col-md-6">
				<h1><?php echo $value->text ?></h1>
				<p><?php echo $value->bidang ?></p>
				</div> 
			<?php endforeach; ?>
		</div>
		<h4>   BESARAN BERDASARKAN JENIS BELANJA</h4>
		<hr>
		<div class="raw">
			<?php foreach($ringkasan->r_jenis_belanja as $key => $value): ?>
			 <div class="col-md-6">
				<h1><?php echo $value->text ?></h1>
				<p><?php echo $value->jenis ?></p>
				</div> 
			<?php endforeach; ?>
		</div>
		
	</div>
</div>