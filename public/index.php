<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Website - AJAX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        img {
            width: 100%;
        }

        footer {
            margin-top: 100px;
            height: 150px;
            background-color: #d3d5d4;
        }

        h2, .description {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<header>
    <div class="container-fluid">
    <div class="row">
    <div class="col-12"><img src="http://international.fpt.edu.vn/wp-content/uploads/2019/05/cover-fb-fpt-final.jpg"
                             alt=""></div>
    </div>
    </div>
</header>

<div style="margin: auto;width: 60%;">
    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>
    <h2 class="mt-5">SURVEY</h2>
    <div class="description pb-5">
        <i>
            Please fill in this form to finish the survey about the quality of the short course that you have just
            attended. Thank you!
        </i>
    </div>
    <form id="surveyForm" name="form1" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="text" class="form-control" id="telephone" placeholder="Phone" name="telephone">
        </div>
        <div class="form-group">
            <label for="feedback">Feedback</label>
            <input type="text" class="form-control" id="feedback" placeholder="Feedback" name="feedback">
        </div>

        <input type="button" name="save" class="btn btn-success" value="SUBMIT" id="butsave">
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#butsave').on('click', function () {
            $("#butsave").attr("disabled", "disabled");
            var name = $('#name').val();
            var email = $('#email').val();
            var telephone = $('#telephone').val();
            var feedback = $('#feedback').val();
            if (name != "" && email != "" && telephone != "" && feedback != "") {
                $.ajax({
                    url: "save.php",
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        telephone: telephone,
                        feedback: feedback
                    },
                    cache: false,
                    success: function (dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            $("#butsave").removeAttr("disabled");
                            $('#surveyForm').find('input:text').val('');
                            $("#success").show();
                            $('#success').html('Data have been added successfully!');
                        } else if (dataResult.statusCode == 201) {
                            alert("Error occured!");
                        }

                    }
                });
            } else {
                alert('Please fnish the form!');
            }
        });
    });
</script>
<footer>
    <div class="row">
        <div class="col-8">
            <h3 class="text-center">
                All right reserved. FPT UNIVERSITY.
            </h3>
        </div>
        <div class="col-4">
        </div>
    </div>
</footer>
</body>
</html>
