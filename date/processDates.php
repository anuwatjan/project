<?php
if(!empty($_POST['date1']) && !empty($_POST['date2'])){
   $date1 = new DateTime($_POST['date1']);
   $date2 = new DateTime($_POST['date2']);
   $difference = $date1->diff($date2);
   echo "There are " . $difference->days  . " days between " . $date1->format('d-m-Y') . " and " . $date2->format('d-m-Y');
} else {
   echo "Two dates need to be supplied";
}