<!-- logging tab -->
<div class="tab-pane fade" id="ddclientlogging">
  <h4 class="mt-3 mb-3"><?php echo _("Logging") ?></h4>
  <p><?php echo _("Use the <strong>Generate log</strong> button to output detailed <code>ddclient daemon</code> debug info.") ?></p>

  <div class="">
    <input type="button" class="btn btn-outline btn-warning mb-2" id="js-ddclient-debug-log" value="<?php echo _("Generate log"); ?>" />
  </div>
  <div class="row">
    <div class="form-group col-md-8 mt-2">
      <textarea class="logoutput" id="ddclient-log"></textarea>
    </div>
  </div>
</div><!-- /.tab-pane -->

