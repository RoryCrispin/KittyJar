/**
 * Created by rozz on 26/10/2016.
 */
$(document).ready(function () {


    $('#add').click(function () {
        $('<div class ="MemberRow"><input type="text" class="field name form-control shortTextBox" name="dynamic[]" value="" ' +
            'placeholder="Name"  />  </div>    ').fadeIn('slow').appendTo('.inputs');

    });


    function checkUnique(people){
        for(var i = 0; i <= people.length; i++) {
            for(var j = i; j <= people.length; j++) {
                if(i != j && people[i] == people[j]) {
                    return false;
                }
            }
        }
        return true;
    }

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

        if(!checkUnique(people)){
            alert("Names must be unique");
            return;
        }



        $.ajax({
            url: "func/registerGroup.php",
//                    data: "people=" + JSON.stringify(people),
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
