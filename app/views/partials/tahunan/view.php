<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tahunan/add");
$can_edit = ACL::is_allowed("tahunan/edit");
$can_view = ACL::is_allowed("tahunan/view");
$can_delete = ACL::is_allowed("tahunan/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Populasi Tahunan</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['No_Agenda']) ? urlencode($data['No_Agenda']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-No_Agenda">
                                        <th class="title"> No Agenda: </th>
                                        <td class="value"> <?php echo $data['No_Agenda']; ?></td>
                                    </tr>
                                    <tr  class="td-tahun">
                                        <th class="title"> Tahun : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['tahun']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>"
                                                class="td-tahun" <?php } ?>>
                                                <?php echo $data['tahun']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-anggota">
                                        <th class="title"> Jumlah Anggota : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['anggota']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>"
                                                class="td-anggota" <?php } ?>>
                                                <?php echo $data['anggota']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama">
                                        <th class="title"> Nama : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>"
                                                class="td-nama" <?php } ?>>
                                                <?php echo $data['nama']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jmlh_pmlk">
                                        <th class="title"> Jumlah Pemilikan : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jmlh_pmlk']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>"
                                                class="td-jmlh_pmlk" <?php } ?>>
                                                <?php echo $data['jmlh_pmlk']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-januari">
                                        <th class="title"> Januari : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['januari']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>"  
                                                class="td-januari" <?php } ?>>
                                                <?php echo $data['januari']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-februari">
                                        <th class="title"> Februari : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['februari']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>"  
                                                class="td-februari" <?php } ?>>
                                                <?php echo $data['februari']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-maret">
                                        <th class="title"> Maret : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['maret']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-maret" <?php } ?>>
                                                <?php echo $data['maret']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-april">
                                        <th class="title"> April : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['april']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-april" <?php } ?>>
                                                <?php echo $data['april']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-mei">
                                        <th class="title"> Mei : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['mei']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-mei" <?php } ?>>
                                                <?php echo $data['mei']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-juni">
                                        <th class="title"> Juni : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['juni']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-juni" <?php } ?>>
                                                <?php echo $data['juni']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-juli">
                                        <th class="title"> Juli : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['juli']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>"  
                                                class="td-juli" <?php } ?>>
                                                <?php echo $data['juli']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-agustus">
                                        <th class="title"> Agustus : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['agustus'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-agustus" <?php } ?>>
                                                <?php echo $data['agustus']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-september">
                                        <th class="title"> September : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['september']; ?>" 
                                                data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-september" <?php } ?>>
                                                <?php echo $data['september']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-oktober">
                                        <th class="title"> Oktober : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['oktober'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-oktober" <?php } ?>>
                                                <?php echo $data['oktober']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-november">
                                        <th class="title"> November : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['november'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-november" <?php } ?>>
                                                <?php echo $data['november']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-desember">
                                        <th class="title"> Desember : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['desember'] ?>" 
                                                data-url="<?php print_link("tahunan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                class="td-desember" <?php } ?>>
                                                <?php echo $data['desember']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("tahunan/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("tahunan/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
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
