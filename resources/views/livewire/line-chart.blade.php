<div style="width: 500px; height: 300px; margin: auto;">
    <canvas id="lineChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        const ctx = document.getElementById('lineChart').getContext('2d');
        const chartData = @json($chartData);

        new Chart(ctx, {
            type: 'line', // Tipo de gráfico: line, bar, pie, etc.
            data: chartData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
