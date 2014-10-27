reloadResults  = (event) -> $.getJSON '.', (data) -> console.log data   # 
window.getHash = ()      -> window.location.hash.substr(3)              # get hash without "#!"
window.setHash = (hash)  -> window.location.hash = "!/#{hash}"          # set hash
updateHash     = ()      -> window.setHash $('#emulsifiers').val()      # Update hash with entered data

# Init tagsinput
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

# Add initial data from hash
for emulsifier of window.getHash().split(',')
	$ '#emulsifiers'
		.tagsinput 'add', window.getHash().split(',')[emulsifier]

# Initial focus
$ '#emulsifiers'
	.tagsinput 'focus'

# Update hash on tag change
$ '#emulsifiers'
	.on 'itemAdded itemRemoved', (event) =>
		reloadResults event # TODO: maybe just on submit
		updateHash yes

# Simulate focus/blur on outer container
$ document
	.on 'focus', '.bootstrap-tagsinput > input', (event) ->
		$ '.bootstrap-tagsinput'
			.addClass 'active'
	.on 'blur', '.bootstrap-tagsinput > input', (event) ->
		$ '.bootstrap-tagsinput'
			.removeClass 'active'

# Form submit
$ '#emulsifier-form'
	.submit (event) ->
		event.preventDefault()
		$ '#start-hint, #results'
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


### Initial run ###

$ '#loading-results, #results'
	.hide yes

$ '.bootstrap-tagsinput'
		.addClass 'active'
