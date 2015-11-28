# Cookie Banner
Adds one of those obnoxious cookie warning banners to your site. Instead of using JavaScript to add the banner, the markup is on the DOM at page load.

## Setup
Add the following to your templates where you want the banner to appear:

````
[cookiebanner]We know you don't care but we use cookies. <a href="/cookies">More information</a>[/cookiebanner]
````

Optional attributes:

- `class` - defaults to `cookiebanner`
- `maxAge` - defaults to 1 year

## Example output

````html
<div class="cookiebanner">
    We know you don't care but we use cookies. <a href="/cookies">More information</a>
</div>
````

## Cookie Usage
Ironically, the plugin needs to create a cookie so that the server knows not to show the banner after its been shown once. In case you need to add this to your privacy policy, the cookie created is called `_seen_cookie_notice`.