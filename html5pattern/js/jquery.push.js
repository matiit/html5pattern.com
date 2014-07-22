/**
 * Javascript Framework by dipser (2012)
 *
 * URL: History/Routing
 * DB: Datastore / Fixtures
 * JS: Controller, States
 * GUI: Layout, CSS, Bindings
 * 
 * tplCache = {  }
 * store = { 'var1' : ['#x', 'a@href', '{{/app data.text}}', function(var1){return $('#x').html();}], ... } // Wenn var1 verändert wird, wird #x und #y 
 */

(function( $ ){

	$.fn.jqplugin = function( options ) {
		
		// First loading of page
		var firstload = true;
		var lasturl = {'absolute':'', 'relative':'', 'path':'', 'query':'', 'hash':''};
		
		// Create some defaults, extending them with any options that were provided
		var settings = $.extend( {
			"log" : false,
			"rewrites" : {
				// Example
				//"/start" : "/Start",
				//"/u" : "/User"
			},
			"base" : '',
			"requrl" : "/req.php",
			"load" : function(self, url, state, data) {
				//log('First load');
			},
			"title" : function(state, title, url) {$('title').html(title);},
			"popstateStart" : function(self, state, title, url) {},
			"popstateEnd" : function(self, state, title, url) {},
			"apps" : { // special apps for a url
				//"/" : function(self, url, state, data){ log('App läuft für: /'); }
			},
			"events" : { // some var changes => call function(var)
			},
			"bindings" : [ // Text, HTML, ATTR, CSS, TPLT, LIST, JSON, AJAX, VAR, FUNC
				{
					"$" : ".body",
					"f" : function() {console.log('x');},
					"t" : 'o', // null store.info
					"s" : {'border':'1px solid red'}
				}
			],
			"store" : { // DBDATA &= FIXTURES
				"info" : "Dies ist die 1. Info"
			}
		}, options);
		
		
		

				
				
		
		
		// log := console.log
		var log = function(d) { if(settings.log) { console.log(d); } };
		
		
		function request(obj, callback) {
			$.ajax({
				type: 'post',
				url: settings.base + settings.requrl,
				data: obj,
				dataType:"json",
				success: function(data){ 
					if(callback) callback(data);
					//error(data);
					//melden(data);
					//content(data);
				}
			});
		}
		
		
		// URL umschreiben (=mod_rewrite) [ Unterstrich = Leerzeichen ]
		var Rewrite = {
			"set" : function(obj){ $.each(obj, function(index, value) { settings.rewrites[index] = value; }); },
			"get" : function(url){ return settings.rewrites[url] || url; }
		};
		
		var Helpers = {
			"removeEndingSlash" : function(str) {
				//var str="/test/";
				return str.substr(-1)=="/" ? str.slice(0,-1) : str;
			},
			"getQueryString" : function(str) {
				var result = {}, queryString = str,
				re = /([^&=]+)=([^&]*)/g, m;
				while (m = re.exec(queryString)) {
					result[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
				}
				return result;
			},
			"rand" : function(l,u) { // lower bound and upper bound
				return Math.floor((Math.random() * (u-l+1))+l);
			}
		};
		

		// Event: popstate
		$(window).on('popstate', function(e) {
			//log('popstate fired! => State: '+ e.state);
			
			// Disqus was triggering popstate: STOP IT!
			/*var res = $(this).parents().map(function () {
                if(this.id=='disqus_container' || this.id=='dsq-popup-message' || this.class=='dsq-tooltip-outer dsq-tooltip-small') {return 'true';} else {return '';}
            }).get().join('');
            if(res=='true') return;*/
            

			
			
			// URL
			var HrES = Helpers.removeEndingSlash;
			var url = {
				"absolute" : HrES( document.location.href ),
				"relative" : HrES( document.location.href.split(document.location.host)[1] )
			 };
				url.path = url.relative.split('?')[0].split('#')[0];
				if(settings.base != '') url.path = url.path.split(settings.base)[1];
				url.path = HrES( url.path );
				if(url.path=='') url.path = '/';
				url.query = (url.relative.indexOf('?')!=-1) ? url.relative.split('?')[1].split('#')[0] : null; // document.location.search.substring(1)
				url.q = Helpers.getQueryString(url.query); // As Array
				url.hash = url.relative.split('#')[1] || null;
				
			//log(url);
			
            // Stop Hashes to pop !!!!!!!!
            if(url.relative.split('#').length > 1 && !firstload) {
                e.preventDefault();
                return;
            }
            
            lasturl = url;
			
			
			// Rewrite Path-URL
			url.path = decodeURIComponent(url.path);
			var urlR = Rewrite.get(url.path);
			
			// Generate Title from Path-URL
			var titleR = urlR.split('/');
				titleR = titleR[titleR.length-1];
			settings.title(e.state, titleR, urlR);
			
			
			
			
			// Hide all Path-URL "div"s
			$("div.body").css({"display":"none"});
			// Add non existing Path-URL "div"
			if( $('div.body[data-url="'+urlR+'"]').length==0 ) {
				$('#main').append('<div class="body" data-url="'+urlR+'" style="display:none;"></div>');
			}
			// Define Path-URL App-Function
			var pathUrlAppFunc = (urlR in settings.apps) ? settings.apps[urlR] : null;
			var div = $('div.body[data-url="'+urlR+'"]');
			// Popstate
			settings.popstateStart(div, e.state, titleR, urlR);
			// Request if not static
			if( div.data('static')!=true ) {
				request({"url":url}, 
					function(data) {
						if(firstload==true) settings.load(div, url, e.state, data); firstload = false;
						if(pathUrlAppFunc) pathUrlAppFunc(div, url, e.state, data);
					}
				);
			} else {
				if(firstload==true) settings.load(div, url, e.state, null); firstload = false;
				if(pathUrlAppFunc) pathUrlAppFunc(div, url, e.state, null);
			}

			// Show Path-URL "div"
			div.css({"display":"block"});
			
			
			
			
			//updateContent(event.state);
			
			
			
			
			// Popstate
			settings.popstateEnd(div, e.state, titleR, urlR);
			
		});
		$(window).trigger('popstate');
		
		// Links
		// <a class="nostate">...</a> = No State = No prevent default
		$(document).on('click', 'a[href]:not([class="nopush"]), #disqus_container *', function(e) {
		//$('a[href]').not('[class="nopush"]').on('click', function(e){
			
            // Disqus was triggering popstate: STOP IT!
			/*var res = $(this).parents().map(function () {
                if(this.id=='disqus_container' || this.id=='dsq-popup-message' || this.class=='dsq-tooltip-outer dsq-tooltip-small') {return 'true';} else {return '';}
            }).get().join('');
            if(res=='true') return;*/
			
			
			history.pushState({x:1}, null, $(this).attr('href')); // scrollstate:?
			$(window).trigger('popstate');
			
			e.preventDefault();
		});
		
		
		return this;

	};
	
})( jQuery );





(function($) {

	// :contains with Regexp
	$.expr[':'].regexcontains = function(obj, index, meta, stack){
		return (obj.textContent || obj.innerText || jQuery(obj).text() || '').search(new RegExp(meta[3], "ig")) >= 0;
	}; 

	
    $.fn.getAttributes = function() {
        var attributes = {}; 

        if(!this.length)
            return this;

        $.each(this[0].attributes, function(index, attr) {
            attributes[attr.name] = attr.value;
        }); 

        return attributes;
    }
    
})(jQuery);

