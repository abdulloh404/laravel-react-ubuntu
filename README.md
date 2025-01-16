<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 1. วิธีการติดตั้ง PHP และ PHP-FPM บนระบบ Linux

ทำตามขั้นตอนด้านล่างนี้เพื่อติดตั้ง PHP และ PHP-FPM บนระบบ Linux:

## อัปเดตแพ็กเกจของระบบ

ก่อนติดตั้งซอฟต์แวร์ ให้ตรวจสอบว่าแพ็กเกจในระบบเป็นเวอร์ชันล่าสุด:

```bash
sudo apt update
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

# 2. การติดตั้งและตั้งค่า PostgreSQL และ pgAdmin พร้อมการปรับแต่งให้พร้อมใช้งาน

### 2.1 ติดตั้ง PostgreSQL

ติดตั้ง PostgreSQL และเครื่องมือเสริม:

```bash
sudo apt update
sudo apt install postgresql postgresql-contrib -y
```

### 2.2 ตรวจสอบสถานะ PostgreSQL

ตรวจสอบว่า PostgreSQL ทำงานอยู่หรือไม่:

```bash
sudo systemctl status postgresql
```

### 2.3 เริ่มต้นและเปิดใช้งาน PostgreSQL (หากไม่ได้ทำงาน)

หาก PostgreSQL ไม่ทำงาน ให้เริ่มต้นและเปิดใช้งาน:

```bash
sudo systemctl start postgresql
sudo systemctl enable postgresql
```

---

### 2.4 เข้าสู่บัญชี `postgres`

บัญชี `postgres` เป็นบัญชีเริ่มต้นสำหรับจัดการ PostgreSQL:

```bash
sudo -i -u postgres
```

### 2.5 เข้าสู่ PostgreSQL Shell

ในบัญชี `postgres` ให้เข้าสู่ PostgreSQL Shell:

```bash
psql
```

### 2.6 สร้างฐานข้อมูลและผู้ใช้

สร้างฐานข้อมูลและผู้ใช้ใหม่:

```sql
CREATE DATABASE my_database;
CREATE USER my_user WITH PASSWORD 'my_secure_password';
GRANT ALL PRIVILEGES ON DATABASE my_database TO my_user;
```

### 2.7 ออกจาก PostgreSQL Shell

```sql
\q
```

### 2.8 ออกจากบัญชี `postgres`

```bash
exit
```

---

## การติดตั้ง Apache2 และการตั้งค่าให้ใช้พอร์ต 8080 โดยแก้ไขที่ Ports Configuration

## **1. ติดตั้ง Apache2**

ติดตั้ง Apache2 บนระบบของคุณ:

```bash
sudo apt update
sudo apt install apache2 -y
```

## **2. การตั้งค่า Apache2 ให้ใช้พอร์ต 8080**

### 2.1 แก้ไข Ports Configuration

เปิดไฟล์การตั้งค่าพอร์ต:

```bash
sudo nano /etc/apache2/ports.conf
```

ค้นหาและแก้ไขให้เป็นดังนี้:

```plaintext
# เปลี่ยนพอร์ตจาก 80 เป็น 8080
Listen 8080
```

บันทึกและออก (`Ctrl+O`, `Enter`, `Ctrl+X`).

### **2. จัดการ PHP Modules**

#### ปิดการใช้งาน PHP 8.1 Module\*\*

Apache อาจพยายามโหลด PHP 8.1 ซึ่งไม่ถูกติดตั้งอยู่ในระบบ. ปิดการใช้งานโมดูลนี้:

```bash
sudo a2dismod php8.1
```

#### เปิดใช้งาน PHP 8.3 Module\*\*

ระบบของคุณใช้ PHP 8.3 ดังนั้นให้เปิดใช้งานโมดูลที่เกี่ยวข้อง:

```bash
sudo a2enmod php8.3
```

#### ตรวจสอบเวอร์ชัน PHP

ยืนยันว่า PHP ที่ใช้งานในระบบเป็น PHP 8.3:

```bash
php -v
```

### **3. รีสตาร์ต Apache หลังปรับการตั้งค่า**

หลังจากแก้ไขพอร์ตและจัดการ PHP Modules แล้ว ให้รีสตาร์ต Apache:

```bash
sudo systemctl restart apache2
```

## **5. ทดสอบการทำงาน**

### 5.1 ตรวจสอบว่า Apache ใช้งานพอร์ต 8080

ใช้คำสั่งนี้เพื่อตรวจสอบ:

```bash
sudo netstat -tuln | grep 8080
```

---

### สรุป

หลังจากทำตามขั้นตอนทั้งหมด Apache จะทำงานที่พอร์ต 8080 และ PHP 8.3 จะถูกตั้งค่าให้พร้อมใช้งานกับ Apache.

เพียงเท่านี้ Apache และ PHP ก็พร้อมใช้งานแล้ว! 🚀

## **3. ติดตั้ง pgAdmin**

### 3.1 เพิ่ม Repository และ Key

เพิ่มแหล่งที่มาและ Import Key ของ pgAdmin:

```bash
curl -fsS https://www.pgadmin.org/static/packages_pgadmin_org.pub | sudo gpg --dearmor -o /usr/share/keyrings/packages-pgadmin-org.gpg
sudo sh -c 'echo "deb [signed-by=/usr/share/keyrings/packages-pgadmin-org.gpg] https://ftp.postgresql.org/pub/pgadmin/pgadmin4/apt/$(lsb_release -cs) pgadmin4 main" > /etc/apt/sources.list.d/pgadmin4.list && apt update'
```

### 3.2 ติดตั้ง pgAdmin ในโหมด Web

ติดตั้ง pgAdmin:

```bash
sudo apt install pgadmin4-web -y
```

### 3.3 ตั้งค่า Web Mode

เรียกใช้คำสั่งตั้งค่า:

```bash
sudo /usr/pgadmin4/bin/setup-web.sh
```

#### ระบบจะถามข้อมูล:

1. **Email Address**: ใส่อีเมลสำหรับบัญชีผู้ดูแลระบบ.
2. **Password**: ตั้งรหัสผ่านสำหรับบัญชีผู้ดูแลระบบ.
3. ตอบ `y` เพื่อเปิดใช้งาน Web Server.

## **4. การตั้งค่าเพิ่มเติมใน pgAdmin**

### 4.1 แก้ไขไฟล์ `config.py`

เปิดไฟล์:

```bash
sudo nano /etc/pgadmin/config.py
```

เพิ่มหรือแก้ไขค่าต่อไปนี้:

#### เปลี่ยนพอร์ต (ค่าเริ่มต้นคือ 5050)

```python
DEFAULT_SERVER_PORT = 5050
```

#### อนุญาตการเข้าถึงจาก IP ภายนอก

```python
DEFAULT_SERVER = '0.0.0.0'
```

#### ตั้งค่าตำแหน่งเก็บข้อมูล

```python
DATA_DIR = '/var/lib/pgadmin'
```

#### บังคับใช้รหัสผ่าน Master

```python
MASTER_PASSWORD_REQUIRED = True
```

บันทึกและออก (`Ctrl+O` > `Enter` > `Ctrl+X`).

## **6. รีสตาร์ตบริการที่เกี่ยวข้อง**

### 6.1 รีสตาร์ต PostgreSQL Apache2 Nginx

```bash
sudo systemctl restart postgresql
sudo systemctl restart apache2
```

## 5. Clone โปรเจกต์จาก Git Repository

ใช้คำสั่ง `git clone` เพื่อนำโปรเจกต์มาวางใน Path `/var/www`:

```bash
sudo git clone <repository-url> /var/www/<project-name>
```

ตัวอย่าง:

```bash
sudo git clone https://github.com/example/example-project.git /var/www/example-project
```

---

## เปลี่ยนเจ้าของไฟล์เป็น `www-data`

หลังจาก Clone โปรเจกต์เสร็จสิ้น ให้เปลี่ยนเจ้าของไฟล์และโฟลเดอร์ให้เป็นผู้ใช้ `www-data` (ที่ Nginx หรือ PHP-FPM ใช้):

```bash
sudo chown -R www-data:www-data /var/www/<project-name>
```

ตัวอย่าง:

```bash
sudo chown -R www-data:www-data /var/www/example-project
```

---

## ตั้งค่าสิทธิ์ไฟล์

ตั้งค่าสิทธิ์ของไฟล์ในโฟลเดอร์เพื่อให้เซิร์ฟเวอร์สามารถอ่านและเขียนไฟล์ได้:

```bash
sudo chmod -R 755 /var/www/<project-name>
```

---

## ตรวจสอบ

ตรวจสอบว่าไฟล์ถูกวางใน `/var/www` และเจ้าของไฟล์ถูกเปลี่ยนเป็น `www-data`:

```bash
ls -l /var/www/<project-name>
```

ตัวอย่างผลลัพธ์:

```
drwxr-xr-x 5 www-data www-data 4096 Jan 16 12:00 example-project
```

---

<!-- ## 6. ทดสอบการทำงานของโปรเจกต์

1. ตั้งค่า Virtual Host ของ Nginx หรือ Apache ให้ชี้ไปยัง `/var/www/<project-name>`.
2. รีสตาร์ตเซิร์ฟเวอร์เว็บ:

    ```bash
    sudo systemctl restart nginx
    ```

3. เข้าถึงเว็บไซต์ผ่านเบราว์เซอร์เพื่อทดสอบ. -->

# 6. การติดตั้ง Nginx

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

---

## วิธีเพิ่มผู้ใช้ `www-data` เข้ากลุ่มของผู้ใช้ `myuser`

เพื่อให้ผู้ใช้ `www-data` ซึ่งเป็นผู้ใช้เริ่มต้นของ Nginx หรือ PHP-FPM สามารถเข้าถึงและจัดการไฟล์ของผู้ใช้ `myuser` ได้ คุณสามารถเพิ่ม `www-data` เข้าไปในกลุ่มของ `myuser` ได้ตามขั้นตอนดังนี้:

## ตรวจสอบกลุ่มของผู้ใช้ `myuser`

ใช้คำสั่งนี้เพื่อตรวจสอบว่าผู้ใช้ `myuser` สังกัดกลุ่มใด:

```bash
id -nG myuser
```

ตัวอย่างผลลัพธ์:

```
myuser group1 group2
```

## เพิ่ม `www-data` เข้าไปในกลุ่มของ `myuser`

ใช้คำสั่งนี้เพื่อเพิ่มผู้ใช้ `www-data` เข้าไปในกลุ่มของ `myuser`:

```bash
sudo usermod -aG myuser www-data
```

## ตรวจสอบว่าการเพิ่มสำเร็จ

ใช้คำสั่งนี้เพื่อตรวจสอบว่าผู้ใช้ `www-data` ถูกเพิ่มเข้าในกลุ่ม `myuser` สำเร็จหรือไม่:

```bash
groups www-data
```

ตัวอย่างผลลัพธ์:

```
www-data : www-data myuser
```

หากกลุ่ม `myuser` ปรากฏในรายการของ `www-data` แสดงว่าการเพิ่มสำเร็จ.

## 7. ตั้งค่า Nginx ให้ทำงานร่วมกับ PHP-FPM และกำหนด Document สำหรับ Project

### แก้ไขไฟล์ Virtual Host ของ Nginx

เปิดไฟล์การตั้งค่า Virtual Host (เช่น `/etc/nginx/nginx.conf`):

```bash
sudo nano /etc/nginx/nginx.conf
```

### อัปเดตการตั้งค่าต่อไปนี้:

แก้ไขหรือเพิ่มส่วนของการจัดการไฟล์ `.php` ให้เป็นดังนี้:

```nginx
server {
    listen 80; # port 80 รองรับ http
    server_name _; # รองรับทุกโดเมนหรือ IP ที่เข้ามา

    root /var/www/<your-project>/public; # ชี้ path ไปยัง project/public
    index index.php;

    location /pgadmin4 {
        proxy_pass http://127.0.0.1:8080/pgadmin4;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection "upgrade";
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
        proxy_ssl_verify off;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        include fastcgi_params;
        # fastcgi_pass unix:/run/php/php-fpm.sock; # ใช้ Unix Socket
        fastcgi_pass 127.0.0.1:9000; #ใช้ port 9000
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Ignore .ht files
    location ~ /\.ht {
        deny all;
    }
}
```

### ตรวจสอบการตั้งค่า Nginx

ตรวจสอบว่าไม่มีข้อผิดพลาดในการตั้งค่าของ Nginx:

```bash
sudo nginx -t
```

### รีโหลด Nginx

หลังการแก้ไขเสร็จสิ้น ให้รีโหลด Nginx:

```bash
sudo systemctl restart nginx
```

# การเปิดพอร์ตใน UFW และ Google Cloud Console

ในคู่มือนี้ คุณจะได้เรียนรู้วิธีเปิดพอร์ต **80 (HTTP)**, **5050 (pgAdmin)** และ **5432 (PostgreSQL)** ทั้งใน **UFW** (Uncomplicated Firewall) บน Linux และ **Google Cloud Console** เพื่อให้สามารถเชื่อมต่อได้จากภายนอก.

## **1. เปิดพอร์ตใน UFW**

### 1.1 ติดตั้งและเปิดใช้งาน UFW

หากยังไม่ได้ติดตั้ง UFW ให้ติดตั้งก่อน:

```bash
sudo apt install ufw -y
```

ตรวจสอบสถานะของ UFW:

```bash
sudo ufw status
```

หาก UFW ยังไม่ได้เปิดใช้งาน ให้เปิดด้วยคำสั่ง:

```bash
sudo ufw enable
```

### 1.2 เปิดพอร์ต 80 (HTTP)

อนุญาตการเชื่อมต่อผ่านพอร์ต **80**:

```bash
sudo ufw allow 80
```

### 1.3 เปิดพอร์ต 8080 (Apache2)

อนุญาตการเชื่อมต่อผ่านพอร์ต **8080**:

```bash
sudo ufw allow 8080
```

### 1.4 เปิดพอร์ต 5432 (PostgreSQL)

อนุญาตการเชื่อมต่อผ่านพอร์ต **5432**:

```bash
sudo ufw allow 5432
```

### 1.5 ตรวจสอบกฎที่เปิดใช้งาน

หลังจากเพิ่มพอร์ตแล้ว ตรวจสอบสถานะ UFW และกฎทั้งหมด:

```bash
sudo ufw status
```

ตัวอย่างผลลัพธ์:

```
Status: active

To                         Action      From
--                         ------      ----
80/tcp                     ALLOW       Anywhere
8080/tcp                   ALLOW      Anywhere
5050/tcp                   ALLOW       Anywhere
5432/tcp                   ALLOW       Anywhere
80/tcp (v6)                ALLOW       Anywhere (v6)
8080/tcp (v6)              ALLOW     Anywhere (v6)
5050/tcp (v6)              ALLOW       Anywhere (v6)
5432/tcp (v6)              ALLOW       Anywhere (v6)
```

## **2. เปิดพอร์ตใน Google Cloud Console**

Google Cloud มี Firewall Rules แยกจาก UFW บนเซิร์ฟเวอร์ คุณต้องเปิดพอร์ตผ่าน Google Cloud Console เพื่อให้การเชื่อมต่อจากภายนอกสามารถเข้าถึงเซิร์ฟเวอร์ได้.

### 2.1 เข้าสู่ Google Cloud Console

1. เปิด [Google Cloud Console](https://console.cloud.google.com/).
2. ไปที่ **"VPC network" > "Firewall"** หรือค้นหา **"Firewall"** ในช่องค้นหาด้านบน.

### 2.2 สร้าง Firewall Rule ใหม่

1. คลิก **"Create Firewall Rule"**.
2. กำหนดค่าต่อไปนี้:

    - **Name**: ตั้งชื่อกฎ (เช่น `allow-http-pgadmin-postgresql`).
    - **Network**: เลือกเครือข่ายที่เซิร์ฟเวอร์ของคุณใช้ (ค่าเริ่มต้นคือ `default`).
    - **Priority**: ค่าเริ่มต้น `1000` (หรือกำหนดตามต้องการ).
    - **Direction of Traffic**: เลือก **Ingress**.
    - **Action on match**: เลือก **Allow**.
    - **Targets**: เลือก **All instances in the network** หรือระบุเฉพาะ Instance.
    - **Source filter**: เลือก **IP ranges**.
    - **Source IP ranges**: ใส่ `0.0.0.0/0` เพื่ออนุญาตการเข้าถึงจากทุกที่ (หรือระบุ IP เฉพาะ).
    - **Protocols and ports**: เลือก **Specified protocols and ports** และเพิ่ม:
        - **tcp:80** (สำหรับ HTTP).
        - **tcp:5050** (สำหรับ pgAdmin).
        - **tcp:5432** (สำหรับ PostgreSQL).

3. คลิก **"Create"**.

### 2.3 ตรวจสอบ Firewall Rules

1. ไปที่ **"Firewall Rules"**.
2. ตรวจสอบว่ากฎที่สร้างไว้แสดงอยู่ในรายการ และสถานะเป็น **ACTIVE**.

## **3. รีสตาร์ตบริการบนเซิร์ฟเวอร์**

หลังจากเปิดพอร์ตใน UFW และ Google Cloud Console ให้รีสตาร์ตบริการที่เกี่ยวข้อง:

```bash
sudo systemctl restart nginx
sudo systemctl restart apache2
sudo systemctl restart postgresql
```

สำหรับ pgAdmin:

```bash
sudo /usr/pgadmin4/bin/setup-web.sh
```

## **4. ทดสอบการเชื่อมต่อ**

### 4.1 ทดสอบ HTTP (พอร์ต 80)

เปิดเบราว์เซอร์แล้วเข้าที่:

```
http://<your-public-ip>
```

### 4.1 ทดสอบ pgAdmin Reverse Proxy (พอร์ต 80)

เปิดเบราว์เซอร์แล้วเข้าที่:

```
http://<your-public-ip>/pgadmin4
```

### 4.3 ทดสอบ PostgreSQL (พอร์ต 5432)

จากเครื่อง Client ใช้คำสั่ง:

```bash
psql -h <your-server-ip> -U <username> -d <database-name>
```

---

## หมายเหตุ:

-   **การเปิดพอร์ต `0.0.0.0/0`** อนุญาตการเข้าถึงจากทุก IP ซึ่งอาจมีความเสี่ยงด้านความปลอดภัย หากต้องการเพิ่มความปลอดภัย ให้จำกัด IP ที่อนุญาตใน Google Cloud Console และ `pg_hba.conf`.
-   หากต้องการลบกฎ UFW ที่ไม่ต้องการ:
    ```bash
    sudo ufw delete allow <port>
    ```

เพียงเท่านี้ คุณก็สามารถเปิดพอร์ตและตั้งค่าระบบให้พร้อมใช้งานบน Google Cloud ได้แล้ว! 🚀

## ทดสอบเข้าเว็บไซต์ผ่าน Browser`

เว็บไซต์ : http://<public_ip>
pgAdmin : http://<public_ip>/pgadmin4

หากสนใจ ssl และ dns แล้วค่อยเขียน วิธีทำ https และทำ domain name ให้
