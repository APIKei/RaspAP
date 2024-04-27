<?php ob_start() ?>
  <?php if (!RASPI_MONITOR_ENABLED) : ?>
    <input type="submit" class="btn btn-outline btn-primary" name="SaveDDClientSettings" value="<?php echo _("Save settings"); ?>" />
    <?php if ($ddclientstatus[0] == 0) : ?>
      <input type="submit" class="btn btn-success" name="StartDDClient" value="<?php echo  _("Start Dynamic DNS"); $msg=_("Starting Dynamic DNS"); ?>" data-toggle="modal" data-target="#ddclientModal"/>
    <?php else : ?>
      <input type="submit" class="btn btn-warning" name="StopDDClient" value="<?php echo _("Stop Dynamic DNS") ?>"/>
      <input type ="submit" class="btn btn-warning" name="RestartDDClient" value="<?php echo _("Restart Dynamic DNS"); $msg=_("Restarting Dynamic DNS"); ?>" data-toggle="modal" data-target="#ddclientModal"/>
    <?php endif ?>
    <!-- Modal -->
    <div class="modal fade" id="ddclientModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title" id="ModalLabel"><i class="fas fa-sync-alt mr-2"></i><?php echo $msg ?></div>
          </div>
          <div class="modal-body">
            <div class="col-md-12 mb-3 mt-1"><?php echo _("Executing Dynamic DNS service start") ?>...</div>
            <div class="progress" style="height: 20px;">
              <div class="progress-bar bg-info" role="progressbar" id="progressBar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="9"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline btn-primary" data-dismiss="modal"><?php echo _("Close"); ?></button>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php $buttons = ob_get_clean(); ob_end_clean() ?>

<div class="row">
  <div class="col-lg-12">
    <div class="card">

      <div class="card-header">
        <div class="row">
          <div class="col">
            <i class="fas fa-globe mr-2"></i><?php echo _("Dynamic DNS"); ?>
          </div>
          <div class="col">
            <button class="btn btn-light btn-icon-split btn-sm service-status float-right">
              <span class="icon text-gray-600"><i class="fas fa-circle service-status-<?php echo $serviceStatus ?>"></i></span>
              <span class="text service-status">ddclient <?php echo _($serviceStatus) ?></span>
            </button>
          </div>
        </div><!-- /.row -->
      </div><!-- /.card-header -->

      <div class="card-body">
        <?php $status->showMessages(); ?>
        <form role="form" action="ddclient_conf" method="POST">
          <?php echo CSRFTokenFieldTag() ?>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" id="ddclientbasictab" href="#ddclientbasic" aria-controls="basic" data-toggle="tab"><?php echo _("Basic"); ?></a></li>
            <li class="nav-item"><a class="nav-link" id="ddclientadvancedtab" href="#ddclientadvanced" data-toggle="tab"><?php echo _("Advanced"); ?></a></li>
            <li class="nav-item"><a class="nav-link" id="ddclientloggingtab" href="#ddclientlogging" data-toggle="tab"><?php echo _("Logging"); ?></a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <?php echo renderTemplate("ddclient/basic", $__template_data) ?>
            <?php echo renderTemplate("ddclient/advanced", $__template_data) ?>
            <?php echo renderTemplate("ddclient/logging", $__template_data) ?>
          </div><!-- /.tab-content -->

          <?php echo $buttons ?>
        </form>
      </div><!-- /.card-body -->

      <div class="card-footer"> <?php echo _("Information provided by ddclient"); ?></div>

    </div><!-- /.card -->
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

