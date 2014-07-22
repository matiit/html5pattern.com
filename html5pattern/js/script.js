// usage: log('inside coolFunc',this,arguments);
// http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console){
    console.log( Array.prototype.slice.call(arguments) );
  }
};


// Browser detection
navigator.sayswho = (function(){
  var N= navigator.appName, ua= navigator.userAgent, tem;
  var M= ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
  if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];
  M= M? [M[1], M[2]]: [N, navigator.appVersion,'-?'];
  return M;
})();
 

$(document).ready(function(){



	
	$(window).jqplugin({
		"log" : true,
		"base" : '',
		"requrl" : "/html5pattern/php/req.php",
		"rewrites" : {"/test":"/Test", "/start":"/Start", "/home":"/Home"},
		//"load" : function(self, url, state, data) { log("Own first load."); },
		"popstateStart" : function(self, state, title, url) {
			self.css('opacity', 0)
				.animate({opacity: 1}, 1000);
		},
		"apps" : { // special apps for a url
		  "/" : function(self, url, state, data){
				
				// Templating
				var markup = {};
				markup.start = function() {
				    html = $('#pretext', self).html()
				        .split('{browsername}').join(this.browsername)
				        .split('{browserversion}').join(this.browserversion)
				        .split('{patternsupport}').join(Modernizr.input.pattern ? '' : 'not');
				    return html;
				};
				var tpldata = {
				    "browsername" : navigator.sayswho[0],
				    "browserversion" : navigator.sayswho[1],
				    "patternsupport" : Modernizr.input.pattern
				};
				$('#pretext', self).html(markup.start.apply(tpldata));
			},
			"/Names" : function(self, url, state, data){
				markup = '<h1>Names</h1>';
				markup += pattern_markup(data.pattern, 'names');
				self.html(markup);
			},
			"/Passwords" : function(self, url, state, data){
				markup = '<h1>Passwords</h1>';
				markup += pattern_markup(data.pattern, 'passwords');
				self.html(markup);
			},
			"/Cards" : function(self, url, state, data){
				markup = '<h1>Cards</h1>';
				markup += pattern_markup(data.pattern, 'cards');
				self.html(markup);
			},
			"/Postal_Codes" : function(self, url, state, data){
				markup = '<h1>Postal Codes</h1>';
				markup += pattern_markup(data.pattern, 'postalcodes');
				self.html(markup);
			},
			"/Dates" : function(self, url, state, data){
				markup = '<h1>Dates</h1>';
				markup += pattern_markup(data.pattern, 'dates');
				self.html(markup);
			},
			"/Phones" : function(self, url, state, data){
				markup = '<h1>Phones</h1>';
				markup += pattern_markup(data.pattern, 'phones');
				self.html(markup);
			},
			"/Emails" : function(self, url, state, data){
				//markup = '<h1>Emails</h1>';
				//markup += pattern_markup(data.pattern, 'emails');
				//self.html(markup);
			},
			"/Colors" : function(self, url, state, data){
				markup = '<h1>Colors</h1>';
				markup += pattern_markup(data.pattern, 'colors');
				self.html(markup);
			},
			"/Miscs" : function(self, url, state, data){
				markup = '<h1>Miscs</h1>';
				markup += pattern_markup(data.pattern, 'miscs');
				self.html(markup);
			},
			
			"/test" : function(self, url, state, data){ self.html('TEXT');  log('App läuft für: /test'); },
			"/test/app" : function(self, url, state, data){
				log('App läuft für: /test/app');
				log(data);
				// Templating
				var markup = {};
				markup.user = function() {
					html = '<dl>\
					<dt>'+this.name+'</dt>\
					<dd>'+this.about+'</dd>\
					</dl>';
					for(i=0;i<this.arr.length; i++){html+=this.arr[i]+', ';}
					return html;
				};
				var data = {"name":'<a href="/test/dipser">dipser</a>', "about":"Schreibt man klein.", "arr":[1,2,3,4,5]};
				self.html(markup.user.apply(data));
			},
		}
	});





$(document).on('click', '.case', function(e) {
    var datalistId = $(this).parent().attr('id');
    var inputId = $('input[list='+datalistId+']').attr('id');
    $('#'+inputId).val($(this).val());
});

$(document).on('keypress', '#n, #p, #s', function(e){
    return e.which != 13; 
});

$(document).on('keypress', '.case', function(e){
    if(e.altKey && e.which == 13) { // Insert on Alt+Enter
        $(this).after('<option class="'+$(this).attr('class')+'" contentEditable></option>').next().focus(); // .prev()
    }
    if(e.altKey && (e.keyCode == 8 || e.keyCode == 46)) { // Delete on Alt+Backspace or Alt+Entf
        if($(this).prev().length > 0) { $(this).prev().focus(); } else { $(this).next().focus(); }
        // if not last element, then remove
        var testClass = ($(this).hasClass('postest')) ? 'postest' : 'negtest';
        var optionsLeft = $('datalist#pattern_new_datalist > .'+testClass).length;
        if(optionsLeft > 1) {
            $(this).remove();
        }
    }
    return e.which != 13; 
});

$(document).on('load click blur change keydown keyup', '#p', function () {
    $('#pattern_new').attr('pattern', $(this).text());
});

$(document).on('load click blur change keydown keyup', '#n, #p, #d, #s, .case', function () {
    var href = ''
        + 'n=' + encodeURIComponent($('#n').text()) // Name
        + '&p='+ encodeURIComponent($('#p').text()) // Author
        + '&d='+ encodeURIComponent($('#d').html()) // Description
        + '&s='+ encodeURIComponent($('#s').text()); // Source
        var i = 0;
        $('datalist#pattern_new_datalist > .postest').each(function(){
            href += '&pc['+ i++ +']=' + encodeURIComponent($(this).val()); // Cases: positive
        });
        i = 0;
        $('datalist#pattern_new_datalist > .negtest').each(function(){
            href += '&nc['+ i++ +']=' + encodeURIComponent($(this).val()); // Cases: negative
        });
    window.location.hash = href;
});


	
});
$(window).on('load', function () {
    var hashes = getHashParams();//console.log(hashes);
    
    $('#n').text(hashes['n']);
    $('#p').text(hashes['p']);
    $('#d').html(hashes['d']);
    $('#s').text(hashes['s']);
    
    $('datalist#pattern_new_datalist').empty();
    var i = 0;
    while(hashes['pc['+i+']']) {
        $('datalist#pattern_new_datalist').append('<option class="case postest" contentEditable>'+ hashes['pc['+i+']'] +'</option>');
        i++;
    }
    if(i==0) $('datalist#pattern_new_datalist').append('<option class="case postest" contentEditable>+</option>');
    i = 0;
    while(hashes['nc['+i+']']) {
        $('datalist#pattern_new_datalist').append('<option class="case negtest" contentEditable>'+ hashes['nc['+i+']'] +'</option>');
        i++;
    }
    if(i==0) $('datalist#pattern_new_datalist').append('<option class="case negtest" contentEditable>-</option>');
}).trigger('load');

