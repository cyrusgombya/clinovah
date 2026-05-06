var options = {
  series: [
    {
      name: "Sales",
      data: [5, 25, 3, 20, 7, 18],
    },
    {
      name: "Revenue",
      data: [5, 15, 3, 14, 5, 16],
    },
  ],
  chart: {
    height: 140,
    type: "line",
    toolbar: {
      show: false,
    },
  },
  stroke: {
    width: 2,
    curve: "smooth",
  },
  xaxis: {
    type: "category",
    categories: ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu"],
    tickAmount: 6,
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  grid: {
    show: true,
    strokeDashArray: 6,
    position: "back",
  },
  colors: ["#3368c6", "#3368c62e"],
  fill: {
    type: "gradient",
    gradient: {
      shade: "dark",
      gradientToColors: ["#3368c669"],
      shadeIntensity: 1,
      type: "horizontal",
      opacityFrom: 1,
      opacityTo: 1,
      stops: [0, 100, 100, 100],
    },
  },
  legend: {
    show: false,
  },
  yaxis: {
    min: 0,
    max: 30,
    tickAmount: 3,
    labels: {
      offsetX: -12,
    }
  },
  tooltip: {
    enabled: false,
  }
};

var chart = new ApexCharts(
  document.querySelector("#revenue-chart"),
  options
);
chart.render();

var options = {
  series: [
    {
      data: [
        {
          x: '2008',
          y: [2800, 4500]
        },
        {
          x: '2009',
          y: [2600, 6600]
        },
        {
          x: '2010',
          y: [2950, 8000]
        },
        {
          x: '2011',
          y: [2000, 4600]
        },
        {
          x: '2012',
          y: [1000, 4100]
        },
        {
          x: '2013',
          y: [3800, 6500]
        },
        {
          x: '2014',
          y: [4100, 5600]
        },
        {
          x: '2015',
          y: [2800, 6500]
        },
        {
          x: '2016',
          y: [1200, 4300]
        }
      ]
    }
  ],
  chart: {
    height: 295,
    type: 'rangeBar',
    toolbar: {
      show: false,
    },
  },
  colors: ['#3368c6'],
  plotOptions: {
    bar: {
      isDumbbell: true,
      columnWidth: 3,
      dumbbellColors: ['#3368c6'],
    }
  },
  legend: {
    show: false,
  },
  labels: ['Mon', 'Tue', 'Web', 'Thu', 'Fri', 'sat', 'Sun', 'Mon', 'Tue'],
  fill: {
    type: 'gradient',
    gradient: {
      type: 'vertical',
      gradientToColors: ['#3368c6', '#3368c669'],
      inverseColors: true,
      stops: [0, 100]
    }
  },
  grid: {
    strokeDashArray: 6,
    xaxis: {
      lines: {
        show: false
      }
    },
    yaxis: {
      lines: {
        show: true
      }
    }
  },
  xaxis: {
    axisTicks: {
      show: false,
    },
  }
};

var chart = new ApexCharts(document.querySelector("#weekly-overview"), options);
chart.render();

var options = {
  series: [{
    data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
  }],
  chart: {
    type: 'bar',
    height: 370,
    offsetY: -10,
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      barHeight: '50%',
      borderRadius: 4,
      borderRadiusApplication: 'end',
      horizontal: true,
    }
  },
  dataLabels: {
    enabled: false
  },
  grid: {
    strokeDashArray: 6,
    xaxis: {
      lines: {
          show: false
      }
  },   
  yaxis: {
      lines: {
          show: true
      }
  },  
  },
  fill: {
    type: 'gradient',
    gradient: {
      type: 'vertical',
      gradientToColors: ['#3368c6', '#8ab2f9'],
      inverseColors: true,
      stops: [0, 100]
    }
  },
  colors: ['#8ab2f9'],
  xaxis: {
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
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May','Jun','Jul','Aug', 'Sep', 'Oct'],
  yaxis: {
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false
    },
  }
};

var chart = new ApexCharts(document.querySelector("#overview-chart"), options);
chart.render()
