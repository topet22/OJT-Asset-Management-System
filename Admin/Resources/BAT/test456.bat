@echo off
TIMEOUT 3
cd ..
cd bat
node sched.js
timeout 2 >nul
exit