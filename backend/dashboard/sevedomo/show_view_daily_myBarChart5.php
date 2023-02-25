<?PHP 
        require_once '../../include/condb.php'; 

        @session_start();


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


                for ($i = 2023;  $i <= 2030; $i++) {


                        
                        
                        /////////////////  รายรับ /////////////////
                        $sqlsi = "SELECT SUM(od.prod_price*od.quantity) as price_sum   FROM  akksofttech_purchase_order AS po 
                        INNER JOIN akksofttech_phrchaes_order_detail AS od ON po.po_id = od.po_id
                        WHERE po.sto_id = '".$_SESSION['akksofttechsess_stoid']."' 
                        AND po.po_status = '5'
                        AND YEAR(od.pod_create) = '".$i."'  
                        ";
                        $ressi = mysqli_query($connect,$sqlsi);
                        $rows = mysqli_fetch_array($ressi,MYSQLI_BOTH);



                        $totoinco =  $rows['price_sum'] * 1;

                        $reslutArray[] = $totoinco;    


                





                }



          




          




                array_push($reslutArray_detail , $reslutArray);
               
       

                echo json_encode($reslutArray_detail );          
?>