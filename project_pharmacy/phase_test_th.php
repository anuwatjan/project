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
    $(document).ready(function() {

        var d = new Date();
        var toDay = d.getMonth() + 1 + '/' +
            (d.getDate()) + '/' +
            (d.getFullYear() + 543);

        $('.datepicker1').datepicker({
            // startDate: '+0d',
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'mm/dd/yy',
            isBuddhist: true,
            defaultDate: toDay,
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม',
                'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
            ],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.',
                'ต.ค.', 'พ.ย.', 'ธ.ค.'
            ],
            onSelect: function(date) {
                var nextDay = new Date(date);
                nextDay.setDate(nextDay.getDate() + 1);
                $(".datepicker2").datepicker("option", "minDate", nextDay);
            }
        });

        $('.datepicker2').datepicker({
             // startDate: '+0d',
             autoclose: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'mm/dd/yy',
            isBuddhist: true,
            defaultDate: toDay,
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม',
                'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
            ],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.',
                'ต.ค.', 'พ.ย.', 'ธ.ค.'
            ],
            onSelect: function(date) {}
        });
    });
    </Script>


</body>

</html>