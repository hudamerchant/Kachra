<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php require_once('errors.php') ?>
    <?php
        $balance = 20000;

        $error = [];
        $form_visible = true;
        if(isset($_REQUEST['submit']))
        {
            //var_dump($_REQUEST); die;
            $form_visible = false;
            $current_balance = $_REQUEST['balance'] ;
    
            if(!isset($_REQUEST['option']))
            {
                $error['option'] = OPTION_ERROR ; 
            }    
            if(empty($_REQUEST['amount']))
            {
                $error['amount'] = AMOUNT_ERROR ; 
            }

            if(isset($_REQUEST['option']) && !empty($_REQUEST['amount']))
            {
                $entered_amount = $_REQUEST['amount'] ;
                if($_REQUEST['option'] == 'withdraw')
                {
                    withdrawl($entered_amount , $current_balance );
                }
                elseif($_REQUEST['option'] == 'deposit')
                {
                    deposit($entered_amount , $current_balance );
                }
            }
            elseif($_REQUEST['option'] == 'check balance')
            {
                unset($error['amount']) ;
                checkBalance( $current_balance );
               
            }
            

        }
        function withdrawl($entered_amount , $current_balance )
        {
            global $balance;

            if($current_balance > 0 && $entered_amount > 0 )
            {
                if($entered_amount <= $current_balance)
                {
                    $current_balance -= $entered_amount;
                    $balance = $current_balance;

                    $remainder = $entered_amount;
                    $_5000_notes = floor($remainder / 5000);
                    $remainder %= 5000;
                    $_1000_notes = floor($remainder / 1000);
                    $remainder %= 1000;
                    $_500_notes = floor($remainder / 500);
                    $remainder %= 500;
                    $_100_notes = floor($remainder / 100);
                    $remainder %= 100; 
 
                    echo 'Cash Withdrawl : '. $entered_amount .'<br>';
                    echo '5000 x ' . $_5000_notes . '<br>';
                    echo '1000 x ' . $_1000_notes . '<br>';
                    echo '500 x ' . $_500_notes . '<br>';
                    echo '100 x ' . $_100_notes . '<br>';
                    echo 'Cash Depsit : 0 '. '<br>';
                    echo 'Current Balance : '. $current_balance . '<br>';

                }
            }
        }
        function deposit($entered_amount , $current_balance )
        {
            global $balance;

            if( $entered_amount > 0 )
            {
                $current_balance += $entered_amount;
                $balance = $current_balance;
                
                echo 'Cash Withdrawl : 0 '. '<br>';
                echo 'Cash Deposit : '. $entered_amount . '<br>';
                echo 'Current Balance : '. $current_balance . '<br>';           
            }
        }
        function checkBalance( $current_balance )
        {
            global $balance;
            $balance = $current_balance;
            
            echo 'Cash Withdrawl : 0 '. '<br>';
            echo 'Cash Deposit : 0 '. '<br>';
            echo 'Current Balance : '. $current_balance . '<br>';
        }

        if(count($error) > 0 )
        {
            $form_visible = true;
        }
        if($form_visible){
    ?>
    <form method='post'>
        <label>Select a transaction:</label><br>
        <input type='radio' name='option' value='withdraw'
        <?php echo isset($_REQUEST['option']) && $_REQUEST['option'] == 'withdraw' ? 'checked' : '' ?>
        >Cash Withdrawl<br>
        
        <input type='radio' name='option' value='deposit'
        <?php echo isset($_REQUEST['option']) && $_REQUEST['option'] == 'deposit' ? 'checked' : '' ?>
        >Deposit<br>
        
        <input type='radio' name='option' value='check balance'
        <?php echo isset($_REQUEST['option']) && $_REQUEST['option'] == 'balance' ? 'checked' : '' ?>
        >Balance Inquiry<br>
        
        <span><?php echo array_key_exists('option', $error) ? $error['option'] : '' ?></span><br>

        <label>Enter Amount:</label><br>
        <input type='number' name='amount' 
        value='<?php echo isset($_REQUEST['amount']) ? $_REQUEST['amount'] : '' ?>' ><br>
        
        <span><?php echo array_key_exists('amount', $error) ? $error['amount'] : '' ?></span><br>

        <input type='hidden' name='balance' value='<?php echo $balance ?>'><br>

        <input type='submit' name='submit' value='CONFIRM'>
    </form>
        <?php } ?>
</body>
</html> 