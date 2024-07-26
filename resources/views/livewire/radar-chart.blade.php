<div style="width: 100%; height: 500px; margin: auto;">
    <canvas id="radarChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        const ctx = document.getElementById('radarChart').getContext('2d');
        const chartData = @json($chartData);

        new Chart(ctx, {
            type: 'radar',
            data: chartData,
            options: {
                responsive: true,
                scales: {
                    r: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
