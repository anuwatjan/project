<?PHP 
        require_once '../../include1/condb.php'; 




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





                // $st_my = $_POST['st_my'];
                // $so_my = $_POST['so_my'];
        

                $arrayBill_detail = array();
                $reslutArray_detail = array();

                $datem = date("m");
                $dateY = date("Y");


                /////////////////  รายรับ /////////////////
                $sqlsi = "SELECT  SUM(`toto_NET`) AS toto_NET FROM `quote_vat` WHERE  MONTH(quote_vat.datetime) = '".$datem."' and YEAR(quote_vat.datetime) = '".$dateY."'  ";
                $ressi = mysqli_query($conn,$sqlsi);
                $rows = mysqli_fetch_array($ressi,MYSQLI_BOTH);


                // SELECT `incom_id`, `incom_vat`, `incom_incexp`, `incom_incexptype`, `incom_incexpdate`, `incom_listname`, `incom_amount`, `incom_note`, `userid`, `user`, `datetime` FROM `incomeandexpenses` WHERE 1


                $sqlinc = "SELECT  SUM(`incom_amount`) AS totoincom_amount FROM `incomeandexpenses` WHERE `incomeandexpenses`.`incom_incexp` = 'INC' AND MONTH(incomeandexpenses.incom_incexpdate) = '".$datem."' AND YEAR(incomeandexpenses.incom_incexpdate) = '".$dateY."'  ";
                $resinc = mysqli_query($conn,$sqlinc);
                $rowsinc = mysqli_fetch_array($resinc,MYSQLI_BOTH);

                $totoinco =  $rows['toto_NET'] + $rowsinc['totoincom_amount'];



                      $arrayBill[] = 'รายรับ' ;
                      $reslutArray[] = $totoinco;    




                        $sqlexp = "SELECT  SUM(`incom_amount`) AS totoincom_amount FROM `incomeandexpenses` WHERE `incomeandexpenses`.`incom_incexp` = 'EXP' AND MONTH(incomeandexpenses.incom_incexpdate) = '".$datem."' AND YEAR(incomeandexpenses.incom_incexpdate) = '".$dateY."'  ";
                        $resexp = mysqli_query($conn,$sqlexp);
                        $rowsexp = mysqli_fetch_array($resexp,MYSQLI_BOTH);


                      $totoexp = $rowsexp['totoincom_amount'] * 1;
                      $arrayBill[] = 'รายจ่าย' ;
                      $reslutArrayexp[] = $totoexp;    



                      
                        if( $totoinco > $totoexp){  
                                $rrreee = $totoinco + 5000; 
                        }else{
                                $rrreee = $totoexp + 5000;  
                        }

                        ///// กราฟรวม  กราฟแส้น ///////
                        array_push($reslutArray_detail , $arrayBill);
                        array_push($reslutArray_detail ,  $reslutArray);
                        array_push($reslutArray_detail ,  $reslutArrayexp);
                

                echo json_encode($reslutArray_detail );               

?>