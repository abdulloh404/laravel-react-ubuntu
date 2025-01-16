<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# วิธีการติดตั้ง PHP และ PHP-FPM บนระบบ Linux

ทำตามขั้นตอนด้านล่างนี้เพื่อติดตั้ง PHP และ PHP-FPM บนระบบ Linux:

---

## อัปเดตแพ็กเกจของระบบ

ก่อนติดตั้งซอฟต์แวร์ ให้ตรวจสอบว่าแพ็กเกจในระบบเป็นเวอร์ชันล่าสุด:

```bash
sudo apt update
sudo apt upgrade -y
```

### **รีสตาร์ต PHP-FPM**

หลังจากแก้ไขไฟล์ `www.conf` เสร็จ ให้รีสตาร์ตบริการ PHP-FPM:

```bash
sudo systemctl restart php8.3-fpm
```

## ติดตั้ง PHP และ PHP-FPM

ใช้คำสั่งนี้เพื่อติดตั้ง PHP พร้อมกับ PHP-FPM:

```bash
sudo apt install php php-fpm -y
```

## ตรวจสอบการติดตั้ง

### ตรวจสอบเวอร์ชัน PHP:

ใช้คำสั่งนี้เพื่อดูเวอร์ชัน PHP:

```bash
php -v
```

### ตรวจสอบสถานะ PHP-FPM:

ใช้คำสั่งนี้เพื่อตรวจสอบว่า PHP-FPM ทำงานอยู่หรือไม่:

```bash
sudo systemctl status php8.3-fpm
```

หาก PHP-FPM ไม่ได้ทำงาน ให้เริ่มต้นและเปิดใช้งานด้วยคำสั่ง:

```bash
sudo systemctl start php8.3-fpm
sudo systemctl enable php8.3-fpm
```

---

## ตรวจสอบแพ็กเกจ PHP ที่ติดตั้ง

หากต้องการดูรายการแพ็กเกจ PHP ทั้งหมดที่ติดตั้ง:

```bash
sudo apt list --installed | grep "php-*"
```

ตัวอย่างผลลัพธ์:

```
libapache2-mod-php8.3/jammy,now 8.3.15-1+ubuntu22.04.1+deb.sury.org+1 amd64 [installed,automatic]
php-common/jammy,jammy,now 2:95+ubuntu22.04.1+deb.sury.org+1 all [installed,automatic]
php-fpm/jammy,jammy,now 2:8.3+95+ubuntu22.04.1+deb.sury.org+1 all [installed]
php8.3-cli/jammy,now 8.3.15-1+ubuntu22.04.1+deb.sury.org+1 amd64 [installed,automatic]
php8.3-common/jammy,now 8.3.15-1+ubuntu22.04.1+deb.sury.org+1 amd64 [installed,automatic]
php8.3-fpm/jammy,now 8.3.15-1+ubuntu22.04.1+deb.sury.org+1 amd64 [installed,automatic]
php8.3-opcache/jammy,now 8.3.15-1+ubuntu22.04.1+deb.sury.org+1 amd64 [installed,automatic]
php8.3-readline/jammy,now 8.3.15-1+ubuntu22.04.1+deb.sury.org+1 amd64 [installed,automatic]
php8.3/jammy,jammy,now 8.3.15-1+ubuntu22.04.1+deb.sury.org+1 all [installed,automatic]
php/jammy,jammy,now 2:8.3+95+ubuntu22.04.1+deb.sury.org+1 all [installed]
```

หากต้องการเปลี่ยนการตั้งค่าของ PHP-FPM ให้ **`listen`** เป็น **Port 9000** แทน Unix Socket สามารถทำได้ดังนี้:

### **แก้ไขไฟล์การตั้งค่า PHP-FPM**

เปิดไฟล์การตั้งค่า Pool ของ PHP-FPM (`www.conf`):

```bash
sudo nano /etc/php/8.3/fpm/pool.d/www.conf
```

### **แก้ไขค่า `listen`**

ค้นหาบรรทัดที่เริ่มต้นด้วย `listen` และแก้ไขให้เป็น:

```ini
listen = 127.0.0.1:9000
```

บรรทัดเดิมอาจเป็น:

```ini
listen = /run/php/php8.3-fpm.sock
```

เปลี่ยนให้เป็นการใช้ **Port 9000** บน Localhost.

## รีสตาร์ต PHP-FPM

หลังจากแก้ไขไฟล์ www.conf เสร็จ ให้รีสตาร์ตบริการ PHP-FPM:

```bash
sudo systemctl restart php8.3-fpm
```

## ทดสอบการทำงาน

หลังการติดตั้ง คุณสามารถใช้งาน PHP และ PHP-FPM ได้แล้ว! 🚀

