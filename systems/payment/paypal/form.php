<?php

$amount = number_format($paramForm["amount"], 2, ".", "");

$paypalUrl = $param["test"] ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

$html = '
<form target="paypal" action="'.$paypalUrl.'" class="form-pay" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="'.$param["id_merchant"].'">
  <input type="hidden" name="item_number" value="'.$paramForm["id_order"].'">
  <input type="hidden" name="return" value="'.$param["link_success"].'" />
  <input type="hidden" name="cancel_return" value="'.$param["link_cancel"].'" />
  <input type="hidden" name="notify_url" value="'.$config["urlPath"].'/systems/payment/paypal/callback.php" />
  <input type="hidden" name="item_name" value="'.$paramForm["title"].'">
  <input type="hidden" name="amount" value="'.$amount.'">
  <input type="hidden" name="currency_code" value="'.$param["curr"].'">
  <button class="pay-trans" ></button> 
</form>  
';

return ["form"=>$html];
?>


