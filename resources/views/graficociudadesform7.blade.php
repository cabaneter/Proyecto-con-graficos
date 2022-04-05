<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alquilada por categoria') }}
            
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
            const colordefondo1 = [];
            const colordeborde1 = [];
            const data = <?php echo json_encode($categoria);?>;
            for (i = 0; i < data.length; i++) {
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            colordefondo1.push('rgba('+r+','+g+','+b+', 0.4)');
            colordeborde1.push('rgba('+r+','+g+','+b+', 1)');
            }
            const ctx = document.getElementById('ciudades');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($categoria);?>,
                    datasets: [{
                        label: 'Alquiladas',
                        data: <?php echo json_encode($cantidad);?>,
                        backgroundColor: colordefondo1,
                        borderColor: colordeborde1,
                        borderWidth: 1
                    }]
                },
                options: {     
                    plugins: {
                        title: {
                            display: true,
                            text: 'Peliculas alquiladas',
                        },
                        subtitle: {
                            display: true,
                            text: 'por categoria',
                            color: 'blue',
                            font: {
                            size: 12,
                            family: 'tahoma',
                            weight: 'normal',
                            style: 'italic'
                            },
                            padding: {
                            bottom: 10
                            }
                        }
                        },      
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });
        </script>
</x-app-layout>
