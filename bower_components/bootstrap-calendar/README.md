<h1 id="bootstrap-calendar">Bootstrap Calendar</h1>

<p>A Full view calendar based on Twitter Bootstrap. Please try the <a href="http://bootstrap-calendar.azurewebsites.net">demo</a>.</p>

<p><img src="http://serhioromano.s3.amazonaws.com/github/bs-calendar.png" alt="Bootstrap full calendar" /></p>

<h3 id="why%3F">Why?</h3>

<p>Why did I start this project? Well, I believe there are no good full view calendar's out there with native Bootstrap support. In fact I could not find even one. A different UI and UX concept approach is also used.</p>

<h3 id="features">Features</h3>

<ul>
<li><strong>Reusable</strong> - there is no UI in this calendar. All buttons to switch view or load events are done separately. You will end up with your own uniquie calendar design.</li>
<li><strong>Template based</strong> - all view like <strong>year</strong>, <strong>month</strong>, <strong>week</strong> or <strong>day</strong> are based on templates. You can easily change how it looks or style it or even add new custom view.</li>
<li><strong>LESS</strong> - easy adjust and style your calendar with less variables file.</li>
<li><strong>AJAX</strong> - It uses AJAX to feed calendar with events. You provide URL and just return by this URL <code>JSON</code> list of events.</li>
<li><strong>i18n</strong> - language files are connected separately. You can easily translate the calendar into your own language. Holidays are also diplayed on the calendar according to your language</li>
</ul>

<h2 id="how-to-use">How to use</h2>

<h3 id="install">Install</h3>

<p>You can install it with <a href="http://twitter.github.com/bower/">bower</a> package manager.</p>

<pre><code>$ bower install bootstrap-calendar
</code></pre>

<p>Bower will automatically install all dependencies. Then by running</p>

<pre><code>$ bower list --path
</code></pre>

<p>You will see list of the files you need to include to your document.</p>

<h3 id="quick-setup">Quick setup</h3>

<p>You will need to include the bootstrap css and calendar css. Here is the minimum setup.</p>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Minimum Setup&lt;/title&gt;
    &lt;link rel="stylesheet" href="css/bootstrap.min.css"&gt;
    &lt;link rel="stylesheet" href="css/calendar.css"&gt;
&lt;/head&gt;
&lt;body&gt;

    &lt;div id="calendar"&gt;&lt;/div&gt;

    &lt;script type="text/javascript" src="js/vendor/jquery-1.9.1.js"&gt;&lt;/script&gt;
    &lt;script type="text/javascript" src="js/vendor/underscore-min.js"&gt;&lt;/script&gt;
    &lt;script type="text/javascript" src="js/calendar.js"&gt;&lt;/script&gt;
    &lt;script type="text/javascript"&gt;
        var calendar = $("#calendar").calendar(
            {
                tmpl_path: "/tmpls/",
                events_source: function () { return []; }
            });         
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p>Bootstrap Calendar depends on <a href="http://jquery.com/">jQuery</a> and <a href="http://underscorejs.org/">underscore.js</a> is used as a template engine.
For the calendar you only have to include the <code>calendar.css</code> and <code>calendar.js</code> files.
If you want to localize your Calendar, it's enough to add this line before including calendar.js:</p>

<pre><code>&lt;script type="text/javascript" src="js/language/xx-XX.js"&gt;&lt;/script&gt;
</code></pre>

<p>Where xx-XX is the language code. When you initializing the calendar, you have to specify this language code:</p>

<pre><code>&lt;script type="text/javascript"&gt;
    var calendar = $('#calendar').calendar({language: 'xx-XX'});
&lt;/script&gt;
</code></pre>

<h2 id="feed-with-events">Feed with events</h2>

<p>To feed the calendar with events you should use <code>events_source</code> parameter. It may be a function, array or URL. In all cases you have to set it with valid events array.</p>

<p>See <a href="https://github.com/Serhioromano/bootstrap-calendar/blob/master/events.json.php">events.json.php</a> file for more details.</p>

<p><code>start</code> and <code>end</code> contain dates when event starts (inclusive) and ends (exclusive) in Unix timestamp. Classes are <code>event-important</code>, <code>event-success</code>, <code>event-warning</code>, <code>event-info</code>, <code>event-inverse</code> and <code>event-special</code>. This wil change the color of your event indicators.</p>

<h3 id="feed-url">Feed URL</h3>

<pre><code>var calendar = $('#calendar').calendar({events_source: '/api/events.php'});
</code></pre>

<p>It will send two parameters by <code>GET</code> named <code>from</code> and <code>to</code>, which will tell you what period is required. You have to return it in JSON structure like this</p>

<pre><code>{
    "success": 1,
    "result": [
        {
            "id": 293,
            "title": "Event 1",
            "url": "http://example.com",
            "class": "event-important",
            "start": 12039485678000, // Milliseconds
            "end": 1234576967000 // Milliseconds
        },
        ...
    ]
}
</code></pre>

<h3 id="feed-array">Feed array</h3>

<p>You can set events list array directly to <code>events_source</code> parameter.</p>

<pre><code>var calendar = $('#calendar').calendar({
    events_source: [
        {
            "id": 293,
            "title": "Event 1",
            "url": "http://example.com",
            "class": "event-important",
            "start": 12039485678000, // Milliseconds
            "end": 1234576967000 // Milliseconds
        },
        ...
    ]});
</code></pre>

<h3 id="feed-function">Feed function</h3>

<p>Or you can use function. You have to return array of events.</p>

<pre><code>var calendar = $('#calendar').calendar({events_source: function(){
    return  [
       {
           "id": 293,
           "title": "Event 1",
           "url": "http://example.com",
           "class": "event-important",
           "start": 12039485678000, // Milliseconds
           "end": 1234576967000 // Milliseconds
       },
       ...
   ];
}});
</code></pre>

<h3 id="php-example">PHP example</h3>

<p>Note that <code>start</code> and <code>end</code> dates are in milliseconds, thus you need to divide it by 1000 to get seconds. PHP example.</p>

<pre><code>$start = date('Y-m-d h:i:s', ($_GET['start'] / 1000));
</code></pre>

<p>If you have an error you can return</p>

<pre><code>{
    "success": 0,
    "error": "error message here"
}
</code></pre>

<p>Here is the example of PHP script.</p>

<pre><code class="php">&lt;?php
$db    = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'username', 'password');
$start = $_REQUEST['from'] / 1000;
$end   = $_REQUEST['to'] / 1000;
$sql   = sprintf('SELECT * FROM events WHERE `datetime` BETWEEN %s and %s',
    $db-&gt;quote(date('Y-m-d', $start)), $db-&gt;quote(date('Y-m-d', $end)));

$out = array();
foreach($db-&gt;query($sql) as $row) {
    $out[] = array(
        'id' =&gt; $row-&gt;id,
        'title' =&gt; $row-&gt;name,
        'url' =&gt; Helper::url($row-&gt;id),
        'start' =&gt; strtotime($row-&gt;datetime) . '000'
    );
}

echo json_encode(array('success' =&gt; 1, 'result' =&gt; $out));
exit;
</code></pre>

<h2 id="usage-warning.">Usage warning.</h2>

<p>You cannot use the calendar from a local file. 
The following error will be displayed :
Failed to load resource: Origin null is not allowed by Access-Control-Allow-Origin.</p>

<p>Using Ajax with local resources (file:///), is not permited. You will need to deploy this to the web instead.</p>

<h2 id="modal-popup">Modal popup</h2>

<p>You can enable a bootstrap modal popup to show when clicking an event instead of redirecting to event.url. 
To enable boostrap modal, first add the modal html to your page and provide boostrap-calendar with the ID:</p>

<pre><code>&lt;div class="modal hide fade" id="events-modal"&gt;
    &lt;div class="modal-header"&gt;
        &lt;button type="button" class="close" data-dismiss="modal" aria-hidden="true"&gt;&amp;times;&lt;/button&gt;
        &lt;h3&gt;Event&lt;/h3&gt;
    &lt;/div&gt;
    &lt;div class="modal-body" style="height: 400px"&gt;
    &lt;/div&gt;
    &lt;div class="modal-footer"&gt;
        &lt;a href="#" data-dismiss="modal" class="btn"&gt;Close&lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code></pre>

<p>and then set:</p>

<pre><code>modal: "#events-modal"
</code></pre>

<p>This will enable the modal, and populate it with an iframe with the contents of event.url .</p>

<h3 id="modal-content-source">Modal content source</h3>

<p>There are three options for populating the contents of the modal, controlled by the <code>modal_type</code> option:
- <strong>iframe</strong> (default) - populates modal with iframe, iframe.src set to event.url
- <strong>ajax</strong> - gets html from event.url, this is useful when you just have a snippet of html and want to take advantage of styles in the calendar page
- <strong>template</strong> - will render a template (example in tmpls/modal.html) that gets the <code>event</code> and a reference to the <code>calendar</code> object.</p>

<h3 id="modal-title">Modal title</h3>

<p>The modal title can be customized by defining the <code>modal_title</code> option as a function. This function will receive the event as its only parameter. For example, this could be used to set the title of the modal to the title of the event:</p>

<pre><code>modal_title: function(event) { return event.title }
</code></pre>

<p>A calendar set up to use modals would look like this:</p>

<pre><code>$("#calendar").calendar({modal : "#events-modal", modal_type : "ajax", modal_title : function (e) { return e.title }})
</code></pre>
