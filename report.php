<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Report Aulia & Dias</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css"> -->
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                
                                <div class="col-sm-6">
                                    <h4 class="page-title">Data Table</h4>
                                    

                                </div>
                                
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <?php
                                            $sql = mysqli_query($connect, "SELECT * FROM tb_enang"); // Query untuk menghitung seluruh data siswa
                                            $sql_count = mysqli_num_rows($sql);
                                        ?>
                                        <h4 class="mt-0 header-title">Jumlah inputan : <?php echo $sql_count;?> orang</h4>
                                        <?php
                                            $result = mysqli_query($connect, "SELECT * FROM tb_enang WHERE kehadiran='Hadir'");
                                            $jml = mysqli_num_rows($result);
                                            
                                        ?>
                                        <h4 class="mt-0 header-title">Jumlah orang yang akan hadir : <?php echo $jml;?> orang</h4>
                                        <!-- <p class="text-muted m-b-30">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->

                                        <table id="tb-report" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Kehadiran</th>
                                                <th>Pesan</th>
                                                
                                            </tr>
                                            </thead>


                                            <tbody>
                                            
                                            
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                       


                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->

                <footer class="footer">
                    © 2021 Ganesh <span class="d-none d-sm-inline-block"></span>.
                </footer>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="assets/js/metisMenu.min.js"></script> -->
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- <script src="assets/js/waves.min.js"></script> -->

        <!-- Required datatable js -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>        

        <!-- App js -->
        <!-- <script src="assets/js/app.js"></script> -->

        <script type="text/javascript">
            // $(document).ready(function() {
            //         $('#tb-report').DataTable( {
            //             "processing": true,
            //             "serverSide": true,
            //             "ajax": {
            //                 "url" : "http://localhost/jenny-rudi/view.php",
            //                 "type" : "POST",
                            
            //             },
            //             "columnDefs": [{ 
            //                 "targets": [ 0 ], //first column / numbering column
            //                 "orderable": false, //set not orderable
            //             }]
            //         } );
            //     } );

            var tabel = null;
            $(document).ready(function() {
                tabel = $('#tb-report').dataTable({
                    "processing": true,
                    "serverSide": true,
                    // "ordering": true, // Set true agar bisa di sorting
                    "order": [[ 1, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                    "ajax":
                    {
                        "url": "https://aulia-dias.digital-invitation.com/view.php", // URL file untuk proses select datanya
                        // "url": "http://localhost/aulia-dias/view.php", // URL file untuk proses select datanya
                        "type": "POST"
                    },
                    // "deferRender": true,
                    // "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
                    "columns": [

                        { "data": "no"},
                        { "data": "nama" }, 
                        { "data": "alamat" }, 
                        { "data": "kehadiran" }, 
                        { "data": "pesan" } 
                        
                    ],
                });
            });
        </script>
    </body>

</html>