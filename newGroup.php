<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/newGroup.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>

<div class="jumbotron">
    <h1> Create Group</h1>

    <h3> Add Members</h3>
    <div class="dynamic-form">


        <form>
            <div class="inputs">
                <input type="text" class="field name form-control shortTextBox groupname" name="dynamic[]"
                       value="" placeholder="Group Name"/>

                <br>
                <a href="#" id="add">Add Rows</a><br>

                <div class="MemberRow"><input type="text" class="field name form-control shortTextBox" name="dynamic[]"
                                              value=""
                                              placeholder="Name"/> <input type="text"
                                                                          class="field paypal form-control shortTextBox"
                                                                          name="dynamic[]" value=""
                                                                          placeholder="Paypal.me link"/></div>
            </div>
            <input name="submit" type="button" class="submit btn btn-success inline" value="Submit">
        </form>
    </div>

    <script>
        $(document).ready(function () {


            $('#add').click(function () {
                $('<div class ="MemberRow"><input type="text" class="field name form-control shortTextBox" name="dynamic[]" value="" ' +
                    'placeholder="Name"  /> <input type="text" class="field paypal form-control shortTextBox" name="dynamic[]" ' +
                    'value="" placeholder="Paypal.me link"  /> </div>    ').fadeIn('slow').appendTo('.inputs');

            });


            $('.submit').click(function () {

                var people = [];
                var groupnameBox = document.getElementsByClassName("groupname");


                $.each($('.MemberRow'), function () {
                    console.log(this);
                    var nameBox = this.getElementsByClassName("name");
                    var paypalBox = this.getElementsByClassName("paypal");
                    people.push({ name: $(nameBox).val(), groupName: $(groupnameBox).val(), paypal: $(paypalBox).val()});

                });

                console.log(people);

                console.log(JSON.stringify(people));

                $.ajax({
                    url: "registerGroup.php",
                    data: "people=" + JSON.stringify(people),
                    type: 'post',
                    success: function (people) {
                        alert(people);
                    }
                });


                return false;

            });

        });

    </script>
</div>
</body>


</html>