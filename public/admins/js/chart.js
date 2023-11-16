// BAR CHART INTEGRATION
function initializeBarChart(data) {
    var barCtx = document.getElementById('barChart').getContext('2d');
    window.barChart = new Chart(barCtx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                x: {
                    grid: {
                        color: '#333',
                    }
                },
                y: {
                    beginAtZero: true,
                    max: 70,
                    ticks: {
                        stepSize: 10,
                        callback: function (value) {
                            return value;
                        }
                    },
                    grid: {
                        color: '#333',
                    }
                }
            }
        }
    });
}



function updateBarChart() {
    $.ajax({
        url: '/get-bar-chart',
        method: 'GET',
        success: function (data) {
            if (window.barChart) {
                window.barChart.data.datasets = data.datasets;
                window.barChart.update();
            } else {
                initializeBarChart(data);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
}

$.ajax({
    url: '/get-bar-chart',
    method: 'GET',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (data) {
        initializeBarChart(data);
    },
    error: function (error) {
        console.error(error);
    }
});




// PIE CHART INTEGRATION
function initializePieChart(data) {
    var pieCtx = document.getElementById('pieChart').getContext('2d');
    window.pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: data,
        options: {}
    });
}

function updatePieChart() {
    $.ajax({
        url: '/get-pie-chart',
        method: 'GET',
        success: function (data) {
            if (window.pieChart) {
                window.pieChart.data.datasets = data.datasets;
                if (data.datasets[0].data.every(count => count === 0)) {
                    document.getElementById('redCircle').style.display = 'block';

                    data.datasets[0].backgroundColor = ['red', 'red'];
                } else {
                    document.getElementById('redCircle').style.display = 'none';
                }

                window.pieChart.update();
            } else {
                initializePieChart(data);
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
}

$.ajax({
    url: '/get-pie-chart',
    method: 'GET',
    success: function (data) {
        initializePieChart(data);
        if (data.datasets[0].data.every(count => count === 0)) {
            document.getElementById('redCircle').style.display = 'block';

            data.datasets[0].backgroundColor = ['red', 'red'];
        }
        window.pieChart.update();
    },
    error: function (error) {
        console.error(error);
    }
});



