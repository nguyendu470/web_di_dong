<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"> -->
     <!-- <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> -->
    <title>Document</title>
</head>
<body>
    <div class='container'>
        <button type="button" class="btn btn-primary mx-auto mt-10" data-toggle="modal" data-target="#exampleModal">
            demo
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-4" style="align-items: center;border-radius: 30px;">
                    <div class='top'>
                        <img class="img-thumbnail"
                            src="images/logo-Bulldog.png" />
                        <div class="headr">Policy Update</div>
                    </div>
                    <div class="modal-header border-0 mb-2">
                        <div class="modal-title" id="exampleModalLabel" style="text-align: center;">
                            <div>
                                We've updated our <u>Terms of Service</u> and <u>Privacy Policy</u>.Please take 5
                                minutes to read them to be sure that we are on the same page regarding your personal and
                                business data use. It's really important<br /> for us.
                            </div>
                            <div>
                                Once you have read the updated Terms of Service and Privacy Policy and agree with
                                them,please,click <strong>"Accept"</strong>. If you have questions,<br />
                                <u>contact us.</u>
                            </div>
                        </div>

                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Thư viện jquery đã nén phục vụ cho bootstrap.min.js  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Thư viện popper đã nén phục vụ cho bootstrap.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <!-- Bản js đã nén của bootstrap 4, đặt dưới cùng trước thẻ đóng body-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>

</html>
