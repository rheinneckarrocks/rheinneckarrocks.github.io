<h1 id="the-html5-shiv">The HTML5 Shiv</h1>

<p>The HTML5 Shiv enables use of HTML5 sectioning elements in legacy Internet Explorer and provides basic HTML5 styling for Internet Explorer 6-9, Safari 4.x (and iPhone 3.x), and Firefox 3.x.</p>

<h3 id="what-do-these-files-do%3F">What do these files do?</h3>

<h4 id="%60html5shiv.js%60"><code>html5shiv.js</code></h4>

<ul>
<li>This includes the basic <code>createElement()</code> shiv technique, along with monkeypatches for <code>document.createElement</code> and <code>document.createDocumentFragment</code> for IE6-8. It also applies <a href="https://github.com/aFarkas/html5shiv/blob/51da98dabd3c537891b7fe6114633fb10de52473/src/html5shiv.js#L216-220">basic styling</a> for HTML5 elements for IE6-9, Safari 4.x and FF 3.x.</li>
</ul>

<h4 id="%60html5shiv-printshiv.js%60"><code>html5shiv-printshiv.js</code></h4>

<ul>
<li>This includes all of the above, as well as a mechanism allowing HTML5 elements to be styled and contain children while being printed in IE 6-8.</li>
</ul>

<h3 id="who-can-i-get-mad-at-now%3F">Who can I get mad at now?</h3>

<p>HTML5 Shiv is maintained by <a href="https://github.com/aFarkas/">Alexander Farkas</a>, <a href="https://twitter.com/jon_neal">Jonathan Neal</a> and <a href="https://twitter.com/paul_irish">Paul Irish</a>, with many contributions from <a href="https://twitter.com/jdalton">John-David Dalton</a>. It is also distributed with <a href="http://modernizr.com/">Modernizr</a>.</p>

<p>If you have any issues in these implementations, you can report them here! :)</p>

<p>For the full story of HTML5 Shiv and all of the people involved in making it, read <a href="http://paulirish.com/2011/the-history-of-the-html5-shiv/">The Story of the HTML5 Shiv</a>.</p>

<h2 id="installation">Installation</h2>

<h3 id="using-bower">Using <a href="http://bower.io/">Bower</a></h3>

<p><code>bower install html5shiv --save-dev</code></p>

<p>This will clone the latest version of the HTML5 shiv into the <code>bower_components</code> directory at the root of your project and also create or update the file <code>bower.json</code> which specifies your projects dependencies.</p>

<p>Include the HTML5 shiv in the <code>&lt;head&gt;</code> of your page in a conditional comment and after any stylesheets.</p>

<pre><code class="html">&lt;!--[if lt IE 9]&gt;
    &lt;script src="bower_components/html5shiv/dist/html5shiv.js"&gt;&lt;/script&gt;
&lt;![endif]--&gt;
</code></pre>

<h3 id="manual-installation">Manual installation</h3>

<p>Download and extract the <a href="https://github.com/aFarkas/html5shiv/archive/master.zip">latest zip package</a> from this repositiory and copy the two files <code>dist/html5shiv.js</code> and <code>dist/html5shiv-printshiv.js</code> into your project. Then include one of them into your <code>&lt;head&gt;</code> as above.</p>

<h2 id="html5-shiv-api">HTML5 Shiv API</h2>

<p>HTML5 Shiv works as a simple drop-in solution. In most cases there is no need to configure HTML5 Shiv or use methods provided by HTML5 Shiv.</p>

<h3 id="%60html5.elements%60-option"><code>html5.elements</code> option</h3>

<p>The <code>elements</code> option is a space separated string or array, which describes the <strong>full</strong> list of the elements to shiv. see also <code>addElements</code>.</p>

<p><strong>Configuring <code>elements</code> before <code>html5shiv.js</code> is included.</strong></p>

<pre><code class="js">//create a global html5 options object
window.html5 = {
  'elements': 'mark section customelement' 
};
</code></pre>

<p><strong>Configuring <code>elements</code> after <code>html5shiv.js</code> is included.</strong></p>

<pre><code class="js">//change the html5shiv options object 
window.html5.elements = 'mark section customelement';
//and re-invoke the `shivDocument` method
html5.shivDocument(document);
</code></pre>

<h3 id="%60html5.shivcss%60"><code>html5.shivCSS</code></h3>

<p>If <code>shivCSS</code> is set to <code>true</code> HTML5 Shiv will add basic styles (mostly display: block) to sectioning elements (like section, article). In most cases a webpage author should include those basic styles in his normal stylesheet to ensure older browser support (i.e. Firefox 3.6) without JavaScript.</p>

<p>The <code>shivCSS</code> is true by default and can be set false, only before html5shiv.js is included:</p>

<pre><code class="js">//create a global html5 options object
window.html5 = {
    'shivCSS': false
};
</code></pre>

<h3 id="%60html5.shivmethods%60"><code>html5.shivMethods</code></h3>

<p>If the <code>shivMethods</code> option is set to <code>true</code> (by default) HTML5 Shiv will override <code>document.createElement</code>/<code>document.createDocumentFragment</code> in Internet Explorer 6-8 to allow dynamic DOM creation of HTML5 elements.</p>

<p>Known issue: If an element is created using the overridden <code>createElement</code> method this element returns a document fragment as its <code>parentNode</code>, but should be normally <code>null</code>. If a script relies on this behavior, <code>shivMethods</code>should be set to <code>false</code>.
Note: jQuery 1.7+ has implemented his own HTML5 DOM creation fix for Internet Explorer 6-8. If all your scripts (including Third party scripts) are using jQuery's manipulation and DOM creation methods, you might want to set this option to <code>false</code>.</p>

