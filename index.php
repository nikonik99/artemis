<html lang="en">
<?php
    require("core/test/layout-maker.php");
    
    $settings = json_decode(file_get_contents("config/settings.lys"), true);
    
    $metas = $settings["locations"]["partials"] . "/components/meta.lyc";
    $skelDir = $settings["locations"]["skel"];
    $header = $skelDir . "/header.lyt";
    $footer = $skelDir . "/footer.lyt";
    $menu = $skelDir . "/menu.lyt";
    $page = $skelDir . "/index.lyt";
    $postInclude = $settings["locations"]["components"] . "/post-include.lyc";
    $preInclude = $settings["locations"]["components"] . "/include.lyc";
    

    metas($metas);
    includes($preInclude);
    skelHead($metas);
    skelMenu($menu);
    skelPage($page);
    postIncludes($postInclude);
    skelFooter($footer);
    
?>
</html>