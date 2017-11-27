<?php 
    // Plugin.
    echo css_asset('plugin/jquery/jquery.multiselect.css');
    echo css_asset('plugin/jquery/jquery.multiselect.filter.css');
    // Shared Css.
    $this->load->view('template/sharedCss_v');
    // My Css.
    echo css_asset('iccCard/stylesheet.css');
?>