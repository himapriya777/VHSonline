
<div>
<h2 align="center">Pay now with Paypal:</h2>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="himapriya777-facilitator@gmail.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $_SESSION['pname'];?>">
<input type="hidden" name="amount" value="<?php echo $_SESSION['item_price'];?>">
<input type="hidden" name="quantity" value="<?php echo $_SESSION['qty'];?>">
<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="return" value="http://192.168.1.20/vhsv3/paypal_success.php">
<input type="hidden" name="cancel_return" value="http://www.vhsonline/paypal_cancel.php">

<!-- Display the payment button. -->
<input type="image" name="submit" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
</div>