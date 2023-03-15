<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<script src="<?= base_url()?>assets/js/highcharts/highcharts.js"></script>
<script src="<?= base_url()?>assets/js/highcharts/highcharts-more.js"></script>
<script src="<?= base_url()?>assets/js/highcharts/exporting.js"></script>
<script type="text/javascript">
	$(document).ready(function() {hiRes ();});
	var chart;
	function hiRes () {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'chart',
				border:0,
				defaultSeriesType: 'column'
			},
			title: {
				text: ''
			},
			xAxis: {
				title: {
					text:''
				},
				categories: [
				<?php $i=0;foreach($list_jawab as $data){$i++;?>
					<?php if($data['nilai'] != "-"){echo "'$data[jawaban]',";}?>
				<?php }?>
				]
			},
			yAxis: {
				title: {
					text: 'Jumlah Populasi'
				}
			},
			legend: {
				layout: 'vertical',
				enabled:false
			},
			plotOptions: {
				series: {
					colorByPoint: true
				},
				column: {
					pointPadding: 0,
					borderWidth: 0
				}
			},
			series: [{
				shadow:1,
				border:0,
				data: [
				<?php foreach($list_jawab as $data){?>
					<?php if($data['jawaban'] != "TOTAL"){?>
						<?php if($data['nilai'] != "-"){?>
							<?= $data['nilai']?>,
						<?php }?>
					<?php }?>
					<?php }?>]
				}]
			});
	};
</script>

<div class="c-flex" style="margin:20px 0 20px;">
<h1><?= $indikator['pertanyaan'] ?></h1>
</div>		
<div style="width:100%;margin:0 0 20px;">
	<div id="contentpane">
		<div class="ui-layout-center" id="chart" style="padding: 5px;"></div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="30">No</th>
					<th>Jawaban</th>
					<th>Jumlah Responden</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list_jawab as $data): ?>
					<tr>
						<td><?= $data['no']?></td>
						<td><?= $data['jawaban']?></td>
						<td><?= $data['nilai']?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="c-flex">
			<a href="<?= site_url()?>first/data_analisis" class="btn btn-primary btn-sm">Kembali Ke Daftar Analisis</a>
		</div>
	</div>
</div>