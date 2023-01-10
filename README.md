# mini-inventory-api-backend
WebPage ini hanya dikhususkan untuk generate API dan pada halaman homepage diredirect ke halaman dokumentasi API Postman Online sebagai dokumentasi API Online <p></p>

Terdapat beberapa fitur API diantaranya : <br />
<ul>
<li>Kategori API ( add,edit,soft Delete )</li>
<li>Supplier API ( add,edit,soft Delete )</li>
<li>Barang API ( add,edit,soft Delete )</li>
<li>Pembelian API ( add )</li>
<li>Penjualan API ( add )</li>
</ul>

<p></p>

Untuk menjalankan aplikasi terdapat beberapa tahapan diantaranya : <p></p>
<ul>
<li>Run Composer Install ( install keperluan package ) </li>
<li>Run php artisan migrate ( Migrasi Database )</li>
<li>Run php artisan db:seed ( Import data ke Database menggunakan seeder data )</li>
<li>Run Passport Install ( install keperluan proteksi API dengan token JWT )</li>
</ul>

<p></p>

Disertakan juga file pendukung diantaranya : 
<p></p>
<ul>
<li>Postman Collection ( folder postman_collection )</li>
<li>Database .sql ( Mysql) ( folder db_inventory)</li>
</ul>