<p><strong>Configuring <code>shivMethods</code> before <code>html5shiv.js</code> is included.</strong></p>

<pre><code class="js">//create a global html5 options object
window.html5 = {
    'shivMethods': false
};
</code></pre>

<p><strong>Configuring <code>elements</code> after <code>html5shiv.js</code> is included.</strong></p>

<pre><code class="js">//change the html5shiv options object 
window.html5.shivMethods = false;
</code></pre>

<h3 id="%60html5.addelements-newelements-%2C-document-%60"><code>html5.addElements( newElements [, document] )</code></h3>

<p>The <code>html5.addElements</code> method extends the list of elements to shiv. The newElements argument can be a whitespace separated list or an array.</p>

<pre><code class="js">//extend list of elements to shiv
html5.addElements('element content');
</code></pre>

<h3 id="%60html5.createelement-nodename-%2C-document-%60"><code>html5.createElement( nodeName [, document] )</code></h3>

<p>The <code>html5.createElement</code> method creates a shived element, even if <code>shivMethods</code> is set to false.</p>

<pre><code class="js">var container = html5.createElement('div');
//container is shived so we can add HTML5 elements using `innerHTML`
container.innerHTML = '&lt;section&gt;This is a section&lt;/section&gt;';
</code></pre>

<h3 id="%60html5.createdocumentfragment-document-%60"><code>html5.createDocumentFragment( [document] )</code></h3>

<p>The <code>html5.createDocumentFragment</code> method creates a shived document fragment, even if <code>shivMethods</code> is set to false.</p>

<pre><code class="js">var fragment = html5.createDocumentFragment();
var container = document.createElement('div');
fragment.appendChild(container);
//fragment is shived so we can add HTML5 elements using `innerHTML`
container.innerHTML = '&lt;section&gt;This is a section&lt;/section&gt;';
</code></pre>

<h2 id="html5-shiv-known-issues-and-limitations">HTML5 Shiv Known Issues and Limitations</h2>

<ul>
<li>The <code>shivMethods</code> option (overriding <code>document.createElement</code>) and the <code>html5.createElement</code> method create elements, which are not disconnected and have a parentNode (see also issue #64)</li>
<li>The cloneNode problem is currently not addressed by HTML5 Shiv. HTML5 elements can be dynamically created, but can't be cloned in all cases.</li>
<li>The printshiv version of HTML5 Shiv has to alter the print styles and the whole DOM for printing. In case of complex websites and or a lot of print styles this might cause performance and/or styling issues. A possible solution could be the <a href="https://github.com/aFarkas/html5shiv/tree/iepp-htc">htc-branch</a> of HTML5 Shiv, which uses another technique to implement print styles for Internet Explorer 6-8.</li>
</ul>

<h3 id="what-about-the-other-html5-element-projects%3F">What about the other HTML5 element projects?</h3>

<ul>
<li>The original conception and community collaboration story of the project is described at <a href="http://paulirish.com/2011/the-history-of-the-html5-shiv/">The History of the HTML5 Shiv</a>. </li>
<li><a href="https://code.google.com/p/ie-print-protector">IEPP</a>, by Jon Neal, addressed the printing fault of the original <code>html5shiv</code>. It was merged into <code>html5shiv</code>.</li>
<li><strong>Shimprove</strong>, in April 2010, patched <code>cloneNode</code> and <code>createElement</code> was later merged into <code>html5shiv</code></li>
<li><strong>innerShiv</strong>, introduced in August 2010 by JD Barlett, addressed dynamically adding new HTML5 elements into the DOM. <a href="http://blog.jquery.com/2011/11/03/jquery-1-7-released/">jQuery added support</a> that made innerShiv redundant and <code>html5shiv</code> addressed the same issues as well, so the project was completed.</li>
<li>The <strong>html5shim</strong> and <strong>html5shiv</strong> sites on Google Code are maintained by Remy Sharp and are identical distribution points of this <code>html5shiv</code> project.</li>
<li><strong>Modernizr</strong> is developed by the same people as <code>html5shiv</code> and can include the latest version in any custom builds created at modernizr.com</li>
<li>This <code>html5shiv</code> repo now contains tests for all the edge cases pursued by the above libraries and has been extensively tested, both in development and production. </li>
</ul>

<p>A <a href="https://github.com/aFarkas/html5shiv/wiki">detailed changelog of html5shiv</a> is available.</p>

<h3 id="why-is-it-called-a-%2Ashiv%2A%3F">Why is it called a <em>shiv</em>?</h3>

<p>The term <strong>shiv</strong> <a href="http://ejohn.org/blog/html5-shiv/">originates</a> from <a href="https://github.com/jeresig">John Resig</a>, who was thought to have used the word for its slang meaning, <em>a sharp object used as a knife-like weapon</em>, intended for Internet Explorer. Truth be known, John probably intended to use the word <a href="http://en.wikipedia.org/wiki/Shim_(computing)">shim</a>, which in computing means <em>an application compatibility workaround</em>. Rather than correct his mispelling, most developers familiar with Internet Explorer appreciated the visual imagery. And that, <a href="http://html5homi.es/">kids</a>, is <a href="https://en.wikipedia.org/wiki/Etymology">etymology</a>.</p>
