/**
 * Created by rozz on 26/10/2016.
 */
function setGroupCookie(groupCode){
    PHPCookies.set('groupCode', groupCode);
}

function setUserCookie(id, pin){
    PHPCookies.set('userID', id);
    PHPCookies.set('userPin', pin);
}

var PHPCookies = Cookies.withConverter({
    write: function (value) {
        // Encode all characters according to the "encodeURIComponent" spec
        return encodeURIComponent(value)
        // Revert the characters that are unnecessarly encoded but are
        // allowed in a cookie value, except for the plus sign (%2B)
            .replace(/%(23|24|26|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
    },
    read: function (value) {
        return value
        // Decode the plus sign to spaces first, otherwise "legit" encoded pluses
        // will be replaced incorrectly
            .replace(/\+/g, ' ')
            // Decode all characters according to the "encodeURIComponent" spec
            .replace(/(%[0-9A-Z]{2})+/g, decodeURIComponent);
    }
});
