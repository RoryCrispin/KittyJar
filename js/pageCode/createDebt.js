/**
 * Created by rozz on 26/10/2016.
 */
var payEach;
var box = document.getElementsByName('checkbox');

function checkBoxTest(){
    var textOut = document.getElementById('eachAmount');
    var debtValue = document.getElementById('debtAmount').value;
    var numMembers = 0;
    for(var i = 0; i < totalMembers; i++){
        if(box[i].checked) numMembers++;
    }
    payEach = debtValue / numMembers;
    if(numMembers > 0 && debtValue > 0){
        textOut.textContent = (payEach).toFixed(2);
    } else
        textOut.textContent = '0.00';
}
function selectAllFunction(){
    for(var i = 0; i < totalMembers; i++) box[i].checked = true;
    checkBoxTest();
}

function selectNoneFunction(){
    for(var i = 0; i < totalMembers; i++) box[i].checked = false;
    checkBoxTest();
}

function selectInverseFunction(){
    for(var i = 0; i < totalMembers; i++){
        if(box[i].checked)
            box[i].checked = false;
        else
            box[i].checked = true;
    }

    checkBoxTest();
}

function validateDebtAmount(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[0-9]|\./;
    var numbersKey = /[0-9]/;
    var debtValue = document.getElementById('debtAmount').value;

    if(debtValue.length == 0 && !numbersKey.test(key)) preventKeyPress(theEvent);

    if(debtValue.indexOf('.') > 0 && debtValue.length == (debtValue.indexOf(".") + 3)) preventKeyPress(theEvent);

    if(debtValue.indexOf('.') != -1 && '.'==key) preventKeyPress(theEvent);

    if(!regex.test(key)) preventKeyPress(theEvent);

    checkBoxTest();
}

function preventKeyPress(theEvent) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
}

function confirmDebt(){
    checkBoxTest();

    var names = document.getElementsByName('memberNames');
    var ref = document.getElementById('debtReference').value;
    var tickedNames = "";
    var totalTicked = [];
    var x = 0;
    var userIDs = [];
    for (var i = 0; i < totalMembers ; i++) {
        var box = document.getElementById(names[i].innerHTML + ' checkbox');
        if (box.checked) {
            totalTicked[x] = names[i].innerHTML;
            userIDs[x] = $(box).attr('userID');
            x++;
        }
    }
    for (i = 0; i < totalTicked.length ; i++){
        if(i == totalTicked.length - 1 && i > 0){
            tickedNames = tickedNames + "and " + totalTicked[i];
        } else if (totalTicked.length == 1){
            tickedNames = tickedNames + totalTicked[i];
        } else if (i == totalTicked.length - 2){
            tickedNames = tickedNames + totalTicked[i] + " ";
        } else{
            tickedNames = tickedNames + totalTicked[i] + ", ";
        }
    }
    if(payEach <= 0 || isNaN(payEach)){
        alert("Please enter a debt amount");
    } else if(ref == ""){
        alert("Please enter a reference");
    }else if (tickedNames == 0){
        alert("Please choose who needs to pay");
    } else {
        var confirmTrue = confirm("Are you sure you want " + tickedNames + ' to pay £' + payEach.toFixed(2) + " for " + ref);
        //dName = ref
        //dAmount = payEach
        //ids = userIDs[]
        if(confirmTrue){
            var toPost = {dRef : ref, dAmount : payEach, uID : userIDs};

            $.ajax ({
                url: 'func/handleCreateDebt.php',
                data: {hello: JSON.stringify(toPost)},
                type: 'post',
                success: function(ret){
                    alert(ret); //TODO REDIRECT
                }
            });
        }
    }
}