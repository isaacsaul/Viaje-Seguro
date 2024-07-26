<div style="width: 600px; height: 500px; margin: auto;">
    <canvas id="pieChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        const ctx = document.getElementById('pieChart').getContext('2d');
        const chartData = @json($chartData);

        new Chart(ctx, {
            type: 'pie', // Tipo de gráfico: pie, line, bar, etc.
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.label + ': ' + context.raw;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
