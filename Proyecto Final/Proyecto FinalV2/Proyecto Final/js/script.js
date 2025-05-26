const ctx = document.getElementById('graficoPM25').getContext('2d');

// Datos simulados por nivel de contaminación
const datosPorNivel = {
  verde: {
    color: '#4caf50',
    fondo: 'rgba(76, 175, 80, 0.2)',
    labels: ['12 AM', '2 AM', '4 AM', '6 AM', '8 AM'],
    data: [5, 7, 8, 10, 12]
  },
  amarillo: {
    color: '#ffc107',
    fondo: 'rgba(255, 193, 7, 0.2)',
    labels: ['9 AM', '11 AM', '1 PM', '3 PM', '5 PM'],
    data: [22, 28, 35, 33, 26]
  },
  rojo: {
    color: '#ff4c4c',
    fondo: 'rgba(255, 76, 76, 0.2)',
    labels: ['6 AM', '8 AM', '10 AM', '12 PM', '2 PM'],
    data: [48, 55, 65, 70, 60]
  }
};

// Crear gráfico inicial con datos rojos por defecto
let grafico = new Chart(ctx, {
  type: 'line',
  data: {
    labels: datosPorNivel.rojo.labels,
    datasets: [{
      label: 'PM2.5 µg/m³',
      data: datosPorNivel.rojo.data,
      borderColor: datosPorNivel.rojo.color,
      backgroundColor: datosPorNivel.rojo.fondo,
      fill: true,
      tension: 0.3
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false
  }
});

// Función para actualizar el gráfico según el nivel
function actualizarGrafico(nivel) {
  const datos = datosPorNivel[nivel];

  // Actualizar datos y colores del gráfico
  grafico.data.labels = datos.labels;
  grafico.data.datasets[0].data = datos.data;
  grafico.data.datasets[0].borderColor = datos.color;
  grafico.data.datasets[0].backgroundColor = datos.fondo;
  grafico.update();

  // Resaltar botón activo
  document.querySelectorAll('.semaforo .color').forEach(c => c.classList.remove('activo'));
  document.getElementById(`btn-${nivel}`).classList.add('activo');
}

// Eventos para los botones del semáforo
document.getElementById('btn-verde').addEventListener('click', () => actualizarGrafico('verde'));
document.getElementById('btn-amarillo').addEventListener('click', () => actualizarGrafico('amarillo'));
document.getElementById('btn-rojo').addEventListener('click', () => actualizarGrafico('rojo'));
