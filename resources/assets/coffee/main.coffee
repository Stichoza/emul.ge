reloadResults  = (event) -> $.getJSON '.', (data) -> console.log data   # 
window.getHash = ()      -> window.location.hash.substr(3)              # get hash without "#!"
window.setHash = (hash)  -> window.location.hash = "!/#{hash}"          # set hash
updateHash     = ()      -> window.setHash $('#emulsifiers').val()      # Update hash with entered data
scrollToObject = (selector) -> $('html,body').animate
	scrollTop: $(selector).offset().top

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

# Save input references to avoid multiple selections
tagsInputInitial = $ '#emulsifiers'
tagsInputFake    = tagsInputInitial.parent().find '.bootstrap-tagsinput input:text' # Must be after tagsinput init

# Add initial data from hash
for emulsifier of window.getHash().split(',')
	tagsInputInitial.tagsinput 'add', window.getHash().split(',')[emulsifier]

# Update hash on tag change
tagsInputInitial
	.on 'beforeItemAdd', (event) ->
		console.log "Received #{event.item}"
		if event.item.charAt(0) == 'e' or event.item.charAt(0) == 'E'
			event.item = event.item.substr(1)  # TODO make this change item
		if /^(E|e)?([\d]{3,4})([a-z])?$/.test event.item
			console.log "Adding #{event.item}"
		else
			tagsInputFake.popover 'show'
			event.cancel = yes # This shit must be event.preventDefault()
			console.log "Rejected #{event.item}"
			console.log tagsInputFake
			_item = event.item
			setTimeout ->
				tagsInputFake.val _item
			, 2
	.on 'itemAdded itemRemoved', (event) =>
		console.log "Added #{event.item}"
		#tagsInputFake.popover 'hide' # Moved to tagsInputFake.keyup
		reloadResults event # TODO maybe just on submit
		updateHash yes

# Hide popover on text enter
tagsInputFake.on 'keypress', (event) ->
	if event.which not in [13, 44] then setTimeout ->
		tagsInputFake.popover 'hide'
	, 50

# Simulate focus/blur on outer container
$ document
	.on 'focus', '.bootstrap-tagsinput > input', (event) ->
		$(@).parent().addClass 'active'
	.on 'blur', '.bootstrap-tagsinput > input', (event) ->
		$(@).parent().removeClass 'active'
		tagsInputFake.popover 'hide'

# From buttons
$('#emulsifier-submit').click (event) -> $('#emulsifier-form').submit()

# Form submit
$ '#emulsifier-form'
	.submit (event) ->
		event.preventDefault()
		tagsInputFake.val('').popover 'hide'
		$ '#start-hint, #results'
			.fadeOut 250
		$ '#loading-results'
			.delay 280
			.fadeIn 300
		scrollToObject @
		setTimeout ->
			$ '#loading-results'
				.fadeOut 250
			$ '#results'
				.delay 280
				.fadeIn 300
		, 1800


#####################
###                ###
####  Initial run  ####
###                ###
#####################

$ '#loading-results, #results'
	.hide yes

tagsInputInitial.tagsinput 'focus'          # Initial focus
tagsInputFake.attr 'tabindex', 1
$('.bootstrap-tagsinput').addClass 'active' # Add active class nitially, a 'focus' event is not triggered above
# Initial focus

tagsInputFake.popover
	placement: 'bottom'
	html: yes
	trigger: 'manual'
	title: 'შეცდომა :('
	content: '<p>ემულგატორები იწერება შემდეგი ფორმატით:
		<code><b class="text-success">E</b><b class="text-danger">AAA</b><b class="text-warning">B</b></code>,
		სადაც AAA არის ემულგატორის ნომერი, ხოლო B შეიძლება იყოს (ან არა) დამატებითი ასო-ნიშანი.</p><p>მაგ.:
		<code><b class="text-success">E</b><b class="text-danger">102</b></code>,
		<code><b class="text-success">E</b><b class="text-danger">1412</b></code>,
		<code><b class="text-success">E</b><b class="text-danger">161</b><b class="text-warning">c</b></code></p>'
