/**
 * Created by rozz on 26/10/2016.
 */
$(document).ready(function() {
    var owedAnim = new CountUp("dashOwed", 0, 105.56, 2, 0.8);
    owedAnim.start();

    var oweAnim = new CountUp("dashOwe", 0, 21.02, 2, 0.8);
    oweAnim.start();
});