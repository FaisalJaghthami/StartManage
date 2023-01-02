// setup block 
const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];

//Spending chart
var January = document.getElementById("January").value;
var February = document.getElementById("February").value;
var March = document.getElementById("March").value;
var April = document.getElementById("April").value;

var May = document.getElementById("May").value;
var June = document.getElementById("June").value;
var July = document.getElementById("July").value;
var August = document.getElementById("August").value;

var September = document.getElementById("September").value;
var October = document.getElementById("October").value;
var November = document.getElementById("November").value;
var December = document.getElementById("December").value;
const data = {
    labels: labels,
    datasets: [{
        label: 'Spending',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [January, February, March, April, May, June, July, August, September, October, November, December],
    }]
};
//config block 
const config = {
    type: 'bar',
    data: data,
    options: {}
};
//render block
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);


//Earnings chart
var January1 = document.getElementById("January1").value;
var February1 = document.getElementById("February1").value;
var March1 = document.getElementById("March1").value;
var April1 = document.getElementById("April1").value;

var May1 = document.getElementById("May1").value;
var June1 = document.getElementById("June1").value;
var July1 = document.getElementById("July1").value;
var August1 = document.getElementById("August1").value;

var September1 = document.getElementById("September1").value;
var October1 = document.getElementById("October1").value;
var November1 = document.getElementById("November1").value;
var December1 = document.getElementById("December1").value;
const data1 = {
    labels: labels,
    datasets: [{
    label: 'Earnings',
    backgroundColor: 'green',
    borderColor: 'green',
    data: [January1, February1, March1, April1, May1, June1, July1, August1, September1, October1, November1, December1],
    }]
};

const config1 = {
    type: 'bar',
    data: data1,
    options: {}
};

const myChart1 = new Chart(
    document.getElementById('myChart1'),
    config1
);