@echo off
cls
git status
echo "<+++  1/5  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++>"
git add --verbose *
echo "<+++  2/5  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++>"
git commit --message=%1% --verbose
echo "<+++  3/5  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++>"
git log --since="1 weeks ago"
echo "<+++  4/5  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++>"
git push --verbose
echo "<+++  5/5  +++++++ PROCESO TERMINADO +++++++++++++++++++++++++++++++++++++>"