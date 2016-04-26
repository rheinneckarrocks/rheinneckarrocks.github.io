<h1 id="submitting-issues">Submitting Issues</h1>

<p>If you are submitting a bug with moment, please create a <a href="http://jsfiddle.net/">jsfiddle</a> demonstrating the issue.</p>

<h1 id="contributing">Contributing</h1>

<p>To contribute, fork the library and install grunt.</p>

<pre><code>npm install grunt -g
</code></pre>

<p>You can add tests to the files in <code>/test/moment</code> or add a new test file if you are adding a new feature.</p>

<p>To run the tests, do <code>grunt test</code> to run all tests.</p>

<p>To check the filesize, you can use <code>grunt size</code>.</p>

<p>To minify all the files, use <code>grunt release</code>.</p>

<p>If your code passes the unit tests (including the ones you wrote), submit a pull request.</p>

<h1 id="submitting-pull-requests">Submitting pull requests</h1>

<p>Moment.js now uses <a href="https://github.com/nvie/gitflow">git-flow</a>. If you're not familiar with git-flow, please read up on it, you'll be glad you did.</p>

<p>When submitting new features, please create a new feature branch using <code>git flow feature start &lt;name&gt;</code> and submit the pull request to the <code>develop</code> branch.</p>

<p>Pull requests for enhancements for features should be submitted to the <code>develop</code> branch as well.</p>

<p>When submitting a bugfix, please check if there is an existing bugfix branch. If the latest stable version is <code>1.5.0</code>, the bugfix branch would be <code>hotfix/1.5.1</code>. All pull requests for bug fixes should be on a <code>hotfix</code> branch, unless the bug fix depends on a new feature.</p>

<p>The <code>master</code> branch should always have the latest stable version. When bugfix or minor releases are needed, the develop/hotfix branch will be merged into master and released.</p>
