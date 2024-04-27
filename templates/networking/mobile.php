  <div role="tabpanel" class="tab-pane fade in" id="mobiledata">
    <div class="row">
      <div class="col-lg-6">
        <h4 class="mt-3"><?php echo _("Settings for Mobile Data Devices") ?></h4>
        <hr />
        <form id="frm-mobiledata">
          <?php echo CSRFTokenFieldTag() ?>
          <div class="form-group">
            <label for="pin-mobile"><?php echo _("PIN of SIM card") ?></label>
            <input type="number" class="form-control" id="pin-mobile" placeholder="1234" value="<?php echo $arrMD["pin"]?>" >
          </div>
          <h4 class="mt-3"><?php echo _("APN Settings (Modem device ppp0)") ?></h4>
          <div class="form-group">
            <label for="apn-mobile"><?php echo _("Access Point Name (APN)") ?></label>
            <input type="text" class="form-control" id="apn-mobile" placeholder="web.myprovider.com" value="<?php echo $arrMD["apn"]?>" >
            <label for="apn-user-mobile"><?php echo _("Username") ?></label>
            <input type="text" class="form-control" id="apn-user-mobile" value="<?php echo $arrMD["apn_user"]?>" >
            <label for="apn-pw-mobile"><?php echo _("Password") ?></label>
            <input type="text" class="form-control" id="apn-pw-mobile"  value="<?php echo $arrMD["apn_pw"]?>" >
          </div>
          <a href="#" class="btn btn-outline btn-primary intsave" data-int="mobiledata"><?php echo _("Save settings") ?></a>
        </form>
      </div>
    </div>
  </div><!-- /.tab-panel -->


