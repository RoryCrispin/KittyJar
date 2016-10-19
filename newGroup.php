<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KittyJar - Create Group</title>
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
                                              placeholder="Name"/>
                </div>
        </form>

    </div>
    <input name="submit" type="button" class="submit btn btn-success inline" value="Submit">


    <script>
        $(document).ready(function () {


            $('#add').click(function () {
                $('<div class ="MemberRow"><input type="text" class="field name form-control shortTextBox" name="dynamic[]" value="" ' +
                    'placeholder="Name"  />  </div>    ').fadeIn('slow').appendTo('.inputs');

            });


            $('.submit').click(function () {

                var people = [];
                var groupnameBox = document.getElementsByClassName("groupname");


                $.each($('.MemberRow'), function () {
                    console.log(this);
                    var nameBox = this.getElementsByClassName("name");
                    people.push($(nameBox).val());

                });

                console.log(people);

                console.log(JSON.stringify(people));

                $.ajax({
                    url: "registerGroup.php",
//                    data: "people=" + JSON.stringify(
// people),
                    data: {people: JSON.stringify(people), groupname: $(groupnameBox).val()},

                    type: 'post',
                    success: function (data) {
                        //alert(people);
                        window.location.replace("groupHome.php?groupCode=" + data );

                    }
                });


                return false;

            });

        });

    </script>
</div>
</body>


</html>