```bash
php -v
sudo systemctl status php8.3-fpm
```

---

## 2. ติดตั้ง PostgreSQL

ใช้คำสั่งนี้เพื่อติดตั้ง PostgreSQL:

```bash
sudo apt install postgresql postgresql-contrib -y
```

---

## ตรวจสอบสถานะของ PostgreSQL

หลังการติดตั้ง PostgreSQL จะเริ่มทำงานโดยอัตโนมัติ คุณสามารถตรวจสอบสถานะของบริการได้:

```bash
sudo systemctl status postgresql
```

หาก PostgreSQL ไม่ทำงาน สามารถเริ่มต้นและเปิดใช้งานด้วยคำสั่ง:

```bash
sudo systemctl start postgresql
sudo systemctl enable postgresql
```

---

## การตั้งค่าผู้ใช้งาน (User Configuration)

### เปลี่ยนไปใช้บัญชี `postgres`

บัญชี `postgres` เป็นบัญชีเริ่มต้นสำหรับจัดการ PostgreSQL:

```bash
sudo -i -u postgres
```

### เข้าสู่ PostgreSQL Shell

หลังจากเปลี่ยนไปที่บัญชี `postgres` ให้เข้าสู่ PostgreSQL Shell:

```bash
psql
```

### 4.3 สร้างฐานข้อมูลและผู้ใช้

ใน PostgreSQL Shell ใช้คำสั่งต่อไปนี้เพื่อสร้างฐานข้อมูลและผู้ใช้:

```sql
CREATE DATABASE my_database;
CREATE USER my_user WITH PASSWORD 'my_secure_password';
GRANT ALL PRIVILEGES ON DATABASE my_database TO my_user;
```

ออกจาก PostgreSQL Shell:

```sql
\q
```

---

## ทดสอบการเชื่อมต่อ

ทดสอบการเชื่อมต่อจากเครื่องที่ติดตั้ง:

    ```bash
    psql -U my_user -d my_database
    ```

# การติดตั้ง Nginx และตั้งค่าให้ใช้งานร่วมกับ PHP-FPM

ใช้คำสั่งนี้เพื่อติดตั้ง Nginx:

```bash
sudo apt install nginx -y
```

หลังการติดตั้ง ตรวจสอบสถานะของ Nginx:

```bash
sudo systemctl status nginx
```

หาก Nginx ไม่ทำงาน ให้เริ่มต้นและเปิดใช้งาน:

```bash
sudo systemctl start nginx
sudo systemctl enable nginx
```

## ตั้งค่า Nginx ให้ทำงานร่วมกับ PHP-FPM

### แก้ไขไฟล์ Virtual Host ของ Nginx

เปิดไฟล์การตั้งค่า Virtual Host (เช่น `/etc/nginx/nginx.conf`):

```bash
sudo nano /etc/nginx/nginx.conf
```

### 4.2 อัปเดตการตั้งค่าต่อไปนี้:

แก้ไขหรือเพิ่มส่วนของการจัดการไฟล์ `.php` ให้เป็นดังนี้:

```nginx
server {
    listen 80; # port 80 รองรับ http
    server_name _; # รองรับทุกโดเมนหรือ IP ที่เข้ามา

    root /var/www/laravel-react-ubuntu/public; # ชี้ path ไปยัง project/public
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        include fastcgi_params;
        # fastcgi_pass unix:/run/php/php-fpm.sock; # ใช้ Unix Socket
        fastcgi_pass 127.0.0.1:9000; #ใช้ port 9000
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    # Ignore .ht files
    location ~ /\.ht {
        deny all;
    }
}
```

### 4.3 ตรวจสอบการตั้งค่า Nginx

ตรวจสอบว่าไม่มีข้อผิดพลาดในการตั้งค่าของ Nginx:

```bash
sudo nginx -t
```

### 4.4 รีโหลด Nginx

หลังการแก้ไขเสร็จสิ้น ให้รีโหลด Nginx:

```bash
sudo systemctl restart nginx
```

---

### 5.2 เปิดเบราว์เซอร์

เข้าไปที่:
`http://your-server-ip`

หากเห็นหน้าจอข้อมูล Nginx แสดงว่า Nginx และ PHP-FPM ทำงานร่วมกันสำเร็จ

## 6. การตั้งค่าความปลอดภัยเพิ่มเติม (ถ้าจำเป็น)

-   ลบไฟล์ `info.php` หลังการทดสอบเสร็จ:

    ```bash
    sudo rm /var/www/html/info.php
    ```

-   ตรวจสอบสิทธิ์ไฟล์ในโฟลเดอร์ `/var/www/html`:
    ```bash
    sudo chown -R www-data:www-data /var/www/html
    sudo chmod -R 755 /var/www/html
    ```
