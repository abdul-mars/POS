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
        <div class="loginDiv">
            <h3 style="margin-bottom: 30px">Sign In</h3>
            
            <form action="#" class="signinForm" id="signinForm" method="post">
                <div id="errorAlertContainer"></div>
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
                <div class="forgetPassDiv" style="margin-top: -5px; margin-bottom: 15px">
                   
                </div>
                <button type="submit" class="btn signinBtn px-" name="signinBtn" id="signinBtn">Submit</button>
            </form>
            <p class="mt-2">Powered By: MARs Tech | v1.0</p>
        </div>
    </div>

    <!-- forget password Modal -->
    <div class="modal fade" id="forgetPassMdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    <form action="#" method="post" id="forgetPassForm" autocomplete="off">
                        <div class="inputDiv">
                            <label for="forgetPassUsername" class="form-label">Username</label>
                            <input type="text" class="input" name="forgetPassUsername" id="forgetPassUsername" autocomplete="off" placeholder="Enter your username">
                            <small class="text-danger" id="forgetPassUsernameErr"></small>

                        <div class="mt-2 d-flex justify-content-between" style="align-content: right;">
                            <button type="submit" class="btn btn-success signinBtn px-4" id="forgetPassBtn">Submit</button>
                            <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js?s=<?= time(); ?>"></script>
    <script src="js/jquery-3.7.js?s=<?= time(); ?>"></script>
    <script src="js/script.js?s=<?= time(); ?>"></script>

</body>
</html>