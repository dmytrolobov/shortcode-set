(function() {
	tinymce.PluginManager.add('wow_shortcodes_button', function( editor, url ) { 
		editor.addButton( 'wow_shortcodes_button', {			 
			type: 'menubutton',
			title: 'Shortcode Set', 
			image: url + '/icon.png',
			menu: [ 				
				{
					text: 'Colomn',
					menu: [ 
						{
							text: 'Two colomns',
							onclick: function() {
								editor.insertContent('[w-row][w-column]<h4>Your content 1</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget orci ac lacus laoreet condimentum eget vel risus. Ut vel dolor sed lorem consectetur volutpat.</p>[/w-column][w-column]<h4>Your content 2<p>Curabitur eget posuere arcu. Morbi egestas tellus lacus, quis rutrum nunc egestas in. Pellentesque gravida ipsum ac ligula malesuada, sed pharetra elit hendrerit.</p></h4>[/w-column][/w-row]');
							}
						},
						{
							text: 'Three w-columns',
							onclick: function() {
								editor.insertContent('[w-row][w-column]<h4>Your content 1</h4><p>Curabitur lacinia mattis euismod. Aenean tristique lorem nisi, ac fringilla tellus accumsan at.</p>[/w-column][w-column]<h4>Your content 2</h4><p>Quisque scelerisque, nisi ultrices fermentum consequat, dui tellus suscipit massa, ultrices hendrerit ligula mi quis erat. In elit lectus, faucibus mattis felis in, pellentesque maximus arcu.</p>[/w-column][w-column]<h4>Your content 3</h4><p>Quisque ac dui eget eros condimentum vulputate. Suspendisse porta mi eget posuere vulputate.</p>[/w-column][/w-row]');
							}
						},
						{
							text: 'Four columns',
							onclick: function() {
								editor.insertContent('[w-row][w-column]<h4>Your content 1</h4><p>Suspendisse eget ligula sit amet neque hendrerit finibus. Phasellus felis sem, aliquam eu odio ac, tempus tincidunt turpis. Proin condimentum lectus non laoreet congue.</p>[/w-column][w-column]<h4>Your content 2</h4><p>Fusce non massa molestie nisl porttitor rhoncus. Donec rhoncus posuere leo ut rutrum. Sed id porttitor dui. </p>[/w-column][w-column]<h4>Your content 3</h4><p>Proin auctor, leo eu placerat convallis, lacus tellus feugiat tortor, quis auctor justo augue at ipsum. Donec in dapibus diam. Nullam nec accumsan eros, eu condimentum tortor. </p>[/w-column][w-column]<h4>Your content 4</h4><p>Cras at lectus id nisl ultricies eleifend consectetur sit amet justo. Fusce velit metus, varius eget hendrerit in, mollis bibendum est.</p>[/w-column][/w-row]');
							}
						},
					]
				},
				
				{
					text: 'Tabs',
					menu: [ 
						{
							text: 'Tab',
							onclick: function() {
								editor.insertContent('[w-tabs][w-tab title=\"Tab One\"]<h3>Here is w-tab one content.</h3><p>Duis turpis nisl, mattis a risus porttitor, laoreet vulputate libero. Fusce quis erat vitae arcu aliquam interdum eget non lectus. Vivamus convallis purus ac enim fringilla, nec luctus ipsum iaculis. Proin nunc augue, ornare ac mollis at, convallis eu diam. Aenean vulputate sit amet massa sit amet ultricies.</p>[/w-tab][w-tab title=\"Tab Two\"]<h3>Here is w-tab two content.</h3><p>Aenean mattis nisi nisl, sed sollicitudin nisi suscipit id. Pellentesque ac varius sem. Proin elementum semper massa eget posuere. Nunc vitae nulla sit amet ante sodales condimentum. Quisque lacinia nec ex vel iaculis. Praesent dignissim urna eu ligula hendrerit, sed dictum lectus scelerisque.</p> [/w-tab][/w-tabs]');
							}
						},
						{
							text: 'Tab left',
							onclick: function() {
								editor.insertContent('[w-tabs style=\"tabs-left\"][w-tab title=\"Tab One\"]<h3>Here is w-tab one content.</h3><p>Duis turpis nisl, mattis a risus porttitor, laoreet vulputate libero. Fusce quis erat vitae arcu aliquam interdum eget non lectus. Vivamus convallis purus ac enim fringilla, nec luctus ipsum iaculis. Proin nunc augue, ornare ac mollis at, convallis eu diam. Aenean vulputate sit amet massa sit amet ultricies.</p>[/w-tab][w-tab title=\"Tab Two\"]<h3>Here is w-tab two content.</h3><p>Aenean mattis nisi nisl, sed sollicitudin nisi suscipit id. Pellentesque ac varius sem. Proin elementum semper massa eget posuere. Nunc vitae nulla sit amet ante sodales condimentum. Quisque lacinia nec ex vel iaculis. Praesent dignissim urna eu ligula hendrerit, sed dictum lectus scelerisque.</p>[/w-tab][/w-tabs]');
							}
						},
						{
							text: 'Tab right',
							onclick: function() {
								editor.insertContent('[w-tabs style=\"tabs-right\"][w-tab title=\"Tab One\"]<h3>Here is w-tab one content.</h3><p>Duis turpis nisl, mattis a risus porttitor, laoreet vulputate libero. Fusce quis erat vitae arcu aliquam interdum eget non lectus. Vivamus convallis purus ac enim fringilla, nec luctus ipsum iaculis. Proin nunc augue, ornare ac mollis at, convallis eu diam. Aenean vulputate sit amet massa sit amet ultricies.</p>[/w-tab][w-tab title=\"Tab Two\"]<h3>Heading Two</h3><p>Aenean mattis nisi nisl, sed sollicitudin nisi suscipit id. Pellentesque ac varius sem. Proin elementum semper massa eget posuere. Nunc vitae nulla sit amet ante sodales condimentum. Quisque lacinia nec ex vel iaculis. Praesent dignissim urna eu ligula hendrerit, sed dictum lectus scelerisque.</p>[/w-tab][/w-tabs]');
							}
						},
					]
				},
				
				{
					text: 'Toggle',
					onclick: function() {
						editor.insertContent('[w-toggle title=\"I\'m Tooggle - click me\"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non aliquet elit. Nam id laoreet diam. Etiam id ornare erat, ac eleifend velit. Vivamus cursus sagittis odio a condimentum. Nullam et libero et massa laoreet blandit. Sed dapibus vestibulum turpis sagittis dapibus. Praesent vitae diam commodo, malesuada est at, eleifend metus. Suspendisse vitae augue lobortis, bibendum mauris at, ullamcorper nibh. Sed semper dignissim urna vestibulum lobortis.[/w-toggle]');
					}
				},		
				
				{
					text: 'Accordion / FAQ',
					onclick: function() {
						editor.insertContent('[w-accordion][accordion_block title=\"Question 1\"]<h3>Answer 1.</h3><p>Proin pharetra in nisi at interdum. Fusce rhoncus lacinia enim, blandit porta diam lacinia a. Proin quis vehicula velit. Sed malesuada ex et arcu feugiat feugiat. Morbi convallis hendrerit metus id maximus.</p>[/accordion_block][accordion_block title=\"Question 2\"]<h3>Answer 2.</h3><p>Aliquam convallis ullamcorper nulla, ac rutrum nulla varius ut. Maecenas gravida nisl sit amet elit accumsan pellentesque. Proin volutpat vestibulum risus, at volutpat nibh interdum vel. Curabitur blandit enim nulla, sit amet tristique nisl rhoncus egestas.</p>[/accordion_block][accordion_block title=\"Question 3\"]<h3>Answer 3.</h3><p>Fusce quis erat vitae arcu aliquam interdum eget non lectus. Vivamus convallis purus ac enim fringilla, nec luctus ipsum iaculis. Proin nunc augue, ornare ac mollis at, convallis eu diam. Aenean vulputate sit amet massa sit amet ultricies.</p>[/accordion_block][/w-accordion]');
					}
				},											
				{
					text: 'Alerts',
					menu: [ 
						{
							text: 'Info',
							onclick: function() {
								editor.insertContent('[w-alert type="info"]Replace this text with your own text.[/w-alert]');
							}
						},
						{
							text: 'Success',
							onclick: function() {
								editor.insertContent('[w-alert type="success"]Replace this text with your own text.[/w-alert]');
							}
						},
						{
							text: 'Warning',
							onclick: function() {
								editor.insertContent('[w-alert type="warning"]Replace this text with your own text.[/w-alert]');
							}
						},
						{
							text: 'Error',
							onclick: function() {
								editor.insertContent('[w-alert type="error"]Replace this text with your own text.[/w-alert]');
							}
						},
					]
				},
				
				{
					text: 'Buttons',
					menu: [ 
						{
							text: 'Type 1',
							onclick: function() {
								editor.insertContent('[w-button type="1"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 2',
							onclick: function() {
								editor.insertContent('[w-button type="2"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 3',
							onclick: function() {
								editor.insertContent('[w-button type="3"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 4',
							onclick: function() {
								editor.insertContent('[w-button type="4"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 5',
							onclick: function() {
								editor.insertContent('[w-button type="5"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 6',
							onclick: function() {
								editor.insertContent('[w-button type="6"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 7',
							onclick: function() {
								editor.insertContent('[w-button type="7"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 8',
							onclick: function() {
								editor.insertContent('[w-button type="8"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 9',
							onclick: function() {
								editor.insertContent('[w-button type="9"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 10',
							onclick: function() {
								editor.insertContent('[w-button type="10"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 11',
							onclick: function() {
								editor.insertContent('[w-button type="11"]Button Text[/w-button]');
							}
						},
						{
							text: 'Type 12',
							onclick: function() {
								editor.insertContent('[w-button type="12"]Button Text[/w-button]');
							}
						},
					]
				},
				
				
				
			]
		});
	});
})();