@echo off
TIMEOUT 3
cd ..
cd BAT
node accept.js
timeout 2 >nul
exit