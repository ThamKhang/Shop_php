var xValues = [1,2,3,4,5,6,7,8,9,10,11,12];
var yValues = [7000,13000,18000,25000,30000,40000,42000,46000,28000,30000,31000,35000];

new Chart("Chart1", {
type: "line",
data: {
    labels: xValues,
    datasets: [{
    fill: false,
    lineTension: 0,
    backgroundColor: "rgba(0,0,255,1.0)",
    borderColor: "rgba(0,0,255,0.1)",
    data: yValues
    }]
},
    options: {
    legend: {display: false},
    scales: {
    yAxes: [{ticks: {min: 5000, max: 50000}}],
    }
}
});