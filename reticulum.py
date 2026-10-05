import RNS #mengimpor rns nya
reticulum = RNS.Reticulum(configdir="./rns_config")  # menginisiasi reticulum
identity = RNS.Identity()  # membuat identitynya
destination = RNS.Destination(  # membuat destinationnya
    identity,                 # identity untuk destination
    RNS.Destination.IN,       # arah destinasi saat masu
    RNS.Destination.SINGLE,   # tipe destination single
    "aplikasi",             # nama aplikasi
    "halo"                    # aspek destination
)
print(identity)     # ngeprint identity
print(destination)  # ngeprint destination