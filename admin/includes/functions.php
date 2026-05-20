<?php
function my_custom_shortcode()
{
    return include 'admin/includes/footer.php';
}

$shortcodes = array();

function add_shortcode($tag, $func)
{
    global $shortcodes;
    $shortcodes[$tag] = $func;
}

add_shortcode('my_shortcode', 'my_custom_shortcode');

function do_shortcodes($content)
{
    global $shortcodes;
    foreach ($shortcodes as $tag => $func) {
        $pattern = '/\[' . $tag . '\]/';
        if (preg_match($pattern, $content)) {
            $content = preg_replace_callback($pattern, function ($matches) use ($func) {
                return call_user_func($func);
            }, $content);
        }
    }
    return $content;
}


?>