<?php

namespace Rareloop;

class CookieBanner
{
    public static $jsAdded = false;

    /**
     * Instanstiates the plugin
     */
    public static function init()
    {
        add_shortcode('cookiebanner', [self::class, 'shortcodeHandler']);
    }

    /**
     * Forces the browser to show a Basic Auth login form
     */
    public static function shortcodeHandler($attr, $content = null)
    {
        $attributes = shortcode_atts([
            'class' => 'cookiebanner',
            'maxAge' => 60*60*24*365,
        ], $attr);

        // Do we need to show the banner?
        if (!isset($_COOKIE['_seen_cookie_notice']) && !is_admin()) {
            // If we haven't already, add some JS to prevent this showing again!
            if (!self::$jsAdded) {
                self::$jsAdded = false;

                add_action('wp_footer', function () use ($attributes) {
                    echo '<script>' . PHP_EOL;
                    echo '    // Prevent the cookie warning from being shown again' . PHP_EOL;
                    echo '    var t = new Date();' . PHP_EOL;
                    echo '    t.setSeconds(t.getSeconds() + ' . $attributes['maxAge'] . ');' . PHP_EOL;
                    echo '    document.cookie = "_seen_cookie_notice=1; max-age=' . $attributes['maxAge'] . '; expires=" + t + "; path=' . home_url('/', 'relative') . '";' . PHP_EOL;
                    echo '</script>' . PHP_EOL;
                });
            }
            // Send back the banner
            return '<div class="' . $attributes['class'] . '">' . $content . '</div>';
        }

        return "";
    }
}
