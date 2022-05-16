<!DOCTYPE HTML>
<html lang="th">
<head>
<title>Untitled Document</title>
<script type="text/javascript">
function  check(data){
 if(data.value >200){
    alert("ความดันเกิน 200");
 }
}
</script>
</head>
<body>
ความดัน <input type="text" name="A" id="A" onKeyUp="check(this)" />
<br>

</body>
</html>