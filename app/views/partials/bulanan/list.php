<?php
$view_data = $this->view_data;
$records = $view_data->records;

$show_footer = $this->show_footer;
?>

<section class="page" id="" data-page-type="list" data-display-type="table" data-page-url="">
    <div class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <h4 class="record-title">PENDAPATAN BULANAN</h4>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 comp-grid">
                <?php $this::display_page_errors(); ?>
                <div class="animated fadeIn page-content">
                    <div id="pendapatan1-list-records">
                        <form class="form-inline mb-2" action="" method="get">
                            <label class="mr-2">Filter Bulan:</label>
                            <select name="bulan" class="form-control mr-2">
                                <option value="">Pilih Bulan</option>
                                <?php
                                $bulan_selected = isset($_GET['bulan']) ? $_GET['bulan'] : '';
                                $bulan_names = [
                                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                ];
                                foreach ($bulan_names as $bulan_value => $bulan_name) {
                                    $selected = ($bulan_selected == $bulan_value) ? 'selected' : '';
                                    echo "<option value='{$bulan_value}' {$selected}>{$bulan_name}</option>";
                                }
                                ?>
                            </select>
                            <label class="mr-2">Filter Tahun:</label>
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
                        <br>
                        <div id="page-report-body" class="table-responsive">
                            <table class="table table-striped table-sm text-left">
                                <thead class="table-header bg-light">
                                    <tr>
                                        <th class="td-sno">#</th>
                                        <th class="td-alamat">Alamat</th>
                                        <th class="td-total_induk_kering1">Total Induk Kering +</th>
                                        <th class="td-total_induk_kering2">Total Induk Kering -</th>
                                        <th class="td-total_induk_laktasi1">Total Induk Laktasi +</th>
                                        <th class="td-total_induk_laktasi2">Total Induk Laktasi -</th>
                                        <th class="td-total_dara1">Total Dara +</th>
                                        <th class="td-total_dara2">Total Dara -</th>
                                        <th class="td-total_pedet_jtn">Total Pedet Jantan</th>
                                        <th class="td-total_pedet_btn">Total Pedet Betina</th>
                                        <th class="td-total_pendapatan">Total Prod. Susu/ltr</th>
                                        <th class="td-total_populasi">Populasi</th>
                                    </tr>
                                </thead>
                                <tbody class="page-data">
                                    <?php if (!empty($records)) {
                                        $counter = 0;
                                        foreach ($records as $data) {
                                            $counter++;
                                            ?>
                                            <tr>
                                                <td class="td-sno"><?php echo $counter; ?></td>
                                                <td class="td-alamat"><?php echo $data['alamat']; ?></td>
                                                <td class="td-total_induk_kering1"><?php echo $data['total_induk_kering1']; ?></td>
                                                <td class="td-total_induk_kering2"><?php echo $data['total_induk_kering2']; ?></td>
                                                <td class="td-total_induk_laktasi1"><?php echo $data['total_induk_laktasi1']; ?></td>
                                                <td class="td-total_induk_laktasi2"><?php echo $data['total_induk_laktasi2']; ?></td>
                                                <td class="td-total_dara1"><?php echo $data['total_dara1']; ?></td>
                                                <td class="td-total_dara2"><?php echo $data['total_dara2']; ?></td>
                                                <td class="td-total_pedet_jtn"><?php echo $data['total_pedet_jtn']; ?></td>
                                                <td class="td-total_pedet_btn"><?php echo $data['total_pedet_btn']; ?></td>
                                                <td class="td-total_pendapatan"><?php echo $data['total_pendapatan'];  ?> Liter</td>
                                                <td class="td-total_populasi"><?php echo $data['total_populasi']; ?></td>
                                            </tr>
                                        <?php }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="12" class="text-center">No record found</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        if( $show_footer && !empty($records)){
                            ?>
                            <div class=" border-top mt-2">
                                <div class="row justify-content-center">    
                                    <div class="col-md-auto justify-content-center">    
                                        <div class="p-3 d-flex justify-content-between">    
                                            <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("pendapatan1/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                <i class="fa fa-times"></i> Delete Selected
                                            </button>
                                            <div class="dropup export-btn-holder mx-1">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-save"></i> Export
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">   
                                        <?php
                                        if($show_pagination == true){
                                            $pager = new Pagination($total_records, $record_count);
                                            $pager->route = $this->route;
                                            $pager->show_page_count = true;
                                            $pager->show_record_count = true;
                                            $pager->show_page_limit =true;
                                            $pager->limit_count = $this->limit_count;
                                            $pager->show_page_number_list = true;
                                            $pager->pager_link_range=5;
                                            $pager->render();
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
