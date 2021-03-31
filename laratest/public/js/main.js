
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;
console.log(today);
document.getElementById("datePicker").value = today;

function ShowHideDiv() {
    var userReport = document.getElementById("inlineRadio1");
    var dvPassport = document.getElementById("userReportDisp");
    dvPassport.style.display = userReport.checked ? "block" : "none";
}