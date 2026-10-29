@echo off
title Aura Dental Atelier - Dual Server Launcher
echo ============================================================
echo   AURA DENTAL ATELIER - DUAL SERVER LAUNCHER
echo ============================================================
echo.
cd /d "%~dp0"

echo [1/2] Starting Public Patient Website on http://localhost:8000 ...
start /B "" "C:\xampp\php\php.exe" -S localhost:8000
timeout /t 1 /nobreak >nul

echo [2/2] Starting Dedicated Admin Control Panel on http://localhost:8080 ...
start /B "" "C:\xampp\php\php.exe" -S localhost:8080 admin_router.php
timeout /t 1 /nobreak >nul

echo.
echo ============================================================
echo   SERVERS ACTIVE AND RUNNING:
echo   - Patient Website:       http://localhost:8000/
echo   - Admin Control Panel:   http://localhost:8080/
echo.
echo   Admin Credentials:
echo   Username: admin
echo   Password: admin123
echo ============================================================
echo.
echo Opening both applications in your default browser...
start http://localhost:8000/
start http://localhost:8080/

echo.
echo Press any key to stop all servers...
pause >nul
taskkill /F /IM php.exe
echo Both servers stopped.
