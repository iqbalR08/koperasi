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
                    <h4 class="record-title">Edit  Tahunan</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("tahunan/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="tahun">Tahun </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter tahun" id="ctrl-tahun"  required=""  name="tahun" class=" form-control"><?php  echo $data['tahun']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="anggota">Anggota </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter anggota" id="ctrl-anggota"  required=""  name="anggota" class=" form-control"><?php  echo $data['anggota']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="nama">Nama </label>
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
                                                            <label class="control-label" for="jmlh_pmlk">Jumlah Pemilik </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-jmlh_pmlk"  required=""  name="jmlh_pmlk" class=" form-control"><?php  echo $data['jmlh_pmlk']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="januari">Januari </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-januari"  required=""  name="januari" class=" form-control"><?php  echo $data['januari']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="februari">Februari </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-februari"  required=""  name="februari" class=" form-control"><?php  echo $data['februari']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="maret">Maret </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-maret"  required=""  name="maret" class=" form-control"><?php  echo $data['maret']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="april">April </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-april"  required=""  name="april" class=" form-control"><?php  echo $data['april']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="mei-">Mei </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-mei"  required=""  name="mei" class=" form-control"><?php  echo $data['mei']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="juni">Juni </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-juni"  required=""  name="juni" class=" form-control"><?php  echo $data['juni']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="juli">Juli </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-juli"  required=""  name="juli" class=" form-control"><?php  echo $data['juli']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="agustus">Agustus </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-agustus"  required=""  name="agustus" class=" form-control"><?php  echo $data['agustus']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="september">September </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-september"  required="" name="september" class=" form-control"><?php  echo $data['september']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="oktober">Oktober </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-oktober"  required=""  name="oktober" class=" form-control"><?php  echo $data['oktober']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="november">November </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-november"  required=""  name="november" class=" form-control"><?php  echo $data['november']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="desember">Desember </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="Enter" id="ctrl-desember"  required=""  name="desember" class=" form-control"><?php  echo $data['desember']; ?></textarea>
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
