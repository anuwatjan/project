<?PHP 
        require_once '../../include/condb.php'; 




                function DateThaimom($strDate)
                {
                        $strYear = date("Y",strtotime($strDate))+543;
                        $strMonth= date("n",strtotime($strDate));
                        $strDay= date("j",strtotime($strDate));
                        $strHour= date("H",strtotime($strDate));
                        $strMinute= date("i",strtotime($strDate));
                        $strSeconds= date("s",strtotime($strDate));
                        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                        $strMonthThai=$strMonthCut[$strMonth];
                        return "$strMonthThai $strYear";
                }





         

                $datem = date("m");
                $dateY = date("Y");
                // $dateY = '2022';

                $arrayBill_detail = array();
                $reslutArray_detail = array();


                        /////////////////  รายรับ /////////////////
                        $sqlsi = "SELECT  SUM(`toto_NET`) AS toto_NET FROM `quote_vat` WHERE  MONTH(quote_vat.datetime) = '".$i."' and YEAR(quote_vat.datetime) = '".$dateY."'  ";
                        $ressi = mysqli_query($conn,$sqlsi);
                        $rows = mysqli_fetch_array($ressi,MYSQLI_BOTH);
                        $totoinco =  $rows['toto_NET'] + $rowsinc['totoincom_amount'];
                        $reslutArray[] = $totoinco;    


                for ($i = 1;  $i <= 12; $i++) {







                        $sqlinc = "SELECT  SUM(`incom_amount`) AS totoincom_amount FROM `incomeandexpenses` WHERE `incomeandexpenses`.`incom_incexp` = 'INC' AND MONTH(incomeandexpenses.incom_incexpdate) = '".$i."' AND YEAR(incomeandexpenses.incom_incexpdate) = '".$dateY."'  ";
                        $resinc = mysqli_query($conn,$sqlinc);
                        $rowsinc = mysqli_fetch_array($resinc,MYSQLI_BOTH);




                        $sqlexp = "SELECT  SUM(`incom_amount`) AS totoincom_amount FROM `incomeandexpenses` WHERE `incomeandexpenses`.`incom_incexp` = 'EXP' AND MONTH(incomeandexpenses.incom_incexpdate) = '".$i."' AND YEAR(incomeandexpenses.incom_incexpdate) = '".$dateY."'  ";
                        $resexp = mysqli_query($conn,$sqlexp);
                        $rowsexp = mysqli_fetch_array($resexp,MYSQLI_BOTH);

                        $totoexp = $rowsexp['totoincom_amount'] * 1;
                        $reslutexpArray[] = $totoexp;    





                }



          


                array_push($reslutArray_detail , $reslutArray);
                array_push($reslutArray_detail ,  $reslutexpArray);
       

        echo json_encode($reslutArray_detail );          
?>