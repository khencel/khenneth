<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<style>
    .center {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 10px;
    }
</style>
<body>
    <div class="center bg-white shadow p-4">
        <div class="text-center">
            <div style="width: 20%" class="m-auto">
                <img src="/img/Home_logo.png" class="img-fluid" alt="">
            </div>
            <div class="h2 mt-3">
                Verify your email address
            </div>
            <div>
                <p>
                    Please check your inbox for the email confirmation and kindly click Verify Account. If the
                    message arrive a little later in your mailbox, please do bear with it up to 30 minutes. In case you
                    cannot find the Verification from your inbox, please check it at Promotions, Bulk Mail or Spam
                    mail of your email client.
                </p>
            </div>
            <div>
                <a href="/">
                    <button class="btn button-success">Back to Yijing Page</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>