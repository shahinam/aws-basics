<!DOCTYPE html>
<html>
<head>
  <title>EC2 Metadata</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
  <script type="text/javascript">
    $(function () { $('#tree').jstree(); });
  </script>
</head>
<body>
<div id="tree">
  <?php metadata('meta-data/', 'http://169.254.169.254/latest/'); ?>
  <?php metadata('user-data', 'http://169.254.169.254/latest/'); ?>
  <?php metadata('dynamic/', 'http://169.254.169.254/latest/'); ?>
</div>
</body>
</html>

<?php

/**
 * Recursively print EC2 metadata.
 *
 * $path string
 *   Path meta data to get.
 * $endpoint string
 *   EC2 endpoint.
 */
function metadata($path, $endpoint) {
  print '<ul>';

  $meta = trim(file_get_contents($endpoint . $path));
  if (strpos($path, '/') == FALSE) {
    print '<li>' . $path . ' :: ' . $meta . '</li>';
  }
  else {
    print '<li>' . $path;
    $meta = explode(PHP_EOL, $meta);
    foreach ($meta as $info) {
      metadata($info, $endpoint . $path);
    }
    print '</li>';
  }

  print '</ul>';
}
