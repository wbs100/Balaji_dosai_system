<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to PayHere</title>
</head>
<body onload="document.forms['payhereForm'].submit();">
    <h3>Redirecting to PayHere...</h3>

    <form name="payhereForm" method="POST" action="https://sandbox.payhere.lk/pay/checkout">
        @foreach ($payment as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <noscript>
            <button type="submit">Click here if not redirected...</button>
        </noscript>
    </form>
</body>
</html>
