<?php

form_security_validate( 'plugin_DefaultVersions_config_edit' );
auth_reauthenticate();

access_ensure_global_level(config_get('manage_plugin_threshold'));

plugin_config_set('set_product_version', gpc_get_int('set_product_version', 1));
plugin_config_set('set_target_version', gpc_get_int('set_target_version', 1));
plugin_config_set('set_target_method', gpc_get_int('set_target_method', 1));

form_security_purge( 'plugin_DefaultVersions_config_edit' );

$t_redirect_url = plugin_page('config', TRUE);

layout_page_header( null, $t_redirect_url );
layout_page_begin();
html_operation_successful( $t_redirect_url );
layout_page_end();
