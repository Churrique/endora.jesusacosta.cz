@echo off
cls
git status
git add * --verbose
git commit --message=%1% --verbose -a
git log --oneline --since="30 minutes ago" --shortstat master
git push --verbose
git status