# ใช้ image ของ PHP ที่มี Apache
FROM php:8.0-apache

# ติดตั้ง PHP extensions ที่จำเป็น
RUN docker-php-ext-install pdo pdo_mysql

# เปิดใช้ mod_rewrite สำหรับ Apache
RUN a2enmod rewrite

# ตั้งค่า DocumentRoot (คุณสามารถปรับแต่งได้ตามต้องการ)
COPY . /var/www/html/

# ตั้งค่า port ที่จะใช้ใน container
EXPOSE 80

# เริ่ม Apache เมื่อ container เริ่มทำงาน
CMD ["apache2-foreground"]