/* Pattern markup for the list */
function pattern_markup(pattern, category) {
    var markup = '';
	for(var i = 0; i < pattern.length; i++) {
	    var pat = pattern[i];
	    pat['name'] = pat[0];
	    pat['description'] = pat[1];
	    pat['pattern'] = pat[2];
	    pat['postests'] = pat[3];
	    pat['negtests'] = pat[4];
	    pat['source'] = pat[5];
		markup += '\
		    <div class="patterngate">\
		      <div class="leftside">\
		        <h2><label for="'+category+'_pattern'+i+'">'+pattern[i]["name"]+'<label></h2>\
		        <pre>'+pat["pattern"]+'</pre>\
		        <div>'+pat["description"] +'</div>\
		      </div>\
		      <div class="rightside">\
	            <form onsubmit="alert(\'Submitted.\');return false;">\
		          <input type="text" required="" pattern="'+ pattern[i]["pattern"] +'" value="" name="'+category+'_pattern'+i+'" id="'+category+'_pattern'+i+'" list="'+category+'_pattern'+i+'_datalist" placeholder="Try it out." />\
		          <input type="submit" value="&raquo;" />\
		          <datalist id="'+category+'_pattern'+i+'_datalist">';
		            for(var x = 0; x < pattern[i]["postests"].length; x++) {
		              markup += '<option value="'+ pattern[i]["postests"][x] +'" class="case postest">'+ pattern[i]["postests"][x] +'</option>'; // ✓
		            }
		            for(var x = 0; x < pattern[i]["negtests"].length; x++) {
		              markup += '<option value="'+ pattern[i]["negtests"][x] +'" class="case negtest">'+ pattern[i]["negtests"][x] +'</option>';
		            }
		markup += '\
		          </datalist>\
		        </form>\
		      </div>\
		      <br style="clear:both;" />\
		      <div class="by">by '+pattern[i]["source"]+'</div>\
	        </div>';
	}
	return markup;
}





/**
 * Pattern-Tester
 **********************
 * http://jsfiddle.net/dipser/fmvyr/28/
 *
 * [X] onChange => set pattern
 * [X] Create a link of the pattern
 * [X] Parse hash
 * [ ] Create a false and true list of strings
 * [ ] Display a table of the false/true strings
 * [ ] Fallbacks for older Browsers?
 *
 */
/*$('#t, #a, #d, #ta, #p').bind('click blur change keydown keyup', function () {
    var href = '#'
        + 't=' + escape($('#t').val()) // Title
        + '&a='+ escape($('#a').val()) // Author
        + '&d='+ escape($('#d').val()) // Description
        + '&ta='+ escape($('#ta').val()) // Title-Attribute
        + '&p=' + escape($('#p').val()); // Pattern

    $('#ar').attr({'href': href, 'title': 'Patternlink: '+href});
    $('#ar').text($('#p').val());
    $('#r').attr({'pattern': $('#p').val()});
    $('#r').attr({'title': $('#ta').val()});
    
    window.location = href;
    
});

$('#f').bind('submit', function () {
    alert('Submitted.');
    return false;
});


$(window).bind('load', function () {
    var hashes = getHashParams();
    
    $('#t').val(hashes['t']);
    $('#a').val(hashes['a']);
    $('#d').val(hashes['d']);
    $('#ta').val(hashes['ta']);
    $('#p').val(hashes['p']);

});
*/

function getHashParams() {

    var hashParams = {};
    var e,
        a = /\+/g,  // Regex for replacing addition symbol with a space
        r = /([^&;=]+)=?([^&;]*)/g,
        du = function (s) { return decodeURIComponent(s.replace(a, " ")); },
        q = window.location.hash.substring(1);

    while (e = r.exec(q))
       hashParams[du(e[1])] = du(e[2]);

    return hashParams;
}

