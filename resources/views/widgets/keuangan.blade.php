
@if (!empty($widget_keuangan['tahun']) && null !== $widget_keuangan['tahun']) 
<style type="text/css">
  .graph,
  .graph-sub {
    padding: 0 12px;
    padding-top: 4px;
  }
  .graph-sub {
    font-family: 'Courier New', monospace;
    font-size: 10px;
    color: #333;
    font-weight: bold;
    text-align: left;
    white-space: nowrap;
  }
  .graph {
    padding-top: 4px;
  }
  .graph-not-available {
    text-align: center;
    font-family: 'Courier New', monospace;
    font-size: 12px;
  }
  #graph-legend {
    padding: 0;
    padding-bottom: 12px;
  }
  .highcharts-container,
  svg:not(:root) {
    overflow: visible !important;
    position: absolute;
  }
  .highcharts-tooltip>span {
    background: rgba(255, 255, 255, 0.85);
    border: 1px solid silver;
    border-radius: 3px;
    box-shadow: 1px 1px 2px #888;
    padding: 8px;
  }
</style>

<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-bar-chart"></i><h1>{{ $judul_widget }}</h1>
		</div>
	</div>
	<div class="widgetbox widget-cat">
		 <div id="widget-keuangan-container">
        <div id="grafik-judul" style="width: 100%; position: static;">
          <div class="dropdown" style="position: relative; top: -5px;">
            <button class="dropdown-toggle btn btn-default" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 0">
              <span class="sr-only">Toogle navigation</span>
              <i class="fa fa-bars"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-left">
              @foreach ($widget_keuangan['tahun'] as $key) 
                <li><a class="dropdown-item"><b>{{ $key }}</b></a></li>
                <li><a class="dropdown-item" onclick="gantiTipe('pelaksanaan'); gantiTahun('{{ $key }}')">Pelaksanaan APBDes</a></li>
                <li><a class="dropdown-item" onclick="gantiTipe('pendapatan'); gantiTahun('{{ $key }}')">Pendapatan APBDes</a></li>
                <li><a class="dropdown-item" onclick="gantiTipe('belanja'); gantiTahun('{{ $key }}')">Belanja APBDes</a></li>
              @endforeach
            </ul>
          </div>
          <h3></h3>
          <p id="grafik-tahun"></p>
        </div>
        <div id="grafik-container">
        </div>
      </div>
	</div>
