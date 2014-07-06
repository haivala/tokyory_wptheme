$(document).ready(function(){

	// Create the dropdown base
	$("<select />").appendTo("#access");

	// Create default option "Go to..."
	$("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Menu.."
	}).appendTo("#access select");

	// Populate dropdown with menu items
	$("#access a").each(function() {
	 var el = $(this);
	 $("<option />", {
	     "value"   : el.attr("href"),
	     "text"    : el.text()
	 }).appendTo("nav select");
	});
	$("#access select").width('80%');
	$("nav select").change(function() {
	  window.location = $(this).find("option:selected").val();
	});

});
