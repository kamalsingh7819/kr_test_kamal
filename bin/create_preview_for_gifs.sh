#!/usr/bin/env bash

command -v convert >/dev/null 2>&1 || {
  echo "[-] Command 'convert' was not found. Please install ImageMagick on your system"
  exit 1
}

m_id=$(grep "\$ID = " index.php | grep "kr_\([a-zA-Z0-9_\-]\+\)" -o)

cd "HTML/images/$m_id/"

for i in *gif; do
  echo "[+] $i"

  a=$(basename $i .gif)
  convert $i"[0]" $a"_preview.jpg"
done

