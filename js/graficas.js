(async() => {
    //Datos traidos de php
    const respuestaRaw = await fetch("./Controller/generar/ctrlDatosGrafica.php");
    const respuesta = await respuestaRaw.json();

    const colores = ['rgba(255, 0, 0,0.5)', 'rgba(255, 153, 51, 0.7)', 'rgba(51, 153, 102, 0.7)', 'rgba(51, 51, 255, 0.7)', 'rgba(230, 51, 255, 0.7)',  'rgba(70, 255, 51, 0.7)', 'rgba(51, 66, 255, 0.7)', 'rgba(227, 255, 51, 0.7)', 'rgba(51, 255, 233, 0.7)',  'rgba(12, 25, 23, 0.7)',  'rgba(11, 155, 33, 0.7)',  'rgba(78, 155,200, 0.7)',];

    //Las etiquetas
    const etiquetasBarras = respuesta.etiquetasBarras;
    const etiquetasPastel = respuesta.etiquetasPastel;

    //Los datos para la grafica de barras
    const datosBarras1 = {
        type: 'bar',
        label: "F",
        data: respuesta.datosBarras,
        backgroundColor: 'rgba(98,0,238,0.75)',
        borderColor: 'rgba(0,0,0)',
        borderWidth: 2
    }

    //Los datos para las lineas
    const datosBarras2 = {
        type: 'line',
        label: "MC",
        data: respuesta.datosBarras,
        borderColor: 'rgba(255,0,0)',
        borderWidth: 3
    }

    //Los datos para ja Ojiva
    const datosOjiva = {
        type: 'line',
        label: "Ojiva",
        data: respuesta.datosBarras2,
        borderColor: 'rgba(255,0,0)',
        borderWidth: 3
      };

    const datosPastel = {
        type: 'pie',
        data: respuesta.datosPastel,
        backgroundColor: colores
    }

    //Creando el Histograma
    const graficaBarras = document.getElementById('graficaBarras').getContext('2d');
    const chart1 = new Chart(graficaBarras, {
        type: 'bar',
        data: {
            labels: etiquetasBarras,
            datasets: [
                datosBarras2, datosBarras1, datosOjiva
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    //Creando la gráfica de pastel
    const graficaPastel = document.getElementById('graficaPastel').getContext('2d');
    const chart2 = new Chart(graficaPastel, {
        type: 'pie',
        data: {
            labels: etiquetasPastel,
            datasets: [
                datosPastel
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom'
            },
            plugins: {
                tooltip: {
                    enabled: false
                },
                datalabels: {
                    color: '#ffff',
                    anchor: 'end',
                    align: 'center',
                    font: {
                        weight: 'bold',
                        size: '20'
                    }
                }
            }
        }
    });
})();