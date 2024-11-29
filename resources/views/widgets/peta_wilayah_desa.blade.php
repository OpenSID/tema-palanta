
<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-globe"></i><h1>{{ $judul_widget }}</h1>
		</div>
	</div>
	<div class="widgetbox widget-cat">
		<div id="map_wilayah" class="maphome"></div>
		<div class="c-flex" style="margin-top:5px;">
		<a href="https://www.openstreetmap.org/#map=15/{{$data_config['lat']."/".$data_config['lng'] }}" class="btn btn-primary btn-sm" rel="noopener noreferrer" target="_blank">Buka Peta</a>
		</div>
	</div>
</div>


<script>
	//Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
	@if (!empty($data_config['lat']) && !empty($data_config['lng']))
		var posisi = [{{$data_config['lat'].",".$data_config['lng'] }}];
		var zoom = {{$data_config['zoom'] ?: 10}};
	@else
		var posisi = [-1.0546279422758742,116.71875000000001];
		var zoom = 10;
	@endif
	//Style polygon
	var style_polygon = {
		stroke: true,
		color: '#FF0000',
		opacity: 1,
		weight: 2,
		fillColor: '#8888dd',
		fillOpacity: 0.5
	};
	var wilayah_desa = L.map('map_wilayah').setView(posisi, zoom);

	//Menampilkan BaseLayers Peta
	var baseLayers = getBaseLayers(wilayah_desa, '{{ $setting->mapbox_key');

	L.control.layers(baseLayers, null, {position: 'topright', collapsed: true}).addTo(wilayah_desa);

	@if (!empty($data_config['path']))
		var polygon_desa = {{ $data_config['path'];
		var kantor_desa = L.polygon(polygon_desa, style_polygon).bindTooltip("Wilayah Desa").addTo(wilayah_desa);
		wilayah_desa.fitBounds(kantor_desa.getBounds());
	@endif
</script>