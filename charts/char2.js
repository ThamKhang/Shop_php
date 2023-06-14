var xValues = ["Hàng tồn kho", "Hàng mới", "Hàng đã được sử dụng", "Hàng trả về", "Hàng sale 70%"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#00FFFF",
  "#9999FF",
  "#FF9999",
  "#FF00CC",
  "#9966CC"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Tổng số lượng hàng sau khi thống kê"
    }
  }
});