/*Kale, Shubham
CS545
Red id 822707841
Assignment #4
Instructor: Cyndi Chie
Fall 2018*/

function getTotal() {
	var attendeesunder5 = parseInt(document.getElementById('tattendees5').value);
	var attendees512 = parseInt(document.getElementById('tattendees12').value);
	var attendees1317 = parseInt(document.getElementById('tattendees17').value);
	var attendees18 = parseInt(document.getElementById('tattendees18').value);
    var total = attendeesunder5+attendees512+attendees1317+attendees18;
    document.getElementById("total").value = total;
}

function checkNames(fname, lname) {
	var first = fname.toLocaleLowerCase().split(' '); 
	var second = lname.toLocaleLowerCase().split(' ');
	for (var i=0; i<first.length; i++) {
		first[i] = first[i].charAt(0).toUpperCase()+ first[i].slice(1)+' ';
	}
	for (var i=0; i<second.length; i++) {
		second[i] = second[i].charAt(0).toUpperCase()+ second[i].slice(1)+' ';
	}
	document.getElementById("fname").innerHTML  = first.toString().replace(/,/g, '');
	document.getElementById("lname").innerHTML  = second.toString().replace(/,/g, '');
}

function getLastModified(){
	var x = document.lastModified;
	document.getElementById("lastmodified").innerHTML =x;

}


