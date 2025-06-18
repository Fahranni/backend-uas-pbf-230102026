# 🔧 CodeIgniter Backend API – UAS PBF

Project ini adalah backend berbasis **CodeIgniter 4** yang menyediakan RESTful API untuk dikonsumsi oleh aplikasi frontend berbasis Laravel.

---

## 🧠 Arsitektur Singkat

- ⚙️ Backend dibangun dengan **CodeIgniter 4**
- 📡 Menyediakan **REST API** (GET, POST, PUT, DELETE)
- 💾 Terhubung ke database untuk mengelola data

---

## 📁 Struktur Utama Project

```bash
/
├── app/
│   ├── Controllers/        
│   ├── Models/            
│   └── Config/             
├── public/                
├── .env                    
└── spark
```
---
## ⚙️ Instalasi
### 1. Clone project ini
```bash
git clone https://github.com/Fahranni/backend-uas-pbf-230102026.git
cd backend-uas-pbf-230102026
```
### 2. Install dependensi dengan Composer
```bash
composer install
```
### 3. Salin file environment
```bash
cp .env.example .env
```
### 4. Sesuaikan konfigurasi database di .env
```bash
database.default.hostname = localhost
database.default.database = db_perpus_230102026
database.default.username = root
database.default.password = 
```
### 5. Generate application key (opsional)
```bash
php spark key:generate
```
### 6. Jalankan migrasi (opsional)
```bash
php spark migrate
```
### 7. Jalankan server lokal
```bash
php spark serve
```
