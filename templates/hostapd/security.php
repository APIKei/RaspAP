<div class="tab-pane fade" id="security">
  <h4 class="mt-3"><?php echo _("Security settings"); ?></h4>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="cbxwpa"><?php echo _("Security type"); ?></label>
        <?php SelectorOptions('wpa', $arrSecurity, $arrConfig['wpa'], 'cbxwpa', 'load80211wSelect'); ?>
      </div>
      <div class="form-group">
        <label for="cbxwpapairwise"><?php echo _("Encryption Type"); ?></label>
        <?php SelectorOptions('wpa_pairwise', $arrEncType, $arrConfig['wpa_pairwise'], 'cbxwpapairwise'); ?>
      </div>
      <div class="form-group">
        <label for="cbx80211w"><?php echo _("802.11w"); ?></label>
        <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="auto" title="" data-original-title="802.11w extends strong cryptographic protection to a select set of robust management frames, including Deauthentication, Disassociation and certain categories of Action Management frames. Collectively, this is known as Management Frame Protection (MFP)."></i>
        <?php SelectorOptions('80211w', $arr80211w, $arrConfig['ieee80211w'], 'cbx80211w'); ?>
     </div>

      <label for="txtwpapassphrase"><?php echo _("Pre-shared key (PSK)"); ?></label>
      <div class="input-group">
        <input type="text" class="form-control" id="txtwpapassphrase" name="wpa_passphrase" value="<?php echo htmlspecialchars($arrConfig['wpa_passphrase'], ENT_QUOTES); ?>" />
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="gen_wpa_passphrase"><i class="fas fa-magic"></i></button>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <figure class="figure">
        <img src="app/img/wifi-qr-code.php" class="figure-img img-fluid" alt="RaspAP Wifi QR code" style="width:100%;">
        <figcaption class="figure-caption">
            <?php echo sprintf(_("Scan this QR code directly or %s %sprint a sign%s for your users."),
                '<i class="fas fa-print"></i>',
                '<a href="javascript:window.open(\'../app/lib/signprint.php\',\'Printable Wi-Fi sign\',\'width=550,height=670\')">',
                '</a>'); ?>
        </figcaption>
      </figure>
    </div>
  </div>
</div><!-- /.tab-pane | security tab -->
