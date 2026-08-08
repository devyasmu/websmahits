@extends('layouts.admin')

@section('title', 'Tutorial')
@section('page-title', 'Petunjuk Penggunaan Aplikasi')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <p class="lead mb-0">
            Halaman ini berisi petunjuk lengkap penggunaan panel admin. Klik judul setiap bagian untuk membuka/langkah-langkahnya.
            Setiap link di bawah mengarah ke halaman yang benar di admin.
        </p>
    </div>
</div>

<div class="accordion" id="tutorialAccordion">
    {{-- 1. Pengaturan Website --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tut-pengaturan" aria-expanded="true" aria-controls="tut-pengaturan">
                <i class="bi bi-gear me-2"></i> 1. Pengaturan Website
            </button>
        </h2>
        <div id="tut-pengaturan" class="accordion-collapse collapse show" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Mengatur nama website, logo, favicon, tema warna, dan kata sandi admin.</p>
                <ol>
                    <li>Klik sidebar <strong>Pengaturan</strong> → <strong>Pengaturan Website</strong>, atau buka <a href="{{ route('admin.site-settings.index') }}">Pengaturan Website</a>.</li>
                    <li>Isi <strong>Nama Website</strong> (muncul di header dan judul halaman).</li>
                    <li>Upload <strong>Logo</strong> dan <strong>Favicon</strong> (opsional). Format disarankan: logo PNG/JPG, favicon ICO/PNG.</li>
                    <li>Pilih <strong>Tema</strong> (warna utama situs) lalu klik <strong>Simpan Tema</strong>.</li>
                    <li>Untuk ganti password: isi <strong>Password Baru</strong> dan <strong>Konfirmasi Password</strong>, lalu klik <strong>Ubah Password</strong>.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 2. Slider --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-slider" aria-expanded="false" aria-controls="tut-slider">
                <i class="bi bi-images me-2"></i> 2. Slider (Banner Depan)
            </button>
        </h2>
        <div id="tut-slider" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Gambar berjalan di halaman utama (hero/banner).</p>
                <ol>
                    <li>Buka <a href="{{ route('admin.sliders.index') }}">Slider</a> (Pengaturan → Slider).</li>
                    <li>Klik <strong>Tambah Slider</strong> (<a href="{{ route('admin.sliders.create') }}">Buat baru</a>).</li>
                    <li>Upload gambar, isi judul dan teks (opsional). Urutan ditentukan oleh kolom <strong>Urutan</strong> (angka kecil = tampil lebih dulu).</li>
                    <li>Simpan. Slider aktif akan tampil di beranda situs.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 3. Running Text --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-running" aria-expanded="false" aria-controls="tut-running">
                <i class="bi bi-text-paragraph me-2"></i> 3. Running Text
            </button>
        </h2>
        <div id="tut-running" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Teks berjalan (marquee) di bagian atas atau bawah halaman.</p>
                <ol>
                    <li>Buka <a href="{{ route('admin.running-texts.index') }}">Running Text</a> (Pengaturan → Running Text).</li>
                    <li>Klik <strong>Tambah</strong> (<a href="{{ route('admin.running-texts.create') }}">Buat baru</a>), isi teks dan urutan.</li>
                    <li>Simpan. Teks akan bergulir di area yang sudah diset di tema.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 4. Menu --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-menu" aria-expanded="false" aria-controls="tut-menu">
                <i class="bi bi-list-ul me-2"></i> 4. Menu (Navigasi)
            </button>
        </h2>
        <div id="tut-menu" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Mengatur item menu di navbar (header) dan menu bawah (mobile).</p>
                <ol>
                    <li>Buka <a href="{{ route('admin.menus.index') }}">Menu</a> (Pengaturan → Menu).</li>
                    <li>Klik <strong>Tambah Menu</strong> (<a href="{{ route('admin.menus.create') }}">Buat baru</a>).</li>
                    <li>Isi <strong>Label</strong> (teks yang tampil), <strong>URL/Link</strong> (misal <code>/berita</code>, <code>/galeri</code>, atau URL penuh).</li>
                    <li>Atur <strong>Urutan</strong>. Centang <strong>Tampil di Navbar</strong> agar muncul di header; centang <strong>Tampil di Menu Bawah (Mobile)</strong> jika ingin di bottom nav.</li>
                    <li><strong>Ikon menu bawah:</strong> Jika menu tampil di navbar bawah (mobile), isi kolom <strong>Ikon</strong> dengan kode Bootstrap Icons (format: <code>bi-nama-ikon</code>, contoh: <code>bi-house-door</code>, <code>bi-newspaper</code>, <code>bi-images</code>). Referensi daftar ikon: <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer">icons.getbootstrap.com <i class="bi bi-box-arrow-up-right small"></i></a> — buka situs tersebut, pilih ikon, lalu salin nama kelas (misal <code>bi-house-door</code>) ke kolom Ikon.</li>
                    <li>Simpan. Menu akan muncul di situs sesuai pengaturan.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 5. Akses Cepat (Quick Links) --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-quick" aria-expanded="false" aria-controls="tut-quick">
                <i class="bi bi-lightning-charge me-2"></i> 5. Akses Cepat (Quick Links)
            </button>
        </h2>
        <div id="tut-quick" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Tombol/link cepat di beranda (misal: Berita, Galeri, Download).</p>
                <ol>
                    <li>Buka <a href="{{ route('admin.quick-links.index') }}">Akses Cepat</a> (Pengaturan → Akses Cepat).</li>
                    <li>Klik <strong>Tambah</strong> (<a href="{{ route('admin.quick-links.create') }}">Buat baru</a>).</li>
                    <li>Isi judul, link (URL), urutan. Upload ikon/gambar jika ada kolomnya.</li>
                    <li>Simpan. Item akan tampil di area quick links di halaman depan.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 6. Halaman --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-halaman" aria-expanded="false" aria-controls="tut-halaman">
                <i class="bi bi-file-text me-2"></i> 6. Halaman (Pages)
            </button>
        </h2>
        <div id="tut-halaman" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Halaman statis seperti Profil, Sejarah, Visi Misi. Diakses via URL <code>/slug-halaman</code>.</p>
                <ol>
                    <li>Buka <a href="{{ route('admin.pages.index') }}">Halaman</a> (Konten → Halaman).</li>
                    <li>Klik <strong>Tambah Halaman</strong> (<a href="{{ route('admin.pages.create') }}">Buat baru</a>).</li>
                    <li>Isi <strong>Judul</strong> dan <strong>Konten</strong> (editor rich text). <strong>Slug</strong> dipakai di URL (contoh: <code>profil</code> → <code>/profil</code>).</li>
                    <li>Pilih status <strong>Publikasi</strong>. Simpan.</li>
                    <li>Tambahkan link di Menu (Pengaturan → Menu) dengan URL <code>/slug-halaman</code> agar bisa diklik dari navigasi.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 7. Kategori & Post/Artikel --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-post" aria-expanded="false" aria-controls="tut-post">
                <i class="bi bi-newspaper me-2"></i> 7. Kategori & Post/Artikel (Berita)
            </button>
        </h2>
        <div id="tut-post" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Kategori untuk mengelompokkan artikel; Post adalah berita/artikel yang tampil di situs.</p>
                <ol>
                    <li><strong>Kategori:</strong> Buka <a href="{{ route('admin.categories.index') }}">Kategori</a> (Konten → Kategori). Buat kategori (misal: Berita, Pengumuman).</li>
                    <li><strong>Post:</strong> Buka <a href="{{ route('admin.admin-posts.index') }}">Post/Artikel</a> (Konten → Post/Artikel). Klik <strong>Tambah Post</strong> (<a href="{{ route('admin.admin-posts.create') }}">Buat baru</a>).</li>
                    <li>Isi judul, slug (atau biarkan auto), pilih kategori, isi konten, upload thumbnail jika ada. Set status <strong>Terbit</strong> lalu simpan.</li>
                    <li>Artikel terbit bisa diakses di <code>/posts/slug-artikel</code> atau dari halaman berita. Pastikan ada menu ke <code>/berita</code> atau <code>/posts</code>.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 8. Galeri --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-galeri" aria-expanded="false" aria-controls="tut-galeri">
                <i class="bi bi-collection me-2"></i> 8. Galeri
            </button>
        </h2>
        <div id="tut-galeri" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Album foto/gambar yang ditampilkan di halaman galeri.</p>
                <ol>
                    <li>Buka <a href="{{ route('admin.galleries.index') }}">Galeri</a> (Konten → Galeri).</li>
                    <li>Klik <strong>Tambah Galeri</strong> (<a href="{{ route('admin.galleries.create') }}">Buat baru</a>).</li>
                    <li>Isi judul, deskripsi, slug. Upload gambar cover dan gambar-gambar lain (jika ada fitur multi gambar).</li>
                    <li>Simpan. Galeri tampil di <code>/galleries</code> atau <code>/galeri</code>; setiap album di <code>/galleries/slug-album</code>.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 9. Program & Guru --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-program" aria-expanded="false" aria-controls="tut-program">
                <i class="bi bi-book me-2"></i> 9. Program & Guru
            </button>
        </h2>
        <div id="tut-program" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Program:</strong> Halaman program (misal program unggulan). <strong>Guru:</strong> Daftar guru/staf pengajar.</p>
                <ol>
                    <li><strong>Program:</strong> Buka <a href="{{ route('admin.admin-programs.index') }}">Program</a> (Program & SDM → Program). Tambah program, isi judul, deskripsi, slug. Tampil di <code>/programs</code> atau <code>/program</code>.</li>
                    <li><strong>Guru:</strong> Buka <a href="{{ route('admin.teachers.index') }}">Guru</a> (Program & SDM → Guru). Klik <strong>Tambah Guru</strong> (<a href="{{ route('admin.teachers.create') }}">Buat baru</a>), isi nama, jabatan, foto, bio. Tampil di <code>/guru</code> atau <code>/teachers</code>.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 10. Pengumuman, Download, FAQ --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-info" aria-expanded="false" aria-controls="tut-info">
                <i class="bi bi-info-circle me-2"></i> 10. Pengumuman, Download & FAQ
            </button>
        </h2>
        <div id="tut-info" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Pengumuman:</strong> Berita singkat/pengumuman. <strong>Download:</strong> File yang bisa diunduh pengunjung. <strong>FAQ:</strong> Pertanyaan yang sering diajukan.</p>
                <ol>
                    <li><strong>Pengumuman:</strong> <a href="{{ route('admin.announcements.index') }}">Pengumuman</a> (Informasi → Pengumuman). Buat item, isi judul, konten, slug. Tampil di <code>/announcements</code>.</li>
                    <li><strong>Download:</strong> <a href="{{ route('admin.downloads.index') }}">Download</a> (Informasi → Download). Tambah file, upload dokumen, isi judul/keterangan. Pengunjung unduh dari halaman download.</li>
                    <li><strong>FAQ:</strong> <a href="{{ route('admin.faqs.index') }}">FAQ</a> (Informasi → FAQ). Tambah pertanyaan dan jawaban. Tampil di halaman FAQ.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 11. Testimoni, Statistik, Fitur --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-tampilan" aria-expanded="false" aria-controls="tut-tampilan">
                <i class="bi bi-display me-2"></i> 11. Testimoni, Statistik & Fitur (Tampilan)
            </button>
        </h2>
        <div id="tut-tampilan" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Fungsi:</strong> Konten yang menampilkan testimoni, angka statistik, dan blok fitur di beranda/tampilan.</p>
                <ol>
                    <li><strong>Testimoni:</strong> <a href="{{ route('admin.testimonials.index') }}">Testimoni</a> (Tampilan → Testimoni). Tambah nama, kutipan, foto (opsional). Ditampilkan di section testimoni.</li>
                    <li><strong>Statistik:</strong> <a href="{{ route('admin.statistics.index') }}">Statistik</a> (Tampilan → Statistik). Tambah item (misal: Jumlah Siswa, Guru). Angka dan label tampil di beranda.</li>
                    <li><strong>Fitur:</strong> <a href="{{ route('admin.features.index') }}">Fitur</a> (Tampilan → Fitur). Tambah blok fitur (judul, ikon, deskripsi) untuk ditampilkan di halaman.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- 12. Kontak & Komentar --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-layanan" aria-expanded="false" aria-controls="tut-layanan">
                <i class="bi bi-headset me-2"></i> 12. Kontak (Pesan) & Komentar
            </button>
        </h2>
        <div id="tut-layanan" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <p><strong>Kontak:</strong> Melihat dan membalas pesan dari form kontak. <strong>Komentar:</strong> Moderasi komentar pada artikel.</p>
                <ol>
                    <li><strong>Pesan Kontak:</strong> Buka <a href="{{ route('admin.contacts.index') }}">Kontak</a> (Layanan → Kontak). Daftar pesan dari pengunjung; bisa dibaca dan ditindaklanjuti.</li>
                    <li><strong>Komentar:</strong> Buka <a href="{{ route('admin.comments.index') }}">Komentar</a> (Layanan → Komentar). Setujui atau tolak komentar; badge menunjukkan jumlah komentar belum disetujui.</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- Tips Umum --}}
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tut-tips" aria-expanded="false" aria-controls="tut-tips">
                <i class="bi bi-lightbulb me-2"></i> Tips Umum
            </button>
        </h2>
        <div id="tut-tips" class="accordion-collapse collapse" data-bs-parent="#tutorialAccordion">
            <div class="accordion-body">
                <ul>
                    <li>Gunakan <strong>Lihat Website</strong> di sidebar untuk membuka situs di tab baru dan memeriksa perubahan.</li>
                    <li>Slug harus unik per jenis konten (halaman, post, galeri, dll.) dan biasanya huruf kecil, tanpa spasi (gunakan strip).</li>
                    <li>Untuk gambar: gunakan format JPG/PNG, ukuran wajar agar halaman cepat loading.</li>
                    <li>Setelah mengubah menu atau pengaturan, refresh halaman depan untuk melihat hasil.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
