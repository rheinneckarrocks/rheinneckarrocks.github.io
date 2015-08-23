---
layout: default
use: [events]
---
<ul>
{% for event in data.events %}
    <li>{{ event.date}}: {{ event.title }}</li>
{% endfor %}
</ul>
