<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<?php
$view_data = $this->view_data;
$records = $view_data->records;

$show_footer = $this->show_footer;
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >The Dashboard</h4>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_pengguna();  ?>
                    <a class="animated zoomIn record-count card bg-warning text-white"  href="<?php print_link("pengguna/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Pengguna</div>
                                    <div class="progress mt-2">
                                        <?php 
                                        $perc = ($rec_count / 100) * 100 ;
                                        ?>
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                                            <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                                        </div>
                                    </div>
                                    <small class="small desc"></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_jumlahadmin();  ?>
                    <a class="animated zoomIn record-count alert alert-info"  href="<?php print_link("pengguna/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Jumlah Admin</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_jumlahuser();  ?>
                    <a class="animated zoomIn record-count card bg-dark text-white"  href="<?php print_link("pengguna/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Jumlah User</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-7 comp-grid">
                    <div class="card card-body">
                        <div  class=" py-5">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-md-20 comp-grid">
                                        <div class="">
                                          <div class="fadeIn animated mb-4">
                                            <div class="text-capitalize">
                                              <h2 align="center" class="text-capitalize">Sistem Aplikasi <br>Keanggotaan Berbasis WEB </h2>

                                              <div class=""><div><center><img src="assets/images/logo-koperasi.png" width="150" height="160" /></center></div>
                                              <div><br>
                                              Selamat datang di Sistem Aplikasi Keanggotaan Berbasis Web. Sistem ini merupakan sistem yang digunakan untuk mencatat data anggota dan pendapatan dan disertai dengan bukti upload berkas</div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <section class="page" id="" data-page-type="list" data-display-type="table" data-page-url="">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 comp-grid">
                                        <?php $this::display_page_errors(); ?>
                                        <div class="animated fadeIn page-content">
                                            <div id="pendapatan1-list-records">
                                                <form class="form-inline mb-2" action="" method="get">
                                                    <select name="tahun" class="form-control mr-2">
                                                        <option value="">Pilih Tahun</option>
                                                        <?php
                                                        $currentYear = date('Y');
                                                        for ($year = $currentYear; $year >= $currentYear - 10; $year--) {
                                                            $selected = isset($_GET['tahun']) && $_GET['tahun'] == $year ? 'selected' : '';
                                                            echo "<option value=\"$year\" $selected>$year</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php

                            $villages = [];

                            if (!empty($records)) {
                                foreach ($records as $data) {
                                    $village = $data['alamat'];

                                    if (!isset($villages[$village])) {
                                        $villages[$village] = [
                                            'januari' => 0,
                                            'februari' => 0,
                                            'maret' => 0,
                                            'april' => 0,
                                            'mei' => 0,
                                            'juni' => 0,
                                            'juli' => 0,
                                            'agustus' => 0,
                                            'september' => 0,
                                            'oktober' => 0,
                                            'november' => 0,
                                            'desember' => 0
                                        ];
                                    }

                                    $villages[$village]['januari'] += $data['januari_total'];
                                    $villages[$village]['februari'] += $data['februari_total'];
                                    $villages[$village]['maret'] += $data['maret_total'];
                                    $villages[$village]['april'] += $data['april_total'];
                                    $villages[$village]['mei'] += $data['mei_total'];
                                    $villages[$village]['juni'] += $data['juni_total'];
                                    $villages[$village]['juli'] += $data['juli_total'];
                                    $villages[$village]['agustus'] += $data['agustus_total'];
                                    $villages[$village]['september'] += $data['september_total'];
                                    $villages[$village]['oktober'] += $data['oktober_total'];
                                    $villages[$village]['november'] += $data['november_total'];
                                    $villages[$village]['desember'] += $data['desember_total'];
                                }
                            }

                            $chart_data = [
                                'labels' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                'datasets' => []
                            ];

                            foreach ($villages as $village => $totals) {
                                $chart_data['datasets'][] = [
                                    'label' => $village,
                                    'data' => array_values($totals),
                                    'borderColor' => '#' . dechex(rand(0x000000, 0xFFFFFF)),
                                    'backgroundColor' => 'rgba(0, 0, 0, 0)',
                                    'fill' => false
                                ];
                            }
                            ?>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var ctx = document.getElementById('grafik').getContext('2d');
                                    var data = <?php echo json_encode($chart_data); ?>;

                                    var chart = new Chart(ctx, {
                                        type: 'line',
                                        data: data,
                                        options: {
                                            responsive: true,
                                            plugins: {
                                                legend: {
                                                    position: 'top',
                                                },
                                                tooltip: {
                                                    callbacks: {
                                                        label: function(tooltipItem) {
                                                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                                                        }
                                                    }
                                                }
                                            },
                                            scales: {
                                                x: {
                                                    beginAtZero: true
                                                },
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>

                        </section>

                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-4">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik TAHUNAN</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="grafik"></canvas>
                                </div>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




