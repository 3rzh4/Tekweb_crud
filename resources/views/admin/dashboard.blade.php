        @extends('layouts.main')

        @section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
        
                    <!-- Content Row -->
                    <div class="row">
        
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
        
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
        
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                                <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
        
                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
        
                    <!-- Content Row -->
        
                    <div class="row">
        
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-11">
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
                                <a class="dropdown-item" href="#">Lihat Data</a>
                            </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <canvas id="myChart" width="600" height="200"></canvas>
                        </div>
                        </div>
                    </div>
                    </div>
    
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
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
                                    <a class="dropdown-item" href="#">Lihat Data</a>
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