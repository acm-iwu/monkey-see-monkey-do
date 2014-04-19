//Matt and Jeremey Front End Database JavaScript

//retrieve database
//changes values on click
$("#left_ear button, #right_ear button").click(function( event ) {
	if ($(this).text()== "0") {
	  $(this).text("1");
	}
	else{
	  $(this).text("0");
	}
	event.preventDefault();
});

$("#male").click(function( event ) {
	$("#female, #unavailable").removeClass("active");
	$(this).addClass("active");
	event.preventDefault();
});
$("#female").click(function( event ) {
	$("#male, #unavailable").removeClass("active");
	$(this).addClass("active");
	event.preventDefault();
});
$("#unavailable").click(function( event ) {
	$("#male, #female").removeClass("active");
	$(this).addClass("active");
	event.preventDefault();
});

$("#left_ear button").click(function( event ) {
	$("#know").removeClass("active");
});
$("#right_ear button").click(function( event ) {
	$("#know1").removeClass("active");
});
$("#know button").click(function( event ) {
	$("#left_ear button").removeClass("active");
	$("#left_ear button").text("0");
});
$("#know1 button").click(function( event ) {
	$("#right_ear button").removeClass("active");
	$("#right_ear button").text("0");
});



//JSON string parsing
var monkeys;
$.getJSON("get_database.php", function(data) { 
	monkeys = data;
	build_table()
})

var rows = {};
function build_table(){
	for(var i = 0; i < monkeys.length; i++){
		rows[i] = $('<tr><td>' + monkeys[i].id + '</td><td>' + monkeys[i].sex + '</td><td>'+ monkeys[i].birthYear +'</td><td>' + monkeys[i].leftEar + '</td><td>' + monkeys[i].rightEar + '</td><td>' + monkeys[i].notes + '</td></tr>');
		$('#table1 tbody').append(rows[i]);
	}
}

$("#form1 button").click(update_table);

$("#form1 input").change(update_table);

function update_table() {
	var left_ear = $("#left_ear1").text() + $("#left_ear2").text() + $("#left_ear3").text();
	var right_ear = $("#right_ear1").text() + $("#right_ear2").text() + $("#right_ear3").text();
	var gender = $("#gender .active").text(); 
	for(var i = 0; i < monkeys.length; i++){
		var matches  = true;
		
		if(!($("#know").hasClass('active')) && monkeys[i].leftEar != left_ear){
			matches = false;
		}
		else if(!($("#know1").hasClass('active')) && monkeys[i].rightEar != right_ear){
			matches = false;
		}
		else if(gender != 'Unavailable' && monkeys[i].sex != gender){
			matches = false;
		}
		
		if(matches){
			rows[i].appendTo("#table1 tbody");
		}
		else{
			rows[i].remove();
		}
	}
}


