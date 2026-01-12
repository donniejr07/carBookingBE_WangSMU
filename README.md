# Car Booking Backend

Backend untuk sistem booking mobil, dibuat pake CodeIgniter 3.

## Fitur

- CRUD mobil (tambah, edit, hapus)
- Validasi plat nomor biar ga duplikat
- Pagination
- Filter status mobil (available/booked/maintenance)

## Tech Stack

- PHP 7.x / 8.x
- CodeIgniter 3
- MySQL / MariaDB
- Bootstrap

## Cara Install

### 1. Clone repo

```bash
git clone https://github.com/donniejr07/carBookingBE_WangSMU.git
```

### 2. Setup database

Buat database baru, terus jalanin query ini:

```sql
CREATE TABLE `cars` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `plate` VARCHAR(20) NOT NULL,
  `capacity` INT(11) NOT NULL,
  `status` ENUM('available','booked','maintenance') DEFAULT 'available',
  PRIMARY KEY (`id`),
  UNIQUE KEY `plate` (`plate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### 3. Config database

Edit `application/config/database.php`, sesuaiin sama kredensial database lu:

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'car_booking',
    // ...
);
```

### 4. Jalanin

Buka di browser:
```
http://localhost/car_booking_new/
```

## Struktur Folder

```
car_booking_new/
├── assets/              # CSS, JS, images
├── controllers/
│   └── Cars.php
├── models/
│   ├── cars/
│   │   └── Car_model.php
│   └── pengguna/
│       └── Pengguna_model.php
├── views/
│   ├── cars/
│   └── templates/
└── libraries/
```

## Endpoints

| Method | URL | Fungsi |
|--------|-----|--------|
| GET | `/cars` | List mobil |
| GET | `/cars/add` | Form tambah |
| POST | `/cars/add` | Simpan mobil baru |
| GET | `/cars/edit/{id}` | Form edit |
| POST | `/cars/edit/{id}` | Update mobil |
| GET | `/cars/delete/{id}` | Hapus mobil |

## License

MIT
