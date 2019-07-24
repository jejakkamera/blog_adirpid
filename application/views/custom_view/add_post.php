    <script src="<?php echo base_url(); ?>assets/themplate/assets/libs/ckeditor4/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>assets/themplate/assets/libs/ckfinder/ckfinder.js"></script>
    <link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/select2/dist/js/select2.min.js"></script>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Create Post</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    <?php echo validation_errors(); ?>
                    <form action="<?php echo base_url($action); ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

                                        <a href="<?php echo base_url('master_control/master_list/postingan'); ?>"  onclick="return confirm('Are you sure?');" class="btn btn-danger waves-effect waves-light" type="button"><span class="btn-label"><i class="fas fa-long-arrow-alt-left"></i></span> Cancel</a>
                                    </div>
                                    <hr>
                        <div class="card">
                            <div class="card-body">
                            <div class="adjoined-bottom">
                                <div class="grid-container">
                                    
                                    <div class="grid-width-100">
                                        
                                            <div class="form-group">
                                                <label>Judul Post</label>
                                                <input type="text" name="post" class="form-control" placeholder="Judul" value="<?php echo set_value('judul', $judul); ?>" require>
                                            </div>
                                          
                                        <div class="form-group">
                                        <label>Post</label>
                                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                                        <?php echo set_value('detail', $detail); ?>
                                        </textarea>
                                       

                                        <script>
                                           
                                            CKEDITOR.replace( 'editor1', {
                                                filebrowserBrowseUrl: '<?php echo base_url("custom_controler/file_master"); ?>',

                                                
                                            });
                                        </script>
                                        </div>
                                        <div class="form-group">
                                        <label>Image Thumbnail</label>
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="ckfinder-popup-2" class="btn btn-outline-secondary" type="button">Browse Server</button>
                                        </div>
                                        <div class="custom-file">
                                            <input id="ckfinder-input-2" name="img_tub" type="text" class="form-control" value="<?php echo set_value('img_tub', $img_tub); ?>">
                                        </div>
                                        </div>
                                    </div>

                                    <script>
                                           
                                           var button2 = document.getElementById( 'ckfinder-popup-2' );
                                            button2.onclick = function() {
                                                selectFileWithCKFinder( 'ckfinder-input-2' );
                                            };

                                        function selectFileWithCKFinder( elementId ) {
                                            CKFinder.popup( {
                                                chooseFiles: true,
                                                width: 800,
                                                height: 600,
                                                onInit: function( finder ) {
                                                    finder.on( 'files:choose', function( evt ) {
                                                        var file = evt.data.files.first();
                                                        var output = document.getElementById( elementId );
                                                        output.value = file.getUrl();
                                                    } );

                                                    finder.on( 'file:choose:resizedImage', function( evt ) {
                                                        var output = document.getElementById( elementId );
                                                        output.value = evt.data.resizedUrl;
                                                    } );
                                                }
                                            } );
                                        }
                                    </script>  
                                    
                                    
                                    <div class="form-group">
                                                <label>Tags</label>
                                                <input id="text_tags" name="text_tags" type="hidden" class="form-control" value="<?php echo set_value('label', $label); ?>">
                                                    <select name="tags" class="form-control" multiple="" id="js-example-tokenizer" style="width: 100%;height: 36px;">
                                                    <?php foreach($tag as $row){ ?>
                                                        <option value="<?php echo $row['tags']; ?>"><?php echo $row['tags']; ?></option>
                                                    <?php } ?>
                                                </select>

                                                <script>
                                                    $('#js-example-tokenizer').select2({
                                                        tags: true,
                                                        tokenSeparators: [",", " "],
                                                    }).on("select2:select", function(e) {
                                                        document.getElementById("text_tags").value =  $(this).val();
                                                        //console.log($(this).val());
                                                        /*if(e.params.data.isNew){
                                                            $('#console').append('<code>New tag: {"' + e.params.data.id + '":"' + e.params.data.text + '"}</code><br>');
                                                            $(this).find('[value="'+e.params.data.id+'"]').replaceWith('<option selected value="'+e.params.data.id+'">'+e.params.data.text+'</option>');
                                                        }*/
                                                    });
                                                    <?php if($status=="update"){ ?>
                                                        var str = '<?php echo set_value('label', $label); ?>'
                                                        var array = str.split(",");
                                                        $('#js-example-tokenizer').val(array).trigger('change');
                                                    <?php } ?>
                                                </script>
                                            </div>

                                            <div class="form-group">
                                                <label>Bahasa</label>
                                                    <select require name="bahasa" class="form-control"  id="js-example-bahasa" style="width: 100%;height: 36px;"  >
                                                    <?php foreach($bahasa as $row){ ?>
                                                        <option value="<?php echo $row['id_bahasa']; ?>"><?php echo $row['nama_bahasa']; ?></option>
                                                    <?php } ?>
                                                    
                                                </select>

                                                <script>
                                                    $("#js-example-bahasa").select2({});
                                                    <?php if($status=="update"){ ?>
                                                        $('#js-example-bahasa').val('<?php echo set_value('bahasa_pilih', $bahasa_pilih); ?>').trigger('change');
                                                    <?php } ?>
                                                </script>
                                            </div>

                                            <div class="form-group">
                                                <label>Publish</label>
                                                    <select require name="publish" class="form-control" id="js-example-publish" style="width: 100%;height: 36px;">
                                                    <option value="0">Draf</option>
                                                    <option selected value="1">Publikasi</option>

                                                <script>
                                                    $("#js-example-publish").select2();
                                                    <?php if($status=="update"){ ?>
                                                        $('#js-example-publish').val('<?php echo set_value('status_post', $status_post); ?>').trigger('change');
                                                    <?php } ?>
                                                </script>
                                            </div>
                                    </div>
                                </div>
                                
                                </form>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
    
