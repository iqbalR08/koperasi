<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("bulanan/add");
$can_edit = ACL::is_allowed("bulanan/edit");
$can_view = ACL::is_allowed("bulanan/view");
$can_delete = ACL::is_allowed("bulanan/delete");
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
                        <h4 class="record-title">View Pendapatan Bulanan</h4>
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
                                        <tr  class="td-Tanggal_surat">
                                            <th class="title"> Tanggal Surat: </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                    data-value="<?php echo $data['Tanggal_surat']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>"
                                                    class="td-Tanggal_surat" <?php } ?>>
                                                    <?php echo $data['Tanggal_surat']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-nama">
                                            <th class="title"> Nama: </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>"
                                                    class="td-nama" <?php } ?>>
                                                    <?php echo $data['nama']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-induk_kering1">
                                            <th class="title"> Induk Kering + : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['induk_kering1']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>"
                                                    class="td-induk_kering1" <?php } ?>>
                                                    <?php echo $data['induk_kering1']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-induk_kering2">
                                            <th class="title"> Induk Kering - : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['induk_kering2']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>"  
                                                    class="td-induk_kering2" <?php } ?>>
                                                    <?php echo $data['induk_kering2']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-induk_laktasi1">
                                            <th class="title"> Induk Laktasi + : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['induk_laktasi1']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>"  
                                                    class="td-induk_laktasi1" <?php } ?>>
                                                    <?php echo $data['induk_laktasi1']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-induk_laktasi2">
                                            <th class="title"> Induk Laktasi - : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['induk_laktasi2']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                    class="td-induk_laktasi2" <?php } ?>>
                                                    <?php echo $data['induk_laktasi2']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-dara1">
                                            <th class="title"> Dara + : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['dara1']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                    class="td-dara1" <?php } ?>>
                                                    <?php echo $data['dara1']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-dara2">
                                            <th class="title"> Dara - : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['dara2']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                    class="td-dara2" <?php } ?>>
                                                    <?php echo $data['dara2']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-pedet_jtn">
                                            <th class="title"> Pedet Jantan : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['pedet_jtn']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                    class="td-pedet_jtn" <?php } ?>>
                                                    <?php echo $data['pedet_jtn']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-pedet_btn">
                                            <th class="title"> Pedet Betina : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['pedet_btn']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>"  
                                                    class="td-pedet_btn" <?php } ?>>
                                                    <?php echo $data['pedet_btn']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-pendapatan">
                                            <th class="title"> Prod. Susu/ltr : </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-pk="<?php echo $data['pendapatan'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                    class="td-pendapatan" <?php } ?>>
                                                    <?php echo $data['pendapatan']; ?> 
                                                </span>
                                            </td>
                                        </tr>
                                        <tr  class="td-produktivitas">
                                            <th class="title"> Produktivitas: </th>
                                            <td class="value">
                                                <span <?php if($can_edit){ ?> data-value="<?php echo $data['produktivitas']; ?>" 
                                                    data-pk="<?php echo $data['No_Agenda'] ?>" 
                                                    data-url="<?php print_link("bulanan/editfield/" . urlencode($data['No_Agenda'])); ?>" 
                                                    class="td-produktivitas" <?php } ?>>
                                                    <?php echo $data['produktivitas']; ?> 
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
                                    </div>
                                </div>
                                <?php if($can_edit){ ?>
                                    <a class="btn btn-sm btn-info"  href="<?php print_link("bulanan/edit/$rec_id"); ?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                <?php } ?>
                                <?php if($can_delete){ ?>
                                    <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("bulanan/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
