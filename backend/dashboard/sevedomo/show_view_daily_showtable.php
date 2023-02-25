<?PHP 
        require_once '../../include/condb_pdo.php'; 


                $numbluer = $_POST['numbluer'];
                // $numbluer = 7;
                $hdae = $_POST['hdae'];



                
                // $numbluer = 7;
                // $hdae = 'day';



                function DateThai($strDate)
                {
                        $strYear = date("Y",strtotime($strDate))+543;
                        $strMonth= date("n",strtotime($strDate));
                        $strDay= date("j",strtotime($strDate));
                        $strHour= date("H",strtotime($strDate));
                        $strMinute= date("i",strtotime($strDate));
                        $strSeconds= date("s",strtotime($strDate));
                        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                        $strMonthThai=$strMonthCut[$strMonth];
                        return "$strDay $strMonthThai $strYear";
                }



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


                

                function DateThaiY($strDate)
                {
                        $strYear = date("Y",strtotime($strDate))+543;
                        $strMonth= date("n",strtotime($strDate));
                        $strDay= date("j",strtotime($strDate));
                        $strHour= date("H",strtotime($strDate));
                        $strMinute= date("i",strtotime($strDate));
                        $strSeconds= date("s",strtotime($strDate));
                        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                        $strMonthThai=$strMonthCut[$strMonth];
                        return "$strYear";
                }




        if( $hdae == 'day'){




                $arrayBill = array();
                $reslutArray = array();

        $sql = "SELECT date(backup_bill.datetime) as dt, SUM(backup_bill.total_amount) as Ttotal_amount
                FROM backup_bill                          
                WHERE backup_bill.total_amount > 0 
                GROUP BY date(backup_bill.datetime)   ORDER BY  date(backup_bill.datetime)   DESC     LIMIT ".$numbluer."";
                $stmt4 = $dbh->prepare($sql);
                $stmt4->execute();
                while($row4=$stmt4->fetch(PDO::FETCH_ASSOC)){




                 $sql = "SELECT date(backup_bill.datetime) as dt,
                                SUM(backup_bill.total) as Ttotal, SUM(backup_bill.total_amount) as Ttotal_amount, SUM(backup_bill.total_cash) as Ttotal_cash, SUM(backup_bill.total_credit) as Ttotal_credit, 
                                SUM(backup_bill.total_discount) as Tdiscount, SUM(backup_bill.total_service) as TserviceP, 
                                SUM(backup_bill.total_change) as Ttotal_change, SUM(backup_bill.vat) as Tvat
                                
                                FROM backup_bill                          
                                WHERE backup_bill.datetime BETWEEN '".$row4['dt']." 00:00:00' AND '".$row4['dt']." 23:59:59' AND   backup_bill.total_amount > 0  
                                GROUP BY date(backup_bill.datetime)  
                        ";


                $stmt2 = $dbh->prepare($sql);
                $stmt2->execute();
                while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){

                $cash = $row2['Ttotal_cash'] - $row2['Ttotal_change'];

                        $datedaet = DateThai($row2['dt']);
                        $total = $row2['Ttotal'];
                        $total_cash = $cash;
                        $total_credit = $row2['Ttotal_credit'];
                        $total_disc = $row2['Tdiscount'];
                        $total_serv = $row2['TserviceP'];
                        $total_vat = $row2['Tvat'];
                        $total_net = $row2['Ttotal_amount'] ;

                        $arrayBill = array(
                                "datedaet" => $datedaet ,
                                "total" => $total ,
                                "total_cash" => $total_cash ,
                                "total_credit" => $total_credit ,
                                "total_disc" => $total_disc ,
                                "total_serv" => $total_serv ,
                                "total_vat" => $total_vat ,
                                "total_net" => $total_net);

                }
                array_push($reslutArray , $arrayBill);









                }


    





        }else  if( $hdae == 'month'){


                $datedaeta = date('m');
                // 
                
                $rrreee = 0;

               
                $reslutArray = array();

                for ($i = $numbluer; 1 <= $i; $i--) {

                        $arrayBill = array();

                     $sql = "SELECT date(backup_bill.datetime) as dt,
                        SUM(backup_bill.total) as Ttotal, SUM(backup_bill.total_amount) as Ttotal_amount, SUM(backup_bill.total_cash) as Ttotal_cash, SUM(backup_bill.total_credit) as Ttotal_credit, 
                        SUM(backup_bill.total_discount) as Tdiscount, SUM(backup_bill.total_service) as TserviceP, 
                        SUM(backup_bill.total_change) as Ttotal_change, SUM(backup_bill.vat) as Tvat

                        FROM backup_bill                          
                        WHERE backup_bill.total_amount > 0   and MONTH(backup_bill.datetime) = ".$datedaeta." and YEAR(backup_bill.datetime) = ".date("Y")."
                        GROUP BY date(MONTH(backup_bill.datetime) = ".$datedaeta." and YEAR(backup_bill.datetime) = ".date("Y")." )   ORDER BY  date(MONTH(backup_bill.datetime) = ".$datedaeta." and YEAR(backup_bill.datetime) = ".date("Y").")   DESC ";

                        $stmt2 = $dbh->prepare($sql);
                        $stmt2->execute();
                        while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){



                                $cash = $row2['Ttotal_cash'] - $row2['Ttotal_change'];

                                $datedaet = DateThaimom($row2['dt']);
                                $total = $row2['Ttotal'];
                                $total_cash = $cash;
                                $total_credit = $row2['Ttotal_credit'];
                                $total_disc = $row2['Tdiscount'];
                                $total_serv = $row2['TserviceP'];
                                $total_vat = $row2['Tvat'];
                                $total_net = $row2['Ttotal_amount'] ;
        
        
                                $arrayBill = array(
                                        "datedaet" => $datedaet ,
                                        "total" => $total ,
                                        "total_cash" => $total_cash ,
                                        "total_credit" => $total_credit ,
                                        "total_disc" => $total_disc ,
                                        "total_serv" => $total_serv ,
                                        "total_vat" => $total_vat ,
                                        "total_net" => $total_net);




                        }
                        $datedaeta--;
                        
                        array_push($reslutArray , $arrayBill);
                
                }
            









        
        
        }else if( $hdae == 'year'){





                $datedaeta = date('Y');
                $rrreee = 0;
                $reslutArray = array();

                for ($i = $numbluer; 1 <= $i; $i--) {

                        $arrayBill = array();




                        $sql = "SELECT date(backup_bill.datetime) as dt,
                        SUM(backup_bill.total) as Ttotal, SUM(backup_bill.total_amount) as Ttotal_amount, SUM(backup_bill.total_cash) as Ttotal_cash, SUM(backup_bill.total_credit) as Ttotal_credit, 
                        SUM(backup_bill.total_discount) as Tdiscount, SUM(backup_bill.total_service) as TserviceP, 
                        SUM(backup_bill.total_change) as Ttotal_change, SUM(backup_bill.vat) as Tvat

                        FROM backup_bill                          
                        WHERE backup_bill.total_amount > 0   and  YEAR(backup_bill.datetime) = ".$datedaeta."
                        GROUP BY YEAR(backup_bill.datetime) = ".$datedaeta."  ORDER BY   YEAR(backup_bill.datetime) = ".$datedaeta."  DESC ";

                        $stmt2 = $dbh->prepare($sql);
                        $stmt2->execute();
                        while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){



                                $cash = $row2['Ttotal_cash'] - $row2['Ttotal_change'];

                                $datedaet = DateThaiY($row2['dt']);
                                $total = $row2['Ttotal'];
                                $total_cash = $cash;
                                $total_credit = $row2['Ttotal_credit'];
                                $total_disc = $row2['Tdiscount'];
                                $total_serv = $row2['TserviceP'];
                                $total_vat = $row2['Tvat'];
                                $total_net = $row2['Ttotal_amount'] ;
        
        
                                $arrayBill = array(
                                        "datedaet" => $datedaet ,
                                        "total" => $total ,
                                        "total_cash" => $total_cash ,
                                        "total_credit" => $total_credit ,
                                        "total_disc" => $total_disc ,
                                        "total_serv" => $total_serv ,
                                        "total_vat" => $total_vat ,
                                        "total_net" => $total_net);




                        }



                        
                                

                                $datedaeta--;
                                array_push($reslutArray , $arrayBill);


                    }







                        
        }





















       echo json_encode($reslutArray);




?>