version=$(awk -F ":" '/versnr/ {print $2}' version.json)
version=${version:1:5}

echo "Version:" $version