</div>


  <script type="text/javascript">
    var rawData = {!! $widget_keuangan['data'] !!};
    var year = "{{ $widget_keuangan['tahun_terbaru'] }}";
    var tipe = "pelaksanaan"    

    function displayChart(tahun, tipe) {
      resetContainer();
      switch (tipe) {
        case "pelaksanaan":
          var judulGrafik = 'Pelaksanaan APBDes';
          var tipeGrafik = 'res_pelaksanaan';
          break;

        case "belanja":
          var judulGrafik = 'Belanja APBDes';
          var tipeGrafik = 'res_belanja';
          break;

        case "pendapatan":
          var judulGrafik = 'Pendapatan APBDes';
          var tipeGrafik = 'res_pendapatan';
          break;
      }
      var chartData = rawData[tahun][tipeGrafik];
      $("#widget-keuangan-container h3").text(judulGrafik);
      $("#grafik-container").append("<div id='graph-legend' class='graph'></div>");
      Highcharts.chart("graph-legend", {
        chart: {
          type: 'bar',
          margin: 0,
          backgroundColor: "rgba(0,0,0,0)",
          spacing: [0, 0, 0, 0],
          height: 20
        },

        title: {
          text: ''
        },

        subtitle: {
          y: -2,
          style: {
            "color": "#000"
          },
          text: '',
        },

        xAxis: {
          visible: false,
          categories: [''],
        },

        tooltip: {
          valueSuffix: ''
        },

        plotOptions: {
          bar: {
            dataLabels: {
              enabled: true
            },
          },

          series: {
            pointPadding: 0,
            groupPadding: 0,
            dataLabels: {
              align: 'right',
              inside: true,
              shadow: false,
              color: '#000',
            },
            grouping: false,
          },
        },

        credits: {
          enabled: false
        },

        yAxis: {
          visible: false
        },

        exporting: {
          enabled: false
        },

        legend: {
          padding: 0,
          margin: 0,
          verticalAlign: 'middle',
          maxHeight: 50
        },

        series: [{
            name: 'Anggaran',
            color: '#34b4eb',
            data: [],
          },
          {
            name: 'Realisasi',
            color: '#b4eb34',
            data: [],
          }
        ]
      });
      //Eksekusi chart dengan for loop
      chartData.forEach(function(subData, idx) {
        if (subData['nama']) {
          if ((!subData['realisasi'] && !subData['anggaran'])) {
            $("#grafik-container").append(
              "<div class='graph-sub' id='graph-sub-" + idx + "'>" + subData['nama'] + "</div><div id='graph-" + idx + "' class='graph-not-available'>Data tidak tersedia.</div>");
          } else {
            if (!isNaN(subData['anggaran'])) {
              var persentase = parseInt(subData['persen']);
              
              persentase = Math.round(persentase);
              $("#grafik-container").append(
                "<div class='graph-sub' id='graph-sub-" + idx + "'>" + subData['nama'] + "</div><div id='graph-" + idx + "' class='graph'></div>");
              Highcharts.chart("graph-" + idx, {
                chart: {
                  type: 'bar',
                  margin: 0,
                  height: 20,
                  backgroundColor: "rgba(0,0,0,0)",
                  spacingBottom: 0,
                },

                title: {
                  text: ''
                },

                subtitle: {
                  y: -2,
                  style: {
                    "color": "#000"
                  },
                  text: '',
                },

                xAxis: {
                  visible: false,
                  categories: [''],
                },

                tooltip: {
                  valueSuffix: '',
                  backgroundColor: "#fff",
                  hideDelay: 0,
                  shape: "square",
                  outside: true,
                },

                plotOptions: {
                  bar: {
                    dataLabels: {
                      enabled: true
                    },
                  },

                  series: {
                    pointPadding: 0,
                    groupPadding: 0,
                    dataLabels: {
                      align: 'right',
                      inside: true,
                      shadow: false,
                      color: '#000',
                    },
                    grouping: false,
                  },
                },

                credits: {
                  enabled: false
                },

                yAxis: {
                  visible: false
                },

                exporting: {
                  enabled: false
                },

                legend: {
                  enabled: false
                },

                series: [{
                  name: 'Anggaran',
                  color: '#34b4eb',
                  data: [parseInt(subData['anggaran'])],
                  dataLabels: {
                    formatter: function() {
                      if (parseInt(subData['realisasi']) <= parseInt(subData['anggaran'])) {
                        return "Rp. " + Highcharts.numberFormat(subData['anggaran'], '.', ',');
                      } else {
                        return "";
                      }
                    },
                    style: {
                      "textOutline": "1px contrast"
                    },
                  },
                  tooltip: {
                    pointFormatter: function() {
                      return 'Anggaran: <b>Rp. ' + Highcharts.numberFormat(this.y, '.', ',') + '</b>';
                    }
                  }
                }, {
                  name: 'Realisasi',
                  color: '#b4eb34',
                  data: [parseInt(subData['realisasi'])],
                  dataLabels: {
                    formatter: function() {
                      if (parseInt(subData['realisasi']) > parseInt(subData['anggaran'])) {
                        return "Rp. " + Highcharts.numberFormat(subData['realisasi'], '.', ',');
                      } else {
                        return "(" + persentase + "%)";
                      }
                    },
                    style: {
                      "textOutline": "1px contrast"
                    },
                  },
                  tooltip: {
                    pointFormatter: function() {
                      return 'Realisasi: <b>Rp. ' + Highcharts.numberFormat(this.y, '.', ',') + '</b>';
                    }
                  }
                }]
              });
            }
          }
        }
      });
      $("p#grafik-tahun").text("Tahun " + year);
    }

    function resetContainer() {
      $("#grafik-container").html("");
    }

    function gantiTahun(newThn) {
      year = newThn;
      displayChart(year, tipe);
    }

    function gantiTipe(newType) {
      tipe = newType;
      displayChart(year, tipe);
    }

    $("#keuangan-selector").change(function() {
      gantiTahun($("#keuangan-selector").val());
    })

    $(document).ready(function() {
      //Realisasi Pelaksanaan APBD
      $("#keuangan-selector").val("{{ $widget_keuangan['tahun_terbaru'] }}")
      displayChart(year, tipe);
    });
  </script>
@endif