#!/bin/bash
while true
do
  rsync -av . root@192.168.10.1:/www
  sleep 2
done

