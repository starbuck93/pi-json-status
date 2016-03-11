# pi-json-status

use `composer install` to install the dependancies

Here is an example of what it spits out when you go to the server ip address:

`{"mem_total":3019,"mem_free":677,"total_act":3091796,"free_p":6.2098534314683,"buffers_p":5.4663373650784,"cache_p":65.896585673828,"free":191996,"buffers":169008,"cache":2037388,"used_act":693404,"used_act_p":22.427223529625,"loadavg1":"2.64,","loadavg5":"2.83,","loadavg15":"2.87\n","temp":40,"time_alive":"10d 23h 25m"}`

Based on the code from http://colinwaddell.github.io/CurrantPi/ (MIT License) this code exposes RAM, storage, CPU load, uptime and temperature of a given server.

Tested on Apache2 on the latest Raspberry Pi Jessie.
