  <?php $arrMD = file_exists(($f = RASPI_MOBILEDATA_CONFIG)) ? parse_ini_file($f) : false;
        if ($arrMD==false) { $arrMD=[]; $arrMD["pin"]=$arrMD["apn"]=$arrMD["apn_user"]=$arrMD["apn_pw"]=$arrMD["router_user"]=$arrMD["router_pw"]=""; }
  ?>
  <div role="tabpanel" class="tab-pane fade in" id="netdevices">
    <h4 class="mt-3"><?php echo _("Properties of network devices") ?></h4>
    <div class="row">
     <div class="col-sm-12">
      <div class="card ">
        <div class="card-body">
          <form id="frm-netdevices">
            <?php echo CSRFTokenFieldTag() ?>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th><?php echo _("Device"); ?></th>
                    <th><?php echo _("Interface"); ?></th>
                    <th></th>
                    <th><?php echo _("MAC"); ?></th>
                    <th><?php echo _("USB vid/pid"); ?></th>
                    <th><?php echo _("Device type"); ?></th>
                    <th style="min-width:6em"><?php echo _("Fixed name"); ?></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                   if(!empty($clients)) {
                      $ncl=$clients["clients"];
                      if($ncl > 0) {
                         foreach($clients["device"] as $id => $dev) {
                           echo "<tr>";
                           echo "<td>".$dev["vendor"]." ".$dev["model"]."</td>".PHP_EOL;
                           echo "<td>".$dev["name"]."</td>".PHP_EOL;
                           $ty="Client";
                           if(isset($dev["isAP"]) && $dev["isAP"]) $ty="Access Point";
                           echo "<td>".$ty."</td>".PHP_EOL;
                           echo '<td><input type="text" class="form-control" id="int-new-mac-'.$dev["name"].'" value="'.$dev["mac"].'"></td>'.PHP_EOL;
                           if(isset($dev["vid"]) && !empty($dev["vid"])) echo "<td>".$dev["vid"]."/".$dev["pid"]."</td>\n";
                           else echo "<td> - </td>".PHP_EOL;
                           $udevfile=$_SESSION["udevrules"]["udev_rules_file"];
                           $isStatic=array();
                           exec('find /etc/udev/rules.d/  -type f \( -iname "*.rules" ! -iname "'.basename($udevfile).'" \) -exec grep -i '.$dev["mac"].' {} \; ',$isStatic);
                           if(empty($isStatic))
                             exec('find /etc/udev/rules.d/  -type f \( -iname "*.rules" ! -iname "'.basename($udevfile).'" \) -exec grep -i '.$dev["vid"].' {} \; | grep -i '.$dev["pid"].' ',$isStatic);
                           $isStatic = empty($isStatic) ? false : true;
                           $devname=array();
                           exec('grep -i '.$dev["vid"].' '.$udevfile.' | grep -i '.$dev["pid"].' | sed -rn \'s/.*name=\"(\w*)\".*/\1/ip\' ',$devname);
                           if(!empty($devname)) $devname=$devname[0];
                           else {
                              exec('grep -i '.$dev["mac"].' '.$udevfile.' | sed -rn \'s/.*name=\"(\w*)\".*/\1/ip\' ',$devname);
                              if(!empty($devname)) $devname=$devname[0];
                           }
                           if(empty($devname)) $devname="";
                           $isStatic = $isStatic || in_array($dev["type"],array("ppp","tun"));
                           $txtdisabled=$isStatic ? "disabled":"";
                           echo '<td><select '.$txtdisabled.' class="selectpicker form-control" id="int-new-type-'.$dev["name"].'">'.PHP_EOL;
                           foreach($_SESSION["net-device-types"] as $i => $type) {
                             $txt=$_SESSION["net-device-types-info"][$i];
                             $txtdisabled =   in_array($type,array("ppp","tun")) ? "disabled":"";
                             if(preg_match("/^".$_SESSION["net-device-name-prefix"][$i].".*$/",$dev["type"])===1) echo '<option '.$txtdisabled.' selected value="'.$type.'">'.$txt.'</option>';
                             else echo '<option '.$txtdisabled.' value="'.$type.'">'.$txt.'</option>'.PHP_EOL;
                           }
                           echo "</select></td>".PHP_EOL;
                           echo "<td>".PHP_EOL;
                           if (! $isStatic ) echo '<input type="text" class="form-control" id="int-name-'.$dev["name"].'" value="'.$devname.'" >'.PHP_EOL;
                           else echo $dev["name"];
                           echo '<input type="hidden" class="form-control" id="int-vid-'.$dev["name"].'" value="'.$dev["vid"].'" >'.PHP_EOL;
                           echo '<input type="hidden" class="form-control" id="int-pid-'.$dev["name"].'" value="'.$dev["pid"].'" >'.PHP_EOL;
                           echo '<input type="hidden" class="form-control" id="int-mac-'.$dev["name"].'" value="'.$dev["mac"].'" >'.PHP_EOL;
                           echo '<input type="hidden" class="form-control" id="int-type-'.$dev["name"].'" value="'.$dev["type"].'" >'.PHP_EOL;
                           echo '</td>'."\n";
                           echo '<td>';
                           if (! $isStatic) echo '<button type="button" class="btn btn-secondary intsave" data-opts="'.$dev["name"].'" data-int="netdevices">' ._("Change");
                           echo "</td>\n";
                           echo "</tr>\n";
                         }
                      }
                   } else echo "<tr><td colspan=4>No network devices found</td></tr>";
                ?>
                </tbody>
             </table>
            </div>
          </form>
        </div>
       </div>
     </div>
    </div>
  </div><!-- /.tab-panel -->

