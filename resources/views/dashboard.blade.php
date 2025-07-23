@extends('layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="fas fa-calendar"></i> This week
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This week</a></li>
                <li><a class="dropdown-item" href="#">This month</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="chart-container">
    <canvas id="dashboardChart"></canvas>
</div>

<h2>Recent Activity</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>New order #1234</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>2023-12-01</td>
            </tr>
            <tr>
                <td>2</td>
                <td>User registration</td>
                <td><span class="badge bg-warning text-dark">Pending</span></td>
                <td>2023-12-02</td>
            </tr>
             <tr>
                <td>3</td>
                <td>New order #1234</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>2023-12-01</td>
            </tr>
            <tr>
                <td>4</td>
                <td>User registration</td>
                <td><span class="badge bg-warning text-dark">Pending</span></td>
                <td>2023-12-02</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('custom_js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('dashboardChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales 2023',
                    data: [12000, 19000, 15000, 21000, 25000, 22000],
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
