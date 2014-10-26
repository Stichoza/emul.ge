reloadResults = (event) =>
	$.getJSON '.', (data) ->
		console.log data

$ '#emulsifiers'
	.tagsinput
		trimValue: yes
		tagClass: 'label label-primary'
		maxChars: 4
		itemText: (item) ->
			if item.charAt(0) is 'e' or item.charAt(0) is 'E'
				item
			else
				'E' + item

$ '#emulsifiers'
	.tagsinput 'focus'

$ '#emulsifiers'
	.on 'itemAdded itemRemoved', (event) =>
		reloadResults event
		yes

$ document
	.on 'focus', '.bootstrap-tagsinput > input', (event) ->
		$ '.bootstrap-tagsinput'
			.addClass 'active'
	.on 'blur', '.bootstrap-tagsinput > input', (event) ->
		$ '.bootstrap-tagsinput'
			.removeClass 'active'