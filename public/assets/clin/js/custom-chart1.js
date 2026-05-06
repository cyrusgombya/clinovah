const userPosition = {
  series: [
    {
      data: [70, 30, 60, 85, 60, 50, 70, 95],
    },
  ],
  chart: {
    type: "bar",
    height: 305,
    toolbar: {
      show: false,
    },
  },
  colors: [
    "rgba(39, 72, 134, 0.5)",
    "rgba(211, 77, 63, 0.5)",
    "rgba(218, 152, 23, 0.5)",
    "rgba(14, 164, 186, 0.5)",
    "rgba(71, 148, 71, 0.5)",
    "rgba(39, 72, 134, 0.5)",
    "rgba(211, 77, 63, 0.5)",
    "rgba(218, 152, 23, 0.5)",
  ],
  fill: {
    opacity: 0.4,
  },
  plotOptions: {
    bar: {
      borderRadius: 0,
      horizontal: true,
      distributed: true,
      barHeight: "30%",
      dataLabels: {
        position: "top",
      },
    },
  },
  dataLabels: {
    enabled: true,
    formatter: function (val) {
      return val;
    },
    background: {
      enabled: true,
      foreColor: "#fff",
      borderRadius: 5,
      padding: 4,
      opacity: 0.9,
      borderWidth: 1,
      borderColor: "#fff",
    },
    style: {
      fontSize: "12px",
      colors: ["#f2f2f2"],
    },
  },
  legend: {
    show: false,
  },

  grid: {
    show: true,
    borderColor: "#f2f2f2",
    strokeDashArray: 6,
    position: "back",
    xaxis: {
      lines: {
        show: false,
      },
    },
    yaxis: {
      lines: {
        show: true,
      },
    },
  },

  yaxis: {
    labels: {
      show: true,
    },
  },
  xaxis: {
    categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", "Mon"],
    logBase: 100,
    tickAmount: 10,
    min: 0,
    max: 100,
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
};

var userPositionEl = new ApexCharts(
  document.querySelector("#userPosition"),
  userPosition
);
userPositionEl.render();

var options = {
  series: [
    {
      name: "Servings",
      data: [44, 55, 41, 67, 22, 43, 21, 62, 58, 49],
    },
  ],
  chart: {
    height: 277,
    type: "bar",
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      borderRadius: 4,
      columnWidth: "50%",
    },
  },
  grid: {
    show: true,
    strokeDashArray: 6,
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 0,
  },
  xaxis: {
    labels: {
      rotate: -45,
    },
    categories: [
      "Mon",
      "Tue",
      "Wed",
      "Thu",
      "Fri",
      "Sat",
      "Sun",
      "Mon",
      "Tue",
      "Wed",
    ],
    tickPlacement: "on",
    axisTicks: {
      show: false,
    },
  },
  colors: ["#82afff"],
  fill: {
    type: "gradient",
    gradient: {
      shade: "light",
      type: "horizontal",
      shadeIntensity: 0.25,
      gradientToColors: ["#3368c6", "#82afff"],
      inverseColors: true,
      opacityFrom: 0.85,
      opacityTo: 0.85,
      stops: [50, 0, 100],
    },
  },
};

var chart = new ApexCharts(document.querySelector("#overall-chart"), options);
chart.render();
