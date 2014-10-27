reloadResults = (event) =>
	$.getJSON '.', (data) ->
		console.log data

makeHash = () ->
	window.location.hash = $ '#emulsifiers'
		.val()

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

for emulsifier of window.location.hash.substr(1).split(',')
	$ '#emulsifiers'
		.tagsinput 'add', window.location.hash.substr(1).split(',')[emulsifier]

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
		makeHash()
	.on 'blur', '.bootstrap-tagsinput > input', (event) ->
		$ '.bootstrap-tagsinput'
			.removeClass 'active'
		makeHash()

$ '#emulsifier-form'
	.submit (event) ->
		event.preventDefault()
		$ '#start-hint'
			.fadeOut 250
		$ '#loading-results'
			.delay 280
			.fadeIn 300
		setTimeout ->
			$ '#loading-results'
				.fadeOut 250
			$ '#results'
				.delay 280
				.fadeIn 300
		, 1800


# Initial run

$ '#loading-results, #results'
	.hide yes
$ '.bootstrap-tagsinput'
		.addClass 'active'