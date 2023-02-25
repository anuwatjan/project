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


                /////////////////  รายรับ /////////////////

                 $sqlsi = "SELECT  SUM(`prod_price`) AS prod_price 
                FROM `akksofttech_phrchaes_order_detail` 
                WHERE  MONTH(akksofttech_phrchaes_order_detail.pod_create) = '".$datem."' 
                and YEAR(akksofttech_phrchaes_order_detail.pod_create) = '".$dateY."'  ";

                $ressi = mysqli_query($connect,$sqlsi);
                $rows = mysqli_fetch_array($ressi,MYSQLI_BOTH);

                
               


                 $sqlinc = "SELECT  SUM(`quantity`) AS quantity 
                FROM `akksofttech_phrchaes_order_detail` 
                WHERE MONTH(akksofttech_phrchaes_order_detail.pod_create) = '".$datem."' 
                AND YEAR(akksofttech_phrchaes_order_detail.pod_create) = '".$dateY."'";

                $resinc = mysqli_query($connect,$sqlinc);
                $rowsinc = mysqli_fetch_array($resinc,MYSQLI_BOTH);

                $totoinco =  $rows['prod_price'] * $rowsinc['quantity'];



               


                //  $sqlexp = "SELECT  COUNT(`po_id`) AS poid 
                // FROM `akksofttech_purchase_order` 
                // WHERE  MONTH(akksofttech_purchase_order.po_update_date) = '".$datem."' 
                //         and YEAR(akksofttech_purchase_order.po_update_date)  = '".$dateY."'  ";

                //         $resexp = mysqli_query($connect,$sqlexp);
                //         $rowsexp = mysqli_fetch_array($resexp,MYSQLI_BOTH);


                        $totoexp = 0;
              

                        $resultArray = array();
                        $json=array('name'=>'SALES' , 'y' =>$totoinco); 
                        array_push($resultArray,$json);

                        $json=array('name'=>'EXPENSRS' , 'y' =>$totoexp); 
                        array_push($resultArray,$json);





                        echo json_encode($resultArray);

                        

?>