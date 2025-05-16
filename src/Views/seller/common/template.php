<html>
<?php render('seller/common/head') ?>

<body class="bg-gray-50 font-sans text-gray-800">
  <div class="flex min-h-screen">

    <?php render('seller/common/sidebar') ?>

    <?php render($view, $data) ?>
    
  </div>


</body>

</html>