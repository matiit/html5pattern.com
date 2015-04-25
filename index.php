<?php include 'html5pattern/php/functions.php'; ?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>HTML5Pattern</title>
    <base href="http://html5pattern.com/" />
    <link rel="stylesheet" type="text/css" href="html5pattern/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="html5pattern/css/style.css" />
  </head>
  <body>
    <div id="screen">
    
      <header class="sticky1" style="position:fixed;">
        <div style="padding-bottom: 25px;padding-top:40px;background:url(html5pattern/img/html5pattern-logo.png) no-repeat -10px 17px;background-size:65px;">
          <a href="./" style="display:block;font-size:2.25em;font-weight:200;letter-spacing:0.05em;text-transform:uppercase;background-color:rgba(200, 200, 200, 0);text-align:right;">Pattern</a>
        </div>
        <menu class="sticky2a">
          <ul>
            <li><hr class="separator" /></li>
            <li><a href="./">Start</a></li>
            <li><hr class="separator" /></li>
            <li><a href="./Names">Names</a></li>
            <li><a href="./Passwords">Passwords</a></li>
            <li><a href="./Cards">Cards</a></li>
            <li><a href="./Postal_Codes">Postal Codes</a></li>
            <li><a href="./Dates">Dates</a></li>
            <li><a href="./Phones">Phones</a></li>
            <li><a href="./Emails">Emails</a></li>
            <li><a href="./Colors">Colors</a></li>
            <li><a href="./Miscs">Miscs</a></li>
            <li><hr class="separator" /></li>
            <li><a href="./Make_Your_Own">Make Your Own!</a></li>
          </ul>
          <ul class="bottom">
            <li><a href="./Impress">Impress</a></li>
          </ul>
        </menu>
      </header>
      
      
      <div id="main">
        <div class="body" data-url="/" data-type="html">
          <div id="pretext">
          <h1>Welcome…</h1>
          <p>HTML5Pattern is a source of regularly used <a href="http://www.whatwg.org/specs/web-apps/current-work/multipage/common-input-element-attributes.html#the-pattern-attribute">Input-Patterns</a>. If you know a new or a better pattern, then please leave a comment. Thank you!</p>
          <p><strong>Pattern Support</strong> Firefox 4+ &amp; Chrome 10+ &amp; Opera 9.6+ &amp; IE 10+ <a href="http://caniuse.com/#feat=input-pattern" title="More about support...">...</a></p>
          <p>Your Browser {browsername} {browserversion} does {patternsupport} support Input-Patterns.</p>
          
          <br /><br /><br /><br />
          </div>
          
          <div id="disqus_container">
          <div id="disqus_thread"></div>
          <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'html5pattern'; // required: replace example with your forum shortname
            //The following are highly recommended additional parameters. Remove the slashes in front to use.
            var disqus_identifier = 'html5pattern-frontpage';
            var disqus_url = 'http://html5pattern.com';
            var disqus_developer = 0;
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
              var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
              dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          <a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
          </div>
        </div>
        <div class="body" data-url="/Names" data-type="html"><h1>...</h1></div>
        <div class="body" data-url="/Passwords" data-type="html"><h1>...</h1></div>
        <div class="body" data-url="/Cards" data-type="html"><h1>…</h1></div>
        <div class="body" data-url="/Postal_Codes" data-type="html"><h1>…</h1></div>
        <div class="body" data-url="/Dates" data-type="html"><h1>...</h1></div>
        <div class="body" data-url="/Phones" data-type="html"><h1>…</h1></div>
        <div class="body" data-url="/Emails" data-type="html" data-static="true">
          <h1>Emails</h1>
          <p>Please do not use a pattern for email validation. Every regular expression for email validation is missing something. Lots of people gone through a process with the conclusion, that it is nearly impossible to get a perfect validation. The good part about is, we can leave this to our browser developers. They got it quite right and we should use their standard for email validation now.</p>
          <pre>&lt;input type="<span style="color:#e44d26;">email</span>" name="" value="" required /&gt;</pre>
        </div>
        <div class="body" data-url="/Colors" data-type="html"><h1>…</h1></div>
        <div class="body" data-url="/Miscs" data-type="html"><h1>...</h1></div>
        <div class="body" data-url="/Make_Your_Own" data-type="html" data-static="true">
          <h1>Make Your Own!</h1>
          
		    <div class="patterngate">
		      <div class="leftside">
		        <h2 id="n" contentEditable>Name…</h2>
		        <pre id="p" contentEditable>Pattern…</pre>
		        <div id="d" contentEditable>Description…</div>
		      </div>
		      <div class="rightside">
	            <form onsubmit="alert(\'Submitted.\');return false;">
		          <input type="text" required="" pattern="" value="" name="pattern_new" id="pattern_new" placeholder="Try it out." list="pattern_new_datalist" />
		          <input type="submit" value="&raquo;" />
		          <datalist id="pattern_new_datalist">
		              <option class="case postest" contentEditable>Positive Case…</option>
		              <option class="case negtest" contentEditable>Negative Case...</option>
		          </datalist>
		          
		        </form>
		      </div>
		      <br style="clear:both;" />
		      <div class="by">by <span id="s" contentEditable>Source…</span></div>
	        </div>
	      
	      <br />
	      <p>You can directly edit the above text, by clicking on it.</p>
	      <p>To add a new case, you have to press Alt+Enter. For removing a case just press Alt+Backspace or Alt+Delete.</p>
	      <p>You can save or send the pattern by just copying the link.</p>
	      <p>Have fun!</p>
	        
        </div>
        <div class="body" data-url="/Impress" data-type="html" data-static="true">
          <h1>Impress</h1>
          <p>
            Aurelian Hermand<br />
            Graf-Johann-Str. 34<br />
            26723 Emden<br />
            Germany
          </p>
          <p>
            Fon: +49 (0)151-15433354<br />
            Fax: 01805-006534-1333
          </p>
          <p>
            <?php echo encode_email('mail@html5pattern.com', 'mail@html5pattern.com', ''); ?><br />
            <a href="http://www.html5pattern.com">www.html5pattern.com</a>
          </p>
        </div>
        <div class="body" data-url="/test/app">App</div>
      </div>
    

    
    </div>
    <script src="html5pattern/js/jquery-1.8.1.min.js"></script>
    <script src="html5pattern/js/modernizr-inputattributes.js"></script>
    <script src="html5pattern/js/jquery.push.js"></script>
    <script src="html5pattern/js/script.js"></script>
    
    <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet change the UA-XXXXX-X to be your site's ID -->
    <script>
    var _gaq = [['_setAccount', 'UA-20323665-1'], ['_trackPageview']];
    (function(d, t) {
      var g = d.createElement(t),
          s = d.getElementsByTagName(t)[0];
      g.async = true;
      g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g, s);
    })(document, 'script');
    </script>
    
  </body>
</html>