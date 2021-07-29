<html>
    <head>
        <title>Show Payment Page</title>
    </head>
    <body>
    <center>
        <h1>Please do not refresh this page...</h1>
    </center>
    <form method="post" action="https://securegw.paytm.in/theia/api/v1/showPaymentPage?mid=<?php echo $mid;?>&orderId=<?php echo $orderid;?>" name="paytm">
        <table border="1">
            <tbody>
            <input type="hidden" name="mid" value="<?php echo $mid;?>">
            <input type="hidden" name="orderId" value="<?php echo $orderid ;?>">
            <input type="hidden" name="txnToken" value="<?php echo $txntoken;?>">
            </tbody>
            
        </table>
        <!--<input type="submit" value="Submit">-->
        <script type="text/javascript"> document.paytm.submit();</script>
    </form>
</body>
</html>