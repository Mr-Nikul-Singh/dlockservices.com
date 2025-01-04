<script>

	
		var lineChart = document.getElementById('lineChart').getContext('2d');
		// barChart = document.getElementById('barChart').getContext('2d');
		pieChart = document.getElementById('pieChart').getContext('2d');
		doughnutChart = document.getElementById('doughnutChart').getContext('2d');
		// nikul


		var myLineChart = new Chart(lineChart, {
			type: 'line', //[line,radar]
			data: {
				labels: <?= (!empty($get_line_chart_data['months'])) ? json_encode($get_line_chart_data['months'],true) : '' ?>,
				datasets: [{
					label: "",
					borderColor: "rgba(" + myVarVal + ", 0.95)",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "rgba(" + myVarVal + ", 0.95)",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 0,
					data: <?= (!empty($get_line_chart_data['leads_counts'])) ? json_encode($get_line_chart_data['leads_counts'],true) : '' ?>
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'top',
					labels : {
						padding: 10,
						fontColor: '#1d7af3',
					}
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:5,
					caretPadding:10
				},
				layout:{
					padding:{left:0,right:0,top:0,bottom:0}
				}
			}
		});

	
		var myPieChart = new Chart(pieChart, {
			type: 'pie',
			data: {
				datasets: [{
					data: [<?= $get_total_leads ?>,<?= $get_new_leads ?>, <?= $get_deal_done ?>],
					backgroundColor :[ "rgba(" + myVarVal + ", 0.95)", "#FFC657",  "#009D7F", "#e95454"],
					borderWidth: 0
				}],
				labels: ['Total Leads', 'New Leads', 'Deal Done'] 
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom',
					labels : {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle : true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
				tooltips: true,
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		})


		let connected_calls   = <?= (!empty($get_connected_calls)) ? $get_connected_calls : '0' ?>;
		let unattempted_calls = <?= (empty($get_unattempted_calls)) ? $get_unattempted_calls : '0' ?>;
		let interested_calls  = <?= (!empty($get_interested_calls)) ? $get_interested_calls : '0' ?>;
		let not_interested_calls  = <?= (!empty($get_not_interested_calls)) ? $get_not_interested_calls : '0' ?>;
		let pending_calls  = <?= (!empty($get_pending_calls)) ? $get_pending_calls : '0' ?>;
		var myDoughnutChart   = new Chart(doughnutChart, {
			type: 'doughnut',//[line,area,bar,doughnut,radar]
			data: {
				datasets: [{
					data: [connected_calls, unattempted_calls, interested_calls, not_interested_calls, pending_calls],
					backgroundColor: [ "rgba(" + myVarVal + ", 0.95)","#FF6D4F", "#5A81AB", "#4B4453", "#FFC657", "#FFC657","#55889D","#3090B0"]
				}],

				labels: ['connected Calls','Unattempted Calls', 'Interested Calls', 'Not Interested Calls', 'Pending Calls']
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend : {
					position: 'bottom'
				},
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 20,
						bottom: 0
					}
				}
			}
		});

    
    /* stacked column chart */
    var options = {
        series: [{
            name: 'Deal Done',
            data: <?= json_encode($get_dealdone_lead_by_month,true) ?>
        }, {
            name: 'Pending',
            data: <?= json_encode($get_pending_lead_by_month,true) ?>
        }, {
            name: 'Lost Leads',
            data: <?= json_encode($get_lost_lead_by_month,true) ?>
        }],
        chart: {
            type: 'area', //[line,area,bar,scatter,heatmap,radar]
            height: 299,
            stacked: true,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: false
            }
        },
        grid: {
            borderColor: '#f2f5f7',
        },
        colors: ["#009D7F", "#FFC657", "#e95454"],
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    position: 'bottom',
                    offsetX: -10,
                    offsetY: 0
                }
            }
        }],
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        xaxis: {
            type: 'month',
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: {
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: '11px',
                    fontWeight: 100,
                    cssClass: 'apexcharts-xaxis-label',
                },
            }
        },
        legend: {
            position: 'right',
            offsetY: 40
        },
        fill: {
            opacity: 1
        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: '11px',
                    fontWeight: 100,
                    cssClass: 'apexcharts-xaxis-label',
                },
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#column-stacked"), options);
    chart.render();


	/* pie chart */
	var dom = document.getElementById('echart-pie');
    var myChart = echarts.init(dom, null, {
        renderer: 'canvas',
        useDirtyRect: false
    });
    var app = {};
    var option;
    option = {
        tooltip: {
            trigger: 'item'
        },
        legend: {
            orient: 'horizontal',//['horizontal,vertical]
            left: 'center',
            textStyle: {
              color: '#777'
            }
        },
        series: [
            {
                name: 'Leads From',
                type: 'pie',
                radius: '50%',
                data: <?= json_encode($get_leads_by_source,true) ?>,

				
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ],
        color: ["#009D7F","rgba(" + myVarVal + ", 0.95)",  "#4B4453",  "#5A81AB", "#FFC657","#55889D", "#3090B0"]
    };
    if (option && typeof option === 'object') {
        myChart.setOption(option);
    }
    window.addEventListener('resize', myChart.resize);



	/* stacked column chart */
	<?php if(in_array($this->uri->segment(2),['dashboard','/',''])): ?>

	function bypay(filterType = null){
		if(filterType == 'by_status'){
			var options = {
				series: [{
					name: 'Paid',
					data: [12,23,44,55]
				}, {
					name: 'Unpaid',
					data: [23,34,55,66,78]
				}, {
					name: 'Canceled',
					data: <?= json_encode($get_canceled_invoice_by_month,true) ?>
				}, {
					name: 'Refunded',
					data: <?= json_encode($get_refunded_invoice_by_month,true) ?>
				}],
				chart: {
					type: 'bar',
					height: 284,
					stacked: true,
					toolbar: {
						show: true
					},
					zoom: {
						enabled: false
					}
				},
				grid: {
					borderColor: '#f2f5f7',
				},
				colors: ["#009D7F", "#FFC657", "#e95454", "#8e54e9"],
				responsive: [{
					breakpoint: 480,
					options: {
						legend: {
							position: 'bottom',
							offsetX: -10,
							offsetY: 0
						}
					}
				}],
				plotOptions: {
					bar: {
						horizontal: true,
					},
				},
				xaxis: {
					// type: 'datetime',
					type: 'month',
					categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
					],
					labels: {
						show: true,
						style: {
							colors: "#8c9097",
							fontSize: '11px',
							fontWeight: 600,
							cssClass: 'apexcharts-xaxis-label',
						},
					}
				},
				legend: {
					position: 'right',
					offsetY: 40
				},
				fill: {
					opacity: 1
				},
				yaxis: {
					labels: {
						show: true,
						style: {
							colors: "#8c9097",
							fontSize: '11px',
							fontWeight: 600,
							cssClass: 'apexcharts-xaxis-label',
						},
					}
				}
			};
			var chart = new ApexCharts(document.querySelector("#InvoiceBy-month"), options);
			chart.render();
		}else{
			var options = {
				series: [{
					name: 'Paid',
					data: <?= json_encode($get_paid_invoice_by_month,true) ?>
				}, {
					name: 'Unpaid',
					data: <?= json_encode($get_unpaid_invoice_by_month,true) ?>
				}, {
					name: 'Canceled',
					data: <?= json_encode($get_canceled_invoice_by_month,true) ?>
				}, {
					name: 'Refunded',
					data: <?= json_encode($get_refunded_invoice_by_month,true) ?>
				}],
				chart: {
					type: 'bar',
					height: 284,
					stacked: true,
					toolbar: {
						show: true
					},
					zoom: {
						enabled: false
					}
				},
				grid: {
					borderColor: '#f2f5f7',
				},
				colors: ["#009D7F", "#FFC657", "#e95454", "#8e54e9"],
				responsive: [{
					breakpoint: 480,
					options: {
						legend: {
							position: 'bottom',
							offsetX: -10,
							offsetY: 0
						}
					}
				}],
				plotOptions: {
					bar: {
						horizontal: true,
					},
				},
				xaxis: {
					// type: 'datetime',
					type: 'month',
					categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
					],
					labels: {
						show: true,
						style: {
							colors: "#8c9097",
							fontSize: '11px',
							fontWeight: 600,
							cssClass: 'apexcharts-xaxis-label',
						},
					}
				},
				legend: {
					position: 'right',
					offsetY: 40
				},
				fill: {
					opacity: 1
				},
				yaxis: {
					labels: {
						show: true,
						style: {
							colors: "#8c9097",
							fontSize: '11px',
							fontWeight: 600,
							cssClass: 'apexcharts-xaxis-label',
						},
					}
				}
			};
			var chart = new ApexCharts(document.querySelector("#InvoiceBy-month"), options);
			chart.render();
		}
	}
	bypay();

	<?php endif; ?> 

</script>