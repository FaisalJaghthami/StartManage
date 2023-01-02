//Display the date on the header of the website
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("date").innerHTML = year + " - " + month + " - " + day;