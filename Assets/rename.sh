#!/bin/bash

## TODO create inputs to specify:
##      - directory name where elogim logs will be move. Now, it only works creating elogimlogs directory
##      - old logs format. Now, it only works with .log files
##      - old logs renamed format. Now, it renames only .log to .log-elogim

# CREATE ELOGIM LOGS DIRECTORY
mkdir elogimlogs

# MOVE OLD LOGS RENAMING THEM AS .log-elogim
for f in *.log; do
mv -- "$f" "elogimlogs/${f%.log}.log-elogim"
done

# LOOP TO RENAME .INTELPROXY FILES TO .LOG
for f in *.intelproxy; do
mv -- "$f" "${f%.intelproxy}"
done
