@extends('src.index')
@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Grafik Pemasukan vs Pengeluaran (Tahun {{ now()->year }})
                    </div>
                    <div class="card-body">
                        <canvas id="incomeVsExpensesChart"></canvas>
                        <div id="no-bar-chart-data" class="d-none text-center p-4">
                            Tidak ada data pemasukan atau pengeluaran untuk tahun ini.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Distribusi Pengeluaran Bulan Ini ({{ now()->format('F Y') }})</div>
                    <div class="card-body">
                        <canvas id="expensesPieChart"></canvas>
                        <div id="no-pie-chart-data" class="d-none text-center p-4">
                            Tidak ada data pengeluaran untuk bulan ini.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data yang dikirim dari controller Laravel
            const months = @json($months);
            const incomeData = @json($incomeData);
            const expensesData = @json($expensesData);

            // Cek data untuk Bar Chart
            const hasBarChartData = incomeData.some(item => item > 0) || expensesData.some(item => item > 0);
            const barChartCanvas = document.getElementById('incomeVsExpensesChart');
            const noBarDataMessage = document.getElementById('no-bar-chart-data');

            if (hasBarChartData) {
                barChartCanvas.style.display = 'block';
                noBarDataMessage.style.display = 'none';

                // Inisialisasi Bar Chart
                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Pemasukan',
                            data: incomeData,
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }, {
                            label: 'Pengeluaran',
                            data: expensesData,
                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                beginAtZero: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else {
                // Sembunyikan canvas dan tampilkan pesan
                barChartCanvas.style.display = 'none';
                noBarDataMessage.classList.remove('d-none');
                noBarDataMessage.classList.add('d-block');
            }

            // --- Logika Baru untuk Pie Chart ---
            const expenseLabels = @json($expenseLabels);
            const expenseData = @json($expenseData);
            const pieChartCanvas = document.getElementById('expensesPieChart');
            const noPieDataMessage = document.getElementById('no-pie-chart-data');

            if (expenseData.length > 0) {
                pieChartCanvas.style.display = 'block';
                noPieDataMessage.classList.remove('d-block');
                noPieDataMessage.classList.add('d-none');

                new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: {
                        labels: expenseLabels,
                        datasets: [{
                            label: 'Pengeluaran',
                            data: expenseData,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)',
                                'rgba(201, 203, 207, 0.6)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)',
                                'rgba(201, 203, 207, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                    }
                });
            } else {
                // Sembunyikan canvas dan tampilkan pesan
                pieChartCanvas.style.display = 'none';
                noPieDataMessage.classList.remove('d-none');
                noPieDataMessage.classList.add('d-block');
            }
        });
    </script>
@endpush
