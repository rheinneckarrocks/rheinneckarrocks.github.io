<h1 id="respond.js">Respond.js</h1>

<h3 id="a-fast-%26-lightweight-polyfill-for-min%2Fmax-width-css3-media-queries-for-ie-6-8%2C-and-more">A fast &amp; lightweight polyfill for min/max-width CSS3 Media Queries (for IE 6-8, and more)</h3>

<ul>
<li><p>Copyright 2011: Scott Jehl, scottjehl.com</p></li>
<li><p>Licensed under the MIT license.</p></li>
</ul>

<p>The goal of this script is to provide a fast and lightweight (3kb minified / 1kb gzipped) script to enable <a href="http://www.alistapart.com/articles/responsive-web-design/">responsive web designs</a> in browsers that don't support CSS3 Media Queries - in particular, Internet Explorer 8 and under. It's written in such a way that it will probably patch support for other non-supporting browsers as well (more information on that soon).</p>

<p>If you're unfamiliar with the concepts surrounding Responsive Web Design, you can read up <a href="http://www.alistapart.com/articles/responsive-web-design/">here</a> and also <a href="http://filamentgroup.com/examples/responsive-images/">here</a></p>

<p><a href="https://rawgithub.com/scottjehl/Respond/master/test/test.html">Demo page</a> (the colors change to show media queries working)</p>

<h1 id="usage-instructions">Usage Instructions</h1>

<ol>
<li>Craft your CSS with min/max-width media queries to adapt your layout from mobile (first) all the way up to desktop</li>
</ol>

<pre>
    @media screen and (min-width: 480px){
        ...styles for 480px and up go here
    }
</pre>

