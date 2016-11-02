<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/newGroup.css">

    <?php include 'libs.php'; ?>
    <script src="js/pageCode/newGroup.js"></script>


    <meta charset="UTF-8">
    <title>KittyJar - Create Group</title>
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

</div>
</body>


</html>