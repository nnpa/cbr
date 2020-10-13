<?php 
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
?>
@extends('layouts.app')

<?php
//echo "daata: " . $data;
?>
@section('content')

     @if(Auth::check())  
     <form method="POST" action="/search">
         {{csrf_field()}}
         <select name="date">
             <?php 
             foreach($dates as $date){
                echo "<option value='". $date ."'>".$date."</option>";
             } 
                 
                 ?>
         </select>
           <button type="submit" class="btn btn-primary" >Search</button>
     </form>
     
     <?php if(!empty($data)): ?>
        currencyID | value <br>
        <?php foreach($data as $line):?>
            <?php echo $line->currencyID;?> : <?php echo $line->value;?> <br>
        <?php endforeach;?>
     <?php endif;?>
    @endif
@endsection
