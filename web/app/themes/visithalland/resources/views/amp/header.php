<!doctype html>
<html ⚡>
    <head>
    <meta charset="utf-8">
    <title><?php the_title() ?></title>

    <link rel="canonical" href="./regular-html-version.html">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <?php // do_action('amp_post_template_css', $this); ?>
    <?php echo "<style amp-custom>" . file_get_contents(\App\asset_path('styles/amp.css')) . "</style>" ?>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <?php // do_action('amp_post_template_head', $this); ?>

    <?php wp_head(); ?>

</head>
<body>
    <h1>Header <?php var_dump(is_amp_endpoint()) ?></h1>
<hr />
