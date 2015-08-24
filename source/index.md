---
layout: default
use: [events]
---
<ul>
{% for event in data.events %}
    <li>{{ event.meta.date|date("d.m.Y") }}: <a href="{{ event.meta.link }}">{{ event.meta.title }}</a> (Ort: {{ event.meta.location }})</li>
{% endfor %}
</ul>
