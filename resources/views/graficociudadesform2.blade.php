<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alquileres por ciudad') }}
            
        </h2>
    </x-slot>

    <div id="tamaño" class="mx-auto" style="width: 65%">
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="ciudades" class="w-full"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('ciudades');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($ciudad);?>,
                    datasets: [{
                        label: 'Alquileres',
                        data: <?php echo json_encode($alquiler);?>,
                        backgroundColor: [
                            'rgba(245, 178, 39, 0.8)',
            ],
            borderColor: [
                            'rgba(245, 178, 39, 1)',
                            ],
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
        </script>
</x-app-layout>
