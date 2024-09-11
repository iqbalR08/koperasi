<?php
$view_data = $this->view_data;
$records = $view_data->records;

$show_footer = $this->show_footer;
?>

<section class="page" id="" data-page-type="list" data-display-type="table" data-page-url="">
    <div class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <h4 class="record-title">PENDAPATAN TAHUNAN</h4>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 comp-grid">
                <?php $this::display_page_errors(); ?>
                <div class="animated fadeIn page-content">
                    <div id="pendapatan1-list-records">
                        <form class="form-inline mb-2" action="" method="get">
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
                                        <th class="td-total_records">Jumlah Data</th>
                                        <th  class="td-januari"> Januari </th>
                                        <th  class="td-Februari"> Februari </th>
                                        <th  class="td-Maret"> Maret</th>
                                        <th  class="td-april"> April </th>
                                        <th  class="td-mei"> mei </th>
                                        <th  class="td-juni"> Juni </th>
                                        <th  class="td-juli"> Juli </th>
                                        <th  class="td-agustus"> Agustus </th>
                                        <th  class="td-september"> September </th>
                                        <th  class="td-oktober"> Oktober</th>
                                        <th  class="td-november"> November </th>
                                        <th  class="td-desember"> Desember </th>
                                        <th  class="td-toto_tahun"> Total </th>

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
                                                <td class="td-total_records"><?php echo $data['total_records']; ?></td>
                                                <td class="td-januari"><?php echo $data['januari_total']; ?></td>
                                                <td class="td-februari"><?php echo $data['februari_total']; ?></td>
                                                <td class="td-maret"><?php echo $data['maret_total']; ?></td>
                                                <td class="td-april"><?php echo $data['april_total']; ?></td>
                                                <td class="td-mei"><?php echo $data['mei_total']; ?></td>
                                                <td class="td-juni"><?php echo $data['juni_total']; ?></td>
                                                <td class="td-juli"><?php echo $data['juli_total']; ?></td>
                                                <td class="td-agustus"><?php echo $data['agustus_total']; ?></td>
                                                <td class="td-september"><?php echo $data['september_total']; ?></td>
                                                <td class="td-oktober"><?php echo $data['oktober_total']; ?></td>
                                                <td class="td-november"><?php echo $data['november_total']; ?></td>
                                                <td class="td-desember"><?php echo $data['desember_total']; ?></td>
                                                <td class="td-total_tahun"><?php echo $data['total_populasi']; ?></td>
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
