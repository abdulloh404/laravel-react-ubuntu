<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## วิธีการติดตั้ง PHP และ PHP-FPM บนระบบ Linux

ทำตามขั้นตอนด้านล่างนี้เพื่อติดตั้ง PHP และ PHP-FPM บนระบบ Linux:

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

### ตรวจสอบสถานะของ PostgreSQL

หลังการติดตั้ง PostgreSQL จะเริ่มทำงานโดยอัตโนมัติ คุณสามารถตรวจสอบสถานะของบริการได้:

```bash
sudo systemctl status postgresql
```

หาก PostgreSQL ไม่ทำงาน สามารถเริ่มต้นและเปิดใช้งานด้วยคำสั่ง:

```bash
sudo systemctl start postgresql
sudo systemctl enable postgresql
```

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

### สร้างฐานข้อมูลและผู้ใช้

ใน PostgreSQL Shell ใช้คำสั่งต่อไปนี้เพื่อสร้างฐานข้อมูลและผู้ใช้:

```sql
CREATE DATABASE my_database;
CREATE USER my_user WITH PASSWORD 'my_password';
GRANT ALL PRIVILEGES ON DATABASE my_database TO my_user;
```

ออกจาก PostgreSQL Shell:

```sql
\q
```

---

# การติดตั้ง pgAdmin และการตั้งค่า `config.py`

pgAdmin เป็นเครื่องมือสำหรับจัดการ PostgreSQL ผ่าน Web Interface ต่อไปนี้คือวิธีการติดตั้งและตั้งค่า `config.py` สำหรับการใช้งาน:

---

## 1. ติดตั้ง pgAdmin

### 1.1 เพิ่ม Repository และ Key

ก่อนเริ่มการติดตั้ง ให้เพิ่ม Repository และ Import Key:

```bash
curl -fsS https://www.pgadmin.org/static/packages_pgadmin_org.pub | sudo gpg --dearmor -o /usr/share/keyrings/packages-pgadmin-org.gpg
sudo sh -c 'echo "deb [signed-by=/usr/share/keyrings/packages-pgadmin-org.gpg] https://ftp.postgresql.org/pub/pgadmin/pgadmin4/apt/$(lsb_release -cs) pgadmin4 main" > /etc/apt/sources.list.d/pgadmin4.list && apt update'
sudo apt install pgadmin4
sudo apt update
```

### 1.2 ติดตั้ง pgAdmin ในโหมด Web

ติดตั้ง pgAdmin ด้วยคำสั่ง:

```bash
sudo apt install pgadmin4-web -y
```

---

## 2. ตั้งค่า Web Mode สำหรับ pgAdmin

หลังจากการติดตั้ง ให้เรียกใช้คำสั่งตั้งค่า:

```bash
sudo /var/www/pgadmin4/bin/setup-web.sh
```

ระบบจะถามคำถามดังนี้:

1. **Email Address**: ใส่อีเมลที่ใช้เป็น Admin.
2. **Password**: ตั้งค่ารหัสผ่าน.
3. ตอบ `y` เพื่อเปิดใช้งาน Web Server.

---

## 3. ตำแหน่งไฟล์ `config.py`

### 3.1 ตำแหน่งของไฟล์การตั้งค่า

-   ไฟล์การตั้งค่าหลัก:
    ```bash
    /usr/pgadmin4/web/config.py
    ```

---

### 4.1 สร้างหรือแก้ไขไฟล์ `config.py`

หากไฟล์ `config.py` ไม่มีอยู่ ให้สร้างขึ้นใหม่:

```bash
sudo nano /etc/pgadmin/config.py
```

### 4.2 ตัวอย่างการตั้งค่าที่สำคัญ

เพิ่มหรือแก้ไขค่าต่อไปนี้ใน `config.py` ตามความต้องการ:

#### เปลี่ยนพอร์ต (ค่าเริ่มต้นคือ 5050)

```python
DEFAULT_SERVER_PORT = 5050
```

#### อนุญาตการเข้าถึงจาก IP ภายนอก

```python
DEFAULT_SERVER = '0.0.0.0'
```

#### ตั้งค่าตำแหน่งเก็บข้อมูล (Storage Path)

```python
DATA_DIR = '/var/lib/pgadmin'
```

#### บังคับใช้รหัสผ่าน Master

```python
MASTER_PASSWORD_REQUIRED = True
```

---

<!-- ## 7. เข้าถึง pgAdmin

เปิดเบราว์เซอร์และเข้าถึง:

```
http://<your-server-ip>/pgadmin
```

ล็อกอินด้วย Email และ Password ที่คุณตั้งค่าไว้.

--- -->

## หมายเหตุ

-   การตั้งค่าทั้งหมดใน `config_local.py` จะ override ค่าที่อยู่ใน `config.py`.
-   หากต้องการดูการตั้งค่าเพิ่มเติม สามารถดูได้ที่ [pgAdmin Configuration Documentation](https://www.pgadmin.org/docs/pgadmin4/latest/config_py.html).

<!-- ## ทดสอบการเชื่อมต่อ

ทดสอบการเชื่อมต่อจากเครื่องที่ติดตั้ง:

    ```bash
    psql -U my_user -d my_database
    ``` -->

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

    location /pgadmin {
        proxy_pass http://127.0.0.1:5050/;
        proxy_set_header X-Script-Name /pgadmin;
        proxy_set_header X-Forwarded-Host $host;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header Host $host;
        proxy_redirect off;
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

<!-- ### 5.2 เปิดเบราว์เซอร์

เข้าไปที่:
`http://your-server-ip`

หากเห็นหน้าจอข้อมูล Project แสดงว่า Nginx และ PHP-FPM ทำงานร่วมกันสำเร็จ -->

---

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

### 1.3 เปิดพอร์ต 5050 (pgAdmin)

อนุญาตการเชื่อมต่อผ่านพอร์ต **5050**:

```bash
sudo ufw allow 5050
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
5050/tcp                   ALLOW       Anywhere
5432/tcp                   ALLOW       Anywhere
80/tcp (v6)                ALLOW       Anywhere (v6)
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

### 4.2 ทดสอบ pgAdmin (พอร์ต 5050)

เปิดเบราว์เซอร์แล้วเข้าที่:

```
http://<your-public-ip>/pgadmin:5050
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
