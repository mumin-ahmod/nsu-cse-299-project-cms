@extends('backend.layouts.master')

@section('main_content')

<div class="container">
    <h2>Sales Data Visualization</h2>
    <canvas id="salesChart" width="400" height="200"></canvas>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesData = @json(['dates' => $dates, 'sales' => $sales]); // Structure the data

        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: salesData.dates,
                datasets: [{
                    label: 'Sales',
                    data: salesData.sales,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection
