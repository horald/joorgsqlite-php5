version=$(awk -F "=" '/versnr/ {print $2}' version.txt)
version=${version:1:5}
git add --all
if [ "$1" != "" ]; then
  echo "$1"
  git commit -m "$1"
else
  echo "undocumented Changes of Version $version"
  git commit -m "undocumented Changes of Version $version"
fi
#git archive -o sites/update/joorgsqlite1.011.zip HEAD $(git diff --name-only HEAD^) 
git push -u origin


