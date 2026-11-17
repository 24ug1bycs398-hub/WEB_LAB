
<?php
$file = 'count.txt';

if (!file_exists($file)) {
    file_put_contents($file, 0);
}

$c = file_get_contents($file);
$c++;
file_put_contents($file, $c);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visitor Counter</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(
                135deg,
                #080b1e,
                #17133b,
                #30145b
            );
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 430px;
            padding: 40px 30px;
            text-align: center;
            border-radius: 25px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            backdrop-filter: blur(15px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .icon {
            width: 85px;
            height: 85px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(
                135deg,
                #7548e8,
                #b35cff
            );
            color: white;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        h1 {
            color: white;
            font-size: 30px;
            margin-bottom: 12px;
        }

        .subtitle {
            color: #b8b9d1;
            font-size: 16px;
        }

        .count {
            font-size: 65px;
            font-weight: bold;
            margin: 25px 0;
            color: #bd9aff;
            text-shadow: 0 0 25px rgba(189,154,255,0.4);
        }

        .status {
            display: inline-block;
            padding: 8px 18px;
            border-radius: 30px;
            background: rgba(46,204,113,0.15);
            color: #55e99a;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .message {
            color: #b8b9d1;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .refresh {
            display: block;
            padding: 15px;
            border-radius: 12px;
            background: linear-gradient(
                135deg,
                #7548e8,
                #b35cff
            );
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        .refresh:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(117,72,232,0.4);
        }

        .footer {
            margin-top: 25px;
            color: #777b9b;
            font-size: 12px;
        }

        @media(max-width: 480px) {
            .container {
                padding: 35px 20px;
            }

            .count {
                font-size: 50px;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="icon">
            <span>VISITORS</span>
        </div>

        <h1>Welcome!</h1>

        <p class="subtitle">
            Total Website Visitors
        </p>

        <div class="count">
            <?php echo number_format($c); ?>
        </div>

        <div class="status">
            Live Visitor Counter
        </div>

        <p class="message">
            Thank you for visiting our website!
        </p>

        <a href="" class="refresh">
            Refresh Page
        </a>

        <div class="footer">
            Visitor Analytics Dashboard
        </div>

    </div>

</body>
</html>
