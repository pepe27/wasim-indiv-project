//Dynamic site visitor data
let visitors = [
    {
        month: "Month",
        number: "Number of Site Visitors"
    },{
        month: "Jan",
        number: 111
    },{
        month: "Feb",
        number: 222
    },{
        month: "Mar",
        number: 333
    },{
        month: "Apr",
        number: 444
    },{
        month: "May",
        number: 555
    },{
        month: "June",
        number: 666
    }
    
];

let table = document.querySelectorAll("#siteVisitors")[0];

for (let i=0; i<visitors.length; i++) {
    let tableTr = document.createElement("tr");

    let monthTh = document.createElement("th");
    let numberTh = document.createElement("th");

    monthTh.innerHTML = visitors[i].month;
    numberTh.innerHTML = visitors[i].number;

    table.appendChild(tableTr);
    table.appendChild(monthTh);
    table.appendChild(numberTh);

}
