var barData = {
    labels: ['Frontend', 'Backend', 'Cybersecurity'],
    datasets: [{
        label: '# Enrollees of each course',
        data: [12, 19, 3],
        backgroundColor: '#333',
        borderWidth: 1
    }]
};

var barCtx = document.getElementById('barChart').getContext('2d');
new Chart(barCtx, {
    type: 'bar',
    data: barData,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});



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

                // Check if there's no data available, and show the red circle
                if (data.datasets[0].data.every(count => count === 0)) {
                    document.getElementById('redCircle').style.display = 'block';

                    // Set both colors to red
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

        // Check if there's no data available, and show the red circle
        if (data.datasets[0].data.every(count => count === 0)) {
            document.getElementById('redCircle').style.display = 'block';

            // Set both colors to red
            data.datasets[0].backgroundColor = ['red', 'red'];
        }

        window.pieChart.update();
    },
    error: function (error) {
        console.error(error);
    }
});



