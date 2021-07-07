# ukm-blog

UKM Blog adalah aplikasi berbasis web yang ditujukan untuk UKM di kampus untuk membuka UKM baru, rekrutmen anggota, berbagi ilmu dan kegiatan UKM.

Prasyarat menjalankan aplikasi ini:
1. Install Xampp ('https://www.apachefriends.org/')
2. Install Composer ('https://getcomposer.org/Composer-Setup.exe')

Cara menjalankan aplikasi:
1. Download ZIP code
2. Extract ZIP code ke direktori 'C:\xampp\htdocs'
3. Buka phpmyadmin ('http://localhost/phpmyadmin/')
4. Buat database dengan nama 'ukmblog'
5. Import SQL file yang memiliki nama 'ukmblog' di direktori 'C:\xampp\htdocs\ukm-blog\ukmblog' ke database yang baru dibuat
6. Buka Command Prompt (cmd) di direktori 'C:\xampp\htdocs\ukm-blog\ukmblog'
7. Ketikan command "composer update"
8. Terdapat file '.env.example' di direktori 'C:\xampp\htdocs\ukm-blog\ukmblog', rename file tersebut menjadi '.env'
9. Hapus semua code yang ada di file '.env' dan ganti dengan code berikut

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/dk6fRYigY/3SMVQKpxqYX/SdnpRYShlCbywFRKMpu0=
APP_DEBUG=true
APP_URL=

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ukmblog
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=fa0776f5bf6102
MAIL_PASSWORD=4cbe9c0627a538
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=ukmblog.5am@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

10. Buka browser dan ketikan url 'http://127.0.0.1:8000/' atau jika tidak bisa gunakan url 'http://localhost/ukm-blog/ukmblog/public/'
11. Jika terdapat error seperti "Generate Key", klik saja tombol "Generate Key" dan refresh halaman



===== BEBERAPA AKUN YANG TERDAFTAR =====
> Role: Developer atau pengawas
> email: developer@email.com
> password: password

> Role: Ketua UKM 1
> email: ketuaukm1@email.com
> password: password

> Role: Admin UKM 1
> email: adminukm1@email.com
> password: password

> Role: Anggota biasa UKM 1
> email: anggotaukm1@email.com
> password: password



===== TES EMAIL =====
Untuk mengetes email untuk keperluan kirim link reset password atau verifikasi email, kita menggunakan situs mailtrap ('https://mailtrap.io/')
Gunakan akun berikut:
> email: ukmblog.5am@gmail.com
> password: password123
