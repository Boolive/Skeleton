<!DOCTYPE html>
<html>
<head>
    <title><?=implode(' - ',array_reverse($v['meta']['title']->arrays('escape')))?></title>
    <meta content="text/html; charset=UTF-8">
    <meta name="description" content="<?=implode(' ',$v['meta']['description']->arrays('escape'))?>">
    <meta name="keywords" content="<?=implode(', ',$v['meta']['keywords']->arrays('escape'))?>">
    <?php echo $v['head']->string(); ?>
<!--    <link href='/interfaces/site/body/res/style/style.css' rel='stylesheet' type='text/css'>-->
</head>
<body>
    <?php echo $v['body']->string(); ?>
    <?php if (GLOBAL_TRACE){
        \boolive\core\develop\Trace::groups()->group('Benchmark')->set(\boolive\core\develop\Benchmark::stop('all', true));
        \boolive\core\develop\Trace::groups()->out();
    }
    ?>
</body>
</html>