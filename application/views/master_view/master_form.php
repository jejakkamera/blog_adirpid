
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/select2/dist/js/select2.min.js"></script>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    
                   
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>   
                    <div class="card">
                    <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white"><?php echo $data_detail['form_detail']; ?></h4>
                            </div>
                            <div class="card-body">
                               
                          
                            <form action="<?php echo $data_detail['action']; ?>" method="post" enctype="multipart/form-data" >
                            <?php foreach($data_isi as $val){ ?>
                                <div class="form-group m-t-40 row">
                          <label class="col-3 col-form-label"><?php echo $val['nama_form']; ?><?php  if($val['required']==1){ echo '<small id="name13" class="badge badge-default badge-danger form-text text-white float-right">Required</small>';  }elseif($val['required']==2){  echo '<small id="name13" class="badge badge-default badge-warning form-text text-white float-right">Cannot Change</small>'; }?></label>
                          <div class="col-9">
                          <?php 
                          $input_ = array("text", "password", "number","hidden","email","time");
                          $input_tags = array("tags");
                          $input_wyswyg = array("wyswyg");
                          $input_date = array("date");
                          $input_select = array("select");
                          $input_upload = array("upload");
                          if(in_array($val['tipe'], $input_)){ ?>

                            <input type="<?php echo $val['tipe']; ?>" class="form-control" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" placeholder="<?php echo $val['placeholder']; ?>" 
                            <?php  if($val['required']==1){ echo "required";  }?> value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>" >

                           <?php }else if(in_array($val['tipe'], $input_upload)){ ?>

                            <input type="file" class="form-control" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" placeholder="<?php echo $val['placeholder']; ?>" 
                            <?php  if($val['required']==1){ echo "required";  }?> value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>" >

                           <?php }else if(in_array($val['tipe'], $input_tags)){ ?>
                            
                           
                                
                            <input type="text" class="form-control" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>"   data-role="tagsinput" placeholder="<?php echo $val['placeholder']; ?>" <?php  if($val['required']==1){ echo "required";  }?> value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>" />

                       <?php }else if(in_array($val['tipe'], $input_wyswyg)){ ?>
                            <textarea <?php  if($val['required']==1){ echo "required";  }?> class="summernote" name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>">
                            <?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>
                            </textarea>
                      
                                
                       <?php }else if(in_array($val['tipe'], $input_date)){ ?>
                            
                        <input type="text" <?php  if($val['required']==1){ echo "required";  }?> name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" class="form-control mydatepicker" placeholder="yyyy-mm-dd" value="<?php if($status && $data_master){   echo $data_master[$val['kode_form']];}else{ echo set_value($val['kode_form']); }
                            ?>">
                        <span class="input-group-addon" ><i class="icon-calender"></i></span>
                                
                       <?php }else if(in_array($val['tipe'], $input_select)){ 
                       ?>
                            
                        <select <?php  if($val['required']==1){ echo "required";  }?> name="<?php echo $val['kode_form']; ?>" id="<?php echo $val['kode_form']; ?>" require class="js-data-example-ajax-<?php echo $val['kode_form']; ?> form-control" style="width: 100%">
                        <?php if($status && $data_master){ echo '
                        <option value="'.$data_master[$val['kode_form']].'" selected="selected">'.$data_master['nama_'.$val['kode_form']].'</option>';
                            }else{ }?>
                       
                            </select>
                                
                        <script type="text/javascript">
                                $(document).ready(function() {

                                $('.js-data-example-ajax-<?php echo $val['kode_form']; ?>').select2({
                                    minimumInputLength: 4,
                                        ajax: {
                                            url: '<?php echo base_url(); ?>master_control/master_json_select/<?php echo $val['kode_form']; ?>',
                                            dataType: 'json',
                                            method : "POST",
                                            data : function(params){
                                                return{
                                                    kec : params.term  
                                                };
                                            },
                                        processResults: function(data){
                                            var result = [];
                                            $.each(data, function(index,item){
                                                result.push({
                                                    id : item.kode,
                                                    text : item.nama
                                                });
                                            });
                                            return{
                                                results:result
                                            };
                                            
                                        }
                                            
                                        
                                    }
                        
                            } );
                            
                            <?php if($data_detail['action_status']=='update'){  ?>

                            $(".js-data-example-ajax-<?php echo $val['kode_form']; ?>").val('<?php echo $data_master[$val['kode_form']]; ?>'); 
                            $(".js-data-example-ajax-<?php echo $val['kode_form']; ?>").trigger('change');
                            
                            <?php }  ?>


                            } );

            </script>
                            
                      <?php } ?>


                            </div>
                        </div>
                                                        <?php } ?>


                        

                        

                        
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

                                        <a href="<?php echo base_url('master_control/master_list/'.$module); ?>"  onclick="return confirm('Are you sure?');" class="btn btn-danger waves-effect waves-light" type="button"><span class="btn-label"><i class="fas fa-long-arrow-alt-left"></i></span> Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
               
            </div>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/summernote/dist/summernote.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
            placeholder: 'type hire',
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }

    jQuery('.mydatepicker, #datepicker').datepicker({ format: 'yyyy-mm-dd',orientation: "bottom",todayBtn :true,todayHighlight:true });
    </script>

  
