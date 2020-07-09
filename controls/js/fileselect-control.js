var fileselectItemView = elementor.modules.controls.BaseData.extend({
	
    onReady: function () {

    	var file_input_id = this.$el.find( '.tnc-selected-fle-url' ).attr('id');

    	this.$el.find( '.tnc-select-file' ).click( function() {
	   	  	var tnc_file_uploader = wp.media({
	            title: 'Upload File',
	            button: {
	                text: 'Get Link'
	            },
	            multiple: false
	        })
	        .on('select', function() {
	            var attachment = tnc_file_uploader.state().get('selection').first().toJSON();
	            jQuery( "#" + file_input_id ).val( attachment.url );
	            jQuery( "#" + file_input_id ).trigger( "input" );
	        })
	        .open();
	   	} );
	},
});

elementor.addControlView('file-select', fileselectItemView);