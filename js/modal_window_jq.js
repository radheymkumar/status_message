/*jQuery(document).ready(function(){
	alert('hello');
})*/

/*(function($) {
	jQuery('.page-title').click(function(){
		alert(jQuery('.page-title').html());
	})
})(jQuery);*/

/*Drupal.behaviors.myStatus = {
	attach : function(context, settings) {
		alert(jQuery('.page-title').html());
	}
}*/

(function ($, Drupal) {
	Drupal.behaviors.myStatusModal ={
		attach : function (context, settings) {
			var modal = $('#modal_window');
	    modal.css('background', drupalSettings.statusMessage.modalWindow.background);	
	    //modal.css('width', drupalSettings.statusMessage.modalWindow.width);	
	    //modal.css('height', drupalSettings.statusMessage.modalWindow.height);
		}
	};
})(jQuery, Drupal);

/*(function ($, Drupal, settings) {

 "use strict";

 Drupal.behaviors.status_message_modal_window = {
   attach: function (context, settings) {
    var modal = $('#modal_window');
    modal.css('background', drupalSettings.statusMessage.modalWindow.background);

})(jQuery, Drupal, drupalSettings);*/