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
	.on 'beforeItemAdd', (event) ->
		console.log "Received #{event.item}"
		if event.item.charAt(0) == 'e' or event.item.charAt(0) == 'E'
			event.item = event.item.substr(1)  # TODO make this change item
		if /^(E|e)?([\d]{3,4})([a-z])?$/.test event.item
			console.log "Adding #{event.item}"
		else
			event.cancel = yes
			console.log "Rejected #{event.item}"
			_item = event.item
			setTimeout =>
				$(@).parent().find('.bootstrap-tagsinput input').val _item
			, 2
	.on 'itemAdded itemRemoved', (event) =>
		console.log "Added #{event.item}"
		reloadResults event # TODO maybe just on submit
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
