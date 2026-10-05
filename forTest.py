genap = 0
ganjil = 0
for i in range(5):
    angka = int(input("Masukan Angka : "))
    if angka % 2 == 0:
        genap = genap + 1
    elif angka % 2 != 0 :
        ganjil = ganjil+ 1
print(genap)
print(ganjil)
