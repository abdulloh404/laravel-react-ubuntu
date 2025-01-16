<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### วิธีการติดตั้ง PHP และ PHP-FPM

ทำตามขั้นตอนต่อไปนี้เพื่อติดตั้ง PHP และ PHP-FPM บนระบบ Linux:

---

### 1. อัปเดตแพ็กเกจของระบบ
ก่อนติดตั้งซอฟต์แวร์ ให้ตรวจสอบว่าแพ็กเกจในระบบเป็นเวอร์ชันล่าสุด:
```bash
sudo apt update
sudo apt upgrade -y
```

---

### 2. ติดตั้ง PHP และ PHP-FPM
ใช้คำสั่งนี้เพื่อติดตั้ง PHP พร้อมกับ PHP-FPM:
```bash
sudo apt install php php-fpm -y
```

---

### 3. ตรวจสอบการติดตั้ง
ตรวจสอบว่า PHP ติดตั้งสำเร็จ:
```bash
php -v
```

ตรวจสอบสถานะของ PHP-FPM:
```bash
sudo systemctl status php-fpm
```

หาก PHP-FPM ไม่ได้ทำงาน ให้เริ่มต้นและเปิดใช้งานด้วยคำสั่ง:
```bash
sudo systemctl start php-fpm
sudo systemctl enable php-fpm
```

---

เท่านี้ก็พร้อมใช้งาน PHP และ PHP-FPM บนระบบของคุณแล้ว! 🚀