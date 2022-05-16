<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Time Difference</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <form class="form-inline" action="processDates.php" method="post">
            <div class="form-group">
               <label for="date1">Date 1</label>
               <input type="date" class="form-control" id="date1" name="date1">
            </div>
            <div class="form-group">
               <label for="date2">Date 2</label>
               <input type="date" class="form-control" id="date2" name="date2">
            </div>
            <button type="submit" class="btn btn-default">Calculate</button>
         </form>
      </div>
   </body>