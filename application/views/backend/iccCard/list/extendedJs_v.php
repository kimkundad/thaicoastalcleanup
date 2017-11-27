<?php 
    // Plugin.
    echo js_asset('plugin/jquery/jquery.multiselect.js');
    echo js_asset('plugin/jquery/jquery.multiselect.filter.js');
    // Shared Java Script.
    $this->load->view('template/sharedJs_v');
    // My Java Script.
    echo js_asset('iccCard/iccCardList.js');
?>