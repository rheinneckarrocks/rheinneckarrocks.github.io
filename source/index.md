---
layout: default
use: [events, usergroups]
---

{% block events %}
<section id="events">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Veranstaltungen</h2>
                <hr class="star">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h3>Aktueller Monat</h3>
    
                <div id="calendar"></div>
    
                <div class="btn-group">
                    <button class="btn btn-primary" data-calendar-nav="prev"><< Zur&uuml;ck</button>
                    <button class="btn" data-calendar-nav="today">Heute</button>
                    <button class="btn btn-primary" data-calendar-nav="next">Vor >></button>
                </div>
    
            </div>
        </div>
    </div>
</section>
{% endblock %}

{% block ug %}
<section id="ug">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Usergroups</h2>
                <hr class="star">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <ul>
                    {% for group in data.usergroups %}
                    <li><a href="{{ group.url }}">{{ group.meta.title }}</a></li>
                    {% endfor %}
                </ul>
            </div>
        </div>
    </div>
</section>
{% endblock %}

{% block help %}
<section id="help">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Mitmachen</h2>
                <hr class="star">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 text-center">
                <ol>
                    <li>Github Repo <a href="https://github.com/rheinneckarrocks/rheinneckarrocks.github.io">rheinneckarrocks.github.io</a> forken</li>
                    <li>Auf Branch sculpin wechseln</li>
                    <li>Feature Branch erstellen</li>
                    <li>Veranstaltungen in source/_events einpflegen</li>
                    <li>Usergroups in source/_usergroups einpflegen</li>
                    <li>Änderungen committen und Pull Request stellen</li>
                </ol>
            </div>
        </div>
    </div>
</section>
{% endblock %}

{% block jsbody %}
<script src="bower_components/bootstrap-calendar/js/language/de-DE.js"></script>
<script src="bower_components/bootstrap-calendar/js/calendar.js"></script>
<script type="text/javascript">
    var calendar = $("#calendar").calendar({
        display_week_numbers: false,
        weekbox: false,
        language: 'de-DE',
        time_start: '00:00',
        time_end: '23:59',
        tmpl_path: "scripts/bootstrap-calendar/tmpls/",
        events_source: 'events.json',
        onAfterViewLoad: function() {
            $('#events .row h3').text(this.getTitle());
        }
    });

    $('.btn-group button[data-calendar-nav]').each(function() {
        var $this = $(this);
        $this.click(function() {
            calendar.navigate($this.data('calendar-nav'));
        });
    });
</script>
{% endblock %}
