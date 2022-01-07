<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/ionic.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#insert").click(function() {
                var title = $("#title").val();
                var duration = $("#duration").val();
                var price = $("#price").val();
                var dataString = "title=" + title + "&duration=" + duration + "&price=" + price + "&insert=";
                if ($.trim(title).length > 0 & $.trim(duration).length > 0 & $.trim(price).length > 0) {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/phonegap/database/insert.php",
                        data: dataString,
                        crossDomain: true,
                        cache: false,
                        beforeSend: function() {
                            $("#insert").val('Connecting...');
                        },
                        success: function(data) {
                            if (data == "success") {
                                alert("inserted");
                                $("#insert").val('submit');
                            } else if (data == "error") {
                                alert("error");
                            }
                        }
                    });
                }
                return false;
            });
        });
    </script>
</head>

<body>
    <div class="bar bar-header bar-positive" style="margin-bottom:80px; ">
        <h1 class="title">Insert Database</h1>
        <a class="button button-clear" href="readjson.html">Read JSON</a>
    </div><br /><br />
    <div class="list">
        <input type="hidden" id="id" value="" />
        <div class="item">
            <label>Title</label>
            <input type="text" id="title" value="" />
        </div>
        <div class="item">
            <label>Duration</label>
            <input type="text" id="duration" value="" />
        </div>
        <div class="item">
            <label>Price</label>
            <input type="text" id="price" value="" />
        </div>
        <div class="item">
            <input type="button" id="insert" class="button button-block" value="Insert" />
        </div>
    </div>
</body>

</html>