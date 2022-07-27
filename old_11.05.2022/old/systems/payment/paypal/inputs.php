
  <div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Обработчик оплаты</label>
    <div class="col-lg-5">
         <span><?php echo $config["urlPath"]; ?>/systems/payment/<?php echo $sql["code"]; ?>/callback.php</span>
    </div>
  </div>

  <div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Тестовый режим</label>
    <div class="col-lg-5">
        <label>
          <input class="toggle-checkbox-sm" type="checkbox" <?php if($param["test"] == 1){ echo ' checked=""'; } ?> name="payment_param[test]" value="1" >
          <span><span></span></span>
        </label>
    </div>
  </div>

  <div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">ID merchant (E-mail)</label>
    <div class="col-lg-5">
         <input type="text" class="form-control" value="<?php echo $param["id_merchant"]; ?>"  name="payment_param[id_merchant]" >
    </div>
  </div>

  <div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Валюта</label>
    <div class="col-lg-5">

       <select name="payment_param[curr]" class="selectpicker" >
         <option <?php if($param["curr"] == "EUR"){ echo ' selected=""'; } ?> value="EUR" >EUR</option>
         <option <?php if($param["curr"] == "RUB"){ echo ' selected=""'; } ?> value="RUB" >RUB</option>
         <option <?php if($param["curr"] == "USD"){ echo ' selected=""'; } ?> value="USD" >USD</option>
       </select>

    </div>
  </div>

  <div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Перенаправлять клиента при удачной оплате</label>
    <div class="col-lg-5">
         <input type="text" class="form-control"  value="<?php echo $param["link_success"] ? $param["link_success"] : $config["urlPath"] . "/pay/status/success"; ?>" name="payment_param[link_success]" >
    </div>
  </div>

  <div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Перенаправлять клиента при отмене оплаты</label>
    <div class="col-lg-5">
         <input type="text" class="form-control"  value="<?php echo $param["link_cancel"] ? $param["link_cancel"] : $config["urlPath"] . "/pay/status/fail"; ?>" name="payment_param[link_cancel]" >
    </div>
  </div>

  <div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label"></label>
    <div class="col-lg-5">
         <a class="test-payment btn btn-primary" data-name="<?php echo $sql["code"]; ?>" >Проверить платежную систему</a>
    </div>
  </div>

  

