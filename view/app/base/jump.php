<html>

<head>
    <meta http-equiv="Content-Type" />
    <title></title>
</head>

<body style="text-align:center">
    <br />
    <br />
    <h1><?php echo $info; ?></h1>
    <a href="<?php echo $url; ?>"><span id="jumpTo">1</span>秒后系统会自动跳转，也可点击本处直接跳</a>
    <script type="text/javascript">
        countDown(<?php echo $sec ? $sec : 5; ?>, '<?php echo $url; ?>');

        function countDown(secs, surl) {
            var jumpTo = document.getElementById('jumpTo');
            jumpTo.innerHTML = secs;
            if (--secs > 0) {
                setTimeout("countDown(" + secs + ",'" + surl + "')", 1000);
            } else {
                if (surl) {
                    location.href = surl;
                } else {
                    window.history.back();
                    location.reload();
                }
            }
        }
    </script>
</body>

</html>