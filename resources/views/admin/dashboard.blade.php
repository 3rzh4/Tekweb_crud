        @extends('layouts.main')

        @section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- Content Row -->
        
                    <div class="row">
        
                    <!-- Area Chart -->
                    <div class="col-xl-10 col-lg-9">
                        <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Chart Pasien</h6>
                            <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Chart Pasien</div>
                                <a class="dropdown-item" href="/pasien">Lihat Data</a>
                            </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                        </div>
                    </div>
                        <div class="col-xl-10 col-lg-9">
                            <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Chart Pendapatan</h6>
                                <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Chart Pendapatan</div>
                                    <a class="dropdown-item" href="/tagihan">Lihat Data</a>
                                </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <canvas id="pendapatan" width="400" height="200"></canvas>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->
        
                </div>
                <!-- End of Main Content -->
        
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
                </footer>
                <!-- End of Footer -->
        
            </div>
            <!-- End of Content Wrapper -->
        
            </div>
            <!-- End of Page Wrapper -->
        
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
            </a>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script type="text/javascript">
    
        var labels_pasien =  {{ Js::from($labels_pasien) }};
        var labels_pembayaran =  {{ Js::from($labels_pembayaran) }};
        var pasien =  {{ Js::from($data_pasien) }};
        var pembayaran =  {{ Js::from($data_pembayaran) }};

        const dataPasien = {
            labels: labels_pasien,
            datasets: [{
                label: 'Pasien',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: pasien,
            }]
        };
        const dataPembayaran = {
            labels: labels_pembayaran,
            datasets: [{
                label: 'Pendapatan',
                backgroundColor: 'rgb(25, 135, 84)',
                borderColor: 'rgb(25, 135, 84)',
                data: pembayaran,
            }]
        };
    
        const configPasien = {
            type: 'line',
            data: dataPasien,
            options: {
                y: {
                type: 'linear',
                min: 0,
                max: 12
            }
            }
        };

        const configPembayaran = {
            type: 'bar',
            data: dataPembayaran,
            options: {
                scale:{
                y: {
                    beginAtZero:true
                }
            }
            }
        };
    
        const pasienChart = new Chart(
            document.getElementById('myChart'),
            configPasien
        );
        const pembayaranChart = new Chart(
            document.getElementById('pendapatan'),
            configPembayaran
        );
    </script>
        @endsection