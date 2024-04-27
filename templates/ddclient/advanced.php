<!-- advanced settings tab -->
<div class="tab-pane fade" id="ddclientadvanced">
  <div class="row">
    <div class="col-lg-12">
      <h4 class="mt-3"><?php echo _("Advanced settings"); ?></h4>

        <div class="row">
          <div class="form-group col-md-6 mb-0">
            <div class="custom-control custom-switch">
              <?php $checked = $ssl == 'yes' ? 'checked="checked"' : '' ?>
              <input class="custom-control-input" id="chxddclientssl" name="ddclient-usessl" type="checkbox" value="1" <?php echo $checked ?> />
              <label class="custom-control-label" for="chxddclientssl"><?php echo _("Enable SSL"); ?></label>
            </div>
            <p id="service-description">
              <small><?php echo _("Use an encrypted SSL connection for updates. Not supported by all providers.") ?></small>
            </p>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="server"><?php echo _("Daemon check interval"); ?></label>
            <input type="text" class="form-control" id="txtdds-daemon" name="ddclient-daemon" value="<?php safeOutputValue('daemon', $arrConfig); ?>" />
            <small><?php echo _("Value specified in milliseconds (ms). Default is 300."); ?></small>
          </div>
        </div>

      </div>
    </div><!-- /.row -->
  </div><!-- /.tab-pane | advanced tab -->

