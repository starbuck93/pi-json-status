<?php

  function seconds_to_time($seconds) {
      $dtF = new DateTime("@0");
      $dtT = new DateTime("@$seconds");
      return $dtF->diff($dtT)->format('%ad %hh %im');
  }

  function doTheThing()
  {
    # code...
  $output1 = shell_exec('cat /sys/class/thermal/thermal_zone0/temp');
  $temp = intval($output1)/1000;
  $output2 = shell_exec('echo "$(</proc/uptime awk \'{print $1}\')"');
  $time_alive = seconds_to_time(intval($output2));

  $output3 = shell_exec('uptime');
  $loadavg = explode(' ', substr($output3, strpos($output3,'load average:')+14));


  $mem_free = intval(shell_exec("free -m | awk '/buffers\/cache/ {print $3}'"));
  $mem_total = intval(shell_exec("free -m | awk '/Mem/ {print $2}'"));

  $used_act = intval(shell_exec("free | awk '/buffers\/cache/ {print $3}'"));
  $free = intval(shell_exec("free | awk '/Mem/ {print $4}'"));
  $buffers = intval(shell_exec("free | awk '/Mem/ {print $6}'"));
  $cache = intval(shell_exec("free | awk '/Mem/ {print $7}'"));
  $total_act = $used_act + $free + $buffers + $cache;

  $free_p = (100*($free/$total_act));
  $buffers_p = (100*($buffers/$total_act));
  $cache_p = (100*($cache/$total_act));
  $used_act_p = (100*($used_act/$total_act));

  $arr = array('mem_total' => $mem_total, 
               'mem_free' => $mem_free, 
               'total_act' => $total_act, 
               'free_p' => $free_p, 
               'buffers_p' => $buffers_p, 
               'cache_p' => $cache_p, 
               'free' => $free, 
               'buffers' => $buffers, 
               'cache' => $cache, 
               'used_act' => $used_act, 
               'used_act_p' => $used_act_p,
               'loadavg1' => $loadavg[0],
               'loadavg5' => $loadavg[1],
               'loadavg15' => $loadavg[2],
               'temp' => $temp, 
               'time_alive' => $time_alive);
  // echo json_encode($arr) . "\n";
  return json_encode($arr);
  }

?>