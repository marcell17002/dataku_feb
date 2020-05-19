referensi :
http://tutorialweb.net
http://getbootstrap.com
https://www.sitepoint.com/file-uploads-with-php
http://codeaid.net/php/convert-size-in-bytes-to-a-human-readable-format-(php)
-----------------------------------------------------
untuk menambah file size pada waktu upload, caranya:
1. Cari file php.ini di C:\xampp\php\php.ini
2. Buka file dan cari :
   - post_max_size=0
   - upload_max_filesize=10M (jika ingin menambah ganti 10M)
3. restrat apache
4. done.