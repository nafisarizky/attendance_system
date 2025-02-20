<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
<style>
    body {
        background-color: #f4f7fc;
        color: #333;
        font-family: Arial, sans-serif;
    }
    .card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .card-title {
        color: #007bff;
        font-weight: bold;
        text-align: center;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      <div class="container-fluid page-body-wrapper">
        @include('admin.nav')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Employee Statistics by Gender</h4>
                            <div style="position: relative; width: 100%; max-height: 250px;">
                                <canvas id="pieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center">
                                <h5>Total Employees: <strong>{{ $maleCount + $femaleCount }}</strong></h5>
                                <a href="{{ route('karyawan') }}" class="btn btn-primary mt-2">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pending Applications by Category</h4>
                            <div style="position: relative; width: 100%; max-height: 250px;">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                            <div class="mt-4 text-center">
                                <h5>Total Pending Applications: <strong>{{ $dinasCount + $sakitCount + $izinCount }}</strong></h5>
                                <a href="{{ route('pengajuan') }}" class="btn btn-primary mt-2">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctxPie = document.getElementById('pieChart').getContext('2d');
                var pieChart = new Chart(ctxPie, {
                    type: 'pie',
                    data: {
                        labels: ['Female', 'Male'],
                        datasets: [{
                            label: 'Employee Count',
                            data: [{{ $femaleCount }}, {{ $maleCount }}],
                            backgroundColor: ['#FF6384', '#36A2EB'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            </script>
            <script>
                var ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
                var doughnutChart = new Chart(ctxDoughnut, {
                    type: 'doughnut',
                    data: {
                        labels: ['Business Trip', 'Sick Leave', 'Permission'],
                        datasets: [{
                            label: 'Pending Applications Count',
                            data: [{{ $dinasCount }}, {{ $sakitCount }}, {{ $izinCount }}],
                            backgroundColor: ['#FF9F40', '#FF6384', '#36A2EB'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            </script>
          </div>
          @include('admin.footer')
        </div>
      </div>
    </div>
    @include('admin.js')
  </body>
</html>
