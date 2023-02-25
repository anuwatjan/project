

$(document).ready(function() {  




      // show();
      show(1 , 'month');
    


      function show(st_my, so_my){ 

          // var numbluer = $("#numbluer").html();
          console.log(st_my, so_my );
  
          showchag(st_my, so_my );
          showchag_v(st_my , so_my);
     

          showchag_v2();
          showchag_v3();
             
          setTimeout(function(){ //รีโหลด เพื่อนที่จะจัดการส่งครัวก่อน
                           
            $(".highcharts-credits").hide();

          },1500);
       

      }




   
      function showchag_v2(st_my , so_my ){ 




        $.ajax({
          url:'sevedomo/show_view_daily_myBarChart3.php',
          type:'POST',
          data: {st_my : st_my, so_my : so_my },
          dataType: "json",
          success:function(data){


              Highcharts.chart('showchag_v2', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'MONTHLY SALES'
                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'AMOUNT'
                    }
                },
                tooltip: {
                    headerFormat:'<span style="font-size:18px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                 '<td style="padding:0"><b>{point.y:.1f} GBS</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        
                    }
                },
                series: [
                        {  name: 'SALES',  data: data['0']}
                        , 
                       
                        ]
              });
              

          }
        })
   

      }

      function showchag_v3(st_my , so_my ){ 




        $.ajax({
          url:'sevedomo/show_view_daily_myBarChart5.php',
          type:'POST',
          data: {st_my : st_my, so_my : so_my },
          dataType: "json",
          success:function(data){


              Highcharts.chart('showchag_v3', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'YEARLY SALES'
                },
                xAxis: {
                    categories: [
                        '2023',
                        '2024',
                        '2025',
                        '2026',
                        '2027',
                        '2028',
                        '2029',
                        '2030'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'AMOUNT'
                    }
                },
                tooltip: {
                    headerFormat:'<span style="font-size:18px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                 '<td style="padding:0"><b>{point.y:.1f} GBS</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        
                    }
                },
                series: [
                        {  name: 'SALES',  data: data['0']}
                        , 
                       
                        ]
              });
              

          }
        })
   

      }

      



      function showchag_v(st_my , so_my ){ 


        $.ajax({
          url:'sevedomo/show_view_daily_myBarChart2.php',
          type:'POST',
          data: {st_my : st_my, so_my : so_my },
          dataType: "json",
          success:function(data){

            console.log('show_view_daily_myBarChart2');
            console.log(data);


              Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'ANALYSIS PIE CHART SALES',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: '',
                    colorByPoint: true,
                    data: data
                }]
            });
            
            // $(".highcharts-credits").hide();




          }
        })




    }


    function showchag(st_my , so_my ){ 
          // console.log('ch');

        $.ajax({
          url:'sevedomo/show_view_daily_myBarChart.php',
          type:'POST',
          data: {st_my : st_my, so_my : so_my },
          dataType: "json",
          success:function(data){


            console.log(data);

            console.log('0....'+data['0']);
            console.log('1....'+data['1']);
            console.log('2....'+data['2']);
        
     
            Highcharts.chart('myBarChart', {
              chart: {
                  type: 'column'
              },
              title: {
                  text: 'กราฟ  รายรับ - รายจ่าย รวมยอดทั้งหมด'
              },
              xAxis: {
                  categories: ['รายรับ & รายจ่าย' ],
                  crosshair: true
              },
              yAxis: {
                  min: 0,
                  title: {
                      text: 'จำนวนเงิน (บาท)'
                  }
              },
              tooltip: {
                  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} บาท</b></td></tr>',
                  footerFormat: '</table>',
                  shared: true,
                  useHTML: true
              },
              plotOptions: {
                  column: {
                      pointPadding: 0.2,
                      borderWidth: 0
                  }
              },
              series: [
                        {  name: 'รายรับ ',  data: data['1']},
                        {  name: 'รายจ่าย',  data: data['2']}
                      ]
            });
   
          

          }
        });

        // $(".highcharts-credits").hide();
      };








});