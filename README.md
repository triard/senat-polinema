# senat-polinema
admin
- username : admin
- password : 12345

sekretaris
- username : sekretaris
- password : sekretaris

ketua senat
- username : ketua_senat
- password : ketuasenat

ketua komisi 1
- username : ketua_komisi1
- password : ketuakomisi1

anggota
- username : anggota
- password : anggota

Alur status = (Diajukan) - (Diajukan - Sekretaris)  - (Dijadwalkan - Sekretaris) - Sedang Proses - Selesai (if selesai)
                         \ (Diajukan - Komisi X)    - (Dijadwalkan - Komisi X)   - Sedang Proses - Selesai (if selesai)
                                                                                                 \ Tindak Lanjut - Sidang Pleno (jika perlu tindak lanjut) - Selesai
