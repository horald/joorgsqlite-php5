git add --all
if [ "$1" != "" ]; then
  echo "$1"
  git commit -m "$1"
else
  echo "undocumented Changes"
  git commit -m "undocumented Changes"
fi
git push -u origin


