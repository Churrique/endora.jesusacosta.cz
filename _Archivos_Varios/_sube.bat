@echo off
cls
echo INICIO~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~INICIO
echo GIT STATUS~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~GIT STATUS
git status
echo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
echo GIT ADD~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~GIT ADD
git add * --verbose
echo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
echo GIT COMMIT~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~GIT COMMIT
git commit --message=%1% --verbose -a
echo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
echo GIT LOG~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~GIT LOG
git log --oneline --since="30 minutes ago" --shortstat master
echo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
echo GIT PUSH~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~GIT PUSH
git push --verbose
echo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
echo GIT STATUS~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~GIT STATUS
git status
echo FIN~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~FIN
