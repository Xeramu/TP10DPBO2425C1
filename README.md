<< Saya, Umarex Shauma Andromeda, dengan NIM 2400598, mengerjakan TP10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek. Untuk keberkahan-Nya, maka saya tidak akan melakukan kecurangan seperti yang telah dispesifikasi >>

1. Design Program

- ERD
   <img width="567" height="318" alt="image" src="https://github.com/user-attachments/assets/f267466c-df5b-4a54-a4e3-99f8849346ea" />

   - struktur tabel
     1. **users**
        - user_id (PK)
        - nama
        - email
         
     2. **konser**
        - konser_id (PK)
        - nama_konser
        - lokasi
        - tanggal

     3. **tiket**
        - tiket_id (PK)
        - konser_id (FK)
        - kategori
        - harga
     
     4. **pemesanan**
        - pesanan_id (PK)
        - user_id (FK)
        - tiket_id (FK)
        - jumlah 

   - relasi antar tabel
     1. **users - pemesanan**
        - One-to-many
        - satu user bisa buat banyaj pemesanan

     2. **konser - tiket**
        - One-to-many
        - satu konser bisa memiliki banyak tiket 
  
     3. **tiket - pemesanan**
        - one-to-many
        - satu tiket dapat dipesan berkali-kali
     
- Struktur Program


  <img width="235" height="605" alt="image" src="https://github.com/user-attachments/assets/5eeaae8e-b1d4-4523-80db-aac869490e41" />

  1. **config/config.php**
     - isinya konfigurasi buat konek ke database
     - dipake sama smua model untuk ngakses database
       
  2.  **database/db_tiket.sql**
     - isnya file sql buat ngebikin database

  3. **models**
     - isinya class php yg berhubungan lgsng sama tabel databse
     - ada users.php, konser.php, tiket.php, pemesanan.php
     - tugas models untuk ngejalanin query sql, ngambil sama update data
       
  4. **viewsmodels**
     - viewsmodels tugasnya nerima request user dari index.php
     - viewsmodels manggil model, nyiapin data buat view, sama ngehubungin crud
       
  5. **views**
     - _form.php
       page tempat user ngiri form create/update
       
     - _list.php
       page buat nampilin tabel data
       
  6. **index.php**
      - buat nerima parameter page
      - buat nerima parameter action kayak add/edit/delete
      - buat manggil viewmodel sesuai kebutuhan
      - buat manggil file view sesuai operasi
        
2. Alur
   - user akses index.php
   - index.php baca parameter
   - viewmodel dipanggil index.php
   - view ditampilkan index.php
   - pas form disubmit:
     - viewmodel nerima data post
     - manggil model buat crud database
     - redirect balik ke list





3. Dokumentasi
   

https://github.com/user-attachments/assets/2251a576-2a40-484c-a8a8-666270851edb

