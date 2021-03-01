//AJAX LOAD
function loadData(callBackLoadData, area) {
    $.ajax("./?ajax=proportionRole", {
        method: "POST",
        dataType: "JSON",
        beforeSend: function() {
            $(area).html("<div class='alert alert-info'>Attendez...</div>");
        }
    }).done(function(result) {
        if (result.success) {
            $(area).html("<canvas id='myPieChart'></canvas>");
            callBackLoadData(result);
        } else {
            $(area).html("<div class='alert alert-danger'>Erreur</div>");
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        $(area).html("<div class='alert alert-danger'>Erreur</div>");
    });
}

function callBackLoadData(result) {
    console.log(result);
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Visiteurs", "Membres", "Rédacteurs", "Modérateurs", "Administrateurs"],
            datasets: [{
                data: result['count'],
                backgroundColor: ['#787878', '#1e1e1e', '#248899', '#03384C', '#7A0A11'],
                hoverBackgroundColor: ['#4b4b4b', '#1b1b1b', '#207a8a', '#1c4757', '#62080e'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

}

loadData(callBackLoadData, '#proportionGraphique');


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';