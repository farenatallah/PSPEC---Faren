import RNS  # Mengimpor library Reticulum

reticulum = RNS.Reticulum(configdir="./rns_config")  # Menginisialisasi Reticulum

identity = RNS.Identity()  # Membuat identity baru

destination = RNS.Destination(  # Membuat destination
    identity,                 # Identity pemilik destination
    RNS.Destination.IN,       # Arah destination: masuk
    RNS.Destination.SINGLE,   # Tipe destination: single
    "contoh_app",             # Nama aplikasi
    "halo"                    # Aspek destination
)

print(identity)     # Menampilkan identity
print(destination)  # Menampilkan destination