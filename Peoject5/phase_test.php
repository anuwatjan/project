<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicke</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
 
first date picker

<div class="input-group date " data-provide="datepicker">
  <input type="text" name="date1" class="form-control datepicker1" placeholder="Select pick up date">
</div>



second datepicker

<div class="input-group date" data-provide="datepicker">
  <input type="text" name="date2" class="form-control  datepicker2" placeholder="Select delivery  date">
</div>









<Script>
   $(document).ready(function(){
    // Init first datepicker
    $('.datepicker1').datepicker( { 
      format: 'dd-mm-yyyy',
      startDate:'+0d',
      autoclose: true,
      onSelect: function(date){
        // Select next day
        var nextDay = new Date(date);
        nextDay.setDate(nextDay.getDate() + 1);
        $(".datepicker2").datepicker("option","minDate", nextDay);
      }
    });
  
    // Init second datepicker
    $('.datepicker2').datepicker( {    
        format: 'dd-mm-yyyy',
        startDate:'+0d',
        autoclose: true,
        onSelect: function(date){           
          //validate date here   
        }
    });
});
</Script>
 
 
</body>
</html>