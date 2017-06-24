/*Typeahead Init*/

$(function() {
	"use strict";
	
	/*Basic*/
	
	var substringMatcher = function(strs) {
	  return function findMatches(q, cb) {
		var matches, substringRegex;

		// an array that will be populated with substring matches
		matches = [];

		// regex used to determine if a string contains the substring `q`
		var substrRegex = new RegExp(q, 'i');

		// iterate through the pool of strings and for any string that
		// contains the substring `q`, add it to the `matches` array
		$.each(strs, function(i, str) {
		  if (substrRegex.test(str)) {
			matches.push(str);
		  }
		});

		cb(matches);
	  };
	};

	var states = locations;
	var city = citys;
	var sta = state;
	var c = country;
	var zone = zon;
	var within = wit;
	


	$('#the-basics .typeahead').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  source: substringMatcher(states)
	});
	
	/*Bloodhound*/
	
	// constructs the suggestion engine
	var loc = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.whitespace,
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  // `states` is an array of state names defined in "The Basics"
	  local: states
	});

	var city = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.whitespace,
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  // `states` is an array of state names defined in "The Basics"
	  local: city
	});

	var sta = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.whitespace,
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  // `states` is an array of state names defined in "The Basics"
	  local: sta
	});

	var c = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.whitespace,
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  // `states` is an array of state names defined in "The Basics"
	  local: c
	});
    
    var zone = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.whitespace,
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  // `states` is an array of state names defined in "The Basics"
	  local: zone
	});

	var within = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.whitespace,
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  // `states` is an array of state names defined in "The Basics"
	  local: within
	});


	$('#city .typeahead').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  source: city
	});

	$('#zone .typeahead').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  source: zone
	});

	$('#Within .typeahead').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  source: within
	});

	$('#state .typeahead').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  source: sta
	});

	$('#country .typeahead').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  source: c
	});

	$('#bloodhound .typeahead').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  source: loc
	});

	/*Prefetch*/
	var countries = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.whitespace,
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  // url points to a json file that contains an array of country names, see
	  // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
	  prefetch: 'vendors/bower_components/typeahead.js/data/countries.json'
	});

	// passing in `null` for the `options` arguments will result in the default
	// options being used
	$('#prefetch .typeahead').typeahead(null, {
	  name: 'countries',
	  source: countries
	});
	
	/*Default Suggestions*/
	var nflTeams = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('team'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  identify: function(obj) { return obj.team; },
	  prefetch: 'vendors/bower_components/typeahead.js/data/nfl.json'
	});

	function nflTeamsWithDefaults(q, sync) {
	  if (q === '') {
		sync(nflTeams.get('Detroit Lions', 'Green Bay Packers', 'Chicago Bears'));
	  }

	  else {
		nflTeams.search(q, sync);
	  }
	}

	$('#default-suggestions .typeahead').typeahead({
	  minLength: 0,
	  highlight: true
	},
	{
	  name: 'nfl-teams',
	  display: 'team',
	  source: nflTeamsWithDefaults
	});
});