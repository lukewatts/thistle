@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION

SET BIN_TARGET=%~dp0/app/core/console/thistle

php "%BIN_TARGET%" %*