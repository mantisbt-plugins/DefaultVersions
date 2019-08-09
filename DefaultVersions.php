<?php

# Copyright (c) 2019 Scott Meesseman
# Licensed under GPL3 

class DefaultVersionsPlugin extends MantisPlugin
{
    public function register()
    {
        $this->name = plugin_lang_get("title");
        $this->description = plugin_lang_get("description");
        $this->page = 'config';

        $this->version = "1.0.5";
        $this->requires = array(
            "MantisCore" => "2.0.1"
        );

        $this->author = "Scott Meesseman";
        $this->contact = "spmeesseman@gmail.com";
        $this->url = "https://github.com/mantisbt-plugins/DefaultVersions";
    }

    public function hooks()
    {
        return array(
            "EVENT_REPORT_BUG" => "report_bug"
        );
    }

    function config() 
    {
		return array(
			'set_product_version'	=> 1 ,
            'set_target_version'	=> 1,
            'set_target_method'     => 1
		);
    }
    
    public function report_bug($event, $bug, $bug_id)
    {
        if ($bug->project_id == null) {
            return;
        }

        if ($bug->version == null || $bug->version == '')
        {
            $version = null;
            $versions = version_get_all_rows($bug->project_id, VERSION_RELEASED);

            foreach ($versions as $v) 
            {
                if ($version != null && strpos($version, '.') != false && version_compare($v['version'], $version) > 0) {
                    $version = $v['version'];
                }
                else if ($version != null && strpos($version, '.') == false && strcmp($v['version'], $version) > 0) {
                    $version = $v['version'];
                }
                else if ($version == null) {
                    $version = $v['version'];
                }
            }

            if ($version != null && $version != '') {
                bug_set_field($bug_id, 'version', $version);
            }
        }

        if ($bug->target_version == null || $bug->target_version == '')
        {
            $tgtversion = null;
            $nextMinor = (plugin_config_get('set_target_method') == 1);
            $versions = version_get_all_rows($bug->project_id, VERSION_FUTURE);
            foreach ($versions as $v) 
            {
                if ($tgtversion != null && strpos($tgtversion, '.') != false && version_compare($v['version'], $tgtversion) < 0) 
                {
                    if (true) {
                        if (substr_compare($v['version'], '.0', -2) != 0) {
                            continue;
                        }
                    }
                    $tgtversion = $v['version'];
                }
                else if ($tgtversion != null && strpos($tgtversion, '.') == false && strcmp($v['version'], $tgtversion) < 0) 
                {
                    $tgtversion = $v['version'];
                }
                else if ($tgtversion == null) 
                {
                    if ($nextMinor == true) {
                        if (strpos($v['version'], '.') != false) {
                            if (substr_compare($v['version'], '.0', -2) != 0) {
                                continue;
                            }
                        }
                    }
                    $tgtversion = $v['version'];
                }
            }
            if ($tgtversion != null && $tgtversion != '') {
                bug_set_field($bug_id, 'target_version', $tgtversion);
            }
        }

        return;
    }
}
