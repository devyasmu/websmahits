# 🎨 Fitur Pengaturan Warna Website

## Overview
Website yayasan pendidikan Islam sekarang dilengkapi dengan fitur pengaturan warna yang lengkap untuk website public dan admin panel.

## 🚀 Fitur yang Tersedia

### 1. **Pengaturan Warna Website Public**
- **Warna Utama**: Primary, Secondary, Accent
- **Warna Background**: Header, Footer, Body
- **Warna Teks**: Header, Footer, Body
- **Warna Tombol**: Primary, Secondary, Hover states
- **Warna Link**: Normal dan Hover
- **Warna Card**: Background, Border, Shadow

### 2. **Pengaturan Warna Admin Panel**
- **Sidebar**: Background, Text, Hover
- **Header**: Background, Text

### 3. **Preset Tema**
- **Default**: Warna biru standar Bootstrap
- **Hijau**: Tema hijau untuk nuansa alam
- **Merah**: Tema merah untuk nuansa hangat
- **Orange**: Tema orange untuk nuansa cerah

### 4. **Fitur Tambahan**
- **Color Picker**: Input warna dengan visual picker
- **Text Input**: Input hex code manual
- **Live Preview**: Preview tema sebelum disimpan
- **Reset Tema**: Kembali ke pengaturan default

## 📍 Cara Mengakses

1. **Login ke Admin Panel**
   - URL: `http://localhost:8000/admin`
   - Email: `admin@yayasan.com`
   - Password: `password`

2. **Akses Pengaturan Warna**
   - Menu: **Site Settings** → Tab **Warna Website** atau **Warna Admin**

## 🎯 Cara Menggunakan

### Menggunakan Preset Tema
1. Buka **Site Settings** → Tab **Warna Website**
2. Pilih salah satu preset tema (Default, Hijau, Merah, Orange)
3. Klik **Preview** untuk melihat hasil
4. Klik **Simpan Pengaturan** untuk menerapkan

### Kustomisasi Manual
1. Buka **Site Settings** → Tab **Warna Website**
2. Ubah warna menggunakan color picker atau input hex code
3. Klik **Preview** untuk melihat hasil
4. Klik **Simpan Pengaturan** untuk menerapkan

### Reset ke Default
1. Buka **Site Settings**
2. Klik tombol **Reset Tema**
3. Konfirmasi reset
4. Tema akan kembali ke pengaturan default

## 🔧 Teknis

### Database
- Semua pengaturan warna disimpan di tabel `site_settings`
- Menggunakan format hex color (#RRGGBB)
- Nilai default sudah diset di migration dan seeder

### CSS Generation
- CSS dinamis dibuat oleh `ThemeHelper::generateDynamicCSS()`
- Menggunakan CSS Custom Properties (CSS Variables)
- Terintegrasi dengan Bootstrap 5

### File yang Terlibat
- `app/Helpers/ThemeHelper.php` - Helper untuk generate CSS
- `resources/views/admin/site-settings/index.blade.php` - Form pengaturan
- `resources/views/layouts/app.blade.php` - Layout public
- `resources/views/layouts/admin.blade.php` - Layout admin
- `database/migrations/*_add_theme_settings_to_site_settings_table.php` - Migration

## 🎨 Contoh Warna

### Tema Hijau
```css
--primary-color: #28a745;
--accent-color: #20c997;
--footer-bg-color: #155724;
```

### Tema Merah
```css
--primary-color: #dc3545;
--accent-color: #fd7e14;
--footer-bg-color: #721c24;
```

### Tema Orange
```css
--primary-color: #fd7e14;
--accent-color: #ffc107;
--footer-bg-color: #856404;
```

## ✅ Status
- ✅ Database migration
- ✅ Model dan fillable
- ✅ Admin form dengan tabs
- ✅ Color picker dan text input
- ✅ Preset tema
- ✅ Live preview
- ✅ Reset tema
- ✅ CSS dinamis untuk public
- ✅ CSS dinamis untuk admin
- ✅ JavaScript interaksi
- ✅ Seeder dengan nilai default

Fitur pengaturan warna sudah **100% selesai** dan siap digunakan! 🎉
