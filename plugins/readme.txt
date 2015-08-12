==Plugin Information==
Plugin Name: Royal King Plugin
Plugin URI: https://phoenix.sheridanc.on.ca/~ccit2705/
Description: The widget shows the different posts for the custom post type
Author: Rachit Srivastava
Version: 2.0
Author URI: https://phoenix.sheridanc.on.ca/~ccit2705/

==Description==

This plugin is designed for our client "Royal Kings Shisha Bar," where the plugin allows 
the user to upload different posts according to their needs. Specifically, this plugin
adds a custom post type on the wordpress dashboard and adds a widget in the widgets area 
of wordpress. This plugin can add, delete, or edit posts as needed by the user. Without
using any code, the user can easily remove the posts or add the posts if needed.

==Files Used In This Plugin==
 --> widget.php
 --> royal_king.css
 
==How To Install The Plugin==
In this section, there are step-by-step instructions on how to install the plugin
1. Upload 'widget.php' file in your plugins folder either on your local host or your
c-panel account. The plugins folder can be accessed by clicking on "public_html," followed
by "wp-content" and then the plugins folder should be visible. 

2. Activate the plugin through your "plugins" menu on wordpress. The moment you activate 
the plugin, the user will be able to see the custom post type "Today's Deals!" on their 
dashboard and will be able to access the "Royal King Plugin" widget in the "widgets" 
section of wordpress.

3. The user can click on "Today's Deals," where that would direct the user to go to a
page that displays the default posts already created by the developer. The user can either
edit, add, or remove the posts on that site and will be able to make changes according to 
their needs.

4. The last and the most important part is to show the posts on the site. The user needs
to add the "Royal King Plugin" widget in their sidebar, which allows the posts and their
featured images to show up on the site. 

*Side Note: If the user wants to change the overall styling of the widget area then they
can simply make changes in the "royal_king.css." Also if they want to add more posts and
make them visible then they need to go in the "widget.php" and change the number at the 
end of this code "$new = array('post_type'=> 'royalking', 'showposts' => 2);" to any 
number according to the amount of posts they want to show.*