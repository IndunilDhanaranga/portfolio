/* global Chart:false */

$(function () {
    'use strict'
  
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
  
    //-----------------------
    // - MONTHLY SALES CHART -
    //-----------------------
  
    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
  
    var salesChartCanvas = document.getElementById('salesChart').getContext('2d');

    var salesChartData = {
        labels: month_labels,
        datasets: [
            {
                label: 'Income',
                backgroundColor: 'rgba(60,141,188,0.3)',
                borderColor: 'rgba(60,141,188,1)',
                pointRadius: 5,
                pointBackgroundColor: '#3b8bba',
                pointBorderColor: '#fff',
                pointHoverRadius: 7,
                pointHoverBackgroundColor: '#3b8bba',
                pointHoverBorderColor: '#fff',
                data: income_sums
            },
            {
                label: 'Expense',
                backgroundColor: 'rgba(255,99,132,0.2)',
                borderColor: 'rgba(255,99,132,1)',
                pointRadius: 5,
                pointBackgroundColor: 'rgba(255,99,132,1)',
                pointBorderColor: '#fff',
                pointHoverRadius: 7,
                pointHoverBackgroundColor: 'rgba(255,99,132,1)',
                pointHoverBorderColor: '#fff',
                data: expense_sums
            }
            
        ]
    };

    var salesChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false,
            labels: {
                fontColor: '#333',
                fontSize: 14
            }
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                    color: '#f2f2f2'
                },
                ticks: {
                    fontColor: '#333',
                    fontSize: 14
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                    color: '#f2f2f2'
                },
                ticks: {
                    fontColor: '#333',
                    fontSize: 14,
                    beginAtZero: true
                }
            }]
        },
        tooltips: {
            backgroundColor: 'rgba(0,0,0,0.8)',
            titleFontSize: 14,
            titleFontColor: '#fff',
            bodyFontColor: '#fff',
            bodyFontSize: 12,
            displayColors: true
        }
    };

    var salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: salesChartData,
        options: salesChartOptions
    });
  
    //---------------------------
    // - END MONTHLY INCOME EXPENCE CHART -
    //---------------------------
  
    //-------------
    // - PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = {
      labels: [
        'Income',
        'Expence'
      ],
      datasets: [
        {
          data: [this_month_income, this_month_expense],
          backgroundColor: ['#00a65a','#f56954']
        }
      ]
    }
    var pieOptions = {
      legend: {
        display: true
      }
    }
    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // eslint-disable-next-line no-unused-vars
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions
    })
  
    //-----------------
    // - END PIE CHART -
    //-----------------
    
  })
  
  // lgtm [js/unused-local-variable]
  