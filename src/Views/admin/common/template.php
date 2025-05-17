<html>
<?php render('admin/common/head') ?>

<body class="bg-gray-50 font-sans text-gray-800">
  <div class="flex min-h-screen">

    <?php render('admin/common/sidebar') ?>

    <?php render($view, $data) ?>
    
  </div>
</body>

</html>