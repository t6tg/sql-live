<?php

session_start();
require_once "../Database/index.php";
if ($_SESSION['username'] == "") {
    header("Location:../logout.php");
}
$name = $_SESSION['name'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>SQL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="lib/codemirror.js"></script>
    <link rel="stylesheet" href="lib/codemirror.css">
    <link rel="stylesheet" href="theme/dracula.css">
    <link rel="stylesheet" href="addon/hint/show-hint.css">
    <script src="addon/hint/show-hint.js"></script>
    <script src="addon/hint/sql-hint.js"></script>
    <script src="mode/javascript/javascript.js"></script>
    <script src="mode/sql/sql.js"></script>
</head>

<body>
    <div class="container" style="padding: 50px">
        <h1>BASIC SQL LEARNING</h1>
        <h2>Welcome : <?php echo $name; ?></h2>
        <a class="btn btn-danger" href="../logout.php" role="button">Logout</a><br><br>
        <div class="form-group">
            <label for="">YOUR CODE</label>
            <div id="codeeditor"></div>
        </div>
        <form id="myForm" action="" onsubmit="return false" method="post">
            <input type="hidden" name="hidden1" id="hidden1" />
            <button class="btn btn-primary" onclick="Sub()">Run code</button>
        </form>
        <div class="form-group">
            <label for="">RESULT</label>
            <p style="display:none" id="loader">Loading ....</p>
            <!-- <textarea style="display:none" id="loader" class="form-control" id="" rows="15" disabled></textarea> -->
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        var editor = CodeMirror(document.getElementById("codeeditor"), {
            value: "SELECT * FROM customer",
            mode: "text/x-mysql",
            theme: "dracula",
            tabSize: 3,
            lineNumbers: true,
            undoDepth: 5,
            extraKeys: {
                "Ctrl": "autocomplete"
            }
        });

        function Sub() {
            var text = editor.getValue();
            document.getElementById("hidden1").value = text;
            // document.getElementById("myForm").submit();
            $("#loader").show();
            $.ajax({
                type: "POST",
                url: "process.php",
                data: 'hidden1=' + $("#hidden1").val(),
                success: function(data) {
                    $("#loader").html(data);
                },
                error: function() {}
            });
        }
    </script>
</body>

</html>