<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
 <div class="card-body">
    <div class="row mt-2">
        <div class="col-lg-4 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-4">
                    <h4 class="m-0 font-weight-bold text-primary">Filter Laporan Berdasarkan Bulan</h4>
                </div>
                <div class="card-body"> 
                    <form action="" method="post" target="_blank" >
                        <div class="form-group">
                            <label>Bulan Awal</label>
                            <input type="hidden" name="nilaifilter" value="1">
                            <input type="date" name="tgl_awal" id="tgl_awal" value="<?=date('Y-m-d')?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Bulan Akhir</label>
                            <input type="date" name="tgl_akhir" id="tgl_akhir" value="<?=date('Y-m-d')?>" class="form-control" >
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Print</button>
                    </form>             
                </div>                  
            </div>  
        </div>  
    </div>          
</div>  
</section>
