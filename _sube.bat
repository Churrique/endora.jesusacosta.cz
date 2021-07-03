@echo off
cls
git status
git add --verbose *
git commit --message=%1% --verbose
git log --since="1 weeks ago"
git push --verbose