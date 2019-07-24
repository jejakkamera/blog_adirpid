
<link href="<?php echo base_url(); ?>assets/themplate/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/css/buttons.dataTables.min.css" id="theme" rel="stylesheet">
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><?php echo ($data_detail['header']) ; ?></h4>
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
                <!-- add row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo ($data_detail['tabel_detail']) ; ?></h4>

                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                
                                 <?php
                                
                                if(isset( $data_detail['button_name'])){ ?>
                                <a href="<?php echo base_url(); ?><?php echo $data_detail['button_action_link'] ?>" class="btn btn-success waves-effect waves-light" type="button"><span class="btn-label"><i class="<?php echo $data_detail['button_icon'] ?>"></i></span> <?php echo $data_detail['button_name'] ?></a>
                                <?php } ?>

                                <?php if(isset( $data_detail['button_name2'])){ ?>
                                <a href="<?php echo base_url(); ?><?php echo $data_detail['button_action_link2'] ?>" class="btn btn-primary waves-effect waves-light" type="button"><span class="btn-label"><i class="<?php echo $data_detail['button_icon2'] ?>"></i></span> <?php echo $data_detail['button_name2'] ?></a>
                                <?php } ?>

                                <?php if(isset( $data_detail['button_name3'])){ ?>
                                <a href="<?php echo base_url(); ?><?php echo $data_detail['button_action_link3'] ?>" class="btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="<?php echo $data_detail['button_icon3'] ?>"></i></span> <?php echo $data_detail['button_name3'] ?></a>
                                <?php } ?>

                                    <hr>
                                <table id="mytable" class="table table-striped table-bordered display" style="width:100%">   

                                <thead>
                                        <tr>
                                        <th>No</th>
                                                        <?php foreach($data_isi['header'] as $val){ ?>
                                                            <th><?php echo $val['nama']; ?></th>
                                                        <?php } ?>

                                                        </tr>
                                </thead>
                                <tfoot>
                                            <tr>
                                            <th>No</th>
                                                        <?php foreach($data_isi['header'] as $val){ ?>
                                                            <th><?php echo $val['nama']; ?></th>
                                                        <?php } ?>
                                            </tr>
                                        </tfoot>
                                    
                                </table>
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
            <script src="<?php echo base_url(); ?>assets/themplate/assets/extra-libs/DataTables/datatables.min.js"></script>

            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/buttons.flash.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/jszip.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/pdfmake.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/vfs_fonts.js"></script>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/buttons.html5.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/themplate/assets/plugins/datatables/media/js/buttons.print.min.js"></script>

            <script type="text/javascript">
            $(document).ready(function() {
                var show=<?php echo '["' . implode('", "', $data_isi['search']) . '"]' ?>;
                //alert(show);
                var dataObject = eval('<?php echo $data_isi['coloum']; ?>');
   
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });

                       
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    dom: 'Bfrtip',
                    lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength','copy',  'excel', 'pdf', 'print'
        ],
                    processing: true,
                    serverSide: true,
                    pagingType: "full_numbers",
                    ajax: {"url": "<?php echo base_url(); ?><?php echo $data_detail['link_json']; ?>", "type": "POST"},
                    "columns": dataObject[0].COLUMNS,
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>