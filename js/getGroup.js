/**
 * Created by rozz on 26/10/2016.
 */

function js_getGroup(doThrowError){
    var cookieGet = Cookies.get('groupCode');
    var urlGet = get('groupCode');

    if (urlGet !=undefined)
    {
        console.log("found grpcode from url");
        setGroupCookie(urlGet);
        return urlGet;
    }
    else if (cookieGet != undefined)
    {
        console.log("Found grpcode from cookie");
        return cookieGet;
    }
    else
    {
        if(doThrowError){
            groupCodeError();
            return null;
        }
        else return null;
    }
}

function js_getGroup(){
    getGroup(false);
}


function get(name){ // from  http://stackoverflow.com/questions/831030/how-to-get-get-request-parameters-in-javascript
    if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]);
}

function js_groupCodeError(){
    //TODO js handle error
}