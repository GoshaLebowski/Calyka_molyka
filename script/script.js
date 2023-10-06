let monthSelect = document.getElementById('monthSelect');
let summa = document.getElementById('idtheСostOfOneDay');
let summaHidden = document.getElementById('idtheСostOfOneDayHidden');
let numberOfDays = document.getElementById('idnumberOfDays');

function run() {
    selectVal = monthSelect.value;
    if (selectVal === "1" || selectVal === "2" || selectVal === "12") {
        summa.value = "600";
        summaHidden.value = "600"; 
    } else if (selectVal === "9" || selectVal === "10" || selectVal === "11" || selectVal === "3" || selectVal === "4" || selectVal === "5") {
        summa.value = "400";
        summaHidden.value = "400";
    } else if (selectVal === "6" || selectVal === "7" || selectVal === "8") {
        summa.value = "300";
        summaHidden.value = "300";
    }

    if (selectVal === "1" || selectVal === "3" || selectVal === "5" 
    || selectVal === "7" || selectVal === "8" || selectVal === "10" || selectVal === "12") {
        numberOfDays.value = "31";
    } else if (selectVal === "4" || selectVal === "6" || selectVal === "9" || selectVal === "11") {
        numberOfDays.value = "30";
    } else if (selectVal === "2") {
        numberOfDays.value = "28";
    }
}