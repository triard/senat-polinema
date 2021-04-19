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
- username : ketua_komisi_1
- password : ketuakomisi1

ketua komisi 2
- username : ketua_komisi_2
- password : ketuakomisi2

ketua komisi 3
- username : ketua_komisi_3
- password : ketuakomisi3

ketua komisi 4
- username : ketua_komisi_4
- password : ketuakomisi4

anggota komisi 1
- username : anggota_komisi_1
- password : anggotakomisi1

anggota komisi 2
- username : anggota_komisi_2
- password : anggotakomisi2

anggota komisi 3
- username : anggota_komisi_3
- password : anggotakomisi3

anggota komisi 4
- username : anggota_komisi_4
- password : anggotakomisi4

Alur status = (Diajukan) - (Disetujui) - (Diajukan - Sekretaris)  - (Dijadwalkan - Sekretaris) - Selesai (if selesai)
                                       \ (Diajukan - Komisi X)    - (Dijadwalkan - Komisi X)   - Selesai (if selesai)
                                                                                               \ (Perlu Tindak Lanjut - Sidang Pleno) - (Dijadwalkan - Sidang Pleno) - Selesai
                                                                                               \ (Perlu Tindak Lanjut - Sidang Prprn) - (Dijadwalkan - Sidang Prprn) - Selesai
