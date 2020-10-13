<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function parser(){
        
        $dates = array(
            '11/10/2020',
            '10/10/2020',
            '09/10/2020',
            '08/10/2020',
            '07/10/2020',
            '06/10/2020',
            '05/10/2020',
            '04/10/2020',
            '03/10/2020',
            '02/10/2020',
            '01/10/2020',
            '30/09/2020',
            '29/09/2020',
            '28/09/2020',
            '27/09/2020',
            '26/09/2020',
            '25/09/2020',
            '24/09/2020',
            '23/09/2020',
            '22/09/2020',
            '21/09/2020',
            '20/09/2020',
            '19/09/2020',
            '18/09/2020',
            '17/09/2020',
            '16/09/2020',
            '15/09/2020',
            '14/09/2020',
            '13/09/2020',
            '12/09/2020',
            '11/09/2020',
            '10/09/2020'

        );
        //11/10/2020
        //10/10/2020
        //10/10/2020

        foreach ($dates as $date){
            //$date = "02/03/2002";

          //  echo $date . "===================================================<br>";

            $date_eu = str_replace("/", ".", $date);

            $time    = strtotime($date_eu);



            $text =  file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp?date_req=".$date);

            $xml = simplexml_load_string($text, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);

           // $array['Valute'][0];

            //$array['Valute'][0] as array
            //$array['Valute'][0]['@attributes']['ID']
            //print_r($array['Valute']);exit;

            //print_r($array['Valute'][0]['NumCode']);
    //        
            if(array_key_exists("Valute",$array)){
                foreach($array['Valute'] as $val){
                    $insert = "INSERT INTO `currency` (`id`, `currencyID`, `numCode`, `сharCode`, `name`, `value`, `public_date`) VALUES (";

                    $insert .=  "NULL";
                    $insert .=   ",'".$val['@attributes']['ID']."'";
                    $insert  .=  ",'".$val['NumCode']."'";
                    $insert  .=  ",'".$val['CharCode']."'";
                    $insert  .=  ",'".$val['Name']."'";
                    $insert  .=  ",'".$val['Value']."'";
                    $insert  .=  ",'".$time."'";
                    $insert = $insert . "); ";
                    echo $insert;
                    echo '<br>';

                   // var_dump($insert);exit;
                    //echo $val["NumCode"] . '<br>';
                    //echo $val["CharCode"] . '<br>';

                }
            }
            
        
        //INSERT INTO `currency` (`id`, `currencyID`, `numCode`, `сharCode`, `name`, `value`, `public_date`) VALUES (NULL, 'test', '1', 'test', 'test', 'test', '13123121');
        //$html_utf8 = mb_convert_encoding($text, "utf-8", "windows-1251");

        //echo $html_utf8;
       // $daily = new \SimpleXMLElement($html_utf8);
        
       // echo "NumCode" . $movies->Valute[0]->NumCode;
        }
        exit;
    }
    
    
}
