<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit  Pendapatan</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("pendapatan1/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Tanggal_surat">Tanggal <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-Tanggal_surat" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['Tanggal_surat']; ?>" type="datetime" name="Tanggal_surat" placeholder="Enter Tanggal Surat" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="nama">Nama <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter nama" id="ctrl-nama"  required=""  name="nama" class=" form-control"><?php  echo $data['nama']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="alamat">alamat <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter alamat" id="ctrl-alamat"  required="" name="alamat" class=" form-control"><?php  echo $data['alamat']; ?></textarea>
                                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="induk_kering1">Induk Kering + </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-induk_kering1"  required=""  name="induk_kering1" class=" form-control"><?php  echo $data['induk_kering1']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="induk_kering2">Induk Kering - </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-induk_kering2"  required=""  name="induk_kering2" class=" form-control"><?php  echo $data['induk_kering2']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="induk_laktasi1">Induk Laktasi + </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-induk_laktasi1"  required=""  name="induk_laktasi1" class=" form-control"><?php  echo $data['induk_laktasi1']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="induk_laktasi2">Induk Laktasi - </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-induk_laktasi2"  required=""  name="induk_laktasi2" class=" form-control"><?php  echo $data['induk_laktasi2']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="dara1">Dara + </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-dara1"  required=""  name="dara1" class=" form-control"><?php  echo $data['dara1']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="dar2-">Dara - </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-dara2"  required=""  name="dara2" class=" form-control"><?php  echo $data['dara2']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="pedet_jtn">Pedet Jantan </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-pedet_jtn"  required=""  name="pedet_jtn" class=" form-control"><?php  echo $data['pedet_jtn']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="pedet_btn">Pedet Betina </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-pedet_btn"  required=""  name="pedet_btn" class=" form-control"><?php  echo $data['pedet_btn']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="pendapatan">Prod. Susu/ltr <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter pendapatan" id="ctrl-pendapatan"  required=""  name="pendapatan" class=" form-control"><?php  echo $data['pendapatan']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="file_surat">File Surat <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <div class="dropzone required" input="#ctrl-file_surat" fieldname="file_surat"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".docx,.doc,.xls,.xlsx,.xml,.csv,.pdf,.xps" filesize="3" maximum="1">
                                                                    <input name="file_surat" id="ctrl-file_surat" required="" class="dropzone-input form-control" value="<?php  echo $data['file_surat']; ?>" type="text"  />
                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <?php Html :: uploaded_files_list($data['file_surat'], '#ctrl-file_surat'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-ajax-status"></div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary" type="submit">
                                                        Update
                                                        <i class="fa fa-send"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
