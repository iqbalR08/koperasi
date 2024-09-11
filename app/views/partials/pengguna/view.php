<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("pengguna/add");
$can_edit = ACL::is_allowed("pengguna/edit");
$can_view = ACL::is_allowed("pengguna/view");
$can_delete = ACL::is_allowed("pengguna/delete");
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
                    <h4 class="record-title">View  Pengguna</h4>
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
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    
                                <tr class="td-photo">
                                                        <span  data-value=<?php Html :: page_img($data['photo'],70,70,5); ?>                                                     
                                                        </span>
                                                    </tr>
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-username">
                                        <th class="title"> Username: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['username']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pengguna/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="username" 
                                                data-title="Enter Username" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['username']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama">
                                        <th class="title"> Nama: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pengguna/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="nama" 
                                                data-title="Enter Nama" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-email">
                                    <th class="title"> Email: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['email']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pengguna/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="email" 
                                                data-title="Enter Email" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['email']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-no_telp">
                                        <th class="title"> No Telpon: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_telp']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pengguna/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="no_telp" 
                                                data-title="Enter No telpon" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['no_telp']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-alamat_agt">
                                        <th class="title"> Alamat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['alamat_agt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pengguna/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="alamat_agt" 
                                                data-title="Enter Alamat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['alamat_agt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ttl_agt">
                                        <th class="title"> TTL: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ttl_agt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pengguna/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ttl_agt" 
                                                data-title="Enter TTL" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ttl_agt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jenis_kelamin_agt">
                                        <th class="title"> Jenis kelamin: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jenis_kelamin_agt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pengguna/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="jenis_kelamin_agt" 
                                                data-title="Enter Jenis kelamin" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jenis_kelamin_agt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-file_surat">
                                        <th class="title"> File: </th>
                                        <td class="value"><?php Html :: page_link_file($data['file_surat']); ?></td>
                                    </tr>
                                    <tr  class="td-user_role_id">
                                        <th class="title"> User Role Id: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/pengguna_user_role_id_option_list'); ?>' 
                                                data-value="<?php echo $data['user_role_id']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pengguna/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="user_role_id" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['user_role_id']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("pengguna/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("pengguna/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
