<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8">
    <meta name="application-name" content="H&C Framework" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="../js/vendors_no_concat/picturefill.min.js"></script>
    <!--[if lt IE 9]>
        <script type="text/javascript" src="../js/vendors_no_concat/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lte IE 8]>
        <script type="text/javascript" src="../js/vendors_no_concat/respond.min.js"></script>
    <![endif]-->

    <script>
        document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js wfl');

        WebFontConfig = {
            google: {
                families: [ 'Aclonica', 'Acme', 'Alegreya' ]
            },
            timeout: 2000
        };

        // Webfontloader: https://github.com/typekit/webfontloader
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();

    </script>

    <title>H&C Framework</title>
</head>

<body>

    <header class="l-container row" role="banner">
        <nav class="l-span-A12" role="navigation">
            <a href="../index.php">Start</a> |
            <a href="../_components/library.php">Basic Atoms</a> |
            <a href="../_components/library-bento.php">Bento Components</a> |
            <a href="../_components/library-bentoJs.php">Demos: Webfontloader & jQueryplugins</a>
        </nav>
    </header>