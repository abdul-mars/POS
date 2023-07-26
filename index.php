<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?s=<?= time(); ?>">
    <link rel="stylesheet" href="css/all.css">
    <title>Sign In</title>
</head>
<body>
    <div class="loader">
        <h1>Loading...</h1>
    </div>
    <div class="maine">
        <div class="loginDiv"><button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>
            <h3>Sign In</h3>
            <div id="liveAlertPlaceholder"></div>
            
            <form action="#" class="signinForm" id="signinForm" method="post">
                <div class="inputDiv">
                    <label for="username">Username*</label>
                    <input type="text" name="username" id="username" class="input">
                    <small class="err" id="usernameErr"></small>
                </div>
                <div class="inputDiv">
                    <span class="passwordSpan">
                        <label for="password">Password*</label>
                        <span id="showHidePass">
                            <i class="far fa-eye"></i>
                        </span>
                    </span>
                    <input type="password" name="password" id="password" class="input" autocomplete="new-password">
                    <small class="err" id="passwordErr"></small>
                </div>
                <div>
                    <button type="submit" class="btn signinBtn" name="signinBtn" id="signinBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script src="js/jquery-3.7.js?s=<?= time(); ?>"></script>
    <script src="js/script.js?s=<?= time(); ?>"></script>
    <script>
        var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
var alertTrigger = document.getElementById('liveAlertBtn')

function alert(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}

if (alertTrigger) {
  alertTrigger.addEventListener('click', function () {
    alert('Nice, you triggered this alert message!', 'success')
  })
}

    </script>
</body>
</html>