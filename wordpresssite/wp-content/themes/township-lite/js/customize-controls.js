( function( api ) {

	// Extends our custom "township-lite" section.
	api.sectionConstructor['township-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );