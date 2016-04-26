<p>A lightweight javascript date library for parsing, validating, manipulating, and formatting dates.</p>

<h1 id="documentation"><a href="http://momentjs.com/docs/">Documentation</a></h1>

<h1 id="upgrading-to-2.0.0">Upgrading to 2.0.0</h1>

<p>There are a number of small backwards incompatible changes with version 2.0.0.</p>

<p><a href="https://gist.github.com/timrwood/e72f2eef320ed9e37c51#backwards-incompatible-changes">See them and their descriptions here</a></p>

<p>Changed language ordinal method to return the number + ordinal instead of just the ordinal.</p>

<p>Changed two digit year parsing cutoff to match strptime.</p>

<p>Removed <code>moment#sod</code> and <code>moment#eod</code> in favor of <code>moment#startOf</code> and <code>moment#endOf</code>.</p>

<p>Removed <code>moment.humanizeDuration()</code> in favor of <code>moment.duration().humanize()</code>.</p>

<p>Removed the lang data objects from the top level namespace.</p>

<p>Duplicate <code>Date</code> passed to <code>moment()</code> instead of referencing it.</p>

<h1 id="upgrading-to-1.6.0">Upgrading to 1.6.0</h1>

<p>There are a few things being deprecated in the 1.6.0 release.</p>

<ol>
<li><p>The format tokens <code>z</code> and <code>zz</code> (timezone abbreviations like EST CST MST etc) will no longer be supported. Due to inconsistent browser support, we are unable to consistently produce this value. See <a href="https://github.com/timrwood/moment/issues/162">this issue</a> for more background.</p></li>
<li><p>The method <code>moment.fn.native</code> is deprecated in favor of <code>moment.fn.toDate</code>. There continue to be issues with Google Closure Compiler throwing errors when using <code>native</code>, even in valid instances.</p></li>
<li><p>The way to customize am/pm strings is being changed. This would only affect you if you created a custom language file. For more information, see <a href="https://github.com/timrwood/moment/pull/222">this issue</a>.</p></li>
</ol>

<h1 id="changelog">Changelog</h1>

<h3 id="2.0.0-see-changelog">2.0.0 <a href="https://gist.github.com/timrwood/e72f2eef320ed9e37c51">See changelog</a></h3>

<p>Added short form localized tokens.</p>

<p>Added ability to define language a string should be parsed in.</p>

<p>Added support for reversed add/subtract arguments.</p>

<p>Added support for <code>endOf('week')</code> and <code>startOf('week')</code>.</p>

<p>Fixed the logic for <code>moment#diff(Moment, 'months')</code> and <code>moment#diff(Moment, 'years')</code></p>

<p><code>moment#diff</code> now floors instead of rounds.</p>

<p>Normalized <code>moment#toString</code>.</p>

<p>Added <code>isSame</code>, <code>isAfter</code>, and <code>isBefore</code> methods.</p>

<p>Added better week support.</p>

<p>Added <code>moment#toJSON</code></p>

<p>Bugfix: Fixed parsing of first century dates</p>

<p>Bugfix: Parsing 10Sep2001 should work as expected</p>

<p>Bugfix: Fixed wierdness with <code>moment.utc()</code> parsing.</p>

<p>Changed language ordinal method to return the number + ordinal instead of just the ordinal.</p>

<p>Changed two digit year parsing cutoff to match strptime.</p>

<p>Removed <code>moment#sod</code> and <code>moment#eod</code> in favor of <code>moment#startOf</code> and <code>moment#endOf</code>.</p>

<p>Removed <code>moment.humanizeDuration()</code> in favor of <code>moment.duration().humanize()</code>.</p>

<p>Removed the lang data objects from the top level namespace.</p>

<p>Duplicate <code>Date</code> passed to <code>moment()</code> instead of referencing it.</p>

<h3 id="1.7.2-see-discussion">1.7.2 <a href="https://github.com/timrwood/moment/issues/456">See discussion</a></h3>

<p>Bugfixes</p>

<h3 id="1.7.1-see-discussion">1.7.1 <a href="https://github.com/timrwood/moment/issues/384">See discussion</a></h3>

<p>Bugfixes</p>

<h3 id="1.7.0-see-discussion">1.7.0 <a href="https://github.com/timrwood/moment/issues/288">See discussion</a></h3>

<p>Added <code>moment.fn.endOf()</code> and <code>moment.fn.startOf()</code>.</p>

<p>Added validation via <code>moment.fn.isValid()</code>.</p>

<p>Made formatting method 3x faster. http://jsperf.com/momentjs-cached-format-functions</p>

<p>Add support for month/weekday callbacks in <code>moment.fn.format()</code></p>

<p>Added instance specific languages.</p>

<p>Added two letter weekday abbreviations with the formatting token <code>dd</code>.</p>

<p>Various language updates.</p>

<p>Various bugfixes.</p>

<h3 id="1.6.0-see-discussion">1.6.0 <a href="https://github.com/timrwood/moment/pull/268">See discussion</a></h3>

<p>Added Durations.</p>

<p>Revamped parser to support parsing non-separated strings (YYYYMMDD vs YYYY-MM-DD).</p>

<p>Added support for millisecond parsing and formatting tokens (S SS SSS)</p>

<p>Added a getter for <code>moment.lang()</code></p>

<p>Various bugfixes.</p>

<h3 id="1.5.0-see-milestone">1.5.0 <a href="https://github.com/timrwood/moment/issues?milestone=10&amp;page=1&amp;state=closed">See milestone</a></h3>

<p>Added UTC mode.</p>

<p>Added automatic ISO8601 parsing.</p>

<p>Various bugfixes.</p>

<h3 id="1.4.0-see-milestone">1.4.0 <a href="https://github.com/timrwood/moment/issues?milestone=8&amp;state=closed">See milestone</a></h3>

<p>Added <code>moment.fn.toDate</code> as a replacement for <code>moment.fn.native</code>.</p>

<p>Added <code>moment.fn.sod</code> and <code>moment.fn.eod</code> to get the start and end of day.</p>

<p>Various bugfixes.</p>

<h3 id="1.3.0-see-milestone">1.3.0 <a href="https://github.com/timrwood/moment/issues?milestone=7&amp;state=closed">See milestone</a></h3>

<p>Added support for parsing month names in the current language.</p>

<p>Added escape blocks for parsing tokens.</p>

<p>Added <code>moment.fn.calendar</code> to format strings like 'Today 2:30 PM', 'Tomorrow 1:25 AM', and 'Last Sunday 4:30 AM'.</p>

<p>Added <code>moment.fn.day</code> as a setter.</p>

<p>Various bugfixes</p>

<h3 id="1.2.0-see-milestone">1.2.0 <a href="https://github.com/timrwood/moment/issues?milestone=4&amp;state=closed">See milestone</a></h3>

<p>Added timezones to parser and formatter.</p>

<p>Added <code>moment.fn.isDST</code>.</p>

<p>Added <code>moment.fn.zone</code> to get the timezone offset in minutes.</p>

<h3 id="1.1.2-see-milestone">1.1.2 <a href="https://github.com/timrwood/moment/issues?milestone=6&amp;state=closed">See milestone</a></h3>

<p>Various bugfixes</p>

<h3 id="1.1.1-see-milestone">1.1.1 <a href="https://github.com/timrwood/moment/issues?milestone=5&amp;state=closed">See milestone</a></h3>

<p>Added time specific diffs (months, days, hours, etc)</p>

<h3 id="1.1.0">1.1.0</h3>

<p>Added <code>moment.fn.format</code> localized masks. 'L LL LLL LLLL' <a href="https://github.com/timrwood/moment/pull/29">issue 29</a></p>

<p>Fixed <a href="https://github.com/timrwood/moment/pull/31">issue 31</a>.</p>

<h3 id="1.0.1">1.0.1</h3>

<p>Added <code>moment.version</code> to get the current version.</p>

<p>Removed <code>window !== undefined</code> when checking if module exists to support browserify. <a href="https://github.com/timrwood/moment/pull/25">issue 25</a></p>

<h3 id="1.0.0">1.0.0</h3>

<p>Added convenience methods for getting and setting date parts.</p>

<p>Added better support for <code>moment.add()</code>.</p>

<p>Added better lang support in NodeJS.</p>

<p>Renamed library from underscore.date to Moment.js</p>

<h3 id="0.6.1">0.6.1</h3>

<p>Added Portuguese, Italian, and French language support</p>

<h3 id="0.6.0">0.6.0</h3>

<p>Added _date.lang() support.
Added support for passing multiple formats to try to parse a date. _date("07-10-1986", ["MM-DD-YYYY", "YYYY-MM-DD"]);
Made parse from string and single format 25% faster.</p>

<h3 id="0.5.2">0.5.2</h3>

<p>Bugfix for <a href="https://github.com/timrwood/underscore.date/pull/8">issue 8</a> and <a href="https://github.com/timrwood/underscore.date/pull/9">issue 9</a>.</p>

<h3 id="0.5.1">0.5.1</h3>

<p>Bugfix for <a href="https://github.com/timrwood/underscore.date/pull/5">issue 5</a>.</p>

<h3 id="0.5.0">0.5.0</h3>

<p>Dropped the redundant <code>_date.date()</code> in favor of <code>_date()</code>.
Removed <code>_date.now()</code>, as it is a duplicate of <code>_date()</code> with no parameters.
Removed <code>_date.isLeapYear(yearNumber)</code>. Use <code>_date([yearNumber]).isLeapYear()</code> instead.
Exposed customization options through the <code>_date.relativeTime</code>, <code>_date.weekdays</code>, <code>_date.weekdaysShort</code>, <code>_date.months</code>, <code>_date.monthsShort</code>, and <code>_date.ordinal</code> variables instead of the <code>_date.customize()</code> function.</p>

<h3 id="0.4.1">0.4.1</h3>

<p>Added date input formats for input strings.</p>

<h3 id="0.4.0">0.4.0</h3>

<p>Added underscore.date to npm. Removed dependencies on underscore.</p>

<h3 id="0.3.2">0.3.2</h3>

<p>Added <code>'z'</code> and <code>'zz'</code> to <code>_.date().format()</code>. Cleaned up some redundant code to trim off some bytes.</p>

<h3 id="0.3.1">0.3.1</h3>

<p>Cleaned up the namespace. Moved all date manipulation and display functions to the _.date() object.</p>

<h3 id="0.3.0">0.3.0</h3>

<p>Switched to the Underscore methodology of not mucking with the native objects' prototypes.
Made chaining possible.</p>

<h3 id="0.2.1">0.2.1</h3>

<p>Changed date names to be a more pseudo standardized 'dddd, MMMM Do YYYY, h:mm:ss a'.
Added <code>Date.prototype</code> functions <code>add</code>, <code>subtract</code>, <code>isdst</code>, and <code>isleapyear</code>.</p>

<h3 id="0.2.0">0.2.0</h3>

<p>Changed function names to be more concise.
Changed date format from php date format to custom format.</p>

<h3 id="0.1.0">0.1.0</h3>

<p>Initial release</p>

<h1 id="license">License</h1>

<p>Moment.js is freely distributable under the terms of the MIT license.</p>

<p>Copyright (c) 2011-2012 Tim Wood</p>

<p>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</p>

<p>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</p>

<p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</p>
