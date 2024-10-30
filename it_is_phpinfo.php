<?php
/*
Plugin Name: It Is phpinfo

Description: Plugin displays phpinfo inside wordpress environment. You can see actual changes in settings made by wordpress and plugins for frontend side.
Version:  1.0
Author: Tomasnet

*/
add_action('admin_menu', 'it_is_phpinfo_add_menu');
add_action('template_redirect', 'it_is_phpinfo_redirect');


function it_is_phpinfo_add_menu() {
        add_submenu_page('tools.php', "It Is PHP Info", "It Is PHP Info", "administrator", "it_is_phpinfo_php_info", "it_is_phpinfo_php_info");
   }


function it_is_phpinfo_php_info() {
     
    ?>

<iframe src="<?php bloginfo('url'); ?>/?it_is_phpinfo_php_info_frame" width="100%" height="100%">
Your browser doesn't support iframes.
</iframe>
  
<?php 
}

function it_is_phpinfo_redirect() {
    if (is_user_logged_in()) {
     global $current_user;
  
   if (isset($current_user) and is_super_admin($current_user->data->ID)) {
      
if (isset($_GET['it_is_phpinfo_php_info_frame'])) {
          phpinfo();
exit;
}
}
}
}
?>