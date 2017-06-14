/**
 * Created by timdlp on 13.06.17.
 */
function initCountdown() {
var austDay = new Date();
austDay = new Date(CURRENT_ED.dateDebut);
$('#defaultCountdown').countdown({until: austDay});
$('#year').text(austDay.getFullYear());
}