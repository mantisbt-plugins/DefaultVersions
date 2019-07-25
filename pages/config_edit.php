<?php

auth_reauthenticate();

access_ensure_global_level(config_get('manage_plugin_threshold'));

plugin_config_set('set_product_version', gpc_get_int('set_product_version', 1));
plugin_config_set('set_target_version', gpc_get_int('set_target_version', 1));
plugin_config_set('set_target_method', gpc_get_int('set_target_method', 1));

print_successful_redirect(plugin_page('config', TRUE));
