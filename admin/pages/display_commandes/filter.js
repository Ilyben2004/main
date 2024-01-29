var divsCard = document.querySelectorAll('div.card');
var trs = Array.from(document.querySelectorAll('table tr')).slice(1);
function filterTable(divStatus) {
  trs.forEach(function(tr) {
    var trStatus = tr.getAttribute('status');
  trStatus = trStatus ? trStatus.trim() : '';
console.log(trStatus);
    console.log(divStatus);
    tr.style.display = (trStatus === divStatus) ? 'table-row' : 'none'; // Replace 'block' with 'table-row' or your desired value
  });
}
divsCard.forEach(function(div) {
  div.addEventListener('click', function() {
    var divStatus = div.getAttribute('status');
    filterTable(divStatus);});});
