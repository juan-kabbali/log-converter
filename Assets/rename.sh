#!/bin/bash

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
