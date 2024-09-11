<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Pengguna</h4>
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
                        <form id="pengguna-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("pengguna/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="username">Username <span class="text-danger">*</span></label>
                                    <div id="ctrl-username-holder" class=""> 
                                        <input id="ctrl-username"  value="<?php  echo $this->set_field_value('username',""); ?>" type="text" placeholder="Enter Username"  required="" name="username"  data-url="api/json/pengguna_username_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                            <div class="check-status"></div> 
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="password">Password <span class="text-danger">*</span></label>
                                        <div id="ctrl-password-holder" class="input-group"> 
                                            <input id="ctrl-password"  value="<?php  echo $this->set_field_value('password',""); ?>" type="password" placeholder="Enter Password" maxlength="255"  required="" name="password"  class="form-control  password password-strength" />
                                                <div class="input-group-append cursor-pointer btn-toggle-password">
                                                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <div class="password-strength-msg">
                                                <small class="font-weight-bold">Should contain</small>
                                                <small class="length chip">6 Characters minimum</small>
                                                <small class="caps chip">Capital Letter</small>
                                                <small class="number chip">Number</small>
                                                <small class="special chip">Symbol</small>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="nama">Nama <span class="text-danger">*</span></label>
                                            <div id="ctrl-nama-holder" class=""> 
                                                <input id="ctrl-nama"  value="<?php  echo $this->set_field_value('nama',""); ?>" type="text" placeholder="Enter Nama"  required="" name="nama"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                                <div id="ctrl-email-holder" class=""> 
                                                    <input id="ctrl-email"  value="<?php  echo $this->set_field_value('email',""); ?>" type="email" placeholder="Enter Email"  required="" name="email"  data-url="api/json/pengguna_email_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                                        <div class="check-status"></div> 
                                                    </div>
                                                </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="no_telp">No Telpon <span class="text-danger">*</span></label>
                                            <div id="ctrl-no_telp-holder" class=""> 
                                                <input id="ctrl-no_telp"  value="<?php  echo $this->set_field_value('no_telp',""); ?>" type="text" placeholder="Enter No telpon"  required="" name="no_telp"  class="form-control " />
                                                </div>
                                            </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="alamat_agt">Alamat <span class="text-danger">*</span></label>
                                            <div id="ctrl-alamat_agt-holder" class=""> 
                                                <input id="ctrl-alamat_agt"  value="<?php  echo $this->set_field_value('alamat_agt',""); ?>" type="text" placeholder="Enter Alamat"  required="" name="alamat_agt"  class="form-control " />
                                                </div>
                                            </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="ttl_agt">TTL <span class="text-danger">*</span></label>
                                            <div id="ctrl-ttl_agt-holder" class=""> 
                                                <input id="ctrl-ttl_agt"  value="<?php  echo $this->set_field_value('ttl_agt',""); ?>" type="text" placeholder="Enter TTL"  required="" name="ttl_agt"  class="form-control " />
                                                </div>
                                            </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="jenis_kelamin_agt">Jenis Kelamin <span class="text-danger">*</span></label>
                                            <div id="ctrl-jenis_kelamin_agt-holder" class=""> 
                                                <input id="ctrl-jenis_kelamin_agt"  value="<?php  echo $this->set_field_value('jenis_kelamin_agt',""); ?>" type="text" placeholder="Enter Jenis Kelamin"  required="" name="jenis_kelamin_agt"  class="form-control " />
                                                </div>
                                            </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="photo">Foto </label>
                                                    <div id="ctrl-photo-holder" class=""> 
                                                        <div class="dropzone " input="#ctrl-photo" fieldname="photo"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                            <input name="photo" id="ctrl-photo" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('photo',""); ?>" type="text" required="" name="photo"  class="form-control " />
                                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                            </div>
                                                            <?php Html :: uploaded_files_list($data['photo'], '#ctrl-photo'); ?>
                                                        </div>
                                                    </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="file_surat">File <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <div class="dropzone required" input="#ctrl-file_surat" fieldname="file_surat"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".docx,.doc,.xls,.xlsx,.xml,.csv,.pdf,.xps" filesize="3" maximum="1">
                                                                    <input name="file_surat" id="ctrl-file_surat" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('files',""); ?>" type="text"  />
                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="user_role_id">User Role Id <span class="text-danger">*</span></label>
                                                        <div id="ctrl-user_role_id-holder" class=""> 
                                                            <select required=""  id="ctrl-user_role_id" name="user_role_id"  placeholder="Select a value ..."    class="custom-select" >
                                                                <option value="">Select a value ...</option>
                                                                <?php 
                                                                $user_role_id_options = $comp_model -> pengguna_user_role_id_option_list();
                                                                if(!empty($user_role_id_options)){
                                                                foreach($user_role_id_options as $option){
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                $selected = $this->set_field_selected('user_role_id',$value, "");
                                                                ?>
                                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                    <?php echo $label; ?>
                                                                </option>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                                    <div class="form-ajax-status"></div>
                                                    <button class="btn btn-primary" type="submit">
                                                        Submit
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