<ol start="2">
<li><p>Reference the respond.min.js script (1kb min/gzipped) after all of your CSS (the earlier it runs, the greater chance IE users will not see a flash of un-media'd content)</p></li>
<li><p>Crack open Internet Explorer and pump fists in delight</p></li>
</ol>

<h1 id="cdn%2Fx-domain-setup">CDN/X-Domain Setup</h1>

<p>Respond.js works by requesting a pristine copy of your CSS via AJAX, so if you host your stylesheets on a CDN (or a subdomain), you'll need to upload a proxy page to enable cross-domain communication.</p>

<p>See <code>cross-domain/example.html</code> for a demo:</p>

<ul>
<li>Upload <code>cross-domain/respond-proxy.html</code> to your external domain</li>
<li>Upload <code>cross-domain/respond.proxy.gif</code> to your origin domain</li>
<li>Reference the file(s) via <code>&lt;link /&gt;</code> element(s):</li>
</ul>

<pre>
    &lt;!-- Respond.js proxy on external server --&gt;
    &lt;link href=&quot;http://externalcdn.com/respond-proxy.html&quot; id=&quot;respond-proxy&quot; rel=&quot;respond-proxy&quot; /&gt;

    &lt;!-- Respond.js redirect location on local server --&gt;
    &lt;link href=&quot;/path/to/respond.proxy.gif&quot; id=&quot;respond-redirect&quot; rel=&quot;respond-redirect&quot; /&gt;

    &lt;!-- Respond.js proxy script on local server --&gt;
    &lt;script src="/path/to/respond.proxy.js"&gt;&lt;/script&gt;
</pre>

<p>If you are having problems with the cross-domain setup, make sure respond-proxy.html does not have a query string appended to it.</p>

<p>Note: HUGE thanks to @doctyper for the contributions in the cross-domain proxy!</p>

<h1 id="support-%26-caveats">Support &amp; Caveats</h1>

<p>Some notes to keep in mind:</p>

<ul>
<li><p>This script's focus is purposely very narrow: only min-width and max-width media queries and all media types (screen, print, etc) are translated to non-supporting browsers. I wanted to keep things simple for filesize, maintenance, and performance, so I've intentionally limited support to queries that are essential to building a (mobile-first) responsive design. In the future, I may rework things a bit to include a hook for patching-in additional media query features - stay tuned!</p></li>
<li><p>Browsers that natively support CSS3 Media Queries are opted-out of running this script as quickly as possible. In testing for support, all other browsers are subjected to a quick  test to determine whether they support media queries or not before proceeding to run the script. This test is now included separately at the top, and uses the window.matchMedia polyfill found here: https://github.com/paulirish/matchMedia.js . If you are already including this polyfill via Modernizr or otherwise, feel free to remove that part.</p></li>
<li><p>This script relies on no other scripts or frameworks (aside from the included matchMedia polyfill), and is optimized for mobile delivery (~1kb total filesize min/gzip)</p></li>
<li><p>As you might guess, this implementation is quite dumb in regards to CSS parsing rules. This is a good thing, because that allows it to run really fast, but its looseness may also cause unexpected behavior. For example: if you enclose a whole media query in a comment intending to disable its rules, you'll probably find that those rules will end up enabled in non-media-query-supporting browsers.</p></li>
<li><p>Respond.js doesn't parse CSS referenced via @import, nor does it work with media queries within style elements, as those styles can't be re-requested for parsing.</p></li>
<li><p>Due to security restrictions, some browsers may not allow this script to work on file:// urls (because it uses xmlHttpRequest). Run it on a web server.</p></li>
<li><p>If the request for the CSS file that includes MQ-specific styling is
behind a redirect, Respond.js will fail silently. CSS files should
respond with a 200 status.</p></li>
<li><p>Currently, media attributes on link elements are supported, but only if the linked stylesheet contains no media queries. If it does contain queries, the media attribute will be ignored and the internal queries will be parsed normally. In other words, @media statements in the CSS take priority.</p></li>
<li><p>Reportedly, if CSS files are encoded in UTF-8 with Byte-Order-Mark (BOM), they will not work with Respond.js in IE7 or IE8. Noted in issue #97</p></li>
<li><p>WARNING: Including @font-face rules inside a media query will cause IE7 and IE8 to hang during load. To work around this, place @font-face rules in the wide open, as a sibling to other media queries.</p></li>
<li><p>If you have more than 32 stylesheets referenced, IE will throw an error, <code>Invalid procedure call or argument</code>. Concatenate your CSS and the issue should go away.</p></li>
<li><p>Sass/SCSS source maps are not supported; <code>@media -sass-debug-info</code> will break respond.js. Noted in issue <a href="https://github.com/scottjehl/Respond/issues/148">#148</a></p></li>
<li><p>Internet Explorer 9 supports css3 media queries, but not within frames when the CSS containing the media query is in an external file (this appears to be a bug in IE9 — see http://stackoverflow.com/questions/10316247/media-queries-fail-inside-ie9-iframe). See this commit for a fix if you're having this problem. https://github.com/NewSignature/Respond/commit/1c86c66075f0a2099451eb426702fc3540d2e603</p></li>
<li><p>Nested Media Queries are not supported</p></li>
</ul>

<h1 id="how%27s-it-work%3F">How's it work?</h1>

<p>Basically, the script loops through the CSS referenced in the page and runs a regular expression or two on their contents to find media queries and their associated blocks of CSS. In Internet Explorer, the content of the stylesheet is impossible to retrieve in its pre-parsed state (which in IE 8-, means its media queries are removed from the text), so Respond.js re-requests the CSS files using Ajax and parses the text response from there. Be sure to configure your CSS files' caching properly so that this re-request doesn't actually go to the server, hitting your browser cache instead.</p>

<p>From there, each media query block is appended to the head in order via style elements, and those style elements are enabled and disabled (read: appended and removed from the DOM) depending on how their min/max width compares with the browser width. The media attribute on the style elements will match that of the query in the CSS, so it could be "screen", "projector", or whatever you want. Any relative paths contained in the CSS will be prefixed by their stylesheet's href, so image paths will direct to their proper destination</p>

<h1 id="api-options%3F">API Options?</h1>

<p>Sure, a couple:</p>

<ul>
<li>respond.update() : rerun the parser (helpful if you added a stylesheet to the page and it needs to be translated)</li>
<li>respond.mediaQueriesSupported: set to true if the browser natively supports media queries.</li>
<li>respond.getEmValue() : returns the pixel value of one em</li>
</ul>

<h1 id="alternatives-to-this-script">Alternatives to this script</h1>

<p>This isn't the only CSS3 Media Query polyfill script out there; but it damn well may be the fastest.</p>

<p>If you're looking for more robust CSS3 Media Query support, you might check out http://code.google.com/p/css3-mediaqueries-js/. In testing, I've found that script to be noticeably slow when rendering complex responsive designs (both in filesize and performance), but it really does support a lot more media query features than this script. Big hat tip to the authors! :)</p>
