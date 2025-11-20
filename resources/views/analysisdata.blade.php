<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}


        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4 text-center">Análisis Integral de Denuncias en el Transporte Público</h2>
                <!-- Puedes agregar cualquier otro contenido aquí -->
                <h3 class="text-center"> Visualización de Datos para Identificar Patrones, Tendencias y Problemas en las Rutas y Movilidades del Sindicato Simón Bolívar</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Reporte de Denuncias por mes</h2>
                    @livewire('report-chart')
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Gráfico de Denuncias por Líneas</h2>
                    @livewire('line-chart')
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Gráfico de Infracciones</h2>
                    @livewire('pie-chart')
                </div>

                {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Gráfico de radar</h2>
                    @livewire('radar-chart')
                </div> --}}

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Gráfico de Sanciones</h2>
                    @livewire('doughnut-chart')
                </div>

            </div>

        </div>
    </div>




</x-app-layout>
