/* VIRTUAL KEYBOARD DEMO - https://github.com/Mottie/Keyboard */
$(function() {

  $('.keyboard').keyboard({
      // set this to ISO 639-1 language code to override language set by
      // the layout: http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
      // language defaults to ["en"] if not found
      rtl: false,

      // *** choose layout & positioning ***
      // choose from 'qwerty', 'alpha',
      // 'international', 'dvorak', 'num' or
      // 'custom' (to use the customLayout below)
      layout: 'russian-qwerty',
      // Used by jQuery UI position utility
      position: {
        // null = attach to input/textarea;
        // use $(sel) to attach elsewhere
        of: null,
        my: 'center top',
        at: 'center top',
        // used when "usePreview" is false
        at2: 'center bottom'
      },

      css: {
        // input & preview
        input: 'box',
		//input: 'input-sm',
        // keyboard container
        container: 'center-block dropdown-menu', // jumbotron
        // default state
        buttonDefault: 'btn btn-default',
        // hovered button
        buttonHover: 'btn-primary',
        // Action keys (e.g. Accept, Cancel, Tab, etc);
        // this replaces "actionClass" option
        buttonAction: 'active',
        // used when disabling the decimal button {dec}
        // when a decimal exists in the input area
        buttonDisabled: 'disabled',
    },
	
	usePreview: false,
	autoAccept: true,
    tabNavigation: true,
    enterNavigation: true,
	maxLength: 1
 })

});
