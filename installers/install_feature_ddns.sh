#!/bin/bash
#
# RaspAP feature installation: Dynamic DNS
# to be sources by the RaspAP installer script
# Author: @billz <billzimmerman@gmail.com>
# Author URI: https://github.com/billz/
# License: GNU General Public License v3.0
# License URI: https://github.com/raspap/raspap-webgui/blob/master/LICENSE

function _install_feature_ddns() {
    name="feature dynamic dns"

    _install_log "Install $name"
    _install_log "Configure Dynamic DNS support"
    echo -n "Install ddclient and enable DDNS configuration? [Y/n]: "
    if [ "$assume_yes" == 0 ]; then
        read answer < /dev/tty
        if [ "$answer" != "${answer#[Nn]}" ]; then
            _install_status 0 "(Skipped)"
        else
            _install_ddns_packages
        fi
    elif [ "$ddns_option" == 1 ]; then
        _install_ddns_packages
    else
        echo "(Skipped)"
    fi
}

function _install_ddns_packages() {
    _install_log "Installing required packages"
    sudo DEBIAN_FRONTEND=noninteractive apt-get -yq install ddclient || _install_status 1 "Unable to install ddclient"
    echo "Enabling ddclient.service"
    sudo systemctl enable ddclient.service || _install_status 1 "Failed to enable ddclient.service"
    echo "Enabling Dynamic DNS management option"
    sudo sed -i "s/\('RASPI_DDCLIENT_ENABLED', \)false/\1true/g" "$webroot_dir/includes/config.php" || _install_status 1 "Unable to modify config.php"
    _install_status 0
}
