<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gráfico de muestra 2') }}
            
        </h2>
    </x-slot>

    {{-- class="flex flex-row grow-1 w-1/2 gap-4 mx-auto"> --}}
    <div id="tamaño" class="grid grid-cols-2 gap-4 mx-auto" style="width: 75%">
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="meses1" class="w-full"></canvas>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="meses2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="meses3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="meses4"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const labels1 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'];
            const colordefondo1 = [];
            const colordeborde1 = [];
            const colordefondo2 = [];
            const colordeborde2 = [];
            const data = <?php echo json_encode($titles);?>;
            for (i = 0; i < labels1.length; i++) {
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            colordefondo1.push('rgba('+r+','+g+','+b+', 0.4)');
            colordeborde1.push('rgba('+r+','+g+','+b+', 1)');
            }
            for (i = 0; i < data.length ; i++) {
            const r2 = Math.floor(Math.random() * 255);
            const g2 = Math.floor(Math.random() * 255);
            const b2 = Math.floor(Math.random() * 255);
            colordefondo2.push('rgba('+r2+','+g2+','+b2+', 0.6)');
            colordeborde2.push('rgba('+r2+','+g2+','+b2+', 1)');
            }

            const ctx = document.getElementById('meses1');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels1,
                    datasets: [{
                        label: 'Alquileres',
                        data: <?php echo json_encode($meses);?>,
                        backgroundColor: colordefondo1,
                        borderColor: colordeborde1,
                        borderWidth: 1
                    }]
                }
            });
            const ctx2 = document.getElementById('meses2');
            const myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($titles);?>,
                    datasets: [{
                        label: 'Veces alquilada',
                        data: <?php echo json_encode($titlesnumero);?>,
                        backgroundColor: colordefondo2,
                        borderColor: colordeborde2,
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Peliculas mas alquiladas',
                        },
                        subtitle: {
                            display: true,
                            text: 'TOP 100',
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
            const ctx3 = document.getElementById('meses3');
            const myChart3 = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($ciudad);?>,
                    datasets: [{
                        label: 'Gastado',
                        data: <?php echo json_encode($cantidad);?>,
                        backgroundColor: colordefondo2,
                        borderColor: colordeborde2,
                        fill: true,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });
            const ctx4 = document.getElementById('meses4');
            const myChart4 = new Chart(ctx4, {
                type: 'radar',
                data: {
                    labels: <?php echo json_encode($pais);?>,
                    datasets: [{
                        label: '10 paises con mas clientes',
                        data: <?php echo json_encode($clientes);?>,
                        backgroundColor: colordefondo2,
                        borderColor: colordeborde2,
                        borderWidth: 1
                    }]
                }
                
            });
        </script>
</x-app-layout>
