@echo off
TIMEOUT 3
cd ..
cd bat
node accept.js
timeout 2 >nul
